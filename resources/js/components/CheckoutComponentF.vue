<template>
  <div id="checkout_box">
    <div class="checkout_row">
      <h1>Pagamento non riuscito</h1>
      <a href="/">
        <button  name="button">Torna all Home</button>
      </a>
    </div>
    <img src="/img/checkoutf.png" alt="">
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

<style  scoped lang="scss">
#checkout_box {
  background-color: red;
  .checkout_row{
    position:absolute;
    top:20%;
    left:50%;
    transform:translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index:3;
    text-align:center;
    h1{
      text-transform:uppercase;
      font-size:45px;
      font-family: 'Raleway', sans-serif;
    }
    a{
      button{
        padding:20px 30px;
        background-color:#00a082;
        border: 0;
        border-radius:25px;
        color: white;
        font-size:25px;
        font-weight:bold;
      }
    }
  }
  img {
    width: 100%;
    position:absolute;
    bottom:0;
  }
}

</style>
