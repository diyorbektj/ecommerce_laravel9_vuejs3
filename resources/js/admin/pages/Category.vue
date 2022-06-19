<template>
<div class="bg-gray-200 w-full h-full">
<div class="flex justify-between">
<Aside />
<div class="w-4/5 h-96">
<Header />
<div class="p-4 flex justify-between items-center bg-white w-full h-14">
    <h1 class="font-bold text-2xl">Categories</h1>
    <button @click="modal = true" class="p-2 w-auto h-auto text-white bg-blue-500 rounded">Добавить</button>
</div>
<!-- Menu -->

<div class=" mt-4 flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-[1200px]">
            <div class="border-b border-gray-200 shadow">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Slug
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Created_at
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Edit
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="category in cats" :key="category.id" class="whitespace-nowrap">
                            <td class="px-6 text-center py-4 text-sm text-gray-500">
                                {{ category.id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ category.name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 pl-10">
                                <div class="text-sm text-gray-500">{{ category.slug}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                {{ category.created_at }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                            </td>
                        </tr>



                    </tbody>
                </table>
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
import { notify } from "notiwind"

export default {
    computed: {
    cats: function () {
        return _.orderBy(this.categories, 'id', 'desc')
    }
    },
    components: {
        Header,
        Footer,
        Aside
    },
    data() {
        return {
            categories: [],
            modal: false,
            category:{}
        }
    },
    created() {
        this.$axios.get('/api/category/all')
                .then(response => {
                    this.categories = response.data.data;
                    console.log(this.categories);
                })
                .catch(function (error) {
                    console.error(error);
                });
    },
    methods: {
        addCat() {
            this.$axios.post('/api/category/add', this.category)
                .then(response => {
                    this.categories.push(response.data.data);
                    this.category = {};
                    this.modal = false;
                })
                .catch(function (error) {
                    console.error(error);
                });
        }
    }
}
</script>
