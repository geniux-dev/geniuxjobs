
<div id="myModal-dashboard" class="modal">
      <div class="modal-content">
      <div class="modal-header"><h2>Dashboard</h2><span class="close-modal"><i class="fa fa-arrow-circle-left"></i></span></div>
      <div class="modal-body dashboard-profile"><br/>
  
      <div class="menu-wrapper">
  
  <div class="menu-card">
  <?php include 'authorizeEmployer.php';?>
  <?php
  
  
include 'connect.php';

$sqlE = "select * from employer where id = '$eid' ;";
     
     
     
$resultE = $conn->query($sqlE);
if ($resultE->num_rows > 0) {
    // output data of each row
     if($rowE = $resultE->fetch_assoc()) { 
           $name=  $rowE["name"];
           $email =  $rowE["email"];
           $fileName = $rowE["logo"];
           $businessType = $rowE["businessType"];
           $EmpTel = $rowE["EmpTel"];
           $Epassword = $rowE["password"];
}}
     
?>
<?php include 'authorizeSeeker.php';?>
<?php
  
  include 'connect.php';
  
  $sqlS = "select * from seeker where id = '$sid' ;";
       
       
       
  $resultS = $conn->query($sqlS);
  if ($resultS->num_rows > 0) {
      // output data of each row
       if($rowS = $resultS->fetch_assoc()) { 
             $Sname=  $rowS["name"];
             $Slastname =  $rowS["lastname"];
             $Sdateofbirth =  $rowS["dob"];
             $Semail =  $rowS["email"];
             $Sdesiredjob =  $rowS["desiredjob"];
             $Scellphone =  $rowS["cellnumber"];
             $Sgender =  $rowS["gender"];
             $Sresume =  $rowS["resume"];
   
             
             

  }}
       
  ?>

    <?php include 'dashboard.php'?>

  </div>
</div>

</div>
</div>
</div>










<div id="myModal-myInformation-seeker" class="modal">
      <div class="modal-content">
      <div class="modal-header"><h2>My Information</h2><div class="close-modal" data-toggle="modal" data-target="#myModal-dashboard"><i class="fa fa-arrow-circle-left"></i></div></div>
      <div class="modal-body dashboard-profile"><br/>
  
      <div class="menu-wrapper">
  
  <div class="menu-card">
 

<br>
                 
