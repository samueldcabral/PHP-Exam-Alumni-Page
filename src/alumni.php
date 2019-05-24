<?php
  $host = 'mysql';
  $user = 'samuel';
  $password = 'samuel123';
  $dbname = 'db_php_web_exam';

  // setup mysql config for PDO
  $conf = 'mysql:host=' . $host . ';dbname=' . $dbname;
  $conn = new PDO($conf, $user, $password);

  // SELECT EXAMPLES
  try {
    $sql = 'SELECT * FROM alumni';
    $stm = $conn->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll();

    // if(password_verify($_POST["password"], $result[0]["password"])){
    //   usleep(300);
    // // header('Location: http://localhost:8080/');
    //   header('Location: alumni.php');
    // }else {
    //   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         <strong>Ooops, wrong password!</strong> please try again.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //         </button>
    //         </div>';
    // }

  } catch(PDOException $e) {
    echo $e->message();
  }

  if(isset($_POST["name"])){
    try {
      $sql = 'INSERT INTO alumni(idalumni, name, email, linkedin, course, campus) VALUES(:idalumni, :user, :email, :linkedin, :course, :campus)';
      $stmt = $conn->prepare($sql);
      $stmt->execute(['idalumni' => date("y-m-d m:i:s"), 'user' => $_POST["name"], 'email' => $_POST["name"], 'linkedin' => $_POST["linkedin"], 'course' => $_POST["course"], 'campus' => $_POST["campus"]]) ;
      
      echo '<div class="alert alert-success" role="alert">
                <strong>Well done!</strong> Great success!
            </div>';

      // usleep(300);\
      // header("Refresh:0");

    } catch(PDOException $e) {
      echo 'error';
    }
  }
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
      <a class="btn btn-outline-primary" href="/" formaction="index.php">Go back</a>
    </header>
    
    <br>

    <section class="container">

      <form class="form-inline" method="post" action="/alumni.php">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control" name="name" id="inlineFormInputName2" placeholder="Name" required>

        <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
        <input type="email" class="form-control ml-2" name="email" id="inlineFormInputGroupUsername2" placeholder="Email" required>
  
        <label class="sr-only" for="inlineFormInputGroupUsername2">Linkedin</label>
        <input type="text" class="form-control ml-2" name="linkedin" id="inlineFormInputGroupUsername2" placeholder="Linkedin" required>

        <select class="form-control ml-2" name="course">
          <option>cstsi</option>
        </select>

        <select class="form-control ml-2" name="campus">
          <option>ifpb-jp</option>
        </select>

        <button type="submit" class="btn btn-primary ml-2 align-items-centfer">Save</button>
      </form>

      <br>

      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Linkedin</th>
            <th>Course</th>
            <th>Campus</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $count = 1;
            foreach($result as $user) {
              echo '<tr>';
              echo '<th scope="row">' . $count . '</th>';
              echo '<td>' . $user["name"] . '</td>';
              echo '<td>' . $user["email"] . '</td>';
              echo '<td><a class="text-dark" href="' . $user["linkedin"] . '">Click Me!</a></td>';
              echo '<td>' . $user["course"] . '</td>';
              echo '<td>' . $user["campus"] . '</td>';
              echo '</a></tr>';
              $count++;
            }
          ?>
        </tbody>
      </table>

    </section>
  </body>
  </html>