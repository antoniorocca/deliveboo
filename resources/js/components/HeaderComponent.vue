<template>
<!--  v-if="this.$store.state.visibility" -->
    <div class="header">
        <div id="main-header" class="d-flex justify-content-center flex-wrap">
            <div id="categories" class="d-flex justify-content-center flex-wrap">

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/pizza_trancio.png" alt="">
                    <span>{{this.$store.state.categories[20].name}}</span>
                    <!-- <input type="submit" :value="this.$store.state.categories[20].id" @click="selectRestaurantOnClick" :class="(letSelected == this.$store.state.categories[20].id) ? 'focusr' : ''">  -->
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/wrap.png" alt="">
                    <span>{{this.$store.state.categories[19].name}}</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/mexican.png" alt="">
                    <span>{{this.$store.state.categories[17].name}}</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/ramen.png" alt="">
                    <span>{{this.$store.state.categories[9].name}}</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/caffe.png" alt="">
                    <span>{{this.$store.state.categories[4].name}}</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/ice-cream.png" alt="">
                    <span>{{this.$store.state.categories[8].name}}</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/hamburger.png" alt="">
                    <span>{{this.$store.state.categories[10].name}}</span>
                </div>

                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center">
                    <img src="img/salad.png" alt="">
                    <span>{{this.$store.state.categories[13].name}}</span>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {

                restaurantMom:'',
                categories:'',
                categoriesAll:'',
                restaurantsAll: '',
                letSelected: '',
                search: '',

            }
        },
        methods:{
            showSelectedRestaurant(restaurant){
              this.$store.commit('selectRestaurant', restaurant)
              console.log('filter');
            },
            // selectRestaurant(value){
            //     if (value.target.value !== 'all') {
            //         let restSelect = this.categories[value.target.value - 1];
            //         this.restaurants = restSelect.restaurants;
            //         this.letSelected = value.target.value;
            //         // console.log('if case');
            //         // console.log( this.restaurants);
            //         // console.log('restaurant all');
            //         // console.log( this.restaurantsAll);
            //     } else {
            //         this.restaurants = this.restaurantsAll;
            //         this.letSelected = "all";
            //         // console.log('else case');
            //         // console.log(this.restaurants);
            //     }
            // },
            showRestaurant(value){
                console.log(value.target.value);
                this.restaurantMom = this.restaurantsAll[value.target.value - 1];
                console.log(this.restaurantMom.id);
                this.$store.commit('setSelectedRestaurant', this.restaurantMom);
            },
            selectRestaurantOnClick(value){
                console.log(value.target.value);
                let v = this.categories[value.target.value - 1];
                this.restaurants = v.restaurants;
                this.letSelected = value.target.value;
            },
            toggle(){
                if (this.$store.state.visibility == false) {
                    this.$store.commit('visibilityFunction')
                    // console.log('false');
                } else {
                    this.$store.commit('visibilityFunction')
                    // console.log('true');
                }
            },
            typeSearchMain(){
                console.log(this.search);
                if (this.search == ''){
                    this.restaurants = this.restaurantsAll;
                }else{
                    this.restaurants = this.restaurantsAll.filter((restaurant) =>{
                        return restaurant.name.toLowerCase().match(this.search.toLowerCase())
                    });
                }
                this.search ='';
            },
        },
    }
</script>

<style scoped lang="scss">
</style>
