<template>
    <div id="selected_restaurant_dishes" class="d-flex flex-wrap justify-content-center">
        <div class="dish_card" v-for="dish in this.$store.state.selectedRestaurant2.dishes">
            <img :src="dish.img" alt="">
            <h4>{{ dish.name }}</h4>
            <span class="prezzo">prezzo &euro; {{ dish.price.toFixed(2) }}</span><br>
            <span class="rating"> rating {{ dish.rating }}</span>
            <button class="d-flex justify-content-center align-items-center button is-success" @click="addToCart(dish)"><i class="fas fa-plus"></i></button>
            <!-- <p>descrizione {{ dish.description }}</p> -->
            <!-- <dd>sconto {{ dish.discount }}</dd> -->
            <!-- <dd> classe menu {{ dish.menu_class }}</dd> -->
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped lang="scss">
#selected_restaurant_dishes{
    height: 100%;
    width: 100%;
    .dish_card {
        margin: 30px;
        min-height: 230px;
        width: 360px;
        padding-bottom: 15px;
        z-index: 10;
        border-radius: 10px;
        box-shadow: 0 0 10px #DDDDDD;
        border-color: transparent;
        position: relative;
        img {
            height: 120px;
            width: 360px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
        }
        h4 {
            border: px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            margin-top: 15px;
            font-weight: 700;
            position: absolute;
            left: 20px;
        }
        .prezzo {
            position: absolute;
            top: 170px;
            left: 20px;
        }
        .rating {
            position: absolute;
            top: 190px;
            left: 20px;
        }
        button {
            background-color: rgb(0, 160, 130);
            border-style: none;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            position: absolute;
            bottom: 20px;
            right: 20px;
            i {
                color: white;
                font-weight: bold;
                font-size: 20px;
            }
        }
        button:hover {
        transform: scale(1.1);
        background-color: #008169;
        }
    }
}
</style>