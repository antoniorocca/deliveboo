<template>
<div class="" style="height:200px; background-color:red;">

{{categories}}
</div>



</template>

<script>
export default {
    data() {
        return {
          categories:'ciao',
        };
    },
    methods: {
        addToCart(item) {
            this.$store.commit('addToCart', item);
        }
    },
    mounted(){
      setTimeout(function(){
        this.categories = $store.getters.getCategories;
        console.log('this.categories');

      }, 3000);
    }
}
</script>
