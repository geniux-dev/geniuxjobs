<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/fontawesome/238f94aed2.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tilt.jquery.min.js"></script>
    <script src="js/tilt.jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/tabicon.png" />
 
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
   
  </head>
  <body>
     <div class="loader-container" id="loading" style="top: 0px;">
          <div class="loadingcss">
          <div class="loader">
            <svg width="1em" height="1em"><circle cx="0.5em" cy="0.5em" r="0.45em"/></svg>
          </div>
        </div>
        </div>
    
        
<?php
include 'NavBar.php';
include 'signinEmployerModals.php';

?>
		
    <?php 
include 'dbh.inc.php';
$GeneralJobs = mysqli_query($conn, "SELECT * FROM post where category='General'");
$totalNumOfGeneralJob = mysqli_num_rows($GeneralJobs);

$ITJobs = mysqli_query($conn, "SELECT * FROM post where category='Information Technology'");
$totalNumOfITJob = mysqli_num_rows($ITJobs);

$buildingMiningCons = mysqli_query($conn, "SELECT * FROM post where category='Building, Mining and Construction'");
$BuildMineConsJob = mysqli_num_rows($buildingMiningCons);

$InstallMaintain = mysqli_query($conn, "SELECT * FROM post where category='Installation, Maintenance and Repair'");
$installMaintainJob = mysqli_num_rows($InstallMaintain);

$engineeringCivilMechanic = mysqli_query($conn, "SELECT * FROM post where category='Mechanic Engineering'");
$engineeringCivilMechanicJob = mysqli_num_rows($engineeringCivilMechanic);


?>
   
   
    <div class="container-categories">
	
      <main class="grid">
	   <article>
          <img src="images/generaljobs.png" alt="Sample photo" onerror="this.src='images/appLogo.png';"/>
          <div class="text">
            <h4 class="par-jobs">General <br>Vacanies</h4>
            <p class="par-jobs">Jobs: <?php echo $totalNumOfGeneralJob; ?></p>
            <a
              href="index.php?category=General"
              class="btn btn-primary btn-block"
              >View all</a
            >
          </div>
        </article>
		 <article>
          <img src="images/information-technology.png" alt="Sample photo" onerror="this.src='images/appLogo.png';"/>
          <div class="text">
            <h4 class="par-jobs">Information<br>Technology</h4>
            <p class="par-jobs">Jobs: <?php echo $totalNumOfITJob; ?></p>
            <a
              href="index.php?category=Information+Technology"
              class="btn btn-primary btn-block"
              >View all</a
            >
          </div>
        </article>

        <article>
          <img src="images/mining-constrations.jpg" alt="Sample photo" onerror="this.src='images/appLogo.png';"/>
          <div class="text">
            <h4 class="par-jobs">Building,Mining<br>Construction</h4>
            <p class="par-jobs">
              Jobs: <?php echo $BuildMineConsJob; ?>
            </p>
            <a
              href="index.php?category=Building%2C+Mining+and+Construction"
              class="btn btn-primary btn-block"
              >View all</a
            >
          </div>
        </article>
        <article>
          <img
            src="images/installation-repair-maintain.jpg"
            alt="Sample photo"
            onerror="this.src='images/appLogo.png';"
          />
          <div class="text">
            <h4 class="par-jobs">Installation<br>Maintenance</h4>
            <p class="par-jobs">
              Jobs: <?php echo $installMaintainJob; ?>
            </p>
            <a
              href="index.php?category=Installation%2C+Maintenance+and+Repair"
              class="btn btn-primary btn-block"
              >View all</a
            >
          </div>
        </article>
		        <article style="margin-right: 0px;">
          <img
            src="images/engineeringmechanic.jpg"
            alt="Sample photo"
            onerror="this.src='images/appLogo.png';"
          />
          <div class="text">
            <h4 class="par-jobs">Engineering<br>Mechanic </h4>
            <p class="par-jobs">
              Jobs: <?php echo $engineeringCivilMechanicJob; ?>
            </p>
            <a
              href="index.php?category=Mechanic+Engineering"
              class="btn btn-primary btn-block"
              >View all</a
            >
          </div>
        </article>
      </main>

      <div class="container main-top-margin">
          <div class="body-contents">
              <h4 class="par-jobs">Recently Added Jobs</h4>
            </div>
        <div class="row">
        <?php  $name=$category=$minexp
		=$salary=$industry=$desc=$role=$eType=$status=$msg="";


