<?php 
 session_start();
$page_title = "Add Student";
$css_file = 'style.css';
if(isset($_SESSION['name'])){
  
include("./includes/template/header.php");
require_once("./connect_db.php");
require("./includes/functions/functions.php");

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $name   = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $college_name  = filter_var($_POST['college_name'],FILTER_SANITIZE_STRING);
    $department   = filter_var($_POST['department'],FILTER_SANITIZE_STRING);
    $gpa = filter_var($_POST['gpa'],FILTER_SANITIZE_NUMBER_FLOAT);
    

    add_student($name,$college_name,$department,$gpa);
  }

?>


<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
<div class="container mt-5">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">college_name</label>
    <input type="text" name="college_name" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">department</label>
    <input type="text" name="department" class="form-control">
  </div>


  <div class="mb-3">
    <label class="form-label">gpa</label>
    <input type="num" name="gpa" class="form-control">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

<?php 

include_once("./includes/template/footer.php");

}else{
  header('location:signin.php');
}
 
 ?>