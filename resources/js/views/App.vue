<template>

    <section>
        <Main :posts="posts"/>
    </section>
   
</template>

<script>
import Main from '../components/Main.vue'
import axios from 'axios';


export default {
    components:{
        Main,
    },
    data:function(){
        return{
            posts:[]
        }
    },
    
    methods:{
        getPosts(postPage=1){
            axios.get('/api/posts',{
                page: postPage
            }).then((response)=>{
                this.posts=response.data.result.data;
                console.log(this.posts);
            }).catch((error)=>{
                console.log(error)
            })
        }
    },

    created(){
        this.getPosts();
    }
}

</script>

<style>

</style>
