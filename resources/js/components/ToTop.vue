<template>
    <button id="to_top" @click="scrollToTop()"><i class="fas fa-chevron-circle-up"></i></button>
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
    i{
        position: absolute;
        top: 0px;
        right: 20px;
        margin: 35px;
        color: #ffc244;
        width: 60px;
        height: 35px;
        display: flex;
        font-size: 35px;
    }
}
</style>