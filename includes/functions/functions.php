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



function register($name,$email,$passwrd){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(name,email,password) value(?,?,?)");
    $stmt->execute(array($name,$email,$passwrd));
 

    echo "
    <script>
        toastr.success('تم بنجاح :- تم اضافة المستخدم بنجاح')
    </script>";
    header("Refresh:3;url=signin.php"); 
}


 
function login($email,$passwrd){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    $user_data = $stmt->fetch();
    $row_count = $stmt->rowCount();
    if($row_count > 0){
        // if(sha1($passwrd) == $user_data['password']){
        if(password_verify($passwrd,$user_data['password'])){
            @session_start();
            $_SESSION['id']    = $user_data['id'];
            $_SESSION['name']  = $user_data['name'];
            $_SESSION['email']  = $user_data['email'];
            echo "
            <script>
                toastr.success('تم بنجاح :- تم تسجيل الدخول')
            </script>";
            header("Refresh:3;url=index.php");
        }else{
            echo "
            <script>
                toastr.error('كلمة السر ')
            </script>";
        }
    }else{
        echo "
            <script>
                toastr.error('البريد الالكتروني غير صحيح')
            </script>";
    }
 

}
?>