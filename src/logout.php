<?php
  setcookie('auth', false);
  setcookie('username', false, 10);
  setcookie('user', false, 10);
  header('Location: index.php');
  