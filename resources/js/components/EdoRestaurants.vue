<template>
    <div class="restaurant_container">

        <div id="content" class="">
            <div class=" first_title">
                <h2>Ristoranti consigliati</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

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

<style scoped lang="scss">
   .focusr{
        //outline: -webkit-focus-ring-color auto 1px;
        outline: 0;
    }
    input:focus{
        outline: 0;
    }
    #content{
        width: 80%;
        margin: auto !important;
        .first_title{
                text-align: center;
            h2{
                color: black;
                margin-top: 40px;
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
                margin: 10px !important;
                width: 300px;
                z-index: 9;
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
