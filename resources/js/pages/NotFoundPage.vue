<template>
<div id="not-found-page" class="d-flex vh-100 justify-content-center align-items-center flex-column">
    <div class="mb-2">
        <h4>404</h4>
     <h5>pagina non trovata</h5>

    </div>
     <div>
        <div>
        <router-link class="btn btn-secondary mb-2" :to="{ name:'home' }">Torna alla Home</router-link>
        </div>
        <div>
        <button class="btn btn-secondary" @click="$router.back()">Torna indietro</button>
        </div>

     </div>
</div>
    
    
    
</template>
    
    <script>
        
        export default{
            name:"NotFoundPage",
        };
    
    
    
    
    
    </script>
    
    
    <style>
        ul{
            list-style-type: none;
        }



    </style>
    
    