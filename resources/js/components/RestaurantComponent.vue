<template>
    <div class="content">
        <div class=" first_title">
            <h2>Ristoranti consigliati</h2>
            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, voluptatibus?
            </p>
        </div>
        <div class="restaurants">
            <div class="card card_hover " v-for="restaurant in restaurants">
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
        data(){
            return {
                restaurants:'',
            }
        },
        mounted() {
            Promise.all([
                axios.get('api/restaurants')
            ]).then(resp => {
                console.log(resp[0].data.response);
                this.restaurants = resp[0].data.response;
                return (RestaurantComponent, { props: { restaurants: this.restaurants } });
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>


<style scoped lang="scss">
    .content{
        .first_title{
                text-align: center;
            h2{
                color: black;
                padding-top: 100px;
                font-weight: 800;
            }
            p{
                color: grey;
            }
        }
        .restaurants{
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            justify-content: center;
            .card{
                margin: 30px;
                width: 300px;
                z-index: 10;
                border-radius: 10px;
                box-shadow: 0 0 10px #DDDDDD;
                img{
                    height: 150px;
                    width: 100%;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                    object-fit: cover;
                }
                h4{
                    border: px solid rgba(0, 0, 0, 0.125);
                    border-radius: 0.25rem;
                    text-align: center;
                    margin-bottom: 10px;
                    font-weight: 700;
                    padding: 10px;
                }
            }
            .card_hover{
                transition: all 0.35s;

            }
            .card:hover{
                cursor: pointer;
                transform: scale(1.05);

            }
        }
    }
</style>
