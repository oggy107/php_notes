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

    <h1 class="title">Change password</h1>

    <div class="form-container">
      <form action="./updatepass.php" method="post">
          <div class="mb-3">
              <label for="password" class="form-label">Enter new password</label>
              <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
              <label for="password-reenter" class="form-label">Re-Enter new password</label>
              <input type="password" class="form-control" id="password-reenter" name="password_reenter">
          </div>
          <div class="btn-container">
            <button type="submit" class="btn btn-primary">Change password</button>
            <button type="button" class="btn btn-primary goto-login-page"><a href="./index.php">Login page</a></button>
          </div>
      </form>
    </div>
    


    <?php
      session_start();
      define("SERVERNAME", "localhost");
      define("USERNAME", "root");
      define("USERPASS", "");
      define("DATABASE", "user_data");

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
        $email = $_SESSION["email"];
        $password = $_POST["password"];
        $password_reenter = $_POST["password_reenter"];

        if($password != $password_reenter)
        {
            echo "<h1>Passwords do no match</h1>";
            die();
        }

        $sql = "UPDATE login_data SET password='$password' WHERE email='$email'";

        $res = mysqli_query($conn, $sql);

        if(!$res)
        {
          $error = mysqli_error($conn);
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Unable to update your password at the moment.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          echo "<script>console.error(`Unable to update your password: $error`)</script>";
          die();
        }

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your password was updated sucessfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    ?>
  </body>
</html>