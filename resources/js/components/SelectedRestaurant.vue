<template>
    <div class="selected_restaurant_container">

        <div class="">
            <div class=" first_title">
                <h2>Ristorante selezionato</h2>
            </div>

            <div>
                <h2>{{ this.$store.state.selectedRestaurant.name }}</h2>
                <p>{{ this.$store.state.selectedRestaurant.description }}</p>
                <p>{{ this.$store.state.selectedRestaurant.phone_number }}</p>
                <img id="restaurant_jumbotron" :src="this.$store.state.selectedRestaurant.img" alt="">
            </div>
            <div class="selected_restaurant_dishes" v-for="dish in this.$store.state.selectedRestaurant.dishes">
                <img class="dish_img" :src="dish.img" alt="">
                <h4>nome {{ dish.name }}</h4>
                <dd>prezzo {{ dish.price }}</dd>
                <dd> rating {{ dish.rating }}</dd>
                <dd>descrizione {{ dish.description }}</dd>
                <dd>sconto {{ dish.discount }}</dd>
                <dd> classe menu {{ dish.menu_class }}</dd>
                <dd>rating {{ dish.rating }}</dd>
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
    width: 80%;
    margin: auto;
    #restaurant_jumbotron{
        width: 500px;
    }
    .selected_restaurant_dishes{
        margin: 30px;
        width: 360px;
        z-index: 10;
        border-radius: 10px;
        box-shadow: 0 0 10px #DDDDDD;
        .dish_img{
            width: 360px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;

        }
    }
}
</style>
