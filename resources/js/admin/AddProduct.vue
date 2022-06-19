<template>
<div class="bg-gray-200 w-full h-full">
<div class="flex justify-between">
<Aside />
<div class="w-4/5  overscroll-auto">
<Header />
<h1 class="font-bold text-2xl p-4 flex items-center bg-white w-full h-14">AddProduct</h1>
<div v-if="message" class="bg-yellow-200 w-full h-12 flex items-center">{{ message }}</div>
<form @submit.prevent="formSubmit" enctype="multipart/form-data">
<div class="flex justify-between">
<div class="bg-white w-2/4 h-auto m-2 rounded p-4">

        <div class="flex items-center mb-5">
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Name:</label>
            <input v-model="name" type="text" placeholder="Name"
                class="w-96 py-2 border rounded border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
        </div>
      <div class="flex items-center mb-5">
        <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Description:</label>
       <textarea v-model="text" class="h-28 rounded border border-gray-300 w-96"></textarea>
     </div>
     <div class="flex items-center mb-5">
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Product image:</label>
             <input @change="AvatarProduct" ref="avatar" multiple type="file"
                class="form-control block w-96 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
    rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"> </div>
     <div class="flex items-center mb-5">
      <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Categories:</label>
        <select v-model="category_id" class="h-full rounded border border-gray-300 w-96">
        <option selected>Выбрайте Категория</option>
        <option aria-multiselectable="true" v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
        </select>

     </div>
     <div v-if="subcategories !== 0" class="flex items-center mb-5">
      <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">SubCategories:</label>
        <select v-model="subcategory_id" class="h-full rounded border border-gray-300 w-96">
        <option selected>Выбрайте Категория</option>
        <option aria-multiselectable="true" v-for="subcategory in subcategories" :key="subcategory.id" :value="subcategory.id">{{ subcategory.name }}</option>
        </select>

     </div>
     <div class="flex items-center mb-5">
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Price:</label>
            <input v-model="price" type="text" placeholder="$ 0.00"
                class="w-[140px] py-2 border rounded border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
            <label  class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Count:</label>
            <input v-model="stock" type="number" placeholder="0"
                class="w-[140px] py-2 border rounded border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
        </div>

        <div class="flex items-center mb-5">
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Images:</label>
            <input @change="onChange" ref="files" multiple type="file"
                class="form-control block w-96 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
    rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div>
        <p v-for="image in images">{{image.name}}</p>
        </div>
</div>
<div class="w-full bg-white h-[410px] my-2 mr-2 rounded-lg p-4">
<div v-if="category_id === 1">
    <div class="flex items-center mb-5">
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">RAM:</label>
            <div class="w-[140px]">
            <select v-model="telephone[0].value" class="h-full rounded border border-gray-300 w-full">
             <option value="1">1 GB</option>
                <option value="2">2 GB</option>
                <option value="3">3 GB</option>
                <option value="4">4 GB</option>
                <option value="8">8 GB</option>
                <option value="16">16 GB</option>
            </select>
            </div>
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Memory:</label>
            <div class="w-[140px]">
            <select v-model="telephone[1].value" class="rounded border border-gray-300 w-full">
                <option value="16">16</option>
                <option value="32">32</option>
                <option value="64">64</option>
                <option value="128">128</option>
                <option value="256">256</option>
                <option value="512">512</option>
            </select>
                </div>
               </div>
        <div class="flex items-center mb-5">
            <label for="" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Colors:</label>
           <div class="inline-block w-96">
          <select v-model="telephone[2].value" class="rounded border border-gray-300 w-full">
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
          </select>
           </div>
        </div>
</div>
<div v-if="category_id === 2 || category_id === 5">
     <div class="flex items-center mb-5">
            <label for="" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Colors:</label>
           <div class="inline-block w-96">
          <select v-model="public[0].value" class="rounded border border-gray-300 w-full">
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
          </select>
           </div>
        </div>
</div>

        <div v-if="category_id" class="flex justify-end"><button class="bg-blue-500 p-2 text-white rounded-lg">Добавить</button></div>
</div>
</div>
</form>
</div>
</div>
<Footer />
</div>
</template>
<script>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
import Aside from './components/Aside.vue'

export default {
    components: {
        Header,
        Footer,
        Aside,
    },
    data() {
        return {
            message: null,
            categories:[],
            subcategories:[],
            subcategory_id: '',
            images:[],
            text: '',
            name: "",
            category_id: "",
            public: [
                {
                    value: '',
                    type: 'color',
                }
            ],
            telephone: [
               {
                   value: '',
                   type: 'ram'
               },
               {
                    value: '',
                    type: 'memory'
                },
                {
                     value: '',
                     type: 'color'
               }
            ],
            price: '',
            stock: '',
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
    watch: {
        category_id(after, before){
            this.sub_category();
        }
    },

    methods: {
        sub_category(){
            axios.get('/api/subcategory', { params: { category_id: this.category_id } })
                .then(res => {
                    this.subcategories = res.data;
                    console.log(this.subcategory);
                })
                .catch(error => {});
        },
        onChange() {
            for(let i = 0; i < this.$refs.files.files.length; i++){
                this.images.push(this.$refs.files.files[i])
            }
            console.log(this.images)
            },
        AvatarProduct() {
            this.images.push(this.$refs.avatar.files[0])
        },

            formSubmit() {
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                for(let i = 0; i < this.images.length; i++){
                    data.append('files['+ i +']', this.images[i]);
                }
                data.append('name', this.name);
                data.append('description', this.text);
                data.append('price', this.price);
                data.append('stock', this.stock);
                data.append('category_id', this.category_id);
                data.append('subcategory_id', this.subcategory_id);
                if (this.category_id === 1) data.append('attribute', JSON.stringify(this.telephone));
                if (this.category_id === 2 || this.category_id === 5) data.append('attribute', JSON.stringify(this.public));
                axios.post('/api/product/add', data, config)
                    .then(function (res) {
                        console.log(res)
                        this.$router.push({ path: '/admin/products' })
                    })
                    .catch(function (err) {
                        this.output = err;
                    });
            },

    }
}
</script>

