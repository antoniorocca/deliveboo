<template>
  <div>
    <h1>Pagamento avvenuto</h1>
    <a href="/">
      <button  name="button">Torna all Home</button>
    </a>
  </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component checkout mounted.');
            this.emptyCart();
        },
        methods:{
          emptyCart(){
            console.log('empty');
            this.$store.commit('emptyCart');
          },
        }
    }
</script>