<center>
                        <table class="table-form jobseekerinfoTable" id="profiletable">
                     
                  
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>First Name:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $Sname;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Last Name: </b></p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $Slastname;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Date Of Birth:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $Sdateofbirth;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Gender:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $Sgender;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Desired Job: </b></p>
                       </td>
                       <td class="td" id="profiletd">
                       <p><?php echo $Sdesiredjob;?></p>   
                       </td>
                     </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Email:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $Semail;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Phone:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $Scellphone;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Password:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p>************</p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>CV/Resume:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><a href="uploadedResume/<?php echo $Sresume;?>" download><?php echo $Sresume;?></a>
                      <a style="float: right;" href="uploadedResume/<?php echo $Sresume;?>" download><i class="fa fa-download"></i></a>
                    </p> 
                    </td>
                  </tr>
                  <tr id="profiletr" style="border: unset;">
                    
                    <td class="td" id="profiletd">
                    <div class="button apply-btn " id="editInfo" onclick="jobseekerInfo()">
                              <span>Edit<span>
                              
                           </div>
                    </td>
                  </tr>
             
             
  
                </table>
                <form action="seekerEditProfile.php" method="post" enctype="multipart/form-data" id="seekerEditProfileForm">
                
                <table class="table-form editjobseekerinfoTable" id="profiletable" style="display: none;">
                
                <tr style="border: 0;background: #f3f3f3;"><td ><label for="name" id="seekerUpdate-error" style="position: relative;text-align: center; float: left;color: #f10303;" class="post-error-vac"></label><br></td></tr>
                

                     
 
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>First Name:</b> </p>
                       </td>
                       <td class="td" id="profiletd">
                         <input id="Snameupd" name="Snameupd" type="text" placeholder="First Name" value="<?php echo $Sname;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Last Name: </b></p>
                       </td>
                       <td class="td" id="profiletd">
                    
                         <input id="Slastnameupd" name="Slastnameupd" type="text" placeholder="Last Name" value="<?php echo $Slastname;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Date Of Birth:</b> </p>
                       </td>
                       <td class="td" id="profiletd">
                         <input type="date" name="Sdobupd" id="Sdateofbirthupd" style="border: unset;padding: 10px;border-radius: 7px; width: 100%;" value="<?php echo $Sdateofbirth;?>"> 
                       </td>
                     </tr>
                     <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Gender:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                    <table id="status-table">
                        <tr id="status-tr" style="margin-bottom: -27px; margin-top: -15px;border: 0;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 8px;"><input style="margin: 13px;" type="radio" name="gender" value="Male" <?php if($Sgender=='Male'){echo "checked='true'";}?>></td> <td id="status-td" ><label>Male</label></td></tr>
                        <tr id="status-tr" style="margin-bottom: -12px;border: 0; margin-top: 16px;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 0px;"><input style="margin: 13px;" type="radio" name="gender" value='Female' <?php if($Sgender=='Female'){echo "checked='true'";}?>></td> <td style="padding-top: 0px;" id="status-td" ><label>Female</label></td></tr>
                        
                      </table>
                    </td>
                  </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Desired Job: </b></p>
                       </td>
                       <td class="td" id="profiletd">
                    
                         <input id="Sdesiredjob" name="Sdesiredjob" type="text" placeholder="Desired Job" value="<?php echo $Sdesiredjob;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Email:</b> </p>
                       </td>
                       <td class="td" id="profiletd"> 
                         <input id="Semailupd" name="Semailupd" type="email" placeholder="Email" value="<?php echo $Semail;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Phone:</b> </p>
                       </td>
                       <td class="td" id="profiletd"> 
                         <input id="Scellphoneupd" name="Scellphoneupd" type="number" placeholder="Phone Number" value="<?php echo $Scellphone;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Password:</b> </p>
                       </td>
                       <td class="td" id="profiletd"> 
                         <input id="sOldpassword" name="sOldpassword" type="password" placeholder="Enter Old Password" style="margin-bottom: 10px;" class="boxes"/>
                         <input id="SNewPassword" name="SNewPassword" type="password" placeholder="Enter New Password"  class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>CV/Resume(PDF/DOCX/DOC/RTF):</b> </p>
                       </td>
                       <td class="td" id="profiletd">
                       <table id="status-table">
                        <tr id="status-tr" style="margin-bottom: -27px; margin-top: -15px;border: 0;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 8px;"><input onclick="keepCV()" style="margin: 13px;" type="radio" id ="cvUpdate" name="cvUpdate" id="KeepExisting" value="KeepExisting" checked="true"></td> <td id="status-td" ><label>Keep Existing</label></td></tr>
                        <tr id="status-tr" style="margin-bottom: -12px;border: 0; margin-top: 16px;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 0px;"><input onclick="cVupdate()" style="margin: 13px;" type="radio" id ="cvUpdate" name="cvUpdate" id="UploadNew" value="UploadNew"></td> <td style="padding-top: 0px;" id="status-td" ><label>Upload New</label></td></tr>
                        
                      </table>
                         <p id="uploadNewP">Keep in mind that your old CV/Resume will be replaced</p>
                         <p id="existinCVP"><a href="uploadedResume/<?php echo $Sresume;?>" download><?php echo $Sresume;?></a>
                          <a style="float: right;" href="uploadedResume/<?php echo $Sresume;?>" download><i class="fa fa-download"></i></a>
                        </p> 
                         
                         <div class="file-upload" id="cVfileUpload">
                        <div class="file-select" id="file-select">
                            <div class="file-select-button" id="fileName">Choose File</div>
                            <div class="file-select-name" id="noFileUpdateResume">No file chosen...</div> 
                            <input type="file" name="resumeupdate" id="FileUpdateResume" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, .pdf, .doc, .docx, .rtf, .txt, .text">
                        </div>
                        </div>
                       </p> 
                       </td>
                     </tr>
                     <tr id="profiletr" style="border: unset;">

                       
                       <td class="td" id="profiletd">
                        <input name="submit" value="Update" type="submit" id="saveInfo" onclick="seekerEditProfile()" class="button apply-btn"  >
                        <input value="Discard" id="discardInfo" class="button apply-btn" onclick="editjobseekerInfo()">
                     
                       </td>
                       <td class="td" id="profiletd">
                       
                     
                       </td>

                      
                     </tr>
                
                
     
                   </table>
</form>


</center>

<br>

<br>
<br>
<br>
<br>
                
            

  </div>
