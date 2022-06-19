<template>
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
    <swiper-slide>
        <div class="w-[300px] h-[350px]">
        <p><img class="rounded-lg max-h-44" src="/images/pro1.jpeg" alt=""></p>
        <p class="text-xl">$32</p>
        <Rating />
        <p class="text-[12px] py-0.5">1Bluetooth Earphone Беспроводные наушники TF Card Режим наушников с микрофоном Bluetooth Earphone</p>
        </div>
    </swiper-slide>
    
  </swiper>
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

import { Autoplay, Pagination, Navigation } from "swiper";
import Rating from './Rating.vue'

export default {
  components: {
      Rating,
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    };
  },
};
</script>

