<template>
    <div class="restaurant_container">

        <!-- <h2 v-for="category in this.$store.state.selectedCategories">{{category}}</h2> -->
        <div class="restaurants">
            <div class="card card_hover " v-for="restaurant in this.$store.state.selectedCategories">
                <div class="restaurant_image">
                    <img :src="restaurant.img" alt="restaurant's image">
                </div>
                <h4>
                    {{restaurant.name}}
                </h4>
            </div>
        </div>
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
