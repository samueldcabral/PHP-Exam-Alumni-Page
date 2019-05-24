<?php

  // $host = 'mysql';
  // $user = 'samuel';
  // $password = 'samuel123';
  // $dbname = 'db_php_web_exam';

  // setup mysql config for PDO
  // $conf = 'mysql:host=' . $host . ';dbname=' . $dbname;
  // $conn = new PDO($conf, $user, $password);

  // INSERT EXAMPLES
  
  // $stm = $conn->query("select * from user;");
  // var_dump($stm->fetchAll());
  // insert example
  // $userDB = 'abaa cabral ';
  // $emailDB = 'samuel@samuel.dev';
  // $passwordDB = "ehuiehueh";
  // $hash = password_hash($passwordDB , PASSWORD_BCRYPT, ['cost' => 13]);

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
    <header class="ml-4 text-center mt-4">
      <h2 class="text-primary">Check out our Alumni!</h2>
    </header>
    
    <br>

    <section class="container">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Campus</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Andreza de Sousa Vieira</td>
            <td>andreza_sv@yahoo.com.br</td>
            <td>cstsi</td>
            <td>ifpb-jp</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Gustavo Cavalcanti</td>
            <td>Gustavo@Gustavo.com</td>
            <td>cstsi</td>
            <td>ifpb-jp</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Jonathas Santos de Lacerda</td>
            <td>Jonathas@jonathas.com</td>
            <td>cstsi</td>
            <td>ifpb-jp</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Luiz Carlos Rodrigues Chaves</td>
            <td>lucachaves@gmail.com</td>
            <td>cstsi</td>
            <td>ifpb-jp</td>
          </tr>
        </tbody>
      </table>
      <a class="btn btn-primary" href="/" formaction="index.php">Go back</a>
    </section>
  </body>
  </html>