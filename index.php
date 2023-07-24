<?php
session_start();
$page_title = "All Students";
$css_file = 'style.css';
if(isset($_SESSION['name'])){

include("./includes/template/header.php");
require_once("./connect_db.php");
require("./includes/functions/functions.php");

?> 

<div class="container mt-5" >
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">College_name</th>
      <th scope="col">Department</th>
      <th scope="col">Gpa</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php 
 
  $students=get_all_data('student');
   foreach($students as $student){ ?>
    <tr>
      <td><?php echo $student['id']?></td>
      <td><?php echo $student['name']?></td>
      <td><?php echo $student['college_name']?></td>
      <td><?php echo $student['department']?></td>
      <td><?php echo $student['gpa']?></td>
      <td><a class="btn btn-danger" href="delete.php?stu_id=<?php echo $student['id']?>">Delete</a></td>
    </tr>
   
    <?php  }  ?>

  </tbody>
</table>


<a href="add_student.php">Add student</a>
<a href="logout.php">logout</a>
</div>


<?php 
include('./includes/template/footer.php');
}else{
  header('location:signin.php');
}

?>























 
    
