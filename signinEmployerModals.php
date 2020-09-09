<?php


?>

<!-- Modal -->


 <div id="myEmployerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel">
        <div class="modal-content" style="background: white;">
        <div class="modal-header"><h2>Login/Sign Up</h2><span class="close-modal"><i class="fa fa-arrow-circle-left"></i></span></div>
      <div class="modal-body" style="padding: 0px 0px;"><br/>
         <div class="form-modal">
    
      <div class="form-toggle">
          <button id="login-toggle" onclick="toggleLogin()">log in</button>
          <button id="signup-toggle" onclick="toggleSignup()">Register</button>
      </div>
  
      <div id="login-form">
            <form class="cd-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         
            <p class="fieldset">

            <input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="E-mail">
	
					</p>

					<p class="fieldset">
             <input class="full-width has-padding has-border" id="password" name="password" type="password"  placeholder="Password">
						<a href="#0" class="hide-password">Show</a>
						<div id="loginresult" style="display:none;">Error message here!</div>
					</p>

          
					<input type="hidden" id="currentPage" name="currentPage" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        
					<p class="fieldset">
          <input id="loginsubmit" class="btn login post-vacancy" type="submit" name="loginsubmit" id="login" value="Login" onclick="shakeFX()">
          </p>
          <hr style="
              margin-top: 1.5rem;
              margin-bottom: 5px;
              border: 0;
              border-top: 1px solid rgba(0,0,0,.1);
          ">
              <p><a href="javascript:void(0)" id="forgetten-password">Forgotten account</a></p>
            
             <button type="button" class="btn -box-sd-effect" id="loginwith" onclick="toggleSignup()">Are you an Employer/Jobseeker</button>
          </form>











          
      </div>
    
  <!--Employer Register-->
      <div id="signup-form">

      
          <form method="post" action="registerEmployer.php" enctype="multipart/form-data" id="regFormEmployer">
          <h3 class="caption1">Register An Employer</h3><br>
            <label for="name" id="regEm-error-vac" class="post-error-vac"></label>
            <label id="status-label"><br><br>Business Type</label>
			<table id="status-table">
			<tr id="status-tr" style="margin-bottom: -2.375em; margin-top: -7px;border: 0;">
			<td id="status-td" style="padding-right: 10px; padding-top: 15px;"><input type="radio" name="BusinessType" value="Private Company" ></td> <td id="status-td" ><label>Private Company</label></td></tr>
			<tr id="status-tr" style="margin-bottom: -20px;border: 0;">
			<td id="status-td" style="padding-right: 10px; padding-top: 15px;"><input type="radio" name="BusinessType" value='Recruitment Agency' ></td> <td id="status-td" ><label>Recruitment Agency</label></td></tr>
			</table>
            <label for="name"><br>Company/Organization:</label>
            <input id="Companyname" name="Empname" type="text" placeholder="Company/Organization" class="boxes"/>
            <div class="form-group">
                             <label for="industry">Region<br></label>
                             <select type="text" name="companyprovince" class="form-control dropdown-selection" id="CRegion">
                                 <?php include 'companyRegionOptions.php';?>
                             </select>
            </div>
            <label for="name"><br>Email:</label>
            <input id="emailEmployer" name="email" type="email" placeholder="Email" class="boxes"/>
            <label for="name"><br>Tel:</label>
            <input id="TelEmployer" name="telephone" type="number" placeholder="Telephone" class="boxes"/>
            <label for="name"><br>Password:</label>
            <input id="Employerpassword" name="password" type="password"  placeholder="Password" class="boxes"/>
            <label for="name"><br>Confirm Password:</label>
            <input id="EmployerConfirmpassword" name="Emppassword" type="password"  placeholder="Password" class="boxes"/>
            <label for="name"><br>Upload Company Logo:</label><br><br>
            <div class="wrap-custom-file">
                <input type="file" name="logo" id="image1" accept="image/jpg,image/jpeg,image/png,image/bmp" />
                <label  for="image1" class="uploadimg">
                <span>Select Images: PNG/JPG</span>
                <i class="fas fa-camera" style=" position: absolute;top: 78px;bottom: 0;left: 79px;margin-top: 0;font-size: 25px;margin-left: -14px;"></i>
                </label>
            </div>
            <br>          
            <label for="name" id="posting-msg-success"></label><br>
              <button type="submit" name="submit" class="btn signup full-width has-padding btn-success" id="regsubmit" onclick="validateRegisterEmployer()">Register Account</button>
        
              <p id="forgetten-password">Registering account</strong> means that you are agree to our <a href="javascript:void(0)">Terms of Services</a>.</p>
              <hr style=" margin-top: 1.5rem;margin-bottom: 5px;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
          
              <button type="button" class="btn -box-sd-effect" id="loginwith" onclick="signupFormSeeker()">Register Jobseeker</button>
          </form>
      </div>

      <div id="signup-form-seeker">
      
          <form method="post" action="registerJobseeker.php" enctype="multipart/form-data" id="seekerRegForm">
          <h3 class="caption1">Register As Job Seeker</h3><br>
            <label for="name" id="post-vac-error" class="post-error-vac"></label><br>
            <label for="name"><br>First Name:</label>
            <input id="SeekerFirstname" name="Seekername" type="text" placeholder="First Name" class="boxes"/>
            <label for="name"><br>Last Name:</label>
            <input id="SeekerLastname" name="Seekerlast" type="text" placeholder="Last Name" class="boxes"/>
            <label for="name"><br>Email:</label>
            <input id="Seekeremail" name="email" type="email" placeholder="Email" class="boxes"/>
            <label for="name"><br>Password:</label>
            <input id="Seekerpassword" name="ppassword" type="password"  placeholder="Password" class="boxes"/>
            <label for="name"><br>Confirm Password:</label>
            <input id="seekerConfirmpassword" name="Seekerpassword" type="password"  placeholder="Password" class="boxes"/>
            <label for="name"><br>Desired Job:</label>
            <input id="qlf" name="qlf" type="text"  placeholder="Desired Job" class="boxes"/>
            <label for="name"><br>DOB:</label>
            <input type="date" name="dob" id="dateofbirth">
            <label for="name"><br>Phone:</label>
            <input id="cellnumber" name="cellnumber" type="number" placeholder="Eg 0712345678" class="boxes"/>
            <br>
                        <label id="status-label">Gender</label><br>
						<table id="status-table">
						<tr id="status-tr" style="margin-bottom: -2.375em; margin-top: -7px;border: 0;">
						<td id="status-td" style="padding-right: 10px; padding-top: 15px;"><input type="radio" name="gender" value="Male" ></td> <td id="status-td" ><label>Male</label></td></tr>
						<tr id="status-tr" style="margin-bottom: -20px;border: 0;">
						<td id="status-td" style="padding-right: 10px; padding-top: 15px;"><input type="radio" name="gender" value='Female' ></td> <td id="status-td" ><label>Female</label></td></tr>
						
                        </table>
            <label for="name"><br>Upload CV/Resume(PDF/DOCX/DOC/RTF):</label>
            <div class="file-upload" id="cvUploadBox">
            <div class="file-select" id="file-select">
                <div class="file-select-button" id="fileName">Choose File</div>
                <div class="file-select-name" id="noFile">No file chosen...</div> 
                <input type="file" name="resume" id="chooseFile" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, .pdf, .doc, .docx, .rtf, .txt, .text">
            </div>
            </div>
                        

            <br>          
            <label for="name" id="posting-msg-success"></label><br>
              <button type="submit" name="submit" class="btn signup full-width has-padding btn-success" onclick="validateRegisterSeeker()">Register Account</button>
        
              <p id="forgetten-password">Registering account</strong> means that you are agree to our <a href="javascript:void(0)">Terms of Services</a>.</p>
              <hr style="
              margin-top: 1.5rem;
              margin-bottom: 5px;
              border: 0;
              border-top: 1px solid rgba(0,0,0,.1);
          ">
          
              <button type="button" class="btn -box-sd-effect" id="loginwith" onclick="selectFormEmployer()">Register Employer</button>
          </form>
          <br><br><br>
      </div>

      <div id="selectregForm">
        
      <div class="menu-wrapper">
      <div class="menu-card" style="background: #fff;padding: 30px;">

      <ul class="nutrition">
                       
                       <li class="myaccount shadows regform-btns1" onclick="selectFormEmployer()"><a class="dashboard-links" href="javascript:void(0)" onclick="selectFormEmployer()">Employer</a></li>
                       
                       <li class="value logout shadows regform-btns2" onclick="signupFormSeeker()"><a  class="dashboard-links" href="javascript:void(0)" onclick="signupFormSeeker()">Job Seeker</a></li>
      </ul>
       </div>
     </div>
    </div>
  
  </div>
    
       </div>
       
       </div>
    </div>   
	
	
	
  	
    <script src="js/registerUser.js"></script>