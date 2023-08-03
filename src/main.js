import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import firebase from './assets/config/firebase'

// router-link 換頁回到頁面頂端
router.afterEach((to, from) => {
    window.scrollTo(0, 0);
});

// 購物車:在創建 Vue app 之前，先將 sessionStorage 的資料還原到 Vuex store 中
const CART_KEY = "StoreData"; // 作為 localStorage 的 key
const storedCartItems = sessionStorage.getItem(CART_KEY);
if (storedCartItems) {
    store.commit("restoreCartItems", JSON.parse(storedCartItems));
}
// 購物車:在網頁重整前將購物車資料存入 sessionStorage
window.addEventListener("beforeunload", () => {
    const cartItems = JSON.stringify(store.state.cartItems);
    sessionStorage.setItem(CART_KEY, cartItems);
});

// package

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */

import { faBookmark, faHeart, faClock, faEyeSlash, faCircleXmark, faCartShopping, faMagnifyingGlass, faLocationDot, faCloud, faEye, faArrowLeft, faArrowRight, faArrowUp, faChevronDown, faCircleChevronDown, faPen, faTrashCan, faSquarePlus, faSortUp, faCar, faTicket, faUser, faUserTie, faShirt, faBullhorn, faBagShopping, faArrowUpWideShort, faFilter, faSortDown, faChevronRight, faChevronLeft } from '@fortawesome/free-solid-svg-icons'

import { faLine, faInstagram, faSquareFacebook } from '@fortawesome/free-brands-svg-icons'

import { faBookmark as farBookmark } from '@fortawesome/free-regular-svg-icons'

//viewuiplus套件
import 'view-ui-plus/dist/styles/viewuiplus.css'
import ViewUIPlus from 'view-ui-plus'

import "@/assets/scss/main.scss";//改放這邊，不然會被污染



/* add icons to the library */
library.add(faBookmark, farBookmark, faHeart, faCartShopping, faMagnifyingGlass, faLine, faInstagram, faSquareFacebook, faClock, faLocationDot, faCloud, faEye, faEyeSlash, faCircleXmark, faArrowLeft, faArrowRight, faArrowUp, faChevronDown, faCircleChevronDown, faPen, faTrashCan, faSquarePlus, faSortUp, faCar, faTicket, faUser, faUserTie, faShirt, faBullhorn, faBagShopping, faArrowUpWideShort, faFilter, faSortDown, faChevronRight, faChevronLeft)


createApp(App).component('font-awesome-icon', FontAwesomeIcon).use(store).use(router).use(ViewUIPlus).use(firebase).mount("#app");
