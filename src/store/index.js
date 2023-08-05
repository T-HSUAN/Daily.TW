import { createStore } from "vuex";
export default createStore({
    state: {
        // 景點票券搜尋內容
        filter: {
            searchText: "",
        },
        //購物車
        cartItems: [],
        name: '登入/註冊',
        isLogin: false,
    },
    getters: {
        cartItems: state => state.cartItems,
        totalPrice: state => {
            // 計算 totalPrice，當 cartItems 數據發生變化時，totalPrice 會自動重新計算
            return state.cartItems.reduce((total, item) => total + item.subtotal, 0);
        },
    },
    mutations: {
        // addToCart(state, cartItem) {
        //     // 檢查票券是否已經在購物車中，如果不在，則添加到購物車
        //     if (!state.cartItems.includes(cartItem)) {
        //         state.cartItems.push(cartItem);
        //     } else {
        //         window.alert("票券已加入購物車，請點擊確認全票與優待票購買數量。");
        //     }

        // },
        addToCart(state, cartItem) {
            // 檢查票券是否已經在購物車中，如果不在，則添加到購物車
            const CartItemInCart = state.cartItems.some(item => item.id === cartItem.id);

            if (!CartItemInCart) {
                state.cartItems.push(cartItem);
            } else {
                window.alert("票券已加入購物車，請點擊確認全票與優待票購買數量。");
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
        restoreCartItems(state, cartItems) {
            // 還原購物車資料
            state.cartItems = cartItems;
        },
        setName(state, payload) {
            state.name = payload
        },
        setIsLogin(state, value) {
            state.isLogin = value;
        },
    },
    actions: {
        addToCart({ commit }, cartItem) {
            commit('addToCart', cartItem);
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