</div>
</div>
</div>
</div>











<div id="myModal-myAccount-employer" class="modal">
      <div class="modal-content">
      <div class="modal-header"><h2>My Information</h2><div class="close-modal" data-toggle="modal" data-target="#myModal-dashboard"><i class="fa fa-arrow-circle-left"></i></div></div>
      <div class="modal-body dashboard-profile"><br/>
  
      <div class="menu-wrapper">
  
  <div class="menu-card">
 


<br>
                 
<center>
                        <table class="table-form jobseekerinfoTable" id="profiletable">
                     
                  
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Company/Organization:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $name;?></p> 
                    </td>
                  </tr>
 
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Business Type:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $businessType;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Email:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $email;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Contact No:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p><?php echo $EmpTel;?></p> 
                    </td>
                  </tr>
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Password:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                      <p>************</p> 
                    </td>
                  </tr>
                  
                  <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Company Logo:</b> </p>
                    </td>
                    
                    
                    <td class="td" id="profiletd">
                      <p><a href="uploads/<?php echo $fileName;?>" download><?php echo $fileName;?></a>
                      <a style="float: right;" href="uploads/<?php echo $fileName;?>" download><i class="fa fa-download"></i></a>
                    </p>
     
                    </td>

                  </tr>
                  <tr id="profiletr" class="iconEmtr">
                    <td class="td profilethh iconEmtd" id="profiletd" style="position: relative; top: -4px;">
                      <p id="thheadprofile"><b></b> </p>
                    </td>
                    
                    
                    <td class="td" id="profiletd">
                    <img class="cake-pic" id="profile-picture2" src="uploads/<?php echo $fileName;?>" onerror="this.src='images/appLogo.png';">
     
                    </td>

                  </tr>
                 
                    
                  
                  <tr id="profiletr" style="border: unset;">
                    
                    <td class="td" id="profiletd">
                    <div class="button apply-btn " id="editInfo" onclick="employerInfo()">
                              <span>Edit<span>
                              
                           </div>
                    </td>
                  </tr>
             
             
  
                </table>
                <form action="employerEditProfile.php" method="post" enctype="multipart/form-data" id="employerEditProfileForm">
                
                <table class="table-form editjobseekerinfoTable" id="profiletable" style="display: none;">
                
                <tr style="border: 0;background: #f3f3f3;"><td ><label for="name" id="employerUpdate-error" style="position: relative;text-align: center; float: left;color: #f10303;" class="post-error-vac"></label><br></td></tr>
                

                     
 
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Company/Organization:</b> </p>
                       </td>
                       <td class="td" id="profiletd">
                         <input id="Enameupd" name="Enameupd" type="text" placeholder="Company/Organization" value="<?php echo $name;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                    <td class="td profilethh" id="profiletd">
                      <p id="thheadprofile"><b>Business Type:</b> </p>
                    </td>
                    <td class="td" id="profiletd">
                    <table id="status-table">
                        <tr id="status-tr" style="margin-bottom: -27px; margin-top: -15px;border: 0;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 8px;"><input style="margin: 13px;" type="radio" name="BusinessTypee" value="Private Company" <?php if($businessType=='Private Company'){echo "checked='true'";}?>></td> <td id="status-td" ><label>Private Company</label></td></tr>
                        <tr id="status-tr" style="margin-bottom: -12px;border: 0; margin-top: 16px;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 0px;"><input style="margin: 13px;" type="radio" name="BusinessTypee" value='Recruitment Agency' <?php if($businessType=='Recruitment Agency'){echo "checked='true'";}?>></td> <td style="padding-top: 0px;" id="status-td" ><label>Recruitment Agency</label></td></tr>
                        
                      </table>
                    </td>
                  </tr>

                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Email:</b> </p>
                       </td>
                       <td class="td" id="profiletd"> 
                         <input id="EmEmail" name="EmEmail" type="email" placeholder="Email" value="<?php echo $email;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Phone:</b> </p>
                       </td>
                       <td class="td" id="profiletd"> 
                         <input id="EmpTel" name="EmpTel" type="number" placeholder="Phone Number" value="<?php echo $EmpTel;?>" class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Password:</b> </p>
                       </td>
                       <td class="td" id="profiletd"> 
                         <input id="EOldpassword" name="EOldpassword" type="password" placeholder="Enter Old Password" style="margin-bottom: 10px;" class="boxes"/>
                         <input id="ENewPassword" name="ENewPassword" type="password" placeholder="Enter New Password"  class="boxes"/>
                       </td>
                     </tr>
                     <tr id="profiletr">
                       <td class="td profilethh" id="profiletd">
                         <p id="thheadprofile"><b>Company Logo/(JPEG/JPG/PNG/BMP):</b> </p>
                       </td>
                       <td class="td" id="profiletd">
                       <table id="status-table">
                        <tr id="status-tr" style="margin-bottom: -27px; margin-top: -15px;border: 0;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 8px;"><input onclick="keepLogo()" style="margin: 13px;" type="radio" id ="updateLogo" name="updateLogo" id="KeepExisting" value="KeepExisting" checked="true"></td> <td id="status-td" ><label>Keep Existing</label></td></tr>
                        <tr id="status-tr" style="margin-bottom: -12px;border: 0; margin-top: 16px;">
                        <td id="status-td" style="padding-right: 0px; padding-top: 0px;"><input onclick="logoUpd()" style="margin: 13px;" type="radio" id ="updateLogo" name="updateLogo" id="UploadNew" value="UploadNew"></td> <td style="padding-top: 0px;" id="status-td" ><label>Upload New</label></td></tr>
                        <tr id="ElogoIcon" style="border: 0;background: #9acd3200;"><td><img class="cake-pic" id="profile-picture2" src="uploads/<?php echo $fileName;?>" onerror="this.src='images/appLogo.png';"></td></tr>
                      </table>
                         <p id="uploadNewLogoP">Keep in mind that your old Image/Logo will be replaced</p>
                         <p id="existinLogo"><a href="uploads/<?php echo $fileName;?>" download><?php echo $fileName;?></a>
                          <a style="float: right;" href="uploads/<?php echo $fileName;?>" download><i class="fa fa-download"></i></a>
                        </p> 
                         

                        <div class="wrap-custom-file" id="logofileUpload">
                          <input type="file" name="logoUpdate" id="updImageLogo" accept="image/jpg,image/jpeg,image/png,image/bmp" />
                          <label  for="updImageLogo" class="uploadimg">
                          <span style="font-size: 11px;">Select Images: PNG/JPG/JPEG</span>
                          <i class="fas fa-camera" style=" position: absolute;top: 48px;bottom: 0;left: 75px;margin-top: 0;font-size: 25px;margin-left: -14px;"></i>
                          </label>
                      </div>
                        
                       </p> 
                       </td>
                     </tr>
                     <tr id="profiletr" style="border: unset;">

                       
                       <td class="td" id="profiletd">
                        <input name="submit" value="Update" type="submit" id="saveInfo" onclick="updateEmployerInfo()" class="button apply-btn"  >
                        <input value="Discard" id="discardInfo" class="button apply-btn" onclick="editEmployerInfo()">
                     
                       </td>
                       <td class="td" id="profiletd">
                       
                     
                       </td>

                      
                     </tr>
                
                
     
                   </table>
