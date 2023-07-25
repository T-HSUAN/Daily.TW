<!-- 訂單記錄 -->
<template>
    <div class="lg_area">
        <h1>訂單記錄</h1>
        <div class="bg_area">
            <Sidenav class="sidenav"></Sidenav>
            <div class="bg_container">
                <Collapse v-model="value" accordion>
                    <Panel name="1">
                        史蒂夫·乔布斯
                        <template #content>史蒂夫·乔布斯（Steve Jobs），1955年2月24日生于美国加利福尼亚州旧金山，美国发明家、企业家、美国苹果公司联合创办人。</template>
                    </Panel>
                    <Panel name="2">
                        斯蒂夫·盖瑞·沃兹尼亚克
                        <template #content>斯蒂夫·盖瑞·沃兹尼亚克（Stephen Gary Wozniak），美国电脑工程师，曾与史蒂夫·乔布斯合伙创立苹果电脑（今之苹果公司）。斯蒂夫·盖瑞·沃兹尼亚克曾就读于美国科罗拉多大学，后转学入美国著名高等学府加州大学伯克利分校（UC Berkeley）并获得电机工程及计算机（EECS）本科学位（1987年）。</template>
                    </Panel>
                    <Panel name="3">
                        乔纳森·伊夫
                        <template #content>乔纳森·伊夫是一位工业设计师，现任Apple公司设计师兼资深副总裁，英国爵士。他曾参与设计了iPod，iMac，iPhone，iPad等众多苹果产品。除了乔布斯，他是对苹果那些著名的产品最有影响力的人。</template>
                    </Panel>
                </Collapse>
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
        return {value: '1'};
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