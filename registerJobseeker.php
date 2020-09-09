<?php

if(isset($_POST['submit'])){
include_once 'dbh.inc.php';

$name = $_POST["Seekername"];
$last = $_POST["Seekerlast"];
$email = $_POST["email"];
$password = $_POST["Seekerpassword"];
$qlf = $_POST["qlf"];
$dob = $_POST["dob"];
$cell = $_POST["cellnumber"];
$gender = $_POST["gender"];
//Error handlers
//Check for empty fields

if(empty($name) || empty($last) || empty($email) || empty($password) || empty($qlf) || empty($dob) || empty($cell)){
header("Location: index.php?seekerSignup=empty");
exit();

}

else if(strlen($password) <= 5){
    header("Location: index.php?seekerSignup=ErrorPasswordShort");
    exit();
}else if(!$gender == "Male" || !$gender == "Female"){
    header("Location: index.php?seekerSignup=ErrorgenderNotSelected");
    exit();
  }




else{
//Check if input characters are valid
if(strlen($name) < 1 || strlen($last) < 1 || strlen($email) < 1 || strlen($password) < 1 || strlen($qlf) < 1 || strlen($dob) < 1 || strlen($cell) < 1){
    header("Location: index.php?seekerSignup=emptyfields");
    exit();
}






else{
    //Check if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?seekerSignup=invalidEmail");
        exit();
    }else{
        $sql = "SELECT * FROM seeker WHERE email='$email'";
        $results = mysqli_query($conn, $sql);
        $resultsCheck = mysqli_num_rows($results);

        if($resultsCheck>0){
         header("Location: index.php?seekerSignup=emailtaken");
         exit();
        }else{


            $file = $_FILES['resume'];

            $fileName = $_FILES['resume']['name'];
            $fileTmpName = $_FILES['resume'] ['tmp_name'];
            $fileSize = $_FILES['resume']['size'];
            $fileError = $_FILES['resume']['error'];
            $fileType = $_FILES['resume']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('pdf','doc','docx','rtf','txt','text');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize<5000000){
                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                      $fileDestination = 'uploadedResume/'.$fileNameNew;
                      move_uploaded_file($fileTmpName, $fileDestination);
                      


                         //hashing the password
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        //Insert the EMPLOYER into the database
                        
                        
                        
                        $sql2 = "INSERT INTO seeker (name,lastname,email,password,desiredjob,dob,cellnumber,gender,resume)
                        VALUES ('$name','$last', '$email', '$password','$qlf', '$dob', '$cell','$gender','$fileNameNew')";
                        mysqli_query($conn, $sql2);
                        header("Location: index.php?seekerSignup=Success");
                        exit();




                    }else{
                    header("Location: index.php?seekerSignup=FileTooBig");
                    exit();
                    }

                }else{
                    header("Location: index.php?seekerSignup=ErrorUploadingFile");
                    exit();
                }

            }else{
                header("Location: index.php?seekerSignup=FileNotAllowed");
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

