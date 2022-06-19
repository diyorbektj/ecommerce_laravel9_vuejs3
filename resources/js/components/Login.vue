<template>
<div class="bg-gray-900 bg-opacity-50 fixed top-0 left-0 w-full h-full z-10 flex justify-center items-center text-black">
<div class="bg-white w-1/3 h-72 rounded-lg p-4">
<div class="flex justify-center font-bold text-2xl">Login</div>
<form @submit.prevent="getLogin" method="post">
<div class="my-2">
<strong class="text-xl">Login:</strong>
<p><input class="border border-gray-300 w-full h-10 rounded-lg px-2 focus:outline-none" type="email" v-model="formdata.email"></p>
</div>
<div class="my-2">
<strong class="text-xl">Password:</strong>
<p><input class="border border-gray-300 w-full h-10 rounded-lg px-2 focus:outline-none" type="password" v-model="formdata.password"></p>
</div>
<div class="flex justify-end my-2">
<button class="bg-red-400 w-auto h-auto p-2 rounded-lg text-white text-xl" type="submit">Submit</button>
</div>
</form>
</div>
</div>
</template>
<script>
import axios from 'axios'

export default{
    data(){
        return{
            formdata: {}
        }
    },
    methods:{
        getLogin(){
            axios.post('/api/users/login', this.formdata).then(response => {
                localStorage.setItem('token', response.data)
                this.$router.go(0)
                console.log(response.data)
            }).catch((errors)=>{
                console.log(errors)
            })
        }
    }
}
</script>
