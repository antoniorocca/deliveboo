<template>
    <div class="selected_restaurant_container">
        <div id="info_restaurant">
            <img id="restaurant_jumbotron" :src="this.$store.state.selectedRestaurant.img" alt="">
            <h2>{{ this.$store.state.selectedRestaurant.name }}</h2>
            <p>{{ this.$store.state.selectedRestaurant.description }}</p>
        </div>

        <div id="main_restaurant">
            <div class=" first_title">
                <h2>Ristorante selezionato</h2>
            </div>

            <div id="selected_restaurant_dishes" class="d-flex flex-wrap justify-content-center" >
                <div class="dish_card" v-for="dish in this.$store.state.selectedRestaurant.dishes">
                    <img class="dish_img" :src="dish.img" alt="">
                    <h4>nome {{ dish.name }}</h4>
                    <dd>prezzo {{ dish.price }}</dd>
                    <button class="button is-success" @click="addToCart(dish)">Add to Cart</button>
                    <dd> rating {{ dish.rating }}</dd> 
                    <!-- <dd>descrizione {{ dish.description }}</dd> la descrizione si vedrà on hover-->
                    <!-- <dd>sconto {{ dish.discount }}</dd> -->
                    <!-- <dd> classe menu {{ dish.menu_class }}</dd> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedRestaurant:'',
        };
    },
    methods:{
        addToCart(item) {
            this.$store.commit('addToCart', item);
        }     


    },
    computed: {


    },
    mounted(){
    //   this.selectedRestaurant = this.$store.state.restaurant;



    }
}

</script>

<style scoped lang="scss">
.selected_restaurant_container{
    height: 100%;
    width: 75%;
    padding-left: 20px;
    padding-right: 20px;
    background-color: lightgray;
    #info_restaurant {
        h2 {
            color: red;
        }
        img {
            width: 720px;
            height: 440px;
        }
    }
    #main_restaurant {
        position: relative;
        #restaurant_jumbotron{
                width: 100%;
            }
            #selected_restaurant_dishes{
                height: 100%;
                width: 100%;
                border: 1px solid black;

                .dish_card {
                    margin: 30px;
                    width: 360px;
                    z-index: 10;
                    border-radius: 10px;
                    box-shadow: 0 0 10px #DDDDDD;
                    border: 1px solid black;
                }
                .dish_img{
                    width: 160px;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                    object-fit: cover;

                }
            }
        #carrello_debug {
            border: 1px solid black;
            height: 400px;
            width: 300px;
            position: fixed;
            bottom: 30px;
            right: 20px;
            background-color: green;
        }
    }
}
</style>
