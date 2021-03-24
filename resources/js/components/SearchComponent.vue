<template>
    <div>
        <input id="header_logo" type="text" placeholder="Cerca" v-model="search"  @keyup.enter="typeSearch">
    </div>
</template>

<script>
export default {
    data(){
        return {
            restaurants:'',
            restaurantMom:'',
            categories:'',
            categoriesAll:'',
            restaurantsAll: '',
            letSelected: '',
            search: '',
        }
    },
    methods:{
        typeSearch(){
            if (this.search == ''){
                this.$store.commit('searchBar', this.restaurantsAll);
            }else{
                this.$store.commit('searchBar',
                    this.restaurants = this.restaurantsAll.filter((restaurant) =>{
                        return restaurant.name.toLowerCase().match(this.search.toLowerCase()) 
                    })
                )
                console.log(this.$store.state.searchBar)
            }
            this.search ='';
        },
    },
    
    mounted() {
        Promise.all([
            axios.get('api/restaurants'),
            axios.get('api/categories'),
        ]).then(resp => {
            // console.log(resp[0].data.response);
            // console.log(resp[1].data.response);
            this.restaurantsAll = resp[0].data.response;
            this.restaurants = resp[0].data.response;
            this.categoriesAll = resp[0].data.response;
            this.categories = resp[1].data.response;
            this.$store.commit('searchBar', this.restaurantsAll);
            // return (RestaurantComponent, { props: { restaurants: this.restaurants } });
        }).catch(error => {
            console.log(error);
        })
    },
}
</script>

<style>

</style>