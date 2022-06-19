<template>
<div class="max-w-screen-xl mx-auto">
    <Header />
<div class="flex justify-between mt-16">
    <div class="w-[280px] h-auto border border-gray-200 rounded shadow p-2">
        <p class="text-lg font-bold px-2">Colors:</p>
        <div class="px-4">
            <input type="checkbox" id="black" value="black" v-model="color">
            <label class="px-2" for="subscribeNews">Balck</label>
        </div>
        <div class="px-4">
            <input type="checkbox" id="blue" value="blue" v-model="color">
            <label class="px-2" for="subscribeNews">Blue</label>
        </div>
        <div class="px-4">
            <input type="checkbox" v-model="color"  value="white">
            <label class="px-2" for="subscribeNews">White</label>
        </div>
        <p class="text-lg font-bold px-2 mt-4">Price:</p>
        <div class="px-4">
            <input class="w-[90px] mx-2 rounded" type="number" v-model="price_min">
            <input class="w-[90px] mx-2 rounded" type="number" v-model="price_max">
        </div>
        <p class="text-lg font-bold px-2 mt-4">Subcategory:</p>
        <div v-for="subcat in subcats" class="px-4">
            <input type="checkbox" id="black" :value="subcat.name" v-model="subcategory">
            <label class="px-2" for="subscribeNews">{{ subcat.name }}</label>
        </div>
    </div>
    <div class="w-[984px] h-auto p-4 border border-gray-200 rounded shadow">
        <div class="my-4 rounded-lg" v-for="product in products" :key="product.id">
            <div class="p-3 bg-white rounded shadow-md border border-gray-300 hover:shadow-xl w-full h-auto flex items-center">
                <img class="w-32 h-36" :src="product.image[0]" />
                <div class="flex justify-between pl-6">
                    <div class="w-[620px]">
                        <p class="text-lg font-bold">{{product.name}}</p>
                        <p class="text-sm">{{limit(product.description, 255)}}</p>
                    </div>
                    <div class="pl-6">
                        <p class="text-lg font-bold">{{product.price}} c.</p>

                        <button @click="$store.dispatch('addUser', product, user)" class="bg-red-500 text-white px-4 py-2 rounded-full flex items-center w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            Купить</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <Footer />
</div>
</template>
<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
export default {
    components: {
        Header,
        Footer
    },
    data() {
        return {
            products: [],
            color: [],
            price_min: null,
            price_max: null,
            subcats: [],
            subcategory: [],
            user: {},
            token: localStorage.getItem('token')
        };
    },
    watch: {
        color(after, before) {
            this.getResults();
        }
    },
    created() {
        this.$axios.get('/api/products')
            .then(response => {
                this.products = response.data.data;
                console.log(this.products);

            })
            .catch(function (error) {
                console.error(error);
            });
        this.$axios.get('/api/subcategory')
            .then(response => {
                this.subcats = response.data;
                console.log(this.subcat);

            })
            .catch(function (error) {
                console.error(error);
            });
        document.title = 'Product filter';
    },
    methods: {
        getResults() {
            axios.get('/api/products/filter', { params: { color: this.color, price_min: this.price_min, price_max: this.price_max} })
                .then(response => {
                    this.products = response.data.data
                    console.log(res.data)
                })
                .catch(error => {});
        },
        limit (string = '', limit = 0) {
            return string.substring(0, limit) + '...'
        },
        addToCard(product) {
            $store.dispatch("addToCart", product);
        },
    },
mounted(){
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
        this.$axios.get('/api/users/profile')
                .then(response => {
                    this.user = response.data.data;
                    console.log(this.user);

                })
                .catch(function (error) {
                    console.error(error);
                });
    },
}
</script>
