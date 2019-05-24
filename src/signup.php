<?php
  if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){

    $host = 'mysql';
    $user = 'samuel';
    $password = 'samuel123';
    $dbname = 'db_php_web_exam';

    // setup mysql config for PDO

    $conf = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $conn = new PDO($conf, $user, $password);

    // INSERT EXAMPLES

    $userDB = $_POST["name"];
    $emailDB = $_POST["email"];
    $passwordDB = $_POST["password"];
    $hash = password_hash($passwordDB , PASSWORD_BCRYPT, ['cost' => 13]);

    try {
      $sql = 'INSERT INTO user(name, email, password) VALUES(:user, :email, :password)';
      $stmt = $conn->prepare($sql);
      $stmt->execute(['user' => $userDB, 'email' => $emailDB, 'password' => $hash]);

      // echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      //       <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      //       <span aria-hidden="true">&times;</span>
      //       </button>
      //       </div>';

      usleep(300);
      header('Location: http://localhost:8080/');
  
    } catch(PDOException $e) {
      echo 'error';
    }

  }

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
      <h2 class="text-primary">Sign up to the System</h2>
    </header>
    
    <br>

    <section class="container">
      <form class="w-50 mx-auto" method="post" action="/signup.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" id="NameEmail1" aria-describedby="emailHelp" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-outline-primary" href="/" formaction="/">Go back</a>
      </form> 

    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>