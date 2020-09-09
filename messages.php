<?php
$fullUrl = "http://$_SERVER [HTTP_HOST]$_SERVER[REQUEST_URI]";
//window.location.href = 'index.php';
if(strpos($fullUrl, "jopApply=dup")==true){
    echo "<script>alert('You have already applied for this role');
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    </script>
    ";
    header('location: index.php');
}else if(strpos($fullUrl, "jopApply=success")==true){
    echo "<script>alert('You have successfully applied for this role');
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "jopApply=failed")==true){
    echo "<script>alert('Failed to apply, check network connection');
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=empty")==true || strpos($fullUrl, "signup=ErrorBusinessTypeNotChecked")==true){
    echo "<script>alert('Registration failed, please fill all fields');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=ErrorPasswordShort")==true){
    echo "<script>alert('Registration failed, Password must have minimum of 6 characters');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "sign-up=invalid-email")==true){
    echo "<script>alert('Registration failed, Your Email is invalid');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=emailtaken")==true){
    echo "<script>alert('Registration failed, Email is already taken :( ');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=Success")==true){
    echo "<script>alert('You have successfully registered, You can now Login');
    $('#myEmployerModal').modal();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=FileTooBig")==true){
    echo "<script>alert('Registration failed, Please upload image/logo less than 5MB');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}
else if(strpos($fullUrl, "postDeleted=success")==true){
    echo "<script>alert('Your posted is successfully deleted');
    $('#myModalManageVacancies').modal();
    manageVacancies();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "applicantAccept=success")==true){
    echo "<script>alert('Applicant is been accepted');
    $('#myModal-viewApplicants').modal();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "applicantAccept=rejected")==true){
    echo "<script>alert('Applicant is been rejected');
    $('#myModal-viewApplicants').modal();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=ErrorUploadingFile")==true){
    echo "<script>alert('Registration failed, An Error occured, Check Network Connection');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "employerSignup=FileNotAllowed")==true){
    echo "<script>alert('Registration failed, Please upload: JPG, JPEG, PNG, BMP');
    $('#myEmployerModal').modal();
    selectFormEmployer();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}





else if(strpos($fullUrl, "seekerSignup=empty")==true || strpos($fullUrl, "seekerSignup=ErrorgenderNotSelected")==true){
    echo "<script>alert('Registration failed, please fill all fields');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=ErrorPasswordShort")==true){
    echo "<script>alert('Registration failed, Password must have minimum of 6 characters');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=invalidEmail")==true){
    echo "<script>alert('Registration failed, Your email is invalid');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=emailtaken")==true){
    echo "<script>alert('Registration failed, Email is already taken');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=Success")==true){
    echo "<script>alert('You have successfully registered, you can now Log-in');
    $('#myEmployerModal').modal();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=FileTooBig")==true){
    echo "<script>alert('Registration failed, Please upload CV/Resume less than 5MB');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=ErrorUploadingFile")==true){
    echo "<script>alert('Registration failed, upload');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "seekerSignup=FileNotAllowed")==true){
    echo "<script>alert('Registration failed, Please upload: PDF, DOC, DOCX, RTF/TXT');
    $('#myEmployerModal').modal();
    signupFormSeeker();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
    
         </script>";
    header('location: index.php');
}



else if(strpos($fullUrl, "updateError=missingfields")==true){
    echo "<script>alert('Failed to update. You left empty fields');
    $('#myModal-myInformation-seeker').modal();   
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=invalidEmail")==true){
    echo "<script>alert('Failed to update. You have entered invalid email');
    $('#myModal-myInformation-seeker').modal(); 
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=phoneNumberIncorrect")==true){
    echo "<script>alert('Failed to update. Your phone number is incorrect');
    $('#myModal-myInformation-seeker').modal();  
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=newPasswordIsEmpty")==true){
    echo "<script>alert('Failed to update. You didnt fill new password');
    $('#myModal-myInformation-seeker').modal();  
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateOk=successful")==true){
    echo "<script>alert('You have successfully updated your profile');
    window.location.href = 'index.php';
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=errorWhileUploadingCV")==true){
    echo "<script>alert('Failed to upload CV/Resume. Please upload different file (PDF, DOC, DOCX, RTF/TXT)');
    $('#myModal-myInformation-seeker').modal(); 
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=errorWhileUploadingIMG")==true){
    echo "<script>alert('Failed to upload Logo/Image. Please upload different file (JPEG, JPG, PNG, BMP)');
    $('#myModal-myInformation-seeker').modal(); 
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=uploadedCVfileNotAllowed")==true){
    echo "<script>alert('Failed to update. Please upload documents: PDF, DOC, DOCX, RTF/TXT');
    $('#myModal-myInformation-seeker').modal();
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);

     </script>";
    header('location: index.php');
}
else if(strpos($fullUrl, "updateError=uploadedIMGfileNotAllowed")==true){
    echo "<script>alert('Failed to update. Please upload documents: JPEG, JPG, PNG, BMP');
    $('#myModal-myInformation-seeker').modal();
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);

     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=CVuploadTooBig")==true){
    echo "<script>alert('Failed to update. Please upload CV/Resume less than 5MB');
    $('#myModal-myInformation-seeker').modal();
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=logoIMGUploadTooBig")==true){
    echo "<script>alert('Failed to update. Please upload Logo/Image less than 5MB');
    $('#myModal-myInformation-seeker').modal();
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}else if(strpos($fullUrl, "updateError=oldPasswordIsEmpty")==true){
    echo "<script>alert('Failed to update. Previous password is empty');
    $('#myModal-myInformation-seeker').modal();
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}
else if(strpos($fullUrl, "updateError=oldPasswordIncorrect")==true){
    echo "<script>alert('Failed to update. previous password is wrong');
    $('#myModal-myInformation-seeker').modal();
    jobseekerInfo();
    baseUrl = window.location.href.split('?')[0];
    window.history.pushState('name', '', baseUrl);
     </script>";
    header('location: index.php');
}
?>