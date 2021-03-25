<template>
    <div>
        <input id="header_logo" type="text" placeholder="Cerca" v-model="search"  @keyup.enter="typeSearch">
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
                    this.restaurants = this.$store.state.restaurants.filter((restaurant) =>{
                        return restaurant.name.toLowerCase().match(this.search.toLowerCase()) 
                    })
                )
                console.log(this.$store.state.searchBar)
            }
            this.search ='';
        },
    },
}
</script>

<style>

</style>