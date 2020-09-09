<?php

if(isset($_POST['submit'])){
include_once 'dbh.inc.php';
$businessType = mysqli_real_escape_string($conn, $_POST["BusinessType"]);
$name =  mysqli_real_escape_string($conn, $_POST["Empname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["Emppassword"]);
$EmpTel = mysqli_real_escape_string($conn, $_POST["telephone"]);
$region = mysqli_real_escape_string($conn, $_POST["companyprovince"]);
//Error handlers
//Check for empty fields

if(empty($name) || empty($email) || empty($password) || empty($EmpTel)){
header("Location: index.php?employerSignup=empty");
exit();

}

else if(!$businessType == "Private Company" || !$businessType == "Recruitment Agency"){
    header("Location: index.php?employerSignup=ErrorBusinessTypeNotChecked");
    exit();
  }
else if(strlen($password) <= 5){
    header("Location: index.php?employerSignup=ErrorPasswordShort");
    exit();
  }




else{
//Check if input characters are valid
if(strlen($name) < 1 || strlen($email) < 1 || strlen($password) < 1){
    header("Location: index.php?employerSignup=emptyfields");
    exit();
}






else{
    //Check if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?employerSignup=invalid-email");
        exit();
    }else{
        $sql = "SELECT * FROM employer WHERE email='$email'";
        $results = mysqli_query($conn, $sql);
        $resultsCheck = mysqli_num_rows($results);

        if($resultsCheck>0){
         header("Location: index.php?employerSignup=emailtaken");
         exit();
        }else{


            $file = $_FILES['logo'];

            $fileName = $_FILES['logo']['name'];
            $fileTmpName = $_FILES['logo'] ['tmp_name'];
            $fileSize = $_FILES['logo']['size'];
            $fileError = $_FILES['logo']['error'];
            $fileType = $_FILES['logo']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png', 'bmp');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize<5000000){
                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                      $fileDestination = 'uploads/'.$fileNameNew;
                      move_uploaded_file($fileTmpName, $fileDestination);
                      


                         //hashing the password
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        //Insert the EMPLOYER into the database
                        
                        $sql1 = "INSERT INTO employer(businessType,name,region,email, EmpTel, password, logo) VALUES('$businessType','$name','$region','$email','$EmpTel', '$password', '$fileNameNew');";
                        mysqli_query($conn, $sql1);
                        
                        header("Location: index.php?employerSignup=Success");
                        exit();




                    }else{
                    header("Location: index.php?employerSignup=FileTooBig");
                    exit();
                    }

                }else{
                    header("Location: index.php?employerSignup=ErrorUploadingFile");
                    exit();
                }

            }else{
                header("Location: index.php?employerSignup=FileNotAllowed");
                exit();
            }

        }
    }
}
}


}else{
    header('Location: index.php');
    exit();
}

