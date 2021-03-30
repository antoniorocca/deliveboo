<template>
<div>
    <div id="selected_restaurant_dishes" class="d-flex flex-wrap justify-content-center">
        <div class="torna_ristoranti">
            <span id="back" @click="toggle"> <img src="img/back.png"> </span>
        </div>
        <div class="dish_card" v-for="dish in this.$store.state.selectedRestaurant2.dishes">
            <div>
                <img :src="'/storage/' + dish.img" alt="">
                <h4>{{ dish.name }}</h4>
                <span class="prezzo"> &euro; {{ dish.price.toFixed(2) }}</span><br>
                <span class="rating">
                    <i v-for="star in dish.rating" class="fas fa-star"></i>
                    <i v-for="starsEmpty in 5 - dish.rating" class="far fa-star"></i>
                </span>
                <div class="info">
                    <dd class="show_plate_info_logo" @click="ShowInfo(dish)"><i class="fas fa-info-circle"></i></dd>
                </div>
            </div>

            <button class="d-flex justify-content-center align-items-center button is-success" @click="addToCart(dish)"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    <transition name="cart">

      <div id="dish_info_pop_up" v-if="showInfo">
        <img :src="'/storage/' + this.plate.img" alt="">
        <h4>{{ this.plate.name }}</h4>
        <p>{{ this.plate.description }}</p>
        <p>prezzo: &euro; {{ this.plate.price }}</p>


        <div class="close">
            <dd class="show_plate_info_logo" @click="ShowInfo()"><i class="fas fa-times-circle"></i></dd>
        </div>

    </div>
    </transition>

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
        toggle(){
          this.toggleSelectRestaurant();
          this.togglerestaurant();

        },
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
        addToCart(item) {
            this.$store.commit('addToCart', item);
        },
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
#selected_restaurant_dishes{
    height: 100%;
    width: 100%;
    .dish_card {
        margin: 30px;
        min-height: 230px;
        width: 360px;
        padding-bottom: 15px;
        z-index: 9;
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
            padding: 15px 10px 0;

            
        }
        .prezzo {
            font-size: 16px;
            font-weight: 500;
            padding: 15px 10px 0;

        }
        .rating {
            padding: 15px 10px 0;
            i{
                color: #ffc244;
            }
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
        .info{
            i{
                position: absolute;
                top: 5px;
                left: 5px;
                font-size: 28px;
                color: #ffc244;
                background-color: white;
                border-radius: 50%;
                cursor: pointer;
                display: flex;
                place-content: center;
                place-items: center;
            }
        }
    }
}
#dish_info_pop_up{
    position: fixed;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    box-shadow: 0 0 20px black;
    outline: 0;
    min-height: 500px;
    width: 700px;
    padding-bottom: 15px;
    z-index: 10;
    border-radius: 10px;
    border-color: transparent;
    text-align: center;

    .close{
        i{
            position: absolute;
            top: 5px;
            left: 5px;
            font-size: 28px;
            color: #ffc244;
            background-color: white;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            place-content: center;
            place-items: center;

        }
    }
    img {
        height: 345px;
        width: 700px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover;
    }
    h4 {
        font-size: 28px;
        margin-top: 15px;
        font-weight: 700;
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
.torna_ristoranti{
    position: fixed;
    top: 50%;
    left: 30px;
    // width: 150px;
    // height: 100px;
    // position: sticky;
    // top: 130px;
    // left: 20px;
    // width: 100%;
    z-index: 15;
    transition: all 0.35s;

    img{
        height: 60px;

    }
    #back{
        color: black;
        padding: 10px 15px;
        border-radius: 10px;
        border: 1px solid transparent;
        font-size: 18px;
        font-weight: 600;

        &:hover img{
            cursor: pointer;
            transform: scale(1.05);
            border-radius: 50%;
            border: 2.5px solid #008169;


        }
    }


}
@media all and (max-width: 1024px) {
    #dish_info_pop_up {
        width: 600px;
        min-height: 325px;
        img {
            width: 600px;
            height: 190px;
        }
    }
}
@media all and (max-width: 720px) {
    #dish_info_pop_up {
        width: 460px;
        min-height: 300px;
        img {
            width: 460px;
            height: 160px;
        }
    }
}
@media all and (max-width: 450px) {
    #selected_restaurant_dishes{
        .torna_ristoranti{
            top: 20%;
        }
    }
}
@media all and (max-width: 410px) {
    #selected_restaurant_dishes{
        .dish_card{
            width: 290px;
            img{
                width: 290px;
            }
        }
    }
}
</style>
