<template>
<!-- v-if="this.$store.state.visibility" -->
<div  >

    <div id="content" class="container">

        <!-- titolo section -->
        <div class=" first_title">
            <h2>I ristoranti consigliati</h2>
            <p>
            Scopri i ristoranti più richiesti e ricevi alla tua porta ogni tuo desiderio
            </p>
        </div>

        <!-- carousel -->
        <hooper id="hooper" :settings="hooperSettings">
            <slide id="slide" v-for="restaurant in restaurants.slice(2, 12)" v-bind:key="restaurant.id" >
                <div class="card card_hover" @click="showCarouselRestaurant(restaurant)">
                    <img :src="'/storage/' + restaurant.img" alt="restaurant's image">
                    <h4> {{restaurant.name}} </h4>
                </div>
            </slide>
            <hooper-navigation slot="hooper-addons" ></hooper-navigation>
        </hooper>

    </div>
</div>
</template>

<script>
    import {
        Hooper,
        Slide,
        Navigation as HooperNavigation,
    } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        components: {
            Hooper,
            Slide,
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
                    itemsToShow: 4,
                    itemsToSlide:2,
                    centerMode: false,
                    infiniteScroll: false,
                    mouseDrag: false,
                    transition: 500,
                    keysControl: true,
                    trimWhiteSpace: true,
                    breakpoints: {
                        300: {
                        // smartphone
                        itemsToShow: 1,
                        touchDrag: true,
                        trimWhiteSpace: true
                        },
                        920: {
                        // tablet
                        itemsToShow: 2,
                        touchDrag: true,
                        trimWhiteSpace: true
                        },
                        992: {
                        // laptop
                        itemsToShow: 2,
                        touchDrag: true,
                        trimWhiteSpace: true
                        },
                        1024: {
                        // desktop
                        itemsToShow: 4,
                        trimWhiteSpace: true

                        }
                    }
                }
            }
        },
        methods:{
            toggle(){
                if (this.$store.state.visibility == false) {
                    this.$store.commit('visibilityFunction')
                    console.log('false');
                } else {
                    this.$store.commit('visibilityFunction')
                    console.log('true');
                }
            },
            showRestaurant(value){
                console.log(value.target.value);
                this.restaurantMom = this.restaurantsAll[value.target.value - 1];
                console.log(this.restaurantMom.id);
                this.$store.commit('setSelectedRestaurant', this.restaurantMom);
            },
            showCarouselRestaurant(restaurant){
              console.log('carousel');
              this.$store.commit('showCarouselRestaurant',restaurant);
            },
        },
        mounted() {
            Promise.all([
                axios.get('api/restaurants'),
            ]).then(resp => {
                this.restaurantsAll = resp[0].data.response;
                this.restaurants = resp[0].data.response;
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>

<style scoped lang="scss">
    #content{
        text-align: center;
        margin: auto ;
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
            border-radius: 10px;
            margin: 50px;
            height: 100%;
            width: 100%;
            transform: translateX(-50px);

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
                h4{
                    height: 70px;
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
                    transform: scale(1.08);

                }
                .option_restaurant{
                position: absolute;
                width: 100%;
                height: 100%;
                color: transparent;
                background-color: transparent;
                border-color: transparent;
                cursor: pointer;
            }
            }
        }

    }
</style>
