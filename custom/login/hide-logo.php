<?php

//remove login logo
add_action('login_enqueue_scripts', function(){
    ?> 
        <style type="text/css"> 
            #login h1{
                display: none !important;
                visible: hidden !important;
            }
        </style>
    <?php 
});
