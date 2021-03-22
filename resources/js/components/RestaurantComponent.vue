<template>
<div>
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
    
    <div id="content" class="">
        <div class=" first_title">
            <h2>Ristoranti consigliati</h2>
            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, voluptatibus?
            </p>
        </div>
        <div class="restaurants" v-for="restaurant in restaurants" @click="showRestaurant">
            <div class="card card_hover"  >
                <option id="option_restaurant" class="restaurant_image" :value="restaurant.id">
                    <div>
                        <img :src="restaurant.img" alt="restaurant's image">
                    </div>
                    <h4>
                        {{restaurant.name}}
                    </h4>
                </option>
            </div>
        </div>
    </div>
</div>
</template>


<script>
    export default {
        data(){
            return {
                restaurants:'',
                restaurantMom:'',
                categories:'',
                restaurantsAll: '',
                letSelected: '',
            }
        },
        methods:{
            selectRestaurant(value){
                // console.log(value.target.value);
                if (value.target.value !== 'all') {
                    let restSelect = this.categories[value.target.value - 1];
                    console.log(restSelect);
                    this.restaurants = restSelect.restaurants;
                    this.letSelected = value.target.value;

                } else {
                    this.restaurants = this.restaurantsAll;

                    this.letSelected = "all";
                }
            },
            showRestaurant(value){
                // console.log(value.target.value);
                // console.log(this.$store);
                // console.log(this.$store.state.selectedRestaurant);
                this.restaurantMom = this.restaurants[value.target.value - 1];
                console.log(this.restaurantMom.id);
                // this.restaurantMom = resp[3].data.response;


                // if (name == 'all') {
                //     this.$store.commit('setRestaurants', name)

                //     //this.selectedCategories = this.$store.getters.getSelectedCategories;
                // } else {
                //     this.$store.commit('setSelectedCategoties', name)
                //     console.log(name);
                //     //this.selectedCategories = this.$store.getters.getSelectedCategories;
                // }

                this.$store.commit('setSelectedRestaurant', this.restaurantMom);

        },
            // deve ancora cambiare i valori dentro category_id
            selectRestaurantOnClick(value){
                console.log(value.target.value);
                let v = this.categories[value.target.value - 1];
                console.log(v);
                this.restaurants = v.restaurants;

                this.letSelected = value.target.value;
            }  
        },
        mounted() {
            Promise.all([
                axios.get('api/restaurants'),
                axios.get('api/categories'),
                // axios.get('api/category_restaurant'),
            ]).then(resp => {
                console.log(resp[0].data.response);
                console.log(resp[1].data.response);
                // console.log(resp[3].data.response);
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
        //outline: -webkit-focus-ring-color auto 1px;
        outline: 0;
    }
    input:focus{
        outline: 0;
    }
    #content{
        height: 100%;
        width: 80%;
        margin: auto !important;
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
                margin: 30px !important;
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
        }
    }
</style>
