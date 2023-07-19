<?php


function add_student($name,$college_name,$department,$gpa){
    global $con;
    $stmt = $con->prepare("INSERT INTO student(name,college_name,department,gpa) value(?,?,?,?)");
    $stmt->execute(array($name,$college_name,$department,$gpa));

 

    
    echo 
    
    "<script>
        toastr.success( 'تم اضافة الطالب بنجاح')
    </script>";
    header("Refresh:3;url=index.php"); 
}



function delete_with_id($table,$id){
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE id=?");
    $stmt->execute(array($id));


    header('location:index.php');
}



function get_all_data($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    $students= $stmt->fetchAll();
    return $students;
}

?>