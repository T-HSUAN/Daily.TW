import { createStore } from "vuex";
export default createStore({
    state: {
        // 景點票券搜尋內容
        filter: {
            searchText: "",
        },
        ticketInfo:[],
        //購物車
        cartItems: [],
        name:'登入/註冊',
        isLogin: false,
    },
    getters: {
        cartItems: state => state.cartItems,
        cartTotalPrice: state => state.cartItems.reduce((total, item) => total + item.subtotal, 0)
      },
    mutations: {
            addToCart(state, cartItem) {
              // 檢查票券是否已經在購物車中，如果不在，則添加到購物車
              if (!state.cartItems.includes(cartItem)) {
                state.cartItems.push(cartItem);
              } else {
                window.alert("票券已加入購物車，請點擊確認全票與優待票購買數量。");
              }
            
        setName (state, payload) {
            state.name = payload
        },
        setIsLogin(state, value) {
            state.isLogin = value;
        },
    },
            removeFromCart(state, index) {
                // 從購物車中移除指定 ID 的票券
                state.cartItems.splice(index, 1);
              },
        clearCart(state) {
          // 清空購物車
          state.cartItems = [];
        }
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
        }
      },
    modules: {},
});
//使用方式參考: https://fluff-budget-3b7.notion.site/75b8201eb1694d7d98e00a1e7f9ceeff?v=9a1be6b6a69748cc8158fb4e68b0fac9&p=c1e66f2f047046498e7bb634af9da2e0&pm=s
