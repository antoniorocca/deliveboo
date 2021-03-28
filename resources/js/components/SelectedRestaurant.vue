<template>

<!-- v-if="!this.$store.state.visibility" -->

    <div class="selected_restaurant_container" >
        <div id="info_restaurant">
            <img id="restaurant_jumbotron" :src="this.$store.state.selectedRestaurant2.img" alt="">
            <div id="restaurant_txt">
                <h2>{{ this.$store.state.selectedRestaurant2.name }}</h2>
                <p>{{ this.$store.state.selectedRestaurant2.description }}</p>
            </div>
        </div>

        <div id="main_restaurant">
            <div class=" first_title">
                <h2>Ristorante selezionato</h2>
                <button id="back" @click="toggle"> torna ai ristoranti</button>
            </div>
        </div>

        <plate-component></plate-component>
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
    padding-left: 20px;
    padding-right: 20px;
    border:5px solid black;
    #info_restaurant {
        height: 600px;
        width: 100%;
        position: relative;
        margin-bottom: 30px;
        overflow: hidden;
        img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 440px;
            object-fit: cover;
            border-radius: 15px;
        }
        #restaurant_txt {
            position: absolute;
            top: 480px;
            left: 50px;
            height: 120px;
            width: 500px;
            background-color: white;
            border-radius: 10px;
            h2 {
                border: px solid rgba(0, 0, 0, 0.125);
                border-radius: 0.25rem;
                margin: 10px;
                font-weight: 700;
            }
            p {
                margin-left: 10px;
            }
        }
    }
    #back{
        background-color: #ffc244;
        color: black;
        padding: 5px;
        border-radius: 10px;
        border: 1px solid transparent;
    }
}
@media all and (max-width: 1024px) {
    #restaurant_txt {
        left: 20px;
        height: 450px;
        width: 250px;
    }
}
</style>
