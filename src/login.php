<?php
  session_start();
  require 'config/pdo.php';
  $errArr = [];

  if(isset($_SESSION["auth"])) {
    header('Location: index.php');
  }

  //Check if form has been submitted
  if(isset($_POST["email"]) && isset($_POST["password"])){
  
    // SELECT SQL
    try {
      $pdo = getPDO();    

      // Sanitizing user input
      $emailInput = htmlspecialchars($_POST["email"]);
      $passwordInput = htmlspecialchars($_POST["password"]);

      $sql = 'SELECT * FROM user WHERE email = :email';
      $stm = $pdo->prepare($sql);
      $stm->execute(['email' => $emailInput]);
      $result = $stm->fetchAll();

      if(sizeof($result) == 0) {
        $errArr["err"] = "Email";

      }else{
        if(password_verify($passwordInput, $result[0]["password"])){
          $_SESSION['username'] = $result[0]["name"];
          $_SESSION['auth'] = true;
          usleep(300);
          header('Location: alumni.php');
        }else {
          $errArr["err"] = "Password";
        }
      }

    } catch(PDOException $e) {
      echo $e->message();
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
    <title>Alumni Registry</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="/">Alumni Registry</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item active">
            <?php 
              if(isset($_SESSION["auth"])) {
                echo '<a class="nav-link" href="logout.php" formaction="logout.php">Welcome, ' . $_SESSION["username"] . "!  <strong class='btn btn-outline-light'>Sign Out!</strong></a>";
              }else {
                echo '<a class="nav-link" href="signup.php" formaction="signup.php">What are you waiting for? <strong class="btn btn-outline-light">Sign up!</strong></a>';
              }
            ?>
          </li>
        </ul>
      </div>
    </nav>

    <header class="ml-4 text-center mt-4">
      <h2 class="text-primary">Login with your credentials</h2>
    </header>
    
    <br>

    <section class="container">

      <?php 
        if(sizeof($errArr)) {
          echo '<div class="w-50 mx-auto alert alert-warning alert-dismissible fade show" role="alert">
                <strong>This ' . $errArr["err"] . ' doesn\'t ring a bell!</strong> Register!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                
        }?>
      
      <form class="w-50 mx-auto" method="post" action="/login.php">
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
        <a class="btn btn-outline-primary" href="signup.php" formaction="signup.php">Sign up</a>
      </form> 
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>