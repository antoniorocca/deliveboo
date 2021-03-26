<template>
<div  v-if="this.$store.state.visibility">
    <div class="header">
        <div id="main-header" class="d-flex justify-content-center flex-wrap">
            <div id="categories" class="d-flex justify-content-center flex-wrap">
                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" v-for="category in categories.slice(0, 8)" :class="(letSelected == category.id) ? 'focusr' : ''">
                    <!-- <img :src="{{category.img}}" alt=""> -->
                    <span>{{category.name}}</span>
                    <input type="submit" :value="category.id" @click="selectRestaurantOnClick" :class="(letSelected == category.id) ? 'focusr' : ''">
                    <!-- <option v-for="category in categories" :value="category.id">{{category.name}}</option> -->
                </div>
            </div>   
        </div>
    </div>
    <div>
        <h4>Categorie:</h4>
        <select name="category_id" class="form-control" id="category_id" @change="selectRestaurant">
            <option value="all">All</option>
            <option id="selection" :selected="letSelected == category.id" v-for="category in categories" :value="category.id">{{category.name}} ({{category.restaurants.length}})</option>
        </select>
    </div>
    
    <div id="content" class="container">
        <div class=" first_title">
            <h2>I ristoranti consigliati</h2>
            <p>
            Scopri i negozi più richiesti e ricevi alla tua porta ogni tuo desiderio
            </p>
        </div>

        <hooper id="hooper" :settings="hooperSettings" >
            <slide id="slide" v-for="restaurant in restaurants.slice(0, 9)" v-bind:key="restaurants.id" >
                <div class="card card_hover" @click="toggle">
                    <img :src="restaurant.img" alt="restaurant's image">
                    <h4> {{restaurant.name}} </h4>
                    <!-- <input class="option_restaurant" :value="restaurant.id" @click="showRestaurant"> -->
                </div>
            </slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <!-- <hooper-pagination slot="hooper-addons"></hooper-pagination>
            <hooper-progress slot="hooper-addons"></hooper-progress> -->
        </hooper>

    </div>
</div>
</template>

<script>
    // import { Carousel, Slide } from 'vue-carousel';
    import { 
        Hooper,
        Slide,
        // Progress as HooperProgress,
        // Pagination as HooperPagination,
        Navigation as HooperNavigation,
    } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        // components: {
        //     Carousel,
        //     Slide
        // },
        components: {
            Hooper,
            Slide,
            // HooperProgress,
            // HooperPagination,
            HooperNavigation
        },
        data(){
            return {
                restaurants:'',
                restaurantMom:'',
                categories:'',
                restaurantsAll: '',
                letSelected: '',
                hooperSettings: {
                    itemsToShow: 3,
                    itemsToSlide:3,
                    centerMode: false,
                    infiniteScroll: false,
                    mouseDrag: false,
                    transition: 500,
                    keysControl: true,
                }
            }
        },
        methods:{
            selectRestaurant(value){
                if (value.target.value !== 'all') {
                    let restSelect = this.categories[value.target.value - 1];
                    this.restaurants = restSelect.restaurants;
                    this.letSelected = value.target.value;
                    // console.log('if case');
                    // console.log( this.restaurants);
                    // console.log('restaurant all');
                    // console.log( this.restaurantsAll);
                } else {
                    this.restaurants = this.restaurantsAll;
                    this.letSelected = "all";
                    // console.log('else case');
                    // console.log(this.restaurants);
                }
            },
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
                    console.log('false');
                } else {
                    this.$store.commit('visibilityFunction')
                    console.log('true');
                }
            }
        },
        mounted() {
            Promise.all([
                axios.get('api/restaurants'),
                axios.get('api/categories'),
            ]).then(resp => {
                // console.log(resp[0].data.response);
                // console.log(resp[1].data.response);
                this.restaurantsAll = resp[0].data.response;
                this.restaurants = resp[0].data.response;
                this.categories = resp[1].data.response;
                // return (RestaurantComponent, { props: { restaurants: this.restaurants } });
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>

<style scoped lang="scss">
    .focusr{
        outline: 0;
    }
    input:focus{
        outline: 0;
    }
    #content{
        // height: 100%;
        width: 80%;
        margin: auto;
        .first_title{
                text-align: center;
            h2{
                color: black;
                padding-top: 100px;
                font-weight: 800;
                font-size: 30px;
            }
            p{
                color: grey;
                font-size: 20px;
                font-weight: 100;
            }
        }
        #hooper{
            // border: 1px solid grey;
            border-radius: 10px;
            margin: 50px;
            height: 100%;
            width: 100%;
            &:focus{
                    outline: none;
                }
            #slide{
                border-radius: 10px;
                img{
                    height: 250px;
                    object-fit: cover;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;

                }
                .card{
                    margin: 15px;
                    border-radius: 10px;
                    cursor: pointer;
                    h4{
                        padding: 10px;
                        margin: 0;
                    }
                    
                }
                .card_hover{
                transition: all 0.35s;
                }
                .card:hover{
                    cursor: pointer;
                    transform: scale(1.05);

                }
            }
            // .option_restaurant{
            //     position: absolute;
            //     width: 100%;
            //     height: 100%;
            //     color: transparent;
            //     background-color: transparent;
            //     border-color: transparent;
            //     cursor: pointer;
            // }
        }
       
    }
    
</style>
