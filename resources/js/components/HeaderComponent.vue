<template>
    <div class="header">
        <div id="main-header" class="d-flex justify-content-center flex-wrap">
            <div id="categories" class="d-flex justify-content-center flex-wrap">

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Pizza')">
                    <img src="img/pizza_trancio.png" alt="">
                    <span>Pizza</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Piadina')">
                    <img src="img/wrap.png" alt="">
                    <span>Piadina</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Messicano')">
                    <img src="img/mexican.png" alt="">
                    <span>Messicano</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Giapponese')">
                    <img src="img/ramen.png" alt="">
                    <span>Giapponese</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Caffeteria')">
                    <img src="img/caffe.png" alt="">
                    <span>Caffeteria</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Gelato')">
                    <img src="img/ice-cream.png" alt="">
                    <span>Gelato</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Hamburger')">
                    <img src="img/hamburger.png" alt="">
                    <span>Hamburger</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" @click="filterRestaurant('Insalate')">
                    <img src="img/salad.png" alt="">
                    <span>Insalate</span>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods:{
            filterRestaurant(category){
                this.$store.commit('filterRestaurant',category);
            },
        },
    }
</script>

<style scoped lang="scss">
@media all and (max-width: 580px) {
    #main-header {
        height: 100%;
        #categories {
            height: 100%;
            padding-bottom: 50px;
        }
    }
}
</style>
