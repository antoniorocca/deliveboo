<template>
    <button id="to_top" @click="scrollToTop()">/\</button>


</template>

<script>
export default {
    methods: {
        scrollToTop: function(){
            window.scrollTo({top: 0, behavior: "smooth"});
        },
    }
}
</script>

<style scoped lang="scss">
    #to_top{
        position: fixed;
        bottom: 50%;
        right: 30px;
        background-color: #ffc244;
        color: white;
        width: 40px;
        height: 40px;
        z-index: 100 !important;
        padding: 5px !important;
        display: flex;
        place-content: center;
        place-items: center;
        border-radius: 50%;
    }
</style>