</form>


</center>

<br>

<br>
<br>
<br>
<br>
                
            

  </div>
</div>
</div>
</div>
</div>







<div id="myModalManageVacancies" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel">
        <div class="modal-content" style="background: white;">
        <div class="modal-header"><h2>Manage Vacancies</h2><div class="close-modal" data-toggle="modal" data-target="#myModal-dashboard"><i class="fa fa-arrow-circle-left"></i></div></div>
      <div class="modal-body" style="padding: 0px 0px;"><br/>
         <div class="form-modal">
    
      <div class="form-toggle">
          <button id="login-toggle1" onclick="postVacancies()">Post</button>
          <button id="signup-toggle1" onclick="manageVacancies()">Modify</button>
          <center><div class="contact-image" >
                <img src="img/rocket_contact.png" class="logo-company-icon" onerror="this.src='images/appLogo.png';"/>
            </div>
            </center>
      </div>
  
      <div id="login-form1" style="display:none;">
      <?php

	
// Create connection

include 'authorizeEmployer.php';
$id=0;
$name=$category=$minexp=$salary=$industry=$desc=$role=$eType=$status=$msg="";

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
include 'connect.php';
    if(isset($_GET['update'])&& isset($_GET['id'])){
      $id = $_GET['id'];
      $sql="select * from post where eid=$eid and id=$id"; 
      $result = $conn->query($sql);
    if(  $row=$result->fetch_assoc()){
            $name= $row['name'];
            $category=$row['category'];
            $minexp=$row['minexp'];
            $salary=$row['salary'];
            $industry=$row['industry'];
            $desc=$row['desc'];
            $role=$row['role'];
            $eType=$row['eType'];
            $status=$row['status'];
    }
    }
    
