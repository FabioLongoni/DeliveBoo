<template>
    <section class="flex flex-column items-center container py-4" v-if="restaurantsArray">
        <h2 class="text-6xl text-center mb-10 font-bold">
            Ristoranti trovati:
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full gap-6">
            <RestaurantCard :data="restaurant" v-for="(restaurant, i) in restaurantsArray" :key="i" 
            class="w-full"/>
        </div>

    </section>
</template>
<script>
import RestaurantCard from '../components/RestaurantCard.vue';
import TheLoading from './TheLoading.vue';

export default {
    name: 'AdvancedSearch',
    props: ['par'],
    components: {
    RestaurantCard,
    TheLoading
},
    data() {
        return {
            restaurantsArray: new Array,
        }
    },
    methods: {
        fetchRestaurants() {
            axios.get(`/api/restaurants/categories/${this.par}`).then(res => {
                this.restaurantsArray = res.data.finalRestaurants;
                console.log(res);
            }).catch(err => {
                console.log(err);
                this.$router.push({ name: '404' });
            })
        },
    },
    mounted() {
        this.fetchRestaurants()
    },
    watch: {
        par: {
            immediate: true,
            handler() {
                this.fetchRestaurants();
            }
        }
    }
}
</script>