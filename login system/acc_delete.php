<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Delete Account</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      
    <h1 class="title">Delete Account</h1>

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

        $email = $_SESSION["email"];

        if(!mysqli_query($conn, "DELETE FROM login_data WHERE email='$email'"))
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Sorry. We are unable to delete your account at the moment.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              $error = mysqli_error($conn);
              echo "<script>console.error(`Unable to delete account: $error`)</script>";
              die();
        }

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account was deleted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    ?>
    
    <div class="btn-container">
        <button type="button" class="btn btn-primary goto-login-page"><a href="./index.php">Login page</a></button>
    </div>

  </body>
</html>