if(isset($_POST['submitPost'])){	
    
            $id= $_POST['id'];
            $name= $_POST['name'];
            $category=$_POST['category'];
            $minexp=$_POST['minexp'];
            $salary=$_POST['salary'];
            $industry=$_POST['industry'];
            $desc=$_POST['desc'];
            $role=$_POST['role'];
            $eType=$_POST['eType'];
            $status=$_POST['status']; 
               
    
    if($id>0){
        $sql = "Update `post` set `date`=CURRENT_DATE(),"
                . "`name`='$name', "
                . "`category`='$category', "
                . "`minexp`='$minexp', "
                . "`desc`='$desc', "
                . "`salary`='$salary', "
                . "`industry`='$industry', "
                . "`role`='$role', "
                . "`employmentType`='$eType', "
                . "`status`= '$status' "
                . "where id=$id and eid=$eid;";        
    }else{   
      $sqlEEE = "select * from employer where id = '$eid' ;";
     
     
                
      $resultEEE = $conn->query($sqlEEE);
      if ($resultE->num_rows > 0) {
          // output data of each row
          if($resultEEE = $resultEEE->fetch_assoc()) { 

              $cLogo = $rowE["logo"];
              $cEmail= $rowE["email"];
              $cTel= $rowE["EmpTel"];
              $cBusinessType= $rowE["businessType"];
            
              $cRegion= $rowE["region"];
              
              
      }}  
       


      $sql = "INSERT INTO `post` (`id`, `date`, `eid`, `name`, `category`, `minexp`, `desc`, `salary`, `industry`, `role`, `companyLogo`, `employmentType`, `status`, `cEmail`, `cTel`, `cBusinessType`, `cRegion`) "
      . "VALUES (NULL, CURRENT_DATE(), '$eid', '$name', '$category', '$minexp', '$desc', '$salary', '$industry', '$role','$cLogo', '$eType', '$status', '$cEmail', '$cTel', '$cBusinessType', '$cRegion');";
      header("Location: index.php?Vacancy=Posted");
     
        
  
    }
    
    if ($conn->query($sql) === TRUE) {
        if($_GET['update']){
           header('location: employerAccount.php');
        }else{
        $msg="New Post has been created successfully";
        
        }
    } else {
        $msg="Error: " . $sql . "<br>" . $conn->error;
    }
}

    }
?>
<?php
include 'connect.php';
 $eid = $_SESSION["eid"];
$sqlE = "select * from employer where id = '$eid' ;";
     
     
     
$resultE = $conn->query($sqlE);
if ($resultE->num_rows > 0) {
    // output data of each row
     if($rowE = $resultE->fetch_assoc()) { 
        $ename=  $rowE["name"];
          $email =  $rowE["email"];
         
           
}}
     
