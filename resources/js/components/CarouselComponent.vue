<template>
<!-- v-if="this.$store.state.visibility" -->
<div  >
    
    <div id="content" class="container">
    
        <!-- titolo section -->
        <div class=" first_title">
            <h2>I ristoranti consigliati</h2>
            <p>
            Scopri i negozi più richiesti e ricevi alla tua porta ogni tuo desiderio
            </p>
        </div>

        <!-- carousel -->
        <hooper id="hooper" :settings="hooperSettings" >
            <slide id="slide" v-for="restaurant in restaurants.slice(0, 20)" v-bind:key="restaurant.id" >
                <div class="card card_hover" @click="toggle">
                    <img :src="restaurant.img" alt="restaurant's image">
                    <h4> {{restaurant.name}} </h4>
                <input class="option_restaurant" :value="restaurant.id" @click="showRestaurant">

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
    import { 
        Hooper,
        Slide,
        // Progress as HooperProgress,
        // Pagination as HooperPagination,
        Navigation as HooperNavigation,
    } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
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
