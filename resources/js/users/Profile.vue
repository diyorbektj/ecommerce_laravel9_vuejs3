<template>
<div>This is a Profile {{ user.name }}</div>
<button class="p-2 text-white bg-blue-500 w-auto h-auto rounded" @click="logout">logout</button>
</template>

<script>

export default{
    setup(){

    },
    data(){
        return{
            user: {},
            token: localStorage.getItem('token')
        }
    },
    methods:{
        logout(){
            this.$axios.get('/api/users/logout').then(response => {
                localStorage.removeItem('token')
                this.$router.push('/')
            }).catch((errors)=>{
                console.log(errors)
            })
            
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