?>
			    
            
            <form method="post" id="postvac-form">	
                <h3>Post Vacancy</h3><br>
                <label for="name" id="post-vac-errormsg" class="post-error-vac"></label><br>
               <div class="row">
                   
                   <input type='hidden' name='id'/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><br>Job Title:</label>
                            
                            <input type="text" id="jobtitletxtbox" name="name" class="form-control" placeholder="Job Title" />
                        </div>
                        <div class="form-group">
                            <label for="category">Job Category</label><br>
                            <select type="text" name="category" class="form-control dropdown-selection" id="jobcategory" placeholder="Category">
                               <?php include 'categoryOptions.php';?> 
                            </select><br>
                        </div>
                        <div class="form-group">
                            <label for="minexp"><br>Minimum Experiance</label>
                            <input type="number"  id="minexptxtbox" name="minexp" class="form-control" placeholder="Minimum Experience"/>
                        </div>
                        <div class="form-group">
                             <label for="salary">Salary Budget(ZAR)</label>
                            <input type="number" name="salary" id="salarytxtbox" class="form-control" placeholder="Eg. 10000"/>
                        </div>
                         <div class="form-group">
                             <label for="industry">Region</label><br>
                             <select type="text" name="industry" class="form-control dropdown-selection" id="jobindustry" placeholder="Industry" >
                                 <?php include 'industryOptions.php';?>
                             </select>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc"><br>Job requirements</label>
                            <textarea name="desc" class="form-control" id="inputtextjobdesc" placeholder="Description" style="width: 100%; height: 120px; margin-top: 6px; margin-bottom: 11px;"></textarea>
                        </div>
                         <div class="form-group">
                              <label for="role">Education</label>
                            <input type="text" name="role" class="form-control" id="educatxtbox" placeholder="Eg. ‎Diploma/Degree in Engineering" />
                        </div>
                         <div class="form-group">
                              <label for="eType">Employment Type</label><br>
                              <select type="text" name="eType" id="selectemptype" class="form-control dropdown-selection" >
                                  <option value="selectemploytype" selected="selected">Select Employment</option>
                                  <option>Part-Time</option>
                                  <option>Permanent</option>
                                  <option>Contract</option>
                              </select><br>
                        </div>
						<br>
                        <label id="status-label">Status</label><br>
						<table id="status-table">
						<tr id="status-tr" style="margin-bottom: -2.375em; margin-top: -7px;border: 0;">
						<td id="status-td" style="padding-right: 10px; padding-top: 15px;"><input type="radio" name="status" value="open" <?php if($status=='open'){echo "checked='true'";}?>></td> <td id="status-td" ><label>Open</label></td></tr>
						<tr id="status-tr" style="margin-bottom: -20px;  border: 0;">
						<td id="status-td" style="padding-right: 10px; padding-top: 15px;"><input type="radio" name="status" value='closed' <?php if($status=='closed'){echo "checked='true'";}?>></td> <td id="status-td" ><label>Closed</label></td></tr>
						
                        </table>
                        <label for="name" id="posting-msg-success"></label><br>
						
                         
                           
                            <div class="form-group">
                            <button type="submit" class="btn login post-vacancy" onclick="validatePostVacancy()" name="submitPost" class="btnContact pull-right" >Post Job</button>
							<br>
                            <br>
                            <br>
							<br>
                        </div>
                    </div>
                </div>
            </form>











      </div>
 
      <div id="signup-form1" style="display: none;">
      <div class="menu-wrapper">
  
  <div class="menu-card" style=" background: #ffffff;">
  
<table id='postTable'>
  <thead>
    <tr>
    <th scope="col">Post Id</th>
    <th scope="col">Title</th>
    <th scope="col">Desc</th>
    <th scope="col">Min Experiance</th>
    <th scope="col">Salary</th>
    <th scope="col">Status</th>
    <th scope="col">Update</th>
    <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php 
   $sql="select * from post where eid=$eid"; 
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) 
   {
    $id=$row['id'];
    $title=$row['name'];
    $category=$row['category'];
    $minexp=$row['minexp'];
    $salary=$row['salary'];
    $industry=$row['industry'];
    $desc=$row['desc'];
    $role=$row['role'];
    $status=$row['status'];
   ?>

    <tr>

      <td data-label="id"><?php echo $id;?></td>
      <td data-label="Job Title"><?php echo $title;?></td>
      <td data-label="desc"><?php echo $desc;?></td>
      <td data-label="Experience"><?php echo $minexp;?></td>
      <td data-label="Salary"><?php echo $salary;?></td>
      <td data-label="Status"><?php echo $status;?></td>
      <!--<td data-label="Update post">
       <a href="postjob.php?update=true&id="><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </td>-->
      <td data-label="Delete Post">
      <a href="deletePost.php?id=<?php echo $id;?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
    </tr>
    <?php
     }}  
    ?>
  </tbody>
</table>
      </div>
  
  </div>
    
       </div>
       
       </div>
    </div>   
	
    </div>
    </div>   
	






<div id="myModal-viewApplicants" class="modal">
<?php include 'authorizeEmployer.php';?>
<?php
include 'connect.php';

$sql = "select * from employer where id = '$eid' ;";
     
     
     
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
     if($row = $result->fetch_assoc()) { 
        $name=  $row["name"];
          $email =  $row["email"];
           
}}
     
