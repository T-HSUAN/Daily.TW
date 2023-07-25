<template>
    <div class="paysucess_page">
        <h1>付款成功</h1>
        <p>票券將於<span> 7個工作天 </span>內寄出請留意訂單狀態，謝謝！</p>
        <button class="btn">我的訂單</button>
    </div>
</template>
<style lang="scss">
.paysucess_page {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    h1 {
        text-align: center;
        margin: 48px auto;
    }
    p {
        text-align: center;
        margin: 24px auto;
        span {
            color: red;
        }
    }
    .btn {
        margin: 24px;
    }
}
</style>
