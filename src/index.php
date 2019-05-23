<?php

  $host = 'mysql';
  $user = 'samuel';
  $password = 'samuel123';
  $dbname = 'db_php_web_exam';

  // setup mysql config for PDO
  $conf = 'mysql:host=' . $host . ';dbname=' . $dbname;
  $conn = new PDO($conf, $user, $password);

  // INSERT EXAMPLES
  
  // $stm = $conn->query("select * from user;");
  // var_dump($stm->fetchAll());
  // insert example
  $userDB = 'abaa cabral ';
  $emailDB = 'samuel@samuel.dev';
  $passwordDB = "ehuiehueh";
  $hash = password_hash($passwordDB , PASSWORD_BCRYPT, ['cost' => 13]);

  // $sql = 'INSERT INTO user(name, email, password) VALUES(:user, :email, :password)';
  // $stmt = $conn->prepare($sql);
  
  // Connect to database
  // try {
    // $stmt->execute(['user' => $userDB, 'email' => $emailDB, 'password' => $hash]);

  // } catch(PDOException $e) {
  //   echo 'error';
  // }

 // check if passwords match
//  if(password_verify("ehuiehueh", $hash)) {
//    echo "<br> passwords match!";
//  }
//   echo '<br>Stmt executed successfully';

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/litera/bootstrap.min.css" rel="stylesheet" integrity="sha384-D/7uAka7uwterkSxa2LwZR7RJqH2X6jfmhkJ0vFPGUtPyBMF2WMq9S+f9Ik5jJu1" crossorigin="anonymous">
    <title>Document</title>
  </head>
  <body>
    <header class="ml-4">
    <h1>Login</h1>
    </header>
    <section class="container">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form> 
    
    </section>
  </body>
  </html>