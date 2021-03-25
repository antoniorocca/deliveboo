<template>
  <div  id="category_box" v-if="this.$store.state.categories.data != undefined">
      <button v-for="category in this.$store.state.categories.data.response">{{category.name}}</button>
  </div>
</template>

<script>
export default {

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
