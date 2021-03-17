<template>
    <div class="flex-wrap">
        <div class="card" v-for="restaurant in ristoranti">
            <h3>
                {{restaurant.name}}
            </h3>
            <div class="card-body">
                {{restaurant.description}}
            </div>
            <div class="card-body">
                {{restaurant.phone_number}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                ristoranti:'',
            }
        },
        mounted() {
            Promise.all([
                axios.get('api/restaurants')
            ]).then(resp => {
                console.log(resp[0].data.response);
                this.ristoranti = resp[0].data.response;
                return (RestaurantComponent, { props: { ristoranti: this.ristoranti } });
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>

<style>

</style>