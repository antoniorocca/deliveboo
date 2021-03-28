<template>
<div>
    <div id="selected_restaurant_dishes" class="d-flex flex-wrap justify-content-center">
        <div class="dish_card" v-for="dish in this.$store.state.selectedRestaurant2.dishes">
            <div>
                <img :src="dish.img" alt="">
                <h4>{{ dish.name }}</h4>
                <span class="prezzo">prezzo &euro; {{ dish.price.toFixed(2) }}</span><br>
                <span class="rating"> rating {{ dish.rating }}</span>

                <div>
                    <dd class="show_plate_info_logo">?</dd>
                    <input class="show_plate_info" type="submit" @click="ShowInfo(dish)">
                </div>
            </div>

            <button class="d-flex justify-content-center align-items-center button is-success" @click="addToCart(dish)"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div id="dish_info_pop_up" v-if="showInfo">
        <img :src="this.plate.img" alt="">
        <h4>{{ this.plate.name }}</h4>
        <p>{{ this.plate.description }}</p>
        <!-- <button class="d-flex justify-content-center align-items-center button is-success" @click="addToCart(dish)"><i class="fas fa-plus"></i></button> -->
        
        <div>
            <dd class="show_plate_info_logo">X</dd>
            <input class="show_plate_info" type="submit" @click="ShowInfo()">
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            showInfo: false,
            plate: '',
        };
    },
    methods:{
        ShowInfo(value){
            this.plate = '';
            // console.log(i);
            if (this.showInfo == false) {
                this.showInfo = true;
                this.plate = value;
                console.log(this.plate);
            } else {
                this.showInfo = false;
                this.plate = '';
                console.log('false');
            }
        },
    },
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
        .show_plate_info_logo{
            position: absolute;
            top: 5px;
            left: 5px;
            width: 25px;
            height: 25px;
            background-color: #ffc244;
            border-radius: 50%;
            display: flex;
            place-content: center;
            place-items: center;
            border: 1px solid #00a082;
        }
        .show_plate_info{
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 70%;
            color: transparent;
            background-color: transparent;
            border-color: transparent;
            cursor: pointer;
            outline: 0;
        }
    }
}
#dish_info_pop_up{
    position: fixed;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 50%;
    background-color: #ffc244;
    outline: 0;
    min-height: 500px;
    width: 700px;
    padding-bottom: 15px;
    z-index: 10;
    border-radius: 10px;
    box-shadow: 0 0 10px #DDDDDD;
    border-color: transparent;
    img {
        height: 250px;
        width: 700px;
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
    .show_plate_info_logo{
        position: absolute;
        top: 5px;
        left: 5px;
        width: 25px;
        height: 25px;
        background-color: #ffc244;
        border-radius: 50%;
        display: flex;
        place-content: center;
        place-items: center;
        border: 1px solid #00a082;
    }
    .show_plate_info{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        color: transparent;
        background-color: transparent;
        border-color: transparent;
        cursor: pointer;
        outline: 0;
    }
}
</style>