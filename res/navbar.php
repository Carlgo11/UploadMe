<?php

function getNavBar($page = null) {
    ?>
    <div class="masthead clearfix">
        <div class="inner">
            <a href="./"><h3 class="masthead-brand">UpLoadMe<img height="32" width="32" src="./res/media/logo.png"></h3></a>
            <ul class="nav masthead-nav">
                <?php
                if ($page == "home") {
                    echo '<li class="active"><a href="">Home</a></li>';
                } else {
                    echo '<li><a href="./">Home</a></li>';
                }

                if ($page == "contact") {
                    echo '<li class="active"><a href="">Contact</a></li>';
                } else {
                    echo '<li><a href="./contact.php">Contact</a></li>';
                }

                if ($page == "remove") {
                    echo '<li class="active"><a href="">Remove</a></li>';
                } else {
                    echo '<li><a href="./remove.php">Remove</a></li>';
                }

                if ($page == "privacy") {
                    echo '<li class="active"><a href="">Privacy</a></li>';
                } else {
                    echo '<li><a href="./privacy.php">Privacy</a></li>';
                }
                echo '</ul></div></div>';
            }
            