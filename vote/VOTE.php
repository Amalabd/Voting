<?php

include_once("mysql.php");





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>My-Vote-Sys</title>
</head>
<body>



<style>
    body{background:hsl(213deg 85% 97%)};
    text{align:center;};
</style>
    
<nav class="navbar navbar-expand-lg navbar-light .bg-secondary bg-secondary">
        <div class="container-fluid">
          <p class="navbar-brand text-light">--Voting Page--</p>
         

        </div>
      </nav>



<div class="container ">
<div class="row">

<div class="col-6 mt-5">
    
<h2 class="mt-5">Type your e-mail to proceed with voting</h2>

<form action="" method="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label mt-4" for="form2Example1">Email address</label>
    <input type="email" name="mail" placeholder= "Type your E-mail here" class=" form-control col-3" />
    <!---ID NO --->

    <label class="form-label mt-4" for="form2Example1">ID Number</label>
    <input type="number" name="id" placeholder= "Type your ID-No" class=" form-control col-3" />
    
  </div>

  <!-- Submit button -->
  <button type="submit" value="Submit" name= "btn" class="btn btn-secondary btn-block mb-4">Submit</button>

</form>
</div>

<div class="col-6 mt-5">
<img src="voting.png" class="img-fluid" alt="...">
</div>
</div>
</div>

<?php

if(isset($_POST['btn']))
{
  $stmt = mysqli_prepare($conn , "INSERT INTO voters VALUES (?,?)");
  mysqli_stmt_bind_param($stmt, "ss" , $id ,$user);

  $user = filter_input(INPUT_POST , 'mail' , FILTER_SANITIZE_EMAIL);
  $id = $_POST['id'];
  $sql = "INSERT INTO voters (id,emails)
          VALUES ('$id','$user')";

     
  if(filter_var($user, FILTER_VALIDATE_EMAIL)){
    if(mysqli_stmt_execute($stmt)){
    header("Location: select.php");
    }}else{
    echo htmlspecialchars('<script>alert(" XXX NOT VALID EMAIL XXX ");</script>');
  }

  ////////////////////////////////////////////////////////

  $query="SELECT * FROM voters WHERE emails='$user' ";

  $res=mysqli_query($conn,$query);

  if (mysqli_num_rows($res) > 0) {
    
    $row = mysqli_fetch_assoc($res);
    if($user==isset($row['emails']))
    {
            echo htmlspecialchars('<script>alert("you have already voted");</script>');
            
    }
  
  
    }

}
// <script>alert("You have already voted!!")</script>
?>
</body>
</html>