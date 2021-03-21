<template>
    <div id="main-header" class="d-flex justify-content-center flex-wrap">
        <div id="categories" class="d-flex justify-content-center flex-wrap">
            <div class="category category_hover mr-4 mt-5 d-flex justify-content-center" v-for="category in categories.slice(0, 8)">
                <!-- <img :src="{{category.img}}" alt=""> -->
                <span>{{category.name}}</span>   
            </div>           
        </div>   
    </div>
</template>


<script>
    export default {
        data(){
            return {
                categories:'',
            }
        },
        mounted() {
            Promise.all([
                axios.get('api/categories')
            ]).then(resp => {
                console.log(resp[0].data.response);
                this.categories = resp[0].data.response;
                // return (CategoryComponent, { props: { categories: this.categories } });
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>


<style scoped lang="scss">
    
</style>