?>
      <div class="modal-content" style="background: #ffffff;">
      <div class="modal-header"><h2>View Applicants</h2><div class="close-modal" data-toggle="modal" data-target="#myModal-dashboard"><i class="fa fa-arrow-circle-left"></i></div></div>
      <div class="modal-body dashboard-profile" style="background: #ffffff;"><br/>
      <div class="form-modal">
  
      <div class="menu-wrapper">
  
      <div class="menu-card" style=" background: #ffffff;">
  
  <table id='jobappliedTable' style="font-size: 12px;">
    <thead>
      <tr>
  
      <th scope="col">Post Id</th>
      <th scope="col">Names</th>
      <th scope="col">Date Applied</th>
      <th scope="col">Job Title</th>
      <th scope="col">Phone Numbers</th>
      <th scope="col">Status</th>
      <th scope="col">CV/Resumes</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $sql="select id,sid,pid,(select name from seeker where id=j.sid)as sname,date,"
    . "(select name from post where id=j.pid)as title,"
    . "(select cellnumber from seeker where id=j.sid)as cellnumber,"
    . "status,(select resume from seeker where id=j.sid)as resume"
    . " from jobsapplied j where pid in (select id from post where eid=$eid);"; 
                             
    $appresult = $conn->query($sql);
    if ($appresult->num_rows > 0) {
    // output data of each row
    while($row = $appresult->fetch_assoc()) 
    {
    $id=$row['id'];  //application id
    $pid=$row['pid'];
    $sname = $row['sname'];
    $title=$row['title'];
    $date=$row['date'];
    $cell=$row['cellnumber'];
    $status=$row['status'];
    $resume=$row['resume'];
 ?>
      <tr>
                                    <td data-label="Queue ID"><?php echo $pid;?></td>
                                    <td data-label="Username"><?php echo $sname;?></td>
                                    <td data-label="date"><?php echo $date;?></td>
                                    <td data-label="title"><?php echo $title;?></td>
                                    <td data-label="phone"><?php echo $cell;?></td>
                                    <td data-label="status"><?php echo $status;?></td>
                                    <td data-label="resume/cv"><a href="uploadedResume/<?php echo $resume;?>" download><i class="fa fa-download"></i></a></td>
                                    <td data-label="Accept"><a href="acceptApplication.php?id=<?php echo $id;?>"><i class="fa fa-check"></i></a></td>
                                    <td data-label="Reject"><a href="rejectApplication.php?id=<?php echo $id;?>"><i class="fa fa-ban" aria-hidden="true"></i></a></td>
                                    
                                    
    </tr>
      <?php
       }}  
      ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>


<div id="myModal-Seeker-JobApplied" class="modal">
      <div class="modal-content" style=" background: #ffffff;">
      <div class="modal-header"><h2>Jobs Applied</h2><div class="close-modal" data-toggle="modal" data-target="#myModal-dashboard"><i class="fa fa-arrow-circle-left"></i></div></div>
      <div class="modal-body dashboard-profile" style="background: #ffffff;"><br/>
      <div class="form-modal">
      <div class="menu-wrapper">
  
  <div class="menu-card" style=" background: #ffffff;">
  <?php include 'authorizeSeeker.php';?>
  <?php
include 'connect.php';

$sql = "select * from seeker where id = '$sid' ;";
     
     
     
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
     if($row = $result->fetch_assoc()) { 
        $name=  $row["name"];
          $email =  $row["email"];
           
}}
     
?>





<table id='jobappliedTable'>
  <thead>
    <tr>
                            <th scope="col">Post Id</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Date Applied</th>
                            <th scope="col">Min Experiance</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
  <?php 
                             $sql="select id,(select name from employer where id=post.eid)as ename,name,minexp,salary,`desc`,(select date from jobsapplied where pid=post.id and sid=$sid)as date,(select status from jobsapplied where pid=post.id and sid=$sid)as appstatus  from post where id in (select pid from jobsapplied where sid=$sid);"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $ename = $row['ename'];
                                $id=$row['id'];
                                $title=$row['name'];
                                $date=$row['date'];
                                $minexp=$row['minexp'];
                                $salary=$row['salary'];
                                $desc=$row['desc'];
                                $status=$row['appstatus'];

                                ?>
    <tr>
    <td data-label="id"><?php echo $id;?></td>
    <td data-label="Company Name"><?php echo $ename;?></td>
    <td data-label="Job Title"><?php echo $title;?></td>
    <td data-label="Date Applied"><?php echo $date;?></td>
    <td data-label="Experience required"><?php echo $minexp;?></td>
    <td data-label="Salary Budget"><?php echo $salary;?></td>
    <td data-label="Description"><?php echo $desc;?></td>
    <td data-label="Status"><?php echo $status;?></td>
    </tr>
    <?php
     }}  
    ?>
  </tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>

