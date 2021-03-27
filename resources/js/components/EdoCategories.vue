<template>
<!-- v-if="this.$store.state.visibility" -->
  <div  id="category_box" >
    <button @click="selectAllRestaurants">
    <div class="wrap_category_button">
      <span>
        <strong>
          All
        </strong>
      </span>
    </div>
    </button>
    <button @click="filterRestaurant(category.name)" v-for="category in this.$store.state.categories">
    <div class="wrap_category_button">
      <span>
        <strong>
          {{category.name}}
        </strong>
      </span>
      <span class="restaurants_badge">
        {{category.restaurants.length}}
      </span>
    </div>
    </button>
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
  box-sizing:border-box;
  width:20%;
  display:flex;
  flex-direction:column;
  button{
    line-height: 45px;
    border-radius: 7px;
    margin: 5px;
    box-shadow:  0 0 10px #acacac;
    border:0;
    padding: 0 20px;
    .wrap_category_button{
      display:flex;
      justify-content:space-between;
      align-items:center;
      .restaurants_badge {
        display:flex;
        justify-content:center;
        align-items:center;
        line-height:normal;
        height:30px;
        width:30px;
        border-radius: 50%;
        border: 2px solid #008169;
      }
    }
  }
  button:hover{
    line-height:50px;
    border: 3px solid #008169;
  }
}
</style>