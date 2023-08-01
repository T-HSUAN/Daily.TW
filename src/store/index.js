import { createStore } from "vuex";

export default createStore({
    state: {
        // 景點票券搜尋內容
        filter: {
            searchText: "",
        },
        name:'登入註冊',
        isLogin:false,
    },
    getters: {},
    mutations: {},
    actions: {},
    modules: {},
});
//使用方式參考: https://fluff-budget-3b7.notion.site/75b8201eb1694d7d98e00a1e7f9ceeff?v=9a1be6b6a69748cc8158fb4e68b0fac9&p=c1e66f2f047046498e7bb634af9da2e0&pm=s
