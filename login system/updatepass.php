<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Change password</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <h1>Change password</h1>

    <form action="./updatepass.php" method="post">
        <div class="mb-3">
            <label for="password" class="form-label">Enter new password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password-reenter" class="form-label">Re-Enter new password</label>
            <input type="password" class="form-control" id="password-reenter" name="password_reenter">
        </div>
        <button type="submit" class="btn btn-primary">Change password</button>
    </form>

    <?php
      define("SERVERNAME", "localhost");
      define("USERNAME", "root");
      define("USERPASS", "");
      define("DATABASE", "user_data");

      $email = $_GET["email"];
      echo var_dump($_GET);
      echo $email;

      $conn = mysqli_connect(SERVERNAME, USERNAME, USERPASS, DATABASE);

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

      
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        echo $email . "<br>";

        $password = $_POST["password"];
        $password_reenter = $_POST["password_reenter"];

        if($password != $password_reenter)
        {
            echo "<h1>Passwords do no match</h1>";
            die();
        }

        $sql = "UPDATE SET password='$password' WHERE email='$email'";

        $res = mysqli_query($conn, $sql);

        if(!$res)
        {
          $error = mysqli_error($conn);
          echo "<script>console.error(`Unable to update your password: $error`)</script>";
          die();
        }

        echo "<h1>password updated successfully</h1>";
      }
    ?>
  </body>
</html>