<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>login system</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <h1 class="title">Welcome to website :)</h1>
    <h2 class="title">Login to continue</h2>

   <div class="form-container">
    <form action="./index.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="btn-container">
          <button type="submit" class="btn btn-primary">Login</button>
          <button type="button" class="btn btn-primary"><a href="./signup.php">Sign up</a></button>
        </div>
    </form>

    <?php
      define("SERVERNAME", "localhost");
      define("USERNAME", "root");
      define("USERPASS", "");

      $conn = mysqli_connect(SERVERNAME, USERNAME, USERPASS);

      if(!$conn)
      {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical problems. Sorry for the inconvenience.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        echo "<script>console.error('Unable to connect to database at the moment :(')</script>";
        die();
      }

      echo "<script>console.log('Connected to database successfully')</script>";
      
      if(!mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS User_data"))
      {
        $error = mysqli_error($conn);
        echo "<script>console.error(`Unable to create database: $error`)</script>";
      }

      mysqli_select_db($conn, "User_data");

      if(!mysqli_query($conn, "CREATE TABLE IF NOT EXISTS login_data (sno INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30), email VARCHAR(50), password VARCHAR(25))"))
      {
        $error = mysqli_error($conn);
        echo "<script>console.error(`Unable to create table: $error`)</script>";
      }

      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM login_data WHERE email='$email'";

        $res = mysqli_query($conn, $sql);

        if(!$res)
        {
          $error = mysqli_error($conn);
          echo "<script>console.error(`Unable to retrive data from database: $error`)</script>";
          die();
        }

        $data = $res -> fetch_all(MYSQLI_ASSOC);

        if(!$data)
        {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> Please recheck your email!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          die();
        }

        $entered_password = $data[0]["password"];
        $name = $data[0]["name"];

        if($password != $entered_password)
        {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> Please recheck your password!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          die();
        }

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Welcome back ' . $name . '.' . '  
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

        echo '<button type="button" class="btn btn-primary"><a href="./updatepass.php?email=' . $email . '">Change password</a></button>';
      }
    ?>
   </div>
  </body>
</html>