<template>
<div>
    <div class="header">
        <div id="main-header" class="d-flex justify-content-center flex-wrap">
            <div id="categories" class="d-flex justify-content-center flex-wrap">
                <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" v-for="category in categories.slice(0, 8)">
                    <!-- <img :src="{{category.img}}" alt=""> -->
                    <span>{{category.name}}</span>
                    <input type="submit" :value="category.id" @click="selectRestaurantOnClick">
                    <!-- <option v-for="category in categories" :value="category.id">{{category.name}}</option> -->
                </div>
            </div>   
        </div>
    </div>
    <div>
        <h4>Categorie:</h4>
        <select name="category_id" class="form-control" id="category_id" @change="selectRestaurant">
            <option value="all">All</option>
            <option id="selection" v-for="category in categories" :value="category.id">{{category.name}}</option>
        </select>
    </div>
    
    <div id="content" class="">
        <div class=" first_title">
            <h2>Ristoranti consigliati</h2>
            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, voluptatibus?
            </p>
        </div>
        <div class="restaurants">
            <div class="card card_hover " v-for="restaurant in restaurants">
                <div class="restaurant_image">
                    <img :src="restaurant.img" alt="restaurant's image">
                </div>
                <h4>
                    {{restaurant.name}}
                </h4>
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
                categories:'',
                restaurantsAll: ''
            }
        },
        methods:{
            selectRestaurant(value){
                console.log(value.target.value);
                if (value.target.value !== 'all') {
                    let restSelect = this.categories[value.target.value - 1];
                    console.log(restSelect);
                    this.restaurants = restSelect.restaurants;
                } else {
                    this.restaurants = this.restaurantsAll;
                }
            },
            // deve ancora cambiare i valori dentro category_id
            selectRestaurantOnClick(value){
                console.log(value.target.value);
                let v = this.categories[value.target.value - 1];
                console.log(v);
                this.restaurants = v.restaurants;
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
                // console.log(resp[2].data.response);
                this.restaurants = resp[0].data.response;
                this.categories = resp[1].data.response;
                this.restaurantsAll = resp[0].data.response;

                // return (RestaurantComponent, { props: { restaurants: this.restaurants } });
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>


<style scoped lang="scss">
    #content{
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
