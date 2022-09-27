<template>
    <div>
       <ul>
        <li v-for="post in posts" :key="post.id">
            {{ post.author }}
        </li>
       </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
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
                console.log(this.posts)
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
