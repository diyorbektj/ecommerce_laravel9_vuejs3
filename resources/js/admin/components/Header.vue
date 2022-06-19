<template>

<header class="bg-blue-600 w-full h-14 flex justify-between items-center px-4 text-white">
<div><input class="bg-white border-none h-10 w-96 rounded text-gray-500" type="text" name="" placeholder="Search..."></div>
<div class="flex items-center">
<div class="mx-2">
    <router-link to="/admin/addproduct">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
        </svg>
    </router-link>
</div>
<div class="mx-2">
<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
</svg>
</div>
<div class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
</svg></div>
<ul class="flex items-center">
<li><img class="w-10 rounded-full" src="/images/1.jpg"></li>
<li class="px-2">{{ user.name }}</li>
</ul></div>
</header>

</template>
<script>
export default {
  name: 'Header',
  data(){
    return{
     token: localStorage.getItem('token'),
      user: {}
    }
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
