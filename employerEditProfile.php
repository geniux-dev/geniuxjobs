

<?php include 'authorizeEmployer.php';?>
<?php
  if(isset($_POST['submit'])){
    include 'connect.php';
  
      
    $sqlE = "select * from employer where id = '$eid' ;";
    
    $EemailUpdate = $_POST['EmEmail'];
    $EnameUpdate = $_POST['Enameupd'];
    $BusinessTypee = $_POST['BusinessTypee'];
    $ETel = $_POST['EmpTel'];
    $EOldPasswordUpdate = $_POST['EOldpassword'];
    $ENewPasswordUpdate = $_POST['ENewPassword'];
    $updateLogo = $_POST['updateLogo'];



    $resultEPass = $conn->query($sqlE);
    if ($resultEPass->num_rows > 0) {
      // output data of each row
       if($rowEPass = $resultEPass->fetch_assoc()) { 
         $CurrentPassword = $rowEPass["password"];

    }}

     
    
    if(empty($EemailUpdate) || empty($EnameUpdate) || empty($ETel)){
        header("Location: index.php?updateError=missingfields");
        exit();
    } else if(!filter_var($EemailUpdate, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?updateError=invalidEmail");
        exit();
    } else if(strlen($ETel) <= 9){
        header("Location: index.php?updateError=phoneNumberIncorrect");
        exit();

    } else if(!empty($EOldPasswordUpdate)){
        if(empty($ENewPasswordUpdate)){
            header("Location: index.php?updateError=newPasswordIsEmpty");
            exit();
        }else if(strlen($ENewPasswordUpdate) <= 5){
            header("Location: index.php?updateError=newPasswordIsShort");
            exit();
        }

        else if ($CurrentPassword != $EOldPasswordUpdate){
            header("Location: index.php?updateError=oldPasswordIncorrect");
            exit();
        }else if($CurrentPassword == $EOldPasswordUpdate){
            if($updateLogo == "UploadNew"){
                $file = $_FILES['logoUpdate'];

                $fileName = $_FILES['logoUpdate']['name'];
                $fileTmpName = $_FILES['logoUpdate'] ['tmp_name'];
                $fileSize = $_FILES['logoUpdate']['size'];
                $fileError = $_FILES['logoUpdate']['error'];
                $fileType = $_FILES['logoUpdate']['type'];
        
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
                            
                            
                            
                             $sqlEU = "UPDATE employer SET businessType = '$BusinessTypee',name = '$EnameUpdate', email = '$EemailUpdate', EmpTel = '$ETel', password='$ENewPasswordUpdate', logo='$fileNameNew' WHERE id = '$eid';";
                              mysqli_query($conn, $sqlEU);
                              header("Location: index.php?updateOk=successful");
                        
                            exit();
        
        
        
        
                        }else{
                        header("Location: index.php?updateError=logoIMGUploadTooBig");
                        exit();
                        }
        
                    }else{
                        header("Location: index.php?updateError=errorWhileUploadingIMG");
                        exit();
                    }
        
                }else{
                    header("Location: index.php?updateError=uploadedIMGfileNotAllowed");
                    exit();
                }
                
            }else if($updateLogo == "KeepExisting"){
                $sqlEU = "UPDATE employer SET businessType = '$BusinessTypee', name = '$EnameUpdate', email = '$EemailUpdate', EmpTel = '$ETel', password='$ENewPasswordUpdate' WHERE id = '$eid';";
                mysqli_query($conn, $sqlEU);
                header("Location: index.php?updateOk=successful");
                exit();
          

            }
           

            
        }
        
    } else if(!empty($ENewPasswordUpdate)){
        if(empty($EOldPasswordUpdate)){
            header("Location: index.php?updateError=oldPasswordIsEmpty");
            exit();
        }

        else if ($CurrentPassword != $EOldPasswordUpdate){
            header("Location: index.php?updateError=oldPasswordIncorrect");
            exit();
        }
        else if($CurrentPassword == $EOldPasswordUpdate){

            if($updateLogo == "UploadNew"){
                $file = $_FILES['logoUpdate'];

                $fileName = $_FILES['logoUpdate']['name'];
                $fileTmpName = $_FILES['logoUpdate'] ['tmp_name'];
                $fileSize = $_FILES['logoUpdate']['size'];
                $fileError = $_FILES['logoUpdate']['error'];
                $fileType = $_FILES['logoUpdate']['type'];
        
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
                            
                            
                            
                             $sqlEU = "UPDATE employer SET businessType = '$BusinessTypee', name = '$EnameUpdate', email = '$EemailUpdate', EmpTel = '$ETel', password='$ENewPasswordUpdate', logo='$fileNameNew' WHERE id = '$eid';";
                              mysqli_query($conn, $sqlEU);
                              header("Location: index.php?updateOk=successful");
                        
                            exit();
        
        
        
        
                        }else{
                        header("Location: index.php?updateError=logoIMGUploadTooBig");
                        exit();
                        }
        
                    }else{
                        header("Location: index.php?updateError=errorWhileUploadingIMG");
                        exit();
                    }
        
                }else{
                    header("Location: index.php?updateError=uploadedIMGfileNotAllowed");
                    exit();
                }
                
            }else if($updateLogo == "KeepExisting"){
                $sqlEU = "UPDATE employer SET businessType = '$BusinessTypee', name = '$EnameUpdate', email = '$EemailUpdate', EmpTel = '$ETel', password='$ENewPasswordUpdate' WHERE id = '$eid';";
                mysqli_query($conn, $sqlEU);
                header("Location: index.php?updateOk=successful");
                exit();
          

            }
            
            
        }
        
    }else{
        
        if($updateLogo == "UploadNew"){
            $file = $_FILES['logoUpdate'];

            $fileName = $_FILES['logoUpdate']['name'];
            $fileTmpName = $_FILES['logoUpdate'] ['tmp_name'];
            $fileSize = $_FILES['logoUpdate']['size'];
            $fileError = $_FILES['logoUpdate']['error'];
            $fileType = $_FILES['logoUpdate']['type'];
    
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
                        
                        
                        
                         $sqlEU = "UPDATE employer SET businessType = '$BusinessTypee', name = '$EnameUpdate', email = '$EemailUpdate', EmpTel = '$ETel', logo='$fileNameNew' WHERE id = '$eid';";
                          mysqli_query($conn, $sqlEU);
                          header("Location: index.php?updateOk=successful");
                    
                        exit();
    
    
    
    
                    }else{
                    header("Location: index.php?updateError=logoIMGUploadTooBig");
                    exit();
                    }
    
                }else{
                    header("Location: index.php?updateError=errorWhileUploadingIMG");
                    exit();
                }
    
            }else{
                header("Location: index.php?updateError=uploadedIMGfileNotAllowed");
                exit();
            }
            
        }else if($updateLogo == "KeepExisting"){
            $sqlEU = "UPDATE employer SET businessType = '$BusinessTypee', name = '$EnameUpdate', email = '$EemailUpdate', EmpTel = '$ETel' WHERE id = '$eid';";
            mysqli_query($conn, $sqlEU);
            header("Location: index.php?updateOk=successful");
            exit();
      

        }
    }


 
  }else{
      header("Location: index.php");
      exit();
  }
       
  ?>