<?php
  session_start();
  session_destroy();
  // setcookie('auth', false);
  // setcookie('username', false, 10);
  // setcookie('user', false, 10);
  header('Location: index.php');
  