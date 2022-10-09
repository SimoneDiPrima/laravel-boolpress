<template>
    <div id="post-detail-page">
    
                   <PostCard :post="post"/>
                    
         
    </div>
        
        
        
</template>
        
<script>
import PostCard from './PostCard.vue';
    export default{
        name:"PostDetailPage",
        data(){
        return{
                post: null,
            };
            },
            components:{ PostCard },
            methods:{
                fetchPost(){
                    axios.get(`http://127.0.0.1:8000/api/posts/`+ this.$route.params.slug).then(res=>{
                        this.post = res.data
                    })
                },
            },
            mounted(){
                this.fetchPost();
            }
            }; 
        
        
        </script>
        
        
        <style>
            ul{
                list-style-type: none;
            }
    
    
    
        </style>
        
        