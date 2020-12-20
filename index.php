<?php
  require_once('lib/sessionOperations.php');
  if(is_user_logged_in()){
    // send to dashboard page
    header('location:dashboard.php');

  }
  $err_msg = '';
  if(isset($_POST['sub']) and $_POST['sub']){
    // 1. clean data
    require_once('lib/cleanOperations.php');
    $cleanData = clean($_POST);
    if(!$err_msg){
      require_once('lib/dbOperations.php');
      $response = authenticate($cleanData['user'],$cleanData['pwd']);
      if(!$response){
        $err_msg = 'Invalid Credentials';
      }else{
        make_user_session($response);
        // and send to dashboard
        header('location:dashboard.php');
        exit();
      }
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Technical Task</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./assets/css/style.css" type="text/css" />
</head>
<body>
<div class="login">
  <fieldset>
  <legend>Login</legend>
  <?php if(isset($err_msg) and $err_msg) echo '<div class="error">'.$err_msg.'</div>';?>
  <form action="index.php" method="post" class="login">
  <table width="100%">
    <tr>
      <td> Username : </td>
      <td><input type="text" name="user" required /></td>
    </tr>
    <tr>
      <td> Password : </td>
      <td><input type="password" name="pwd" required /></td>
    </tr>
    <tr>
      <td> &nbsp;</td>
      <td><input type="submit" name="sub" value=" Login "/></td>
    </tr>
  </table>   
  </form>
  </fieldset>
  <br /><br />
  Not a user Yet. <a href="register.php"> Register Here</a>
</div>
