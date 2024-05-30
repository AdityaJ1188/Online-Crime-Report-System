<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login!</title>
  </head>
  <body>
  <?php
$server = "localhost";
$username = "root";
$password = "";
$database = "rishi";
$conn = mysqli_connect($server, $username, $password, $database);




$login = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = $_POST["username"];
    $password = $_POST["password"];
    
   

    
        $sql = "select * from my where username='$username' && password='$password'";
        $result = mysqli_query($conn, $sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
            $login= true;
          session_start();
          $_SESSION['logedin']=true;
          $_SESSION['username']=$username;

          header("location:wel.php");//for going login page

        }
     else {
        $showerror = "Invalid password!";
    }

}

?>
 <?php
    if ($login) {

        echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Succses</h4>
    <p>Your loged in
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
   </div>';
    }

    if ($showerror) {

        echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error!</h4>'.$showerror.'
    <p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
   </div>';
    }



    ?>
  </body>
</html>


