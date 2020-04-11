<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> Percentage Calculator </title>
   
    <style>
    @media screen and (min-width: 601px) {
  h1.t1 {
    font-size: 70px;
  }
}
    @media screen and (max-width: 500px) {
  h1.t1 {
    font-size: 30px;
  }
}
        .t1{
            text-align:center;
            padding:0 1.5px;
            }
            table,th,td{
                border:1px solid blue;
            }
            tr:hover {background-color: #f4f4f4;}
            th, td {
  padding: 15px;
  text-align: left;
}
        .shadow_box{
          box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
          border:1px solid grey;
          border-radius: 25px;
        }
            table {
    display: table;
    border-collapse: separate;
    border-spacing: 3px;
    border-color: black;
        }
                </style>
</head>
<body bgcolor="#E6E6FA">
    <center>
      <h3 class="t1" style="margin: 10px 0px 10px 0px;"> Percentage Calculator</h3>
    <div class="container col-md-5">
      <div class="shadow_box">
        
        <div class="row justify-content-md-center" style="padding-top:10px;padding-bottom:10px;">
          <form id="form1" name="form1" method="post" >
              <div class="form-group row">
                  <label for="stdid">Registration No</label>
                  <input type ="number" name="stdid" id="stdid" class="form-control" placeholder="Regitration no." style="margin-left:10px;width:200px !important;"><br>
              </div>
              <div class="form-group row">
           			  <label for="stname">Student Name</label> 
                  <input type="text" name="stname" id="stname" placeholder="Name" class="form-control" style="margin-left:20px;width:200px;" required ><br>
              </div>
              <div class="form-group row">
                  <label for="ECE">ECE</label> 
                  <input type="number" name="ECE" id="ECE" class="form-control" placeholder="ECE marks" min="0" max="100" style="margin-left:95px;width:200px;" required><br>
              </div>
              <div class="form-group row">
       	          <label for="C">C</label> 
                  <input type="number" name="C" id="C" class="form-control" placeholder="C marks" min="0" max="100" style="margin-left:110px;width:200px;"required><br>
              </div>
              <div class="form-group row">
       	          <label for="Chemistry">Chemistry</label> 
                  <input type="number" name="Chemistry" id="Chemistry" class="form-control" placeholder="Chemistry marks" min="0" max="100"style="margin-left:50px;width:200px;" required><br>
              </div>
              <div class="form-group row">
       	          <label for="Java">Java</label>
                  <input type="number" name="Java" id="Java"  class="form-control" placeholder="Java marks" min="0" max="100"style="width:200px;margin-left:90px;" required><br>
              </div>
              <input type="submit" name="submit"class="btn btn-success" id="button" value="Submit">
              <input type="reset"  name="reset"class="btn btn-primary"  id="button" value="Reset">
          
      	</form>
      </div>
    </div>
  </div>
  </center>
</body>
</html>
<?php
$dbhost = "localhost";
$dbname = 'new1';
$dbusername = 'root';
$dbpass = '';
   $con=mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);
   if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error($con));
}
if (isset($_POST['submit'])){
   
    $stdid=$_POST['stdid'];
    $stname=$_POST['stname'];
    $ECE=$_POST['ECE'];
    $C=$_POST['C'];
    $Chemistry=$_POST['Chemistry'];
    $Java=$_POST['Java'];
    $total=$ECE+$C+$Chemistry+$Java;
    $percentage=floatval(($total)/4);
   if ($percentage >= 90 && $percentage<=100) 
   { 
       $grade = 'A'; 
   }
   else
   { 
       if ($percentage >= 80 && $percentage <= 89) 
       { 
           $grade = 'B'; 
       } 
       else 
       { 
           if ($percentage >= 60 && $percentage <= 79) 
           { 
               $grade = 'C'; 
           } 
           else 
           { 
               if ($percentage >= 33 && $percentage <= 59)  
               { 
                   $grade = 'D'; 
               } 
               else {
               if($percentage<=33)
               { 
                   $grade = 'F'; 
               }
               else {
                   if($percentage>100){
                       echo "wrong credentall". die("value have to enter wrong").mysqli_error($con)."<br>";
                       echo "enter the valid marks"."<br>";
                       
                   }
               }

               }

               }
              }
          } 

$sql= "INSERT INTO record_student_marks(stdid, stname, ECE, C, Chemistry, Java,percenatge,grade, dt) VALUES ('$stdid','$stname','$ECE','$C','$Chemistry','$Java','$percentage','$grade', current_timestamp());";
$run=mysqli_query($con,$sql);
if($run == true){
    echo "data inserted successfully";
}
else{
    echo "error";
} 
}
?>
