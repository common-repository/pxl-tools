<?php 

function pxl_filter_oembed_response( $data, $post, $width, $height ) {
    
    if(isset($data['author_name'])){
        unset($data['author_name']);
    }

    if(isset($data['author_url'])){
        unset($data['author_url']);
    }
     
    return $data;
};

add_filter( 'oembed_response_data', 'pxl_filter_oembed_response', 10, 4 );
