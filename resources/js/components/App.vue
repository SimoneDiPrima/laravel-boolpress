<template>

<div class="content">
    <div class="title m-b-md">
    <AppHeader />
        <main class="container">
             <router-view></router-view>
        </main>
    </div>
 </div>



</template>


<script>
import AppHeader from './AppHeader.vue';
// import PostList from "../pages/PostList.vue";
    export default{
    name: "App",
    components: { AppHeader }
};


</script>


