<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>SKYTUN</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>css/bootstrap.min.css" type="text/css">
   <!-- style css -->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css" type="text/css">
   <!-- responsive-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>css/responsive.css" type="text/css">
   <!-- awesome fontfamily -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="<?php echo URLROOT; ?>images/loading.gif" alt="" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
   <div class="header" style="position: fixed; top: 0; width: 100%; z-index: 900;background:black">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class=" col-md-2 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.php"><img src="<?php echo URLROOT; ?>images/skytunlogo.png" alt="#" style="height:60px" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="<?php echo ROOT; ?>">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo ROOT; ?>about">About</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo ROOT; ?>albums/all">Albums</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo ROOT; ?>portfolio">Portfolio </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo ROOT; ?>contact">Contact Us</a>
                           </li>
                           <li>
                              <a class="nav-link" href="<?php echo ROOT; ?>login">Login</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
               <div class="col-md-2 d_none">
                  <ul class="email text_align_right">
                 
                     <li> <a href="Javascript:void(0)"> <i class="fa fa-search" id="search-icon"
                              style="cursor: pointer;" aria-hidden="true"></i></a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div id="search-bar"
         style="display: none; position: absolute; top: 100px; width: 100%; background: white; padding: 10px; z-index: 1000;">
         <form style="left:0" action="/search" method="GET">
            <input type="text" name="query" placeholder="Search..." />
            <button type="submit">Search</button>
         </form>
         <button id="search-close"
            style="position: absolute; top: 10px; right: 10px; background: transparent; border: none; cursor: pointer;">
            <i class="fa fa-times" style="font-size: 18px;"></i>
         </button>
      </div>
   </header>

   <script>
      document.getElementById('search-icon').addEventListener('click', function () {
         var searchBar = document.getElementById('search-bar');
         searchBar.style.display = 'block';
      });

      document.getElementById('search-close').addEventListener('click', function () {
         var searchBar = document.getElementById('search-bar');
         searchBar.style.display = 'none';
      });
   </script>