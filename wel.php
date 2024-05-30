<?php 
session_start();
if(!isset($_SESSION['logedin']) || ($_SESSION)!=true)
{
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome- <?php $_SESSION['username']?></title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <style>
  .wel{
    
    color:"red"

  }
  .btn{
    text-decoration:none;
  }
</style>
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
      <h1 style="text-align:center;color:red">
  Welcome: <?php echo $_SESSION['username']?>
  !</h1>
  <div class="d-grid gap-2 col-6 mx-auto" >
  <div class="alert alert-success d-flex align-items-center" role="alert" style="text-align:center">
  
 
  
   Login Succsesfully!
  </div>
</div>
  <a href="./home1.html" style="text-decoration: none;">
  <div class="d-grid gap-2 col-6 mx-auto">
   
   <button class="btn btn-danger" type="button" >Click Here for Website!</button>

</div>
  </a>
  

</body>
</html>