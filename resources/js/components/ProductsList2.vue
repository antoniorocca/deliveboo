<template>
<div class="" style=" background-color:red;">
<p v-if="$store.state.dishes.data != undefined">
  <ul>
    <li v-for="item in $store.state.dishes.data.response">
      {{item.name}}
      {{item.price}}
      <button class="button is-success"
          @click="addToCart(item)">Add to Cart
      </button>


    </li>
  </ul>
</p>
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
