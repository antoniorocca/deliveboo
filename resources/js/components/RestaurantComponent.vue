<template>
<div id="restaurant_box" v-if="this.$store.state.visibility">
    <!-- <div class="header">
        <div id="main-header" class="d-flex justify-content-center flex-wrap">
            <div id="categories" class="d-flex justify-content-center flex-wrap">
                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" v-for="category in categories.slice(0, 8)" :class="(letSelected == category.id) ? 'focusr' : ''">
                    <img :src="{{category.img}}" alt="">
                    <span>{{category.name}}</span>
                    <input type="submit" :value="category.id" @click="selectRestaurantOnClick" :class="(letSelected == category.id) ? 'focusr' : ''">
                    <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div> -->
        <!-- <div>
            <h4>Categorie:</h4>
            <select name="category_id" class="form-control" id="category_id" @change="selectRestaurant">
                <option value="all">All</option>
                <option id="selection" :selected="letSelected == category.id" v-for="category in categories" :value="category.id">{{category.name}} ({{category.restaurants.length}})</option>
            </select>
        </div> -->

        <div id="content" class="">

            <div class=" first_title">
                <h2>Ristoranti consigliati</h2>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, voluptatibus?
                </p>
            </div>




            <div class="">
              <div class="restaurants">
                <div class="card card_hover" v-for="restaurant in this.$store.state.filteredRestaurant" @click="showSelectedRestaurant(restaurant)">
                  <div class="restaurant_image">
                    <img :src="restaurant.img" alt="restaurant's image">
                  </div>
                  <h4>
                    {{restaurant.name}}
                  </h4>
                  <input class="option_restaurant" :value="restaurant.id" @click="toggle">
                </div>
              </div>
            </div>





            <!-- <div class="restaurants">
                <div class="card card_hover" v-for="restaurant in this.$store.state.searchBar" @click="toggle" v-if="lol">
                    <div class="restaurant_image">
                        <img :src="restaurant.img" alt="restaurant's image">
                    </div>
                    <h4>
                        {{restaurant.name}}
                    </h4>
                    <input class="option_restaurant" :value="restaurant.id" @click="showRestaurant">
                </div>
            </div> -->
        </div>
    <!-- </div> -->
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
#restaurant_box{
  width:80%;
  border: 5px solid black;
}
    .focusr{
        outline: 0;
    }
    input:focus{
        outline: 0;
    }
    #content{
        height: 100%;
        width: 80%;
        margin: auto;
        .first_title{
                text-align: center;
            h2{
                color: black;
                padding-top: 100px;
                font-weight: 800;
            }
            p{
                color: grey;
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
                z-index: 10;
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
