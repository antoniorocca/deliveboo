<template>
  <div class="" v-if="this.$store.state.categories.data != undefined">

    <p v-for="category in this.$store.state.categories.data.response">{{category.name}}</p>
  </div>
</template>

<script>
export default {

}

</script>
<style>
</style>
