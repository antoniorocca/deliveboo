<template>
<!--  v-if="this.$store.state.visibility" -->
<div id="restaurant_box">

    <div>

        <div id="content" class="">

            <div class=" first_title">
                <h2>I risultati della tua ricerca</h2>
            </div>


            <div class="">
                <transition-group tag="div" name="cart" class="restaurants">
                  <div class="card card_hover" :key="restaurant" v-for="restaurant in this.$store.state.filteredRestaurant" @click="showSelectedRestaurant(restaurant)">
                  <div class="restaurant_image">

                    <img :src="'/storage/' + restaurant.img" alt="restaurant's image">
                  </div>
                  <h4>
                        {{restaurant.name}}
                  </h4>

                  <p v-if="restaurant.price_shipping > 0">
                        <img src="img/scooter-delivery.png" alt="">
                        &euro; {{ restaurant.price_shipping.toFixed(2) }} 
                        <img src="img/like.png" alt="">
                        {{ restaurant.quality }} %
                  </p>
                  <input class="option_restaurant" :value="restaurant.id" @click="toggle">
                </div>
              </transition-group>
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
                lol: true,
            }
        },
        methods:{
            showSelectedRestaurant(restaurant){
              this.$store.commit('selectRestaurant', restaurant)
              console.log('filter');
              // toggle between views
              this.toggleSelectRestaurant();
              this.togglerestaurant();

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
            // funzionamento navigazione
            togglerestaurant(){
              this.$store.commit('togglerestaurant')
            },
            toggleSelectRestaurant(){
              this.$store.commit('toggleSelectRestaurant')
            },
        },
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
        height: 100%;
        margin: auto;
        .first_title{
                text-align: center;
            h2{
                color: black;
                padding-top: 100px;
                font-weight: 800;
            }
        }
        .restaurants{
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            justify-content: center;
            .card{
                margin: 30px;
                width: 300px;
                z-index: 9;
                border-radius: 10px;
                box-shadow: 0 0 10px #DDDDDD;
                img{
                    height: 150px;
                    width: 100%;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                    object-fit: cover;
                }
                h4{
                    border: px solid rgba(0, 0, 0, 0.125);
                    border-radius: 0.25rem;
                    text-align: center;
                    margin-bottom: 10px;
                    font-weight: 700;
                    padding: 10px;
                    height: 50px;
                }
                p{
                    font-weight: 600;
                    font-size: 16px;
                    text-align: center;
                    img{
                        margin: 0 12px 0 15px;
                        height: 30px;
                        width: 30px;

                    }
                }
                option{
                    height: 100%;
                }
            }
            .card_hover{
                transition: all 0.35s;
            }
            .card:hover{
                cursor: pointer;
                transform: scale(1.05);
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
</style>
