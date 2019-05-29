<?php

function getPDO() {
  //Parse .env files to hide sensitive data like passwords
  $env = parse_ini_file('.env');

  //config variables
  $host = $env["host"];
  $user = $env["user"];
  $password = $env["password"];
  $dbname = $env["database"];

  // setup mysql config for PDO
  $conf = 'mysql:host=' . $host . ';dbname=' . $dbname;
  $pdo = new PDO($conf, $user, $password);
  return $pdo;
  }
