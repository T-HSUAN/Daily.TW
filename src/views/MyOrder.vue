<!-- 訂單記錄 -->
<template>
    <div class="lg_area">
        <h1>訂單記錄</h1>
        <div class="bg_area">
            <Sidenav class="sidenav"></Sidenav>
            <div class="bg_container">
                
            </div>
        </div>
    </div>
    
</template>
<script>
import Sidenav from "@/components/Sidenav.vue";
export default {
    components: {
        Sidenav,
    },
    data() {
        return {};
    },
    methods: {},
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";

.lg_area{
    width: 100%;
    text-align: center;
    margin-bottom: $sp8;
    h1{
        padding-top: 60px;
    }
    .bg_area{
        display: flex;
        justify-content: center;
        .bg_container{
        width: 100%;
        @media (min-width: 768px) {
                width: 900px;
            }
        }
        .sidenav{
            flex-shrink: 0;
            height: 506px;
            display: none;
            @media (min-width: 768px) {
                margin: $sp3 0;
            }
            @media (min-width : 1024px) {
                display: block;         
            }
        }
        .bg_container{
            @media (min-width: 768px) {
                margin: 0 $sp3;
                padding: 0 $sp3 $sp3;
            }
        }
    }
    
}
</style> 