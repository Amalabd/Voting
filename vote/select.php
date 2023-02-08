<?php

include_once("mysql.php");





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>My-Vote-Sys</title>
</head>
<body>



<style>
    body{background:hsl(213deg 85% 97%)};
   

</style>
<div id="app">
    
<nav class="navbar navbar-expand-lg navbar-light .bg-secondary bg-secondary ">
        <div class="container-fluid">
          <p class="navbar-brand text-light">--Voting Page--</p>
         

        </div>
      </nav>

<div class="container"><h1 class="m-5">Here you can select your best candidate!!</h1></div>

<!---------->

<div class="container mt-5 border bg-white rounded-3 shadow  " style="height:auto; width:fix-content;">
<div class="row justify-content-md-center p-5 " >

<!------->
<div class="card  bg-light col-lg-2 col-sm-10 align-items-center shadow" style="margin-right:30px;  margin-bottom:30px">
  <img src="person.png" class="card-img-top rounded-circle border shadow " alt="..." style="width:150px;hight:100px">
  <div class="card-body">
    <h5 class="card-title">Profile 1</h5>
    <p class="card-text">This is a brief introduction about me and a detailed program for my plan when I win this election.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rating</li>

  </ul>
  
  <div class="card-body am">
 
  <a href="#" class="fa fa-star s1 star" :value="a1"  @click="rate1() , handleClick()"  v-model="tot1" :style="{
        
        color: active ? ' #FFD700' : '#aaa',
      }"></a>
  <a href="#" class="fa fa-star s2 star" :value="b1" @click="rate2() , handleClick2()"  v-model="tot1" :style="{
        
        color: active2 ? ' #FFD700' : '#aaa',
      }"></a> 
  <a href="#" class="fa fa-star s3 star" :value="c1" @click="rate3() , handleClick3()"  v-model="tot1" :style="{
        
        color: active3 ? ' #FFD700' : '#aaa',
      }"></a>
  
  </div>
</div>
<!------------------------->
<div class="card  bg-light  col-lg-2 col-sm-10 align-items-center shadow" style="margin-right:30px;  margin-bottom:30px">
  <img src="person2.png" class="card-img-top rounded-circle border shadow " alt="..." style="width:150px;hight:100px">
  <div class="card-body">
    <h5 class="card-title">Profile 2</h5>
    <p class="card-text">This is a brief introduction about me and a detailed program for my plan when I win this election.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rating</li>

  </ul>
  <div class="card-body">

  <a href="#" class="fa fa-star s1 star" :value="a2"  @click="rate4() , handleClick4()"  v-model="" :style="{
        
        color: active4 ? ' #FFD700' : '#aaa',
      }"></a>
  <a href="#" class="fa fa-star s2 star" :value="b2" @click="rate5() , handleClick5()"  v-model="" :style="{
        
        color: active5 ? ' #FFD700' : '#aaa',
      }"></a> 
  <a href="#" class="fa fa-star s3 star" :value="c2" @click="rate6() , handleClick6()"  v-model="" :style="{
        
        color: active6 ? ' #FFD700' : '#aaa',
      }"></a>

  </div>
</div>
<!------------------------->

<div class="card  bg-light col-lg-2 col-sm-10 align-items-center shadow" style="margin-right:30px; margin-bottom:30px">
  <img src="person.png" class="card-img-top rounded-circle border shadow " alt="..." style="width:150px;hight:100px">
  <div class="card-body">
    <h5 class="card-title">Profile 3</h5>
    <p class="card-text">This is a brief introduction about me and a detailed program for my plan when I win this election.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rating</li>

  </ul>
  <div class="card-body">
  <a href="#" class="fa fa-star s1 star" :value="a3"  @click="rate7() , handleClick7()"  v-model="" :style="{
        
        color: active7 ? ' #FFD700' : '#aaa',
      }"></a>
  <a href="#" class="fa fa-star s2 star" :value="b3" @click="rate8() , handleClick8()"  v-model="" :style="{
        
        color: active8 ? ' #FFD700' : '#aaa',
      }"></a> 
  <a href="#" class="fa fa-star s3 star" :value="c3" @click="rate9() , handleClick9()"  v-model="" :style="{
        
        color: active9 ? ' #FFD700' : '#aaa',
      }"></a>

  </div>
</div>
<!--------------------->

<div class="card  bg-light  col-lg-2 col-sm-10 align-items-center shadow" style=" margin-bottom:30px">
  <img src="person2.png" class="card-img-top rounded-circle border shadow " alt="..." style="width:150px;hight:100px">
  <div class="card-body">
    <h5 class="card-title">Profile 4</h5>
    <p class="card-text">This is a brief introduction about me and a detailed program for my plan when I win this election.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rating</li>

  </ul>
  <div class="card-body">
  <a href="#" class="fa fa-star s1 star" :value="a4"  @click="rate10() , handleClick10()"  v-model="" :style="{
        
        color: active10 ? ' #FFD700' : '#aaa',
      }"></a>
  <a href="#" class="fa fa-star s2 star" :value="b4" @click="rate11() , handleClick11()"  v-model="" :style="{
        
        color: active11 ? ' #FFD700' : '#aaa',
      }"></a> 
  <a href="#" class="fa fa-star s3 star" :value="c4" @click="rate12() , handleClick12()"  v-model="" :style="{
        
        color: active12 ? ' #FFD700' : '#aaa',
      }"></a>
  

  </div>
</div>
<!--------------------->
<div class="row mt-3">
<h5 class=" col-10 text-danger"> **Please note that you can give only a maximum of 3 stars for all candidates!!</h5>

<!------------------>

<form method="post" action="" class=" col-2">
        <!-- Hidden input to store email -->
        <input type="hidden" name="profile1" :value="tot1" >
        <input type="hidden" name="profile2" :value="tot2">
        <input type="hidden" name="profile3" :value="tot3">
        <input type="hidden" name="profile4" :value="tot4">
        <button type="submit" value="Submit" name= "btn2" 
        class="btn btn-secondary btn-block mb-4 ">Submit</button>
    </div>
</div>
</div>






<?php
if(isset($_POST['btn2']))
{
  $can1 = $_POST['profile1'];
  $can2 = $_POST['profile2'];
  $can3 = $_POST['profile3'];
  $can4 = $_POST['profile4'];
  $all = $can1 + $can2+ $can3+ $can4 ;
  $sql = "INSERT INTO candidates (Can1,Can2,Can3,Can4)
     VALUES ('$can1', '$can2', '$can3', '$can4')";
  if ($all > 3 || $all < 1){
    echo '<script>alert("Please give a maximum of 3 stars!!")</script>';
    }elseif(mysqli_query($conn, $sql)){
      
    echo '<script>alert("Thanks for Participating");
    window.location.href="VOTE.php";</script>';
    
  }
  
  
    }




?>
</div>
<style>
 
a {font-size: 4em;
  color: #aaa;
  text-decoration: none;
  margin: 4px;};


</style>  
<script src="./vote.js"></script>
</body>
</html>