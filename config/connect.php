<?php 
  $connect = mysqli_connect('localhost', 'root', '', 'books');
  if(!$connect) {
    die('Ошибка подкючения к БД');
  }
?>