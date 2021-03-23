<template>
    <div class="selected_restaurant_container"  v-if="!this.$store.state.visibility">
        <div id="info_restaurant">
            <img id="restaurant_jumbotron" :src="this.$store.state.selectedRestaurant.img" alt="">
            <h2>{{ this.$store.state.selectedRestaurant.name }}</h2>
            <p>{{ this.$store.state.selectedRestaurant.description }}</p>
        </div>

        <div id="main_restaurant">
            <div class=" first_title">
                <h2>Ristorante selezionato</h2>
                <button @click="toggle"> torna in dietro</button>
            </div>
        </div>
        <div id="selected_restaurant_dishes" class="d-flex flex-wrap justify-content-center">
            <div class="dish_card" v-for="dish in this.$store.state.selectedRestaurant.dishes">
                <img :src="dish.img" alt="">
                <h4>{{ dish.name }}</h4>
                <span>prezzo {{ dish.price }}</span><br>
                <span> rating {{ dish.rating }}</span> 
                <!-- <p>descrizione {{ dish.description }}</p> -->
                <!-- <dd>sconto {{ dish.discount }}</dd> -->
                <!-- <dd> classe menu {{ dish.menu_class }}</dd> -->
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
        toggle(){
            if (this.$store.state.visibility == false) {
                this.$store.commit('visibilityFunction', true)
                console.log('false');
            } else {
                this.$store.commit('visibilityFunction', false)
                console.log('true');
            }
        },
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
    #info_restaurant {
        position: relative;
        margin-bottom: 150px;
        img {
            width: 850px;
            height: 440px;

        }
        #restaurant_txt {
            position: absolute;
            top: 400px;
            left: 50px;
            height: 150px;
            width: 500px;
            background-color: white;
            border-radius: 10px;

            h2 {
            color: red;
        }
        }
    }
    #selected_restaurant_dishes{
        height: 100%;
        width: 100%;
        .dish_card {
            margin: 30px;
            height: 230px;
            width: 360px;
            z-index: 10;
            border-radius: 10px;
            box-shadow: 0 0 10px #DDDDDD;
            border-color: transparent;
            text-align: center;
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
                margin-bottom: 10px;
                font-weight: 700;
                padding: 10px;
            }
        }
    }      
}
</style>
