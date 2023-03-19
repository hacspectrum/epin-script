<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=asset_url('admin/ionicons.min.css')?>">

  <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

  <title>Admin</title>

</head>
<body>

<?php
  if(defined("LOGGED_IN")){
    require view("admin/static/navbar");
  }
?>
