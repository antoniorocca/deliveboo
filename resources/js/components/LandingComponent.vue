<template>

	<div>
		<!-- CAROSELLO -->
		<div class="carousel">
			<carousel-component></carousel-component>
		</div>

		<!-- RISTORANTI POPOLARI -->
		<div class="most_popular" >
			<div class="title">
				<img src="img/food-love.png" alt="">
				<h2>I ristoranti più popolari</h2>
				<p>
				I ristoranti più visti e più votati della tua zona
				</p>
			</div>

			<div class="cards">
				<div class="card card_hover" v-for="restaurant in this.$store.state.restaurants.slice(2, 6)" @click="showCarouselRestaurant(restaurant)">
					<div class="restaurant_image">
						<img :src="'/storage/' + restaurant.img" alt="restaurant's image">
					</div>
					<h4>
						{{restaurant.name}}
					</h4>
					<input class="option_restaurant" :value="restaurant.id" @click="toggle">
                </div>
			</div>
		</div>

		<!-- SECTION CALL TO ACTION -->
		<div class="call_to_action" >
			<div class="title">
				<img src="img/handshake.png" alt="">
				<h2>Diventa uno di noi!</h2>
			</div>
			<div class="container_calls">
				<div class="single_call">
					<img src="img/photo_rider.png" alt="" srcset="">
					<h4>Diventa un rider</h4>
					<p>Lavora per te stesso! Goditi flessibilità, <br> libertà e guadagni competitivi <br> effettuando consegne con Deliveboo.</p>
					<a href="#" class="button">Unisciti a noi</a>
				</div>
				<div class="single_call">
					<img src="img/photo_cooking.png" alt="">
					<h4>Diventa un partner</h4>
					<p>Cresci con Deliveboo! La nostra tecnologia <br> e la nostra base di utenti possono <br> aiutarti a incrementare le vendite e aprire nuove opportunità!</p>
					<a href="#" class="button">Unisciti a noi</a>
				</div>
				<div class="single_call">
					<img src="img/photo_workwithus.png" alt="">
					<h4>Lavora con noi</h4>
					<p>Pronto per una nuova ed entusiasmante sfida?<br> Se sei ambizioso, umile e ami lavorare<br> con gli altri, mettiti in contatto con noi!</p>
					<a href="#" class="button">Unisciti a noi</a>
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
                restaurantsAll: ''
            }
        },
        methods:{
			showSelectedRestaurant(restaurant){
              this.$store.commit('selectRestaurant', restaurant)
              console.log('filter');
              // toggle between views
              this.toggleSelectRestaurant();
              this.togglerestaurant();
            },
            toggle(){
                if (this.$store.state.visibility == false) {
                    this.$store.commit('visibilityFunction')
                    console.log('false');
                } else {
                    this.$store.commit('visibilityFunction')
                    console.log('true');
                }
            },
            showRestaurant(value){
                console.log(value.target.value);
                this.restaurantMom = this.restaurantsAll[value.target.value - 1];
                console.log(this.restaurantMom.id);
                this.$store.commit('setSelectedRestaurant', this.restaurantMom);
            },
						showCarouselRestaurant(restaurant){
							console.log('carousel');
							this.$store.commit('showCarouselRestaurant',restaurant);
						},

        },
        mounted() {
            Promise.all([
                axios.get('api/restaurants'),
            ]).then(resp => {
                this.restaurantsAll = resp[0].data.response;
                this.restaurants = resp[0].data.response;
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>
