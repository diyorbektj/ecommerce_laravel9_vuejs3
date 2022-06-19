<template>
<div class="bg-white border border-gray-400 w-44 h-32 rounded-md absolute z-10 right-[-40px] top-10">
<div class="flex items-center w-full h-10 pl-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
</svg>
    Profile</div>
<div class="flex items-center w-full h-10 pl-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
</svg>
    Settings</div>
<div class="bg-gray-300 h-px w-full"></div>
<div @click="logout" class="flex items-center w-full h-10 pl-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
</svg>
    Logout</div>

</div>
</template>
<script>
import axios from 'axios'

export default{
    data(){
        return{
            formdata: {},
            user: {},
            token: localStorage.getItem('token')
        }
    },
    methods:{
        getLogin(){
            axios.post('/api/users/login', this.formdata).then(response => {
                localStorage.setItem('token', response.data)
                console.log(response.data)
            }).catch((errors)=>{
                console.log(errors)
            })
        },
        logout(){
            this.$axios.get('/api/users/logout').then(response => {
                localStorage.removeItem('token')
                this.$router.go(0)
                this.modal = false
            }).catch((errors)=>{
                console.log(errors)
            })
            
        },
        userLogin(){
             window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
            this.$axios.get('/api/users/profile')
                    .then(response => {
                        this.user = response.data.data;
                        console.log(this.user);
                        this.$router.go(0)

                    })
                    .catch(function (error) {
                        console.error(error);
                    });
        }
    },
    mounted(){
       
    },
}
</script>
