<template>
  <div class="restaurant_container">

    <h2 v-for="category in this.$store.state.selectedCategories">{{category}}</h2>
  </div>
</template>

<script>
export default {
    data() {
        return {
            selectedCategories:'',
        };
    },
    methods:{

    },
    computed: {


    },
    mounted(){
      this.selectedCategories = this.$store.getters.getSelectedCategories;


    }
}

</script>
<style>
</style>
