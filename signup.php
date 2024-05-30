<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Signup!</title>
  </head>
  <body>
  <?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "rishi";
  $conn = mysqli_connect($server, $username, $password, $database);

  if (!$conn) {
//         echo "succses";
//  }
//  else
//  {
    die("Error1" . mysqli_connect_error());
  }


  $showAlert = false;
  $showerror = false;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    $existsql = "SELECT * FROM `my` WHERE username='$username'";//check whether username exists
  
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
      $exists = true;
      $showerror = "username already exist!";
    } else {
      // $exist=false;
  

      if (($password == $cpassword) && $exists==false) {
        $sql = "INSERT INTO `my` ( `username`, `password`,`cpassword`) VALUES ( '$username', '$password','$cpassword')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $showAlert = true;
          $exist=false;
        }
      } else {
        $showerror = "Password does not match! ";
        // $showerror=true;
      }
    }
  }

  ?>


    <?php
    if ($showAlert) {

      echo '    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Succses</h4>
    <p>Your Account is susssesfully created
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
   </div>';
    }

    if ($showerror) {

      echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error!</h4>' . $showerror . '
    <p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
   </div>';
    }



    ?>
  </body>
</html>

