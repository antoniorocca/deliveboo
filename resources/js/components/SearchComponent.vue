<template>
    <div>
        <input id="header_logo" type="text" placeholder="Cerca" v-model="search"  @keyup.enter="toggleLandingMain">
    </div>
</template>

<script>
export default {
    data(){
        return {
            search: '',
        }
    },
    methods:{
        typeSearch(){
            if (this.search == ''){
                this.$store.commit('searchBar', this.search);
            }else{
                this.$store.commit('searchBar',
                    this.$store.state.restaurants.filter((restaurant) =>{
                        return restaurant.name.toLowerCase().match(this.search.toLowerCase())
                    })
                )
                console.log(this.$store.state.filteredRestaurant)
            }
            this.search ='';
        },
        toggleLanding(){
          this.$store.commit('toggleLanding')
        },
        toggleMain(){
          this.$store.commit('toggleMain')
        },
        toggleLandingMain(){
          this.toggleLanding();
          this.toggleMain();
        },
    },
}
</script>

<style>

</style>
