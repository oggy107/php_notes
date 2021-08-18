<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Selecting from database</title>
  </head>
  <style>
      body {
          margin: 20px;
      }

      .table-container {
          width: 70%;
          margin: auto;
          border-radius: 10px;
          box-shadow: rgba(50, 50, 93, 0.25) 5px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;      }

      .title {
          text-align: center;
          margin-bottom: 50px;
      }

      .empty {
          text-align: center;
          color: #b5aa62;
      }

      .link-container {
          width: 50%;
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

      @media only screen and (max-width: 600px){
          a {
              font-size: 1rem;
              color: pink;
          }
      }
  </style>
  <body>
    <h1 class="title">Selecting and displaying data from database</h1>  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
    <?php
        define("SERVERNAME", "localhost");
        define("USERNAME", "root");
        define("USERPASS", "");
        define("DATABASE", "db_from_php");

        $conn = mysqli_connect(SERVERNAME, USERNAME, USERPASS, DATABASE);

        if(!$conn)
            die("Can not connect to database at the moment!. Exiting script");

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

        $sql = "SELECT name, age, skill FROM employee";

        $res = mysqli_query($conn, $sql);
        
        if(!$res)
        {
            $error = mysqli_error($conn);
            echo "<script>console.warn('[CUSTOM]: Error Occured: $error')</script>";
            die("");
        }

        $data = $res -> fetch_all();

        if(!sizeof($data))
        {
            echo "<h2 class='empty'><i class='far fa-frown'></i> Database is currently empty!</h2>";
            echo "<div class='link-container'><a href='./inserting_into_db.php'>Insert into database</a></div>";
            die();
        }

        echo '
        <div class="table-container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Skill</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($data as $key => $value) {
            echo "<tr>";
            foreach ($value as $key => $inner_value) {
                echo "<td>$inner_value</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>
            </table>
        </div>";
        echo "<div class='link-container'><a href='./inserting_into_db.php'>Insert into database</a></div>";

    ?>
  </body>
</html>