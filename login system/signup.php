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
    <h2 class="title">Signup to continue</h2>

   <div class="form-container">
    <form action="./signup.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>

    <?php
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
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "INSERT INTO login_data(name, email, password) VALUES('$name', '$email', '$password')";

            $res = mysqli_query($conn, $sql);

            if(!$res)
            {
            $error = mysqli_error($conn);
            echo "<script>console.error(`Unable to add data to database: $error`)</script>";
            }

            echo '<button type="button" class="btn btn-primary goto-login-page"><a href="./index.php">Go to login page</a></button>';

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Sign up was successfull.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    ?>
   </div>
  </body>
</html>