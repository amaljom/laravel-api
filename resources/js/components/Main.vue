<template>
  <div>
    <ul>
        <li v-for="post in posts" :key="post.id">
            {{ post.user.name }}
        </li>
        <li v-for="post in posts" :key="post.id">
            {{ post.author }}
        </li>
    </ul>
    <ul >
        <li v-for="tag in tags" :key="tag.id">
            {{ tag.name}}
             {{ countArray(tag.posts)}}
        </li>
        
    </ul>
  </div>
</template>

<script>
export default{
     props: ['posts', 'tags'],

     methods:{
        countArray(posts){
            return posts.length;
        }
     }
}
</script>

<style>

</style>