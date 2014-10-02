<?php

function getNavBar($page){
    echo '<div class="masthead clearfix">
    <div class="inner">
        <a href="./"><h3 class="masthead-brand">UpLoadMe<img height="32" width="32" src="./resources/media/logo.png"> (ALPHA)</h3></a>
        <ul class="nav masthead-nav">';
    if($page == "home"){
            echo '<li class="active"><a href="">Home</a></li>';
    }else{
        echo '<li><a href="./">Home</a></li>';
    }
    
    if($page == "contact"){
            echo '<li class="active"><a href="">Contact</a></li>';
    }else{
        echo '<li><a href="./contact.php">Contact</a></li>';
    }
    
    if($page == "privacy"){
          echo '<li class="active"><a href="">Privacy</a></li>';
    } else{
        echo '<li><a href="./privacy.php">Privacy</a></li>';
    }
    echo '</ul></div></div>';
}