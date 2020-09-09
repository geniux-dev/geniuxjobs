   <?php 
                
                if (session_status() == PHP_SESSION_NONE) {
     session_start();
     
 }
                 if(isset($_SESSION['login_user']))   // Checking whether the session is already there or not if 
                               // true then header redirect it to the home page directly 
  {
    

                     $myusername = $_SESSION['login_user'];
                     echo ' 
   
                     <div class="name"><span id="myname">'.$Sname.' '.$Slastname.'</span></div>
                 
                     <p>'.$Sdesiredjob.'</p>
                     <ul class="nutrition">
                       
                       <li class="myaccount shadows" data-toggle="modal" data-target="#myModal-myInformation-seeker"><a class="dashboard-links open-apply-modal" href="#myModal-myInformation-seeker">My Profile</a></li>
                       
                       <li class="postvac shadows" data-toggle="modal" data-target="#myModal-Seeker-JobApplied"><a  class="dashboard-links open-apply-modal" href="#myModal-Seeker-JobApplied">Job Applied</a></li>
                     </ul>
                     <ul class="nutrition">
                       <li class="value view-applicants shadows"><a  class="dashboard-links" href="index.php">Make Appointment</a></li>
                       
                       <li class="value logout shadows"><a  class="dashboard-links" href="logout.php">Log Out</a></li>
                     </ul>
                     <div class="warning">
                     <p><span><br>Implemented by Evidence | @ 2019</p>
                     </div> ';
  }
  if(isset($_SESSION['login_employer']))   // Checking whether the employer session is already there or not if 
                               // true then header redirect it to the home page directly 
  {
    

    
                     $myusername = $_SESSION['login_employer'];
    echo '<img class="cake-pic" id="profile-picture2" src="uploads/'.$fileName.'" onerror="this.src=\'images/appLogo.png\';">
   
    <div class="name"><span id="myname">'.$name.'</span></div>

    <p>'.$businessType.'</p>
    <ul class="nutrition">
      
      <li class="myaccount shadows" data-toggle="modal" data-target="#myModal-myAccount-employer"><a class="dashboard-links open-apply-modal" href="#myModal-myAccount-employer">My Account</a></li>
      
      <li class="postvac shadows" data-toggle="modal" data-target="#myModalManageVacancies"><a  class="dashboard-links open-apply-modal" href="#myModalManageVacancies">Manage Vacancies</a></li>
    </ul>
    <ul class="nutrition">
      <li class="value view-applicants shadows" data-toggle="modal" data-target="#myModal-viewApplicants"><a class="dashboard-links open-apply-modal" href="#myModal-viewApplicants">View Applications</a></li>
      
      <li class="value logout shadows"><a  class="dashboard-links" href="logout.php">Log Out</a></li>
    </ul>
    <div class="warning">
      <p><span><br>Implemented by Evidence | @ 2019</p>
      
    </div> ';
  }
  elseif(!isset($_SESSION['login_employer']) && !isset($_SESSION['login_user']))
      {
    
     echo '<li class="li-me" data-toggle="modal" data-target="#myEmployerModal"><a id="loginAnchor" href="#" data-toggle="modal" data-target="#myEmployerModal">
   SignIn/SignUp 
 </a></li>';
      
  }
    ?>