<template>
<div class="" style="height:800px; background-color:red;">
<ul>

  <p v-if="$store.state.dishes.data.response" v-for="dish in $store.state.dishes.data.response">{{dish}}</p>
</ul>

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
      },
    },
}
</script>
