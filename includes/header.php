<?php
require_once('lib/sessionOperations.php');
if(!is_user_logged_in()){
  header('location:index.php');
  exit();
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

<h2 id="top">Technical Evaluation Task</h2>
<div class="header">
  <h2>Header</h2>
</div>