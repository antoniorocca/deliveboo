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
        position: absolute;
        top: 0px;
        right: 20px;
        margin: 35px;
        background-color: #ffc244;
        color: white;
        width: 60px;
        height: 35px;
        display: flex;
        place-content: center;
        place-items: center;
        border-radius: 10px;
        border: 1px solid transparent;
    }

</style>