<template>
    <div class="card offset-3 col-6 mb-4">
                <img class="card-img-top" width="100" height="100" :src="post.image" :alt="post.slug">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.content }}</p>
                    
                    <p>{{ pubblicata(post) }}</p>
                   <router-link class="btn btn-primary offset-2 col-8 mt-2" :to="`/posts/${post.slug}`">Vedi</router-link>
                    <!-- //da modificare con metodo professionale la presa dell id nel post -->
                </div>
            </div>  
        
        
    </template>
        
        <script>
            
            export default{
                name:"PostCard",
                props:{
                post:Object,
                },
            methods:{
          pubblicata(post){
        const postDate = new Date(post.created_at);
            let day = "0" + postDate.getDate();
            let month = postDate.getMonth()+1;
            let year = postDate.getFullYear();
                
            return `${day}/${month}/${year}`;
             },

                }
            };
               
           
        
        
        
        
        
        </script>
        
        
        <style lang="scss">
            ul{
                list-style-type: none;
            }
    
    
    
        </style>
        
        