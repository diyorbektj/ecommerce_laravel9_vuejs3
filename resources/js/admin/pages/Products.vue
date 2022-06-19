<template>
<div class="bg-gray-200 w-full h-full">
<div class="flex justify-between">
<Aside class="sticky top-0" />
<div class="w-4/5 h-96">
<Header class="sticky top-0 z-10" />
<div class="">
<div class="p-4 flex justify-between items-center bg-white w-full h-14">
    <h1 class="font-bold text-2xl">Products</h1>
    <button @click="modal = true" class="p-2 w-auto h-auto text-white bg-blue-500 rounded">Добавить</button>
</div>
<!-- Menu -->

<div class="overscroll-auto h-full mt-4">
    <div class="flex flex-col">
        <div class="w-[800px]">
            <div class="border-b border-gray-200 shadow">
                <table class="w-[1200px]">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Description
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Price
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Category
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Image
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Stock
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Values
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="product in products" :key="product.id" class="whitespace-nowrap divide-y divide-gray-200">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ product.id }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ limit(product.name, 35) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 pl-10">
                                <div class="text-sm text-gray-500">{{ limit(product.description, 30)}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                {{ product.price }} с.
                            </td>
                            <td class="px-6 py-4">
                               <p>{{ product.category }}</p>
                               <p>{{ product.subcategory }}</p>
                            </td>
                            <td class="px-6 py-4">
                               <img class="w-[60px]" :src="product.image[0]" alt="">
                            </td>
                            <td class="px-6 py-4">
                               {{ product.stock }}
                            </td>
                             <td class="px-6 py-4">
                               <p v-for="attribute in product.attributes">{{attribute.attribute}}: {{attribute.value}}</p>
                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<!-- EndMenu -->

<!-- Modal -->

<div v-if="modal" @click.self="modal=false" class="bg-gray-900 bg-opacity-40 absolute top-0 left-0 w-full h-full flex justify-center items-center">
    <div class="bg-white rounded-lg w-[550px] h-auto py-4">
        <div>
            <h1 class="font-bold text-center text-lg p-2">Добавить категорию</h1>
        </div>
        <div>
            <form @submit.prevent="addCat">
                <input type="text" v-model="category.name" class="p-2 mx-2 w-[530px] border border-gray-400 rounded" placeholder="Название категории">
               <div class="flex justify-end pt-2">
                     <button @click="modal=false">Отменить</button>
                    <button @click="onClickTop" class="bg-blue-500 p-2 text-white rounded mx-2" type="submit">Добавить</button>
               </div>
            </form>
        </div>
    </div>
</div>

<!-- EndModal -->

</div>
</div>
<!--<Footer />-->
</div>
</template>
<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
import Aside from '../components/Aside.vue'


export default {
    computed: {

    },
    components: {
        Header,
        Footer,
        Aside
    },
    data() {
        return {
            products: [],
            modal: false,
            category:{}
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
    },
    methods: {
        limit (string = '', limit = 0) {
            return string.substring(0, limit) + '...'
        },

    }
}
</script>
