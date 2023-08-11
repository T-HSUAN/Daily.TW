import { createStore } from "vuex";
import axios from 'axios';
import { URL } from "@/assets/js/common.js";

export default createStore({
    state: {
        ticketData: [],
        area: ["所有地區", "新北", "臺北", "基隆", "桃園", "新竹", "苗栗", "臺中", "彰化", "雲林", "嘉義", "南投", "臺南", "高雄", "屏東", "宜蘭", "花蓮", "臺東", "澎湖", "金門", "馬祖",
        ],
        // 篩選內容(各自設定不同名稱，不要共用)
        filter: {
            areaSelected: "所有地區",// 景點票券地區搜尋
            searchText: "", // 景點票券名稱搜尋           
            selectedTags: [],// 景點票券標籤
        },
        cartItems: [],//購物車
        finalCartItems: [], // 最終購物明細清單
        selectAll: false,//購物車全選
        name: '登入/註冊',
        isLogin: false,

    },
    getters: {
        ticketData: state => state.ticketData,
        cartItems: state => state.cartItems,
        totalPrice: state => {
            // 計算 totalPrice，當 cartItems 數據發生變化時，totalPrice 會自動重新計算
            return state.cartItems.reduce((total, item) => total + item.subtotal, 0);
        },
        totalSelectedPrice(state) {
            if (state.selectAll) {
                return state.cartItems.reduce((total, item) => total + item.subtotal, 0);
            }
            return state.cartItems.reduce((total, item) => {
                if (item.selected) {
                    return total + item.subtotal;
                }
                return total;
            }, 0);
        },
        finalCartItems(state) {
            return state.finalCartItems;
        },
        finalCartTotalPrice(state) {
            return state.finalCartItems.reduce((total, item) => total + item.subtotal, 0);
        },
    },
    mutations: {
        SET_TICKET_DATA(state, data) {
            state.ticketData = data;
        },
        addToCart(state, cartItem) {
            // 檢查票券是否已經在購物車中，如果不在，則添加到購物車
            const CartItemInCart = state.cartItems.some(item => item.id === cartItem.id);

            if (!CartItemInCart) {
                state.cartItems.push(cartItem);
            } else {
                swal("票券已加入購物車", "請點擊確認全票與優待票購買數量。", "error", { timer: 1800 });
            }
        },
        addToCartDirectly(state, cartItem) {
            // 檢查票券是否已經在購物車中，如果不在，則添加到購物車
            const CartItemInCart = state.cartItems.some(item => item.id === cartItem.id);

            if (!CartItemInCart) {
                state.cartItems.push(cartItem);
            } else {

            }
        },
        removeFromCart(state, index) {
            // 確保 index 的值在有效範圍內
            if (index >= 0 && index < state.cartItems.length) {
                const itemIndex = state.cartItems[index];
                itemIndex.count_adult = 0;
                itemIndex.count_ex = 0;
                itemIndex.subtotal = 0;
                state.cartItems.splice(index, 1);
            }
        },
        clearCart(state) {
            // 清空購物車
            state.cartItems = [];
        },
        //更新票券數量
        updateItemCount(state, item) {
            // 根據 item.id 在購物車中找到對應的商品，然後更新它的相關數據
            const index = state.cartItems.findIndex((cartItem) => cartItem.id === item.id);
            if (index !== -1) {
                state.cartItems[index] = item;
            }
        },
        SelectItem(state) {
            state.selectAll = !state.selectAll;
            if (state.selectAll === true) {
                state.cartItems.forEach(item => {
                    item.selected = true;
                }
                );
            } else {
                state.cartItems.forEach(item => {
                    item.selected = false;
                });
            }
        },
        updateFinalCartItems(state, finalCartItems) {
            state.finalCartItems = finalCartItems;
        },
        restoreTicketData(state, ticketData) {
            // 還原票券資料
            state.ticketData = ticketData;
        },
        restoreCartItems(state, cartItems) {
            // 還原購物車資料
            state.cartItems = cartItems;
        },
        restoreFinalCartItems(state, finalCartItems) {
            state.finalCartItems = finalCartItems;
        },
        setName(state, payload) {
            state.name = payload
        },
        setIsLogin(state, value) {
            state.isLogin = value;
        },
        //接收回傳的使用者資訊
        setLoginData(state, userInfo) {
            state.userInfo = userInfo
            sessionStorage.setItem("mem_id", userInfo.mem_id);
            state.isLogin = true
        },
        logOut(state) {
            state.isLogin = false
            sessionStorage.removeItem("mem_id")
        },
        //後端資料
        // setUserInfo(state, userInfo) {
        //     sessionStorage.setItem("cus_no", userInfo.cus_no);
        //     state.memberInfoAll.info = userInfo
        //     state.isLogin = true
        // },
        // sendMemDetail(state, data) {
        //     state.memberInfoAll.shop = data[0]
        //     state.memberInfoAll.giftcard = data[1]
        //     state.memberInfoAll.share = data[2]
        // }

    },
    actions: {
        fetchTicketData({ commit }) {
            axios.get('http://localhost/DailyTW_Backstage/public/phpfile/TicketList.php')
                .then(response => {
                    commit('SET_TICKET_DATA', response.data);
                    console.log('[store]成功連接ticketdata:', this.state.ticketData);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        },
        addToCart({ commit }, cartItem) {
            commit('addToCart', cartItem);
        },
        addToCartDirectly({ commit }, cartItem) {
            commit('addToCartDirectly', cartItem);
        },
        removeFromCart({ commit }, cartItem) {
            commit('removeFromCart', cartItem);
        },
        clearCart({ commit }) {
            commit('clearCart');
        },
        Subtotal({ commit, state }, { itemId, countAdult, countEx }) {
            const item = state.cartItems.find((item) => item.id === itemId);
            if (item) {
                const priceAdultF = item.price_adultF;
                const priceExF = item.price_exF;
                item.count_adult = countAdult;
                item.count_ex = countEx;
                item.subtotal = countAdult * priceAdultF + countEx * priceExF;
                // 調用 mutation 來更新購物車中這個商品的數據
                commit('updateItemCount', item);
            }
        },
    },
    modules: {},
});