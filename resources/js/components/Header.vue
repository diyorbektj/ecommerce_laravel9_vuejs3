<template>
  <header class="w-full h-12 flex justify-between items-center mt-3 relative">
    <div class="text-2xl font-bold">Ecommerce</div>
    <div>
      <input
        class="bg-gray-200 border border-gray-300 h-10 w-[650px] rounded absolute top-0 left-[200px] focus:outline-none placeholder-gray-600 text-lg px-2"
        type="text"
        name=""
        placeholder="Search..."
      />
      <button
        class="bg-red-400 w-auto h-auto py-[11px] px-5 rounded text-white absolute right-[400px] top-[-1px]"
        type="submit"
      >
        Submit
      </button>
    </div>
    <div>
      <ul class="flex items-center text-gray-500">
        <li class="px-2 relative">
            <button @click="card = true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
           <p class="absolute -top-2 p-[3px] bg-red-400 text-white rounded-full right-0 text-sm min-w-[15px]">{{ cartProducts }}</p>
            </button>
            <div v-if="card" @click="card = false">
            <div class="bg-white rounded w-[350px] h-auto border border-gray-300 absolute top-8 right-0 z-10">
              <div class="border-b border-gray-300" v-for="item in CartItems">
                <div class="flex justify-between items-center py-[5px] p-[5px]">
                  <div class="flex items-center">
                    <img :src="item.image" class="h-8 w-8 rounded-full"  :alt="item.product_name"/>
                    <div class="ml-2"><p>{{ item.product_name }}</p>
                          <div class="flex items-center">
                            <p>{{ item.quantity }} / </p>
                            <p>{{ item.price }} c.</p>
                          </div>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <p class="text-gray-600">
                    </p>
                    <button class="" @click.prevent="$store.dispatch('DELETE_PRODUCT', item)">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="flex justify-between items-center p-2 text-lg">
                  <p>Total: {{ getTotalPrice }} c.</p>
                 <div>
                     <button class="mx-2" @click.prevent="clearProductList">Clear</button>
                     <button class="bg-red-500 text-white p-1 rounded w-auto h-auto">
                       <router-link to="/buyproduct">
                         Купить
                       </router-link>
                     </button>
                 </div>
              </div>
            </div>
            </div>
        </li>
        <li class="px-2">
           <button @click="right=true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
           </button>
           <Right @click.self="right = false" v-if="right" />
            </li>
        <li class="px-2">
           <button @click="modal = true" @mouseover="hover = true" v-on:mouseleave="hover = false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>

           <Profile v-if="hover && user.logined == true" />
           </button>
            <Modal @click.self="modal = false" v-if="modal && user.logined == false" />
            </li>
      </ul>
    </div>
  </header>
  <div class="flex justify-between items-center mt-1.5 text-sm">
      <button @click="open=true" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
          Все категори
        </button>
      <div>Смартфоны</div>
      <div>Телефоны и аксессуары</div>
      <div>Беспроводные наушники</div>
      <div>Компьютерная техника</div>
      <div>Фото- и видеокамеры</div>
  </div>
  <div
  @click.alias="open=false"
  v-if="open"
  >
  <div class="bg-white z-10 fixed w-full h-auto py-4 px-2 flex items-center">
  <ul class="mx-4">
  <li v-for="category in categories" :key="category.id" class="p-1">{{ category.name }}</li>
  </ul>
 <ul class="mx-4">
  <li class="p-1">Смартфоны</li>
  <li class="p-1">Телефоны и аксессуары</li>
  <li class="p-1">Беспроводные наушники</li>
  </ul>
  </div>
  </div>
</template>

<script>
import axios from 'axios';
import Modal from './Login.vue';
import Right from './Right.vue';
import Profile from './Profile.vue'
import {mapGetters} from 'vuex'
export default {
  name: "Header",
  components:{
      Modal,
      Right,
      Profile
  },
  data() {
    return {
      card: false,
      hover: false,
      modal: false,
      right: false,
      categories: [],
      user: {
        logined: false,
      },
      token: localStorage.getItem('token')
    };
  },
  created() {
      this.$store.dispatch("GET_PRODUCTS");
    axios.get('/api/category/all').then(response => {
      this.categories = response.data.data;
    });
  },
  methods: {
      clearProductList() {
          this.$store.dispatch("CLEAR_PRODUCTS");
      },
  },
  computed: {
    ...mapGetters(['cartProducts', 'CartItems', 'getTotalPrice'])
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
};
</script>
