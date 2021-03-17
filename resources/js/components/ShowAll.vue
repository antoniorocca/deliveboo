<template>
  <div class="container">
    <div class="row justify-content-center">
      <h2 class="esempio">Ristoranti</h2>
        <div class="col-md-10 d-flex flex-wrap">
            <div class="card col-md-4" v-for="restaurant in restaurants">
                <div class="card-header">
                  <h3>
                    {{restaurant.name}}
                  </h3>
                </div>

                <div class="card-body">
                    {{restaurant.description}}
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center">
      <h2>Categorie</h2>
        <div class="col-md-10 d-flex flex-wrap">
            <div class="card col-md-4" v-for="category in categories">
                <div class="card-header">
                  <h3>
                    {{category.name}}
                  </h3>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
      <h2>Piatti</h2>
      <div class="col-md-10 d-flex flex-wrap">
          <div class="card col-md-4" v-for="dish in dishes">
            <div class="card-header">
              <h3>
                {{dish.name}}
              </h3>
            </div>

            <div class="card-body">
              <img :src="dish.img" alt="" class="w-100">
            </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        restaurants:'',
        dishes:'',
        categories:''
      }
    },
    mounted() {
      Promise.all([
        axios.get('api/restaurants'),
        axios.get('api/dishes'),
        axios.get('api/categories'),
      ]).then(resp => {
        // console.log(resp[0].data.response);
        // console.log(resp[1].data.response);
        // console.log(resp[2].data.response);

        this.restaurants = resp[0].data.response;
        this.dishes = resp[1].data.response;
        this.categories = resp[2].data.response;
        return (ShowAll, { props: { restaurants: this.restaurants } });
      }).catch(error => {
        console.log(error);
      })

    }
  }
</script>

// esempio di scss in template
<style scoped lang="scss">
  .justify-content-center{
    .esempio{
      color: green !important;
    }
  }
</style>