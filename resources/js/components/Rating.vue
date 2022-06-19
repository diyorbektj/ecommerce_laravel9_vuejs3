<template>
  <star-rating
  border-color="#999"
  :rating="4.5"
  :star-size="20"
  :show-rating="true"
  :increment="0.1"></star-rating>
</template>
<script>
import StarRating from 'vue-star-rating'
export default {
    components:{
        StarRating
    },
  data() {
    return {
      rating: null,
      resetableRating: 2,
      currentRating: "No Rating",
      mouseOverRating:null
    };
  }
};


</script>
<style>

</style>