include 'connect.php';
    
    $sql = "select *,(select name from employer where id=post.eid)as ename from post  order by date";  
       
        if(isset($_GET['q'])){
          $sql = "select *,(select name from employer where id=post.eid)as ename from post where name LIKE '%".$_GET['q']."%' order by date";
        }
      if(isset($_GET['industry'])){
          $sql = "select *,(select name from employer where id=post.eid)as ename from post where industry='".$_GET['industry']."' order by date";
        }
      if(isset($_GET['category'])){
        $sql = "select *,(select name from employer where id=post.eid)as ename from post where category='".$_GET['category']."' order by date";
      }
      
     
      $result = $conn->query($sql);
      if($result->num_rows>0){
    while(  $row=$result->fetch_assoc()){
            $pid= $row['id'];
            $jobtitle= $row['name'];
            $category=$row['category'];
            $minexp=$row['minexp'];
            $salary=$row['salary'];
            $industry=$row['industry'];
            
            $desc=$row['desc'];
            $role=$row['role'];
            $ename =$row['ename'];
            $companyLogo =$row['companyLogo'];

            $companyEmail =$row['cEmail'];
            $companyTel =$row['cTel'];
            $companyBusinessType =$row['cBusinessType'];
            $companyRegion =$row['cRegion'];
            $postedDate =$row['date'];




            $status=$row['status'];
            $emptype=$row['employmentType'];
    ?>
          <div class="col-md-5 col-sm-6 col-md-offset-1" >
            <div class="well well-custom" id="my-section">





                <div id="my-cards">
                
            
                <div class="well subwell my-card" id="card-1">
                  <div class="row card-summary">
                    <div class="col-md-4 card-img-container">
                      <img src="uploads/<?php echo $companyLogo;?>" alt="Logo n"  onerror="this.src='images/appLogo.png';" >
                      <span class="time"><?php echo $emptype;?></span>
                    </div>
                    <div class="col-md-8 card-summary-txt-container">
                      <h4 class="card-title"><a href="#" class="grey-color"><?php echo $jobtitle;?></a>  
                      </h4>
                      <p class="card-tagline">Posted by: <?php echo $ename;?></p>
                      <p class="card-tags" >Industry:
                        <span class="my-tag tag-word-alpha"> <?php echo $category;?></span>
                      </p>
                      <p class="card-tags" >Region:
                        <span class="my-tag tag-word-alpha"> <?php echo $industry;?></span>
                      </p>
                      <p class="card-tags">Date:
                        <span class="my-tag tag-word-alpha"> <?php echo $postedDate;?></span>
                      </p>
                    </div>
                  </div>
                  <div class="row card-details">
                    <div class="col-md-12">
                      <div class="my-card-expand-content">
                        <p class="job-description-p">
                          <strong class="job-description">Job description</strong>
                          <br>
                          <?php echo $desc;?>
                          <br><br>
                          <span class="bold-letters">Education: </span><?php echo $role;?><br>
                          <span class="bold-letters">Experience: </span><?php echo $minexp;?> years<br>
                          <span class="bold-letters">Salary: </span><?php echo $salary;?><br>
                          <span class="bold-letters">Employment Type: </span><?php echo $emptype;?><br><br>
                         
                          <span class="bold-letters">Additional Information</span><br>
                          • Email: <?php echo $companyEmail;?><br>
                          • Tel/Mobile: <?php echo $companyTel;?><br>
                          • Organization: <?php echo $companyBusinessType;?><br>
                          • Based: <?php echo $companyRegion;?><br><br>
                          
                          <span class="bold-letters">Terms of services</span><br>
                          • If you have not received a response within two weeks, your application was most likely unsuccessful.<br>
                          • Check your applications status on your dashboard.<br>
                          • Report Scams Immediately.<br><br><br>
                          
                          </p><div class="button apply-btn" id="button-4" onclick="window.location.href = 'applyJob.php?id=<?php echo $pid;?>'; ">
                              <div class="underline apply-line"></div>
                              
                             <a href="applyJob.php?id=<?php echo $pid;?>" class="apply-span">Apply</a>
                            </div>
                        <p></p>
                      </div>
                      <div class="my-card-expand-btn">
                        <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                        <i class="fa fa-angle-double-up" aria-hidden="true" style="display: none;"></i>
                      </div>
                    </div>
                  </div>
                </div>
				
              </div>
            </div>
          </div>
        </div>
     </div>
      
    </div>
	   <?php }}else{
                                    echo "<center><img src='images/noresult.png' id='noResultsLogo'></center>";
                                } ?>
	

<?php include 'modals.php'?>

<?php include 'footer.php'?>


     











 
   
<script>
    $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

$('#FileUpdateResume').bind('change', function () {
  var filenameUpd = $("#FileUpdateResume").val();
  if (/^\s*$/.test(filenameUpd)) {
    $(".file-upload").removeClass('active');
    $("noFileUpdateResume").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFileUpdateResume").text(filenameUpd.replace("C:\\fakepath\\", "")); 
  }
});



/**
 * CUSTOM FILE INPUTS FOR IMAGES
 *
 * Version: 1.0.0
 *
 * Custom file inputs with image preview and 
 * image file name on selection.
 */
$('#image1').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();
  
  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
		if( fileName ){
      $label
        .addClass('file-ok')
        .css('background-image', 'url(' + tmppath + ')');
			$labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
			$labelText.text(labelDefault);
    }
  });
  
// End loop of file input elements  
});
$('#updImageLogo').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();
  
  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
		if( fileName ){
      $label
        .addClass('file-ok')
        .css('background-image', 'url(' + tmppath + ')');
			$labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
			$labelText.text(labelDefault);
    }
  });
  
// End loop of file input elements  
});
    </script>
  </body>
  <script>

      window.onload = function(){
      document.getElementById("loading").style.display = "none" 
     //startTour();
     }
    

     </script>
     
     <script>
     $(document).ready(function() {
     $('#postTable').DataTable();
     });
     $(document).ready(function() {
     $('#jobappliedTable').DataTable();
     });
     $(document).ready(function() {
    $('#jobappliedTable').DataTable();
    });
     </script>
 
     <script src="js/signinModal.js"></script>
     <script src="js/main.js"></script>
     
     <script src="js/modals.js"></script>

</html>
<?php  include 'messages.php'; ?>
