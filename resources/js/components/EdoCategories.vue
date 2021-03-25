<template>
  <div  id="category_box" v-if="this.$store.state.visibility">
    <button @click="selectAllRestaurants">All</button>
    <button @click="filterRestaurant(category.name)" v-for="category in this.$store.state.categories">{{category.name}}</button>
  </div>
</template>

<script>
export default {
  methods:{
    addSelectedCategories(category){
      this.$store.commit('setSelectedCategoties', category);
    },
    filterRestaurant(category){

      this.$store.commit('filterRestaurant',category);
    },
    selectAllRestaurants(){
      this.$store.commit('selectAllRestaurants');
    },
  },

}

</script>
<style  scoped lang="scss">

#category_box {
  width:20%;
  display:flex;
  flex-direction:column;
  border: 5px solid black;
  button{

  }
}
</style>
