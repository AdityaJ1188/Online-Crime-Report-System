<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Complaint!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CrimeReport!</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.html">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./signup.html">Signup</a>
              </li>
              
             
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
     
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
      die("Error" . mysqli_connect_error());
    }



$submit = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $contactNumber = $_POST["contactNo"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $add1 = $_POST["address1"];
    $add2 = $_POST["address2"];
    $city = $_POST["city"];
    
    $country = $_POST["country"];
    $state = $_POST["state"];
    $policeStation = $_POST["policeStation"];
    $complaint = $_POST["complaint"];
  //  echo "test";
    $sql = "INSERT INTO `complaint` (`firstName`, `lastName`, `contactNo`, `email`, `password`, `add1`, `add2`, `city`, `country`, `state`, `policeStation`, `complaint`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, 'ssssssssssss', $firstName, $lastName, $contactNumber, $email, $password, $add1, $add2, $city, $country, $state, $policeStation, $complaint);
    
        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);
    
        if ($result) {
            $submit = true; // Execution successful
        } else {
            $showerror = "Failed to execute the statement"; // Error message for execution failure
        }
    
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $showerror = "Failed to prepare the statement"; // Error message for statement preparation failure
    }

    
    //     $sql = "insert into `complaint` (`firstName`,`lastName`,`contactNo`,`email`,`password`,`add1`,`add2`,`city`,`country`,`state`,`policeStation`,`complaint`) values ('$firstName','$lastName','$contactNumber','$email','$password','$add1','$add2','$city','$country','$state','$policeStation','$complaint')";
    //     // $result = mysqli_query($conn, $sql);
    //     // $num=mysqli_num_rows($result);
    //     $stmt = mysqli_prepare($conn, $sql);
    //      mysqli_stmt_execute($stmt);
    //     if ($result) {
    //        $submit=true;

    //     }
    //  else {
    //     $showerror = "Invalid password!";

    // }

}

?>
 <?php
    if ($submit) {

        echo ' <div class="d-grid gap-2 col-6 mx-auto mt-4">
        <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Succses</h4>
    <p>complaint registered!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
   </div>
   </div>';
    }

    if ($showerror) {

        echo '<div class="d-grid gap-2 col-6 mx-auto mt-4">
        <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error!</h4>'.$showerror.'
    <p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
   </div>
   </div>';
    }



    ?>
     <a href="./home1.html" style="text-decoration: none;">
  <div class="d-grid gap-2 col-6 mx-auto mt-4">
   
   <button class="btn btn-danger" type="button" >Click Here for Website!</button>

</div>
  </a>
  </body>
</html>


