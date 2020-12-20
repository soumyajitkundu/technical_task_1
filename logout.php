<?php
require_once('lib/sessionOperations.php');
  if(is_user_logged_in()){
    destroy_user_session();
    header('location:index.php'); 
  }else{
    echo 'Login First';

  }

?>