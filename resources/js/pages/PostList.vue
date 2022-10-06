<template>
    <div>
        <ul class="offset-3 col-6 mb-4">
           <PostCard v-for="post in posts" :key="post.id" :post="post" />
        </ul>
    </div>


</template>

<script>
    import PostCard from './PostCard.vue';
     export default{
        name:'PostList',
        data(){
            return {
                posts:[], 
            };
        },
        components:{ PostCard },
        
        methods:{
            fetchPosts(){
                axios.get(`http://127.0.0.1:8000/api/posts`).then((res)=>{
                    this.posts = res.data;
                })
            },
           
        },
        mounted(){
            this.fetchPosts();
        },
    };





</script>


<style>





</style>