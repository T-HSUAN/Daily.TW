    <template>
    <button class="arrow back_to_top" @click="backToTop" v-show="showBackToTopArrow">
        <font-awesome-icon icon="fa-solid fa-arrow-up" />
        <br>
        TOP
    </button>
    </template>
    
    <script>
    export default {
        data() {
            return {
                showBackToTopArrow:false,
            }
        },
        mounted() {
            document.addEventListener("scroll", this.handleScroll)
        },
        beforeUnmount() {
            document.removeEventListener("scroll", this.handleScroll)
        },
        methods:{
            handleScroll(){
                if (window.scrollY > 1000){
                    this.showBackToTopArrow = true
                } else {
                    this.showBackToTopArrow = false
                } 
            },
            backToTop(){
                window.scrollTo({
                    top : 0,
                    behavior: "smooth"
                })
            } 
        }
    };
    </script>
    
    <style>
    .back_to_top{
        position:fixed ;
        bottom: 100px;
        right: 10px;
        z-index: 999;
    }
    </style>