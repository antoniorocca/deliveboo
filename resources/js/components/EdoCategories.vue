<template>
  <div  v-if="this.$store.state.categories.data != undefined">
    <div id="edo" class="">
      <button v-for="category in this.$store.state.categories.data.response">{{category.name}}</button>

    </div>
  </div>
</template>

<script>
export default {

}

</script>
<style  scoped lang="scss">

#edo {
  width:20%;
  display:flex;
  flex-direction:column;
  border: 5px solid black;
  button{

  }
}
</style>
