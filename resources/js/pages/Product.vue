<template>
<div class="max-w-screen-xl mx-auto">
    <Header />
<div class="max-w-screen-md mx-auto">
    <div class="flex justify-between my-12">
    <div><img :src="product.image"></div>
    <div class="text-gray-600 max-w-[300px]">
        <p class="text-xl font-bold text-black">{{ product.name }}</p>
        <p class="my-5 h-px w-full bg-gray-400"></p>
        <p class="text-md">Цена</p>
        <p class="text-2xl">{{ product.price }}</p>
          <star-rating
            border-color="#999"
            :rating="product.rating"
            :glow="0.5"
            :star-size="20"
            :show-rating="true"
            :increment="0.1"></star-rating>
        
        <p class="my-2" v-html="product.description"></p>
        <p>
          <button class="bg-blue-500 text-white w-32 py-4 text-md my-3 mx-2 rounded-md">В Корзину</button>
          <button class="bg-red-400 text-white w-32 py-4 text-md my-3 mx-2 rounded-md">Купить</button>
        </p>
    </div>
</div>
</div>
<Footer/>
</div>
</template>
<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
import StarRating from 'vue-star-rating'
export default {
  components: {
    StarRating,
    Header,
    Footer
  },
  setup() {
    return {

    };
  },
  created() {
        this.$axios.get('/api/products/'+ this.$route.params.id)
                .then(response => {
                    this.product = response.data.data;
                    console.log(this.product);

                })
                .catch(function (error) {
                    console.error(error);
                });
    },
  data() {
      return {
        rating1: 0,
        resetableRating: 2,
        currentRating: "No Rating",
        mouseOverRating: null,
        product: {},
        startrating: {
            rating: 0,
        },

      }
  },
  methods: {
  },
};
</script>