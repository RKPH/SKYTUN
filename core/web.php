<?php 
Router::get("",function(){
    include "views/home.php";
});
Router::get("albums/all",function(){
    $post = new PostController;
    $post->getAllPosts();
   
});
Router::get("about",function(){
    include "views/about.php";
});


Router::get("portfolio",function(){
    include "views/portfolio.php";
});

Router::get("contact",function(){
    include "views/contact.php";
});


Router::get("login",function(){
    include "views/login.php";
});