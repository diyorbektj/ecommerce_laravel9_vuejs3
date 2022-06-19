<template>
    <div class="max-w-screen-xl mx-auto">
<Header />
       <div class="max-w-screen-md my-8">
            <div class="border border-gray-300 p-2 my-8">
            <h1>Адрес доставка</h1>
            {{ userdata.country }}, {{ userdata.city }}, {{ userdata.address }}, {{ userdata.phone }}
        </div>
        <div class="h-auto my-8">
                <table class="border border-gray-300 w-full p-2 rounded-t-md">
                    <tr class="rounded-t-md bg-gray-200 h-12 p-2">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    <tr v-for="(item, index) in CartItems" :key="index" class="border-b border-gray-300 ">
                        <td>{{ index + 1 }}</td>
                        <td><img class="w-12 h-12 rounded-full" :src="item.image" :alt="item.product_name"></td>
                        <td>{{ item.product_name }}</td>
                        <td class="text-center">{{ item.price }}</td>
                        <td class="text-center">
                            <button @click.prevent="$store.dispatch('DECREMENT_PRODUCT',item)" class="bg-red-600 text-white w-auto px-3 h-auto py-1 rounded-full mx-1.5">-</button>
                            {{ item.quantity }}
                            <button @click.prevent="$store.dispatch('INCREMENT_PRODUCT',item)" class="bg-green-600 text-white w-auto h-auto px-3 py-1 rounded-full mx-1.5">+</button>
                        </td>
                    </tr>
                </table>
        </div>
        <div class="flex justify-end">
            <button class="p-2">Total: {{ getTotalPrice }} c.</button>
            <button class="bg-red-500 p-2 rounded text-white">Оформить заказ</button>
        </div>
       </div>
    <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
import {mapActions, mapGetters} from 'vuex'
export default {
    components: {
        Header,
        Footer
    },
    computed:{
        ...mapGetters(['cartProducts', 'CartItems', 'getTotalPrice']),
        ...mapActions(['INCREMENT_PRODUCT','DECREMENT_PRODUCT'])
    },
    data() {
        return {
            products: [],
            userdata: {}
        }
    },
    mounted() {
        axios.get('/api/shopingcart/')
            .then(response => {
                this.products = response.data.data;
            })
            .catch(error => {
                console.log(error);
            });
        axios.get('/api/shopingcart/user')
            .then(response => {
                this.userdata = response.data;
            });
    }
}
</script>

<style scoped>
td{
    padding: 9px;
}
table,td,th{
    border: 1px solid #c0c0c0;
}
</style>
