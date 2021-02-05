<?php 
session_start();
$id=$_GET['id'];
if (isset($_POST['submit']))
{
  unset($_SESSION['item']); 
  unset($_SESSION['total']);
  header("location:index.php");
}
 
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="signup/css/bootstrap-4.1/bootstrap.min.css">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        font-size: 14px;
        line-height: 1.8;
        color: #222;
        font-weight: 400;
        font-family: 'Montserrat';
        background-image: url("signup/4.jpg")  !important ;
        background-repeat: no-repeat;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        -ms-background-size: cover;
        background-position: center center;
        
      }
        h1 , .order{
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        .order{
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size: 30px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request<br/> we'll be in touch shortly!</p>
        <br>
        <p class="order">Your Order ID : <?php echo $id ?></p>
        <br>
       <form method="post" action="">
         <input type="submit" class="btn btn-outline-success" name="submit"  value="Back To Shop">
       </form >
      </div>
    </body>
</html>