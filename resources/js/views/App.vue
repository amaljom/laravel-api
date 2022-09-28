<template>

    <section>
        <Main :posts="posts" :tags="tags"/>
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
            posts:[],
            tags:[]
        }
    },
    
    methods:{
        getPosts(postPage=1){
            axios.get('/api/posts',{
            }).then((response)=>{
                this.posts=response.data.result.data;
                console.log(this.posts);
            }).catch((error)=>{
                console.log(error)
            })

            axios.get('/api/tags',{
            }).then((response)=>{
                this.tags=response.data.result.data;
                console.log(this.tags);
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
