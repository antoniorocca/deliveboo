<template>
  <div class="category_container">
    <h3>Category Component</h3>
    <p v-for="category in categories" @click="selectCategory(category.name)">{{category.name}}</p>
  </div>

</template>

<script>
export default {
    data() {
        return {
            categories: '',
            selectedCategories:'',
        };
    },
    methods:{
      selectCategory(name){
        this.$store.commit('setSelectedCategoties', name)
        console.log(name);
        this.selectedCategories = this.$store.getters.getSelectedCategories;
      },
    },
    computed: {


    },
    mounted(){
      this.categories = this.$store.getters.getCategories.data.response;
      console.log(this.categories);
    }
}

</script>
<style>
</style>
