<template>
  <div class="category_container">
    <h3>Category Component</h3>
    <p v-for="category in categories" v-on:click="">{{category.name}}</p>
  </div>

</template>

<script>
export default {
    data() {
        return {
            categories: '',
        };
    },
    methods:{

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
