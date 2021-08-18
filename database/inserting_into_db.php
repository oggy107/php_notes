<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Inserting into db</title>
  </head>
  <style>
      body {
          margin: 10px;
      }

      button {
          margin: 10px;
      }

      .link-container {
          width: 400px;
          height: 50px;
          margin: auto;
          background: #000;
          border-radius: 5px;
          border: 1px solid #000;
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 20px;
          transition: all 0.3s;
      }

      .link-container:hover {
          background: blueviolet;
          border-color: blueviolet;
      }

      a {
          width: 100%;
          text-align: center;
          font-size: 1.5rem;
          text-decoration: none;
          color: #fff;
          transition: color 0s;
      }

      a:hover {
          color: #fff;
      }
  </style>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      
    <h1>Enter Information</h1>
    <form action="./inserting_into_db.php" method="post">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control">
        <label for="age" class="form-label">Age</label>
        <input type="number" id="age" name="age" class="form-control">
        <label for="skill" class="form-label">Skill</label>
        <input type="text" id="skill" name="skill" class="form-control">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="link-container">
      <a href="./selecting_from_db.php">View Data</a>
    </div>

    <?php
    define("SERVERNAME", "127.0.0.1");
    define("USERNAME", "root");
    define("USERPASS", "");
    define("DATABASE", "db_from_php");

    $conn = mysqli_connect(SERVERNAME, USERNAME, USERPASS, DATABASE);

    if (!$conn)
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>:( Can not connect to database at the moment...</strong>
        </div>';
        die("<script>console.log('Can not connect to database. Exiting php script!')</script>");
    }

    echo "<script>console.log('Connected to database successfully')</script>";

    if($res = mysqli_query($conn, "SELECT DATABASE()"))
    {
        $row_data = $res -> fetch_row()[0];
        echo "<script>console.log('Currently selected database: $row_data')</script>";
    }
    else
    {
        $error = mysqli_error($conn);
        echo "<script>console.warn('[CUSTOM]: Error Occured: $error')</script>";
        die("");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $size = sizeof($_POST);
        echo "<script>console.log('size of post: $size')</script>";

        $name = $_POST["name"];
        $age = $_POST["age"];
        $skill = $_POST["skill"];

        $sql = "INSERT INTO employee (name, age, skill) VALUE ('$name', $age, '$skill')";

        $res = mysqli_query($conn, $sql);

        if(!$res)
        {
            $error = mysqli_error($conn);
            echo "<script>console.warn('[CUSTOM]: Error Occured: $error')</script>";
            die("");
        }

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Data inserted into database successfully</strong>
        </div>';

        echo "<script>console.log('Data inserted into database successfully')</script>";
    }
    ?>
  </body>
</html>
