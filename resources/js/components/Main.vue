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
  </div>
</template>

<script>
export default{
     props: ['posts'],
}
</script>

<style>

</style>