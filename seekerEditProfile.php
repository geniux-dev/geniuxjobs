

<?php include 'authorizeSeeker.php';?>
<?php
  if(isset($_POST['submit'])){
    include 'connect.php';
  
      
    $sqlS = "select * from seeker where id = '$sid' ;";
    
    $semailUpdate = $_POST['Semailupd'];
    $sfirstnameUpdate = $_POST['Snameupd'];
    $slastnameUpdate = $_POST['Slastnameupd'];
    $sdofUpdate = $_POST['Sdobupd'];
    $SgenderUpdate = $_POST['gender'];
    $sphoneUpdate = $_POST['Scellphoneupd'];
    $desiredJobUpdate = $_POST['Sdesiredjob'];
    $OldPasswordUpdate = $_POST['sOldpassword'];
    $SNewPasswordUpdate = $_POST['SNewPassword'];
    $CvUpdate = $_POST['cvUpdate'];



    $resultSPass = $conn->query($sqlS);
    if ($resultSPass->num_rows > 0) {
      // output data of each row
       if($rowSPass = $resultSPass->fetch_assoc()) { 
         $CurrentPassword = $rowSPass["password"];

    }}

     
    
    if(empty($semailUpdate) || empty($sfirstnameUpdate) || empty($slastnameUpdate) || empty($sdofUpdate) || empty($sphoneUpdate) || empty($desiredJobUpdate)){
        header("Location: index.php?updateError=missingfields");
        exit();
    } else if(!filter_var($semailUpdate, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?updateError=invalidEmail");
        exit();
    } else if(strlen($sphoneUpdate) <= 9){
        header("Location: index.php?updateError=phoneNumberIncorrect");
        exit();

    } else if(!empty($OldPasswordUpdate)){
        if(empty($SNewPasswordUpdate)){
            header("Location: index.php?updateError=newPasswordIsEmpty");
            exit();
        }else if(strlen($SNewPasswordUpdate) <= 5){
            header("Location: index.php?updateError=newPasswordIsShort");
            exit();
        }

        else if ($CurrentPassword != $OldPasswordUpdate){
            header("Location: index.php?updateError=oldPasswordIncorrect");
            exit();
        }else if($CurrentPassword == $OldPasswordUpdate){
            if($CvUpdate == "UploadNew"){
                $file = $_FILES['resumeupdate'];

                $fileName = $_FILES['resumeupdate']['name'];
                $fileTmpName = $_FILES['resumeupdate'] ['tmp_name'];
                $fileSize = $_FILES['resumeupdate']['size'];
                $fileError = $_FILES['resumeupdate']['error'];
                $fileType = $_FILES['resumeupdate']['type'];
        
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
                            
                            
                            
                             $sqlSU = "UPDATE seeker SET name = '$sfirstnameUpdate', lastname = '$slastnameUpdate', email = '$semailUpdate', dob = '$sdofUpdate', gender='$SgenderUpdate', cellnumber = '$sphoneUpdate', desiredjob = '$desiredJobUpdate', password='$SNewPasswordUpdate', resume='$fileNameNew' WHERE id = '$sid';";
                              mysqli_query($conn, $sqlSU);
                              header("Location: index.php?updateOk=successful");
                        
                            exit();
        
        
        
        
                        }else{
                        header("Location: index.php?updateError=CVuploadTooBig");
                        exit();
                        }
        
                    }else{
                        header("Location: index.php?updateError=errorWhileUploadingCV");
                        exit();
                    }
        
                }else{
                    header("Location: index.php?updateError=uploadedCVfileNotAllowed");
                    exit();
                }
                
            }else if($CvUpdate == "KeepExisting"){
                $sqlSU = "UPDATE seeker SET name = '$sfirstnameUpdate', lastname = '$slastnameUpdate', email = '$semailUpdate', dob = '$sdofUpdate', gender='$SgenderUpdate', cellnumber = '$sphoneUpdate', desiredjob = '$desiredJobUpdate', password='$SNewPasswordUpdate' WHERE id = '$sid';";
                mysqli_query($conn, $sqlSU);
                header("Location: index.php?updateOk=successful");
                exit();
          

            }
           

            
        }
        
    } else if(!empty($SNewPasswordUpdate)){
        if(empty($OldPasswordUpdate)){
            header("Location: index.php?updateError=oldPasswordIsEmpty");
            exit();
        }

        else if ($CurrentPassword != $OldPasswordUpdate){
            header("Location: index.php?updateError=oldPasswordIncorrect");
            exit();
        }
        else if($CurrentPassword == $OldPasswordUpdate){

            if($CvUpdate == "UploadNew"){
                $file = $_FILES['resumeupdate'];

                $fileName = $_FILES['resumeupdate']['name'];
                $fileTmpName = $_FILES['resumeupdate'] ['tmp_name'];
                $fileSize = $_FILES['resumeupdate']['size'];
                $fileError = $_FILES['resumeupdate']['error'];
                $fileType = $_FILES['resumeupdate']['type'];
        
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
                            
                            
                            
                             $sqlSU = "UPDATE seeker SET name = '$sfirstnameUpdate', lastname = '$slastnameUpdate', email = '$semailUpdate', dob = '$sdofUpdate', gender='$SgenderUpdate', cellnumber = '$sphoneUpdate', desiredjob = '$desiredJobUpdate', password='$SNewPasswordUpdate', resume='$fileNameNew' WHERE id = '$sid';";
                              mysqli_query($conn, $sqlSU);
                              header("Location: index.php?updateOk=successful");
                        
                            exit();
        
        
        
        
                        }else{
                        header("Location: index.php?updateError=CVuploadTooBig");
                        exit();
                        }
        
                    }else{
                        header("Location: index.php?updateError=errorWhileUploadingCV");
                        exit();
                    }
        
                }else{
                    header("Location: index.php?updateError=uploadedCVfileNotAllowed");
                    exit();
                }
                
            }else if($CvUpdate == "KeepExisting"){
                $sqlSU = "UPDATE seeker SET name = '$sfirstnameUpdate', lastname = '$slastnameUpdate', email = '$semailUpdate', dob = '$sdofUpdate', gender='$SgenderUpdate', cellnumber = '$sphoneUpdate', desiredjob = '$desiredJobUpdate', password='$SNewPasswordUpdate' WHERE id = '$sid';";
                mysqli_query($conn, $sqlSU);
                header("Location: index.php?updateOk=successful");
                exit();
          

            }
            
            
        }
        
    }else{
        
        if($CvUpdate == "UploadNew"){
            $file = $_FILES['resumeupdate'];

            $fileName = $_FILES['resumeupdate']['name'];
            $fileTmpName = $_FILES['resumeupdate'] ['tmp_name'];
            $fileSize = $_FILES['resumeupdate']['size'];
            $fileError = $_FILES['resumeupdate']['error'];
            $fileType = $_FILES['resumeupdate']['type'];
    
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
                        
                        
                        
                         $sqlSU = "UPDATE seeker SET name = '$sfirstnameUpdate', lastname = '$slastnameUpdate', email = '$semailUpdate', dob = '$sdofUpdate', gender='$SgenderUpdate', cellnumber = '$sphoneUpdate', desiredjob = '$desiredJobUpdate', resume='$fileNameNew' WHERE id = '$sid';";
                          mysqli_query($conn, $sqlSU);
                          header("Location: index.php?updateOk=successful");
                    
                        exit();
    
    
    
    
                    }else{
                    header("Location: index.php?updateError=CVuploadTooBig");
                    exit();
                    }
    
                }else{
                    header("Location: index.php?updateError=errorWhileUploadingCV");
                    exit();
                }
    
            }else{
                header("Location: index.php?updateError=uploadedCVfileNotAllowed");
                exit();
            }
            
        }else if($CvUpdate == "KeepExisting"){
            $sqlSU = "UPDATE seeker SET name = '$sfirstnameUpdate', lastname = '$slastnameUpdate', email = '$semailUpdate', dob = '$sdofUpdate', gender='$SgenderUpdate', cellnumber = '$sphoneUpdate', desiredjob = '$desiredJobUpdate' WHERE id = '$sid';";
            mysqli_query($conn, $sqlSU);
            header("Location: index.php?updateOk=successful");
            exit();
      

        }
    }


 
  }else{
      header("Location: index.php");
      exit();
  }
       
  ?>