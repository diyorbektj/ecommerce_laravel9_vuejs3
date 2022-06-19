<template>
<div class="max-w-screen-xl mx-auto">
    <Header />
<div>
  <swiper
    :spaceBetween="30"
    :centeredSlides="true"
    :autoplay="{
      delay: 4500,
      disableOnInteraction: false,
    }"
    :pagination="{
      clickable: true,
    }"
    :navigation="true"
    :modules="modules"
    style="border-radius: 15px;height: 350px;width: 100%;"
    class="mySwiper"
  >
    <swiper-slide><img src="/images/test.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="/images/2.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="/images/3.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="/images/4.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="/images/5.jpg" alt=""></swiper-slide>
  </swiper>
</div>
<main>
<div>
<div></div>
</div>
<div class="my-8 mb-32">
  <div class="text-3xl font-bold">Популярное категории</div>
  <ul class="flex justify-between mt-8">
    <li class="">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Смартфоны-1638869130347.jpg" class="" alt="">
      </router-link>
      <p class="flex justify-center">Смартфоны</p>
    </li>
    <li class="">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Телевизоры-1638869164491.jpg" class="" alt="">
      </router-link>
      <p class="flex justify-center">Телевизоры</p>
    </li>
    <li class="">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Холодильники-1638869198636.jpg" class="" alt="">
      </router-link>
      <p class="flex justify-center">Холодильники</p>
    </li>
    <li class="">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Кондиционеры-1638869179126.jpg" class="w-32" alt="">
      </router-link>
      <p class="flex justify-center">Кондиционеры</p>
    </li>
    <li class="">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Стиральные машины-1645172702484.jpg" class="w-32" alt="">
      </router-link>
      <p class="flex justify-center">Стиральные машины</p>
    </li>
    <li class="">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Наушники-1638869187090.jpg" class="w-32" alt="">
      </router-link>
      <p class="flex justify-center">Наушники</p>
    </li>
  </ul>
  <ul class="flex items-center my-4">
    <li class="mr-12">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Ноутбуки-1638869204798.jpg" class="w-32" alt="">
      </router-link>
      <p class="flex justify-center">Ноутбуки</p>
    </li>
    <li class="ml-[52px] mr-[12px]">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Строительные инструменты-1644811867801.jpg" class="w-32" alt="">
      </router-link>
      <p class="flex justify-center">Строительные инструменты</p>
    </li>
    <li class="mx-10">
      <router-link class="bg-gray-200 w-32 h-28 rounded-full" to="/category/1">
        <img src="/images/Каталог товаров-1644811899876.png" class="w-32" alt="">
      </router-link>
      <p class="flex justify-center">Каталог товаров</p>
    </li>

  </ul>
</div>
<div class="flex justify-between my-2">
<div class="text-3xl font-bold">Товары</div>
<div>Все Товары&raquo;</div>
</div>
<div class="grid gap-x-8 gap-y-4 grid-cols-5">
    <div v-for="product in products" class="w-[210px] h-[400px] rounded-lg my-2 hover:shadow-xl p-5">
    <router-link :to="'/product/' + product.id">
       <div class="flex justify-center"><img class="w-[150px] rounded-lg h-[180px] my-4" :src="product.image[0]" :alt="product.name" /></div>
     <div>
     <p class="text-xl my-1.5">{{ product.price }} с.</p>
        <star-rating
            border-color="#999"
            :rating="product.rating"
            :star-size="20"
            :show-rating="true"
            :increment="0.1"></star-rating>
        <p class="text-[12px] py-0.5 mt-2">{{ limit(product.description, 100)}}</p>
     </div>
    </router-link>
    </div>

</div>
<div class="flex justify-between my-2 mt-16">
<div class="text-3xl font-bold">Похожие Товары</div>
<div>Все Товары &raquo;</div>
</div>
<swiper
    :slides-per-view="5"
    :space-between="5"
    :navigation="true"
    :modules="modules"
    :autoplay="{
      delay: 5500,
      disableOnInteraction: false,
    }"
    @swiper="onSwiper"
    @slideChange="onSlideChange"
    class="w-full h-full"
  >
    <swiper-slide v-for="product1 in products">
        <div class="w-[300px] h-[350px]">
        <p class="my-3"><img style="width: 180px; height:150px; object-fit: contain;" class="rounded-lg h-[150px] w-[180px]" :src="product1.image[0]" alt=""></p>
        <p class="text-xl">$32</p>
         <star-rating
            border-color="#999"
            :rating="product1.rating"
            :star-size="20"
            :show-rating="true"
            :increment="0.1"></star-rating>
        <p class="text-[12px] py-0.5 mt-1.5">{{ limit(product1.description, 90) }}</p>
        </div>
    </swiper-slide>

  </swiper>
</main>

<Footer />
</div>
</template>
<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
import Slide from '../components/Slide.vue'
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import "../../css/slide.css";
import StarRating from 'vue-star-rating'
import { Autoplay, Pagination, Navigation } from "swiper";

export default {
  components: {
    StarRating,
    Slide,
    Swiper,
    SwiperSlide,
    Header,
    Footer
  },
  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    };
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
                document.title = 'Ecommerce Web Site';
    },

  data() {
      return {
        rating: null,
        resetableRating: 2,
        currentRating: "No Rating",
        mouseOverRating: null,
        products: [],

      }
  },
  methods: {
      limit (string = '', limit = 0) {
            return string.substring(0, limit) + '...'
        },
  },
  watch: {

    }
};
</script>
