 

        
          <?php 
                
                if (session_status() == PHP_SESSION_NONE) {
     session_start();
 }
                 if(isset($_SESSION['login_user']))   // Checking whether the session is already there or not if 
                               // true then header redirect it to the home page directly 
  {
                     $myusername = $_SESSION['login_user'];
                     echo ' 
                     <header>
                     <div class="nav shadows">
                       <input type="checkbox" id="nav-check" />
                       <div class="nav-header">
                         <div class="nav-title" onclick="window.location.href = \'index.php\'; ">
                         <p class="par geniuxspan" style="font-size: 13px;font-weight: 600;padding: 9px;border-radius: 5px;">GENIUX</p><span
                             class="company-name" style="    left: 76px;
                             top: 29px;
                             border: 2px solid #31b0d5;
                             padding: 1px;
                             background: #31b0d5;
                             border-radius: 4px;"
                             >Jobs</span
                           >
                         </div>
                       </div>
                       <div class="profile" >
                     
                     
                     
                     <li class="dropdown"><a href="#myModal-dashboard" class="dropdown-toggle open-apply-modal">Dashboard<span class="caret"></span></a>
                     ';
  }
  if(isset($_SESSION['login_employer']))   // Checking whether the employer session is already there or not if 
                               // true then header redirect it to the home page directly 
  {
    include 'authorizeEmployer.php';
                     $myusername = $_SESSION['login_employer'];
                     include 'connect.php';

$sqlE = "select * from employer where id = '$eid' ;";
     
     
     
$resultE = $conn->query($sqlE);
if ($resultE->num_rows > 0) {
    // output data of each row
     if($rowE = $resultE->fetch_assoc()) { 
           $name=  $rowE["name"];
           $fileName = $rowE["logo"];
  
}}
                     
    echo ' 
      
 <header>
 <div class="nav shadows">
   <input type="checkbox" id="nav-check" />
   <div class="nav-header" >
     <div class="nav-title" onclick="window.location.href = \'index.php\'; ">
       <img src="uploads/'.$fileName.'" class="logo-img shadows geniuxspan" onerror="this.src=\'images/appLogo.png\';"/><span
         class="company-name"
         >'.$name.'</span
       >
     </div>
   </div>
   <div class="profile" >
    
    
    
    <li class="dropdown"><a href="#myModal-dashboard" class="dropdown-toggle open-apply-modal">Dashboard<span class="caret"></span></a>
          ';
  }
  elseif(!isset($_SESSION['login_employer']) && !isset($_SESSION['login_user']))
      {
    
     echo '
     
       
 <header>
 <div class="nav shadows">
   <input type="checkbox" id="nav-check" />
   <div class="nav-header">
     <div class="nav-title" onclick="window.location.href = \'index.php\'; ">
     <p class="par geniuxspan" style="font-size: 13px;font-weight: 600;padding: 9px;border-radius: 5px;">GENIUX</p><span
         class="company-name shadows" style="    left: 76px;
         top: 28px;
         border: 2px solid #31b0d5;
         padding: 1px;
         background: #31b0d5;
         border-radius: 4px;"
         >Jobs</span
       >
     </div>
   </div>
   <div class="profile shadows" >
     
     
     <li class="li-me"><a id="loginAnchor" href="#" data-toggle="modal" data-target="#myEmployerModal">
     Login/Sign-up  
 </a></li>';
      
  }  ?>
         
        </div>

        <div class="nav-links">
          <div class="nav-contents">
            <p class="par">Find your job</p>
            <form action="index.php">
              <input
                type="text"
                id="search-box"
                placeholder="Keyword or title"
                name="q"
              />
			  <div>
            <input class="button apply-btn search-btn" type="submit" value="Let's Go!" id="button-4">
                
                <a href="javascript:void(0)" class="apply-span"></a>
            </div>
			</form>
            
           <br>
			<form style="margin-bottom: 9px;">
             <select type="text" name="category" class="form-control dropdown-selection " id="browsebySelect" placeholder="Category">
                               <?php include 'categoryOptionsSearch.php';?> 
             </select>
			  <input class="button apply-btn search-btn browsebyGo " type="submit" value="Go!" id="button-4">
			  </form>
			
			  
			  <form>
			   <select type="text" name="industry" class="form-control dropdown-selection browsebySelect" id="browsebySelect" placeholder="Industry" >
                                 <?php include 'industryOptionsSearch.php';?>
               </select>
			
			  <input class="button apply-btn search-btn browsebyGo " type="submit" value="Go!" id="button-4">
			   </form>
          
            
            
          </div>
          <div class="nav-btn pull">
            <label for="nav-check">
              <span class="divider"><hr class="hr-line"/></span>
            </label>
          </div>
          
        </div>
      </div>
    </header>