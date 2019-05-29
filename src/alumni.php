<?php
  session_start();
  require 'config/pdo.php';

  //If user is not logged in, redirect to main page
  if(!isset($_SESSION["auth"]) || $_SESSION["auth"] == false) {
    header('Location: http://localhost:8080/index.php');
  }

  // SELECT SQL
  try {
    //get pdo from config/pdo.php
    $pdo = getPDO();

    $sql = 'SELECT * FROM alumni';
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll();

  } catch(PDOException $e) {
    echo $e;
  }

  if(isset($_POST["name"])){

    try {

      //Sanitizing user input
      $idInput = htmlspecialchars($_POST["id"]);
      $nameInput = htmlspecialchars($_POST["name"]);
      $emailInput = htmlspecialchars($_POST["email"]);
      $profileInput = htmlspecialchars($_POST["linkedin"]);
      $courseInput = htmlspecialchars($_POST["course"]);
      $campusInput = htmlspecialchars($_POST["campus"]);
      
      // echo $idInput . " : " . $nameInput;
      //INSERT SQL
      $sql = 'INSERT INTO alumni(idalumni, name, email, profile, course, campus) VALUES(:idalumni, :user, :email, :profile, :course, :campus)';
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['idalumni' => $idInput , 'user' => $nameInput, 'email' => $emailInput, 'profile' => $profileInput, 'course' => $courseInput, 'campus' => $campusInput]) ;
      
      echo '<div class="alert alert-success" role="alert">
                <strong>Well done!</strong> Great success!
            </div>';

      usleep(300);
      echo("<meta http-equiv='refresh' content='1'>");

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
            <a class="nav-link" href="logout.php" formaction="logout.php">Ready to leave, <?php echo $_SESSION["username"] ?>? <strong class="btn btn-outline-light">Sign Out!</strong></a>
          </li>
        </ul>
      </div>
    </nav>

    <header class="ml-4 text-center mt-4">
      <h2 class="text-primary font-weight-bold">Check out our Alumni!</h2>
    </header>
    
    <br>

    <section class="container">

      <h4 class="mb-4 text-primary">Register a new Alumnus!</h4>

      <form class="form-inline" method="post" action="/alumni.php">
        <label class="sr-only" for="inlineFormInputName2">Id</label>
        <input type="text" class="form-control mb-2" name="id" id="inlineFormInputName2" placeholder="Id">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control ml-2 mb-2" name="name" id="inlineFormInputName2" placeholder="Name" required>
        <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
        <input type="email" class="form-control ml-2 mb-2" name="email" id="inlineFormInputGroupUsername2" placeholder="Email" required>
        <label class="sr-only" for="inlineFormInputGroupUsername2">Linkedin</label>
        <input type="text" class="form-control ml-2 mb-2" name="linkedin" id="inlineFormInputGroupUsername2" placeholder="Linkedin" required>
        
        <div class="mx-auto">
        
        <select class="form-control" name="course">
          <option>cstsi</option>
        </select>
        <select class="form-control ml-2" name="campus">
          <option>ifpb-jp</option>
        </select>

        <button type="submit" class="btn btn-primary ml-2 align-items-centfer">Save</button>
        
        </div>
      </form>

      <br>
      <hr>

      <h4 class="mb-4 text-primary">List of all alumni...</h4>

      
      <div class="row mx-auto">
      <?php 
        foreach($result as $user) {
          echo '<div class="card .col-md-4 m-2" style="width: 240px;">';
          
          $filename = __DIR__ . '/img/' . $user["idalumni"] . '.jpg';

          if(file_exists($filename)) {
            echo '<img src="http://localhost:8080/img/' . $user["idalumni"] . '.jpg" class="card-img-top" alt="' . $user["name"]. '">';
  
          } else {
            echo '<img src="http://localhost:8080/img/placeholder.jpg" class="card-img-top" alt="a' . $user["name"]. '">';
          }
          echo '<div class="card-body">';
          echo '<h5 class="card-title" style="height:70px!important; min-height:70px!important;">' . $user["name"] . '</h5>';
          echo '<a href="' . $user["profile"]. '" class="btn btn-primary">Go to Profile</a>';
          echo '</div>';
          echo '</div>';
        }
      ?>
      </div>
    </section>
  </body>
  </html>