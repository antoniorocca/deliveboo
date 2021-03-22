<template>
    <div class="category_container">
        <h3>Category Component</h3>
        <p @click="selectCategory('all')">All</p>

        <p v-for="category in categories" @click="selectCategory(category.restaurants)">{{category.name}}</p>
        
    </div>

</template>

<script>
export default {
    data() {
        return {
            categories: '',
            selectedCategories:'',
        };
    },
    methods:{
        selectCategory(name){
            if (name == 'all') {
                this.$store.commit('setRestaurants', name)

                //this.selectedCategories = this.$store.getters.getSelectedCategories;
            } else {
                this.$store.commit('setSelectedCategoties', name)
                console.log(name);
                //this.selectedCategories = this.$store.getters.getSelectedCategories;
            }
        },
    },
    computed: {


    },
    mounted(){
        this.categories = this.$store.getters.getCategories.data.response;
        console.log(this.categories);
    }
}

</script>
<style>
</style>
