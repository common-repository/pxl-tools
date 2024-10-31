<?php 

function pxl_login_errors(){
  return 'Algo deu errado!';
}
add_filter( 'login_errors', 'pxl_login_errors' );
