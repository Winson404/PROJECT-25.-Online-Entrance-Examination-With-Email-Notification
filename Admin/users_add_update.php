<title>SPS Entrance Exam. | Administrator account</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <div class="content-wrapper">

<?php 
    if($page !== 'create') { 
      $user_Id = $page;
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
      $row = mysqli_fetch_array($fetch);
?>
<!-- START UPDATE FIELDS OF ADMINISTRATOR -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update Administrator</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Administrator</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-4">
                    <form action="process_update.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <input type="hidden" class="form-control" placeholder="First name" value="<?php echo $row['user_Id']; ?>" onkeyup="lettersOnly(this)" name="user_Id" required>
                        <div class="col-md-12">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4 mb-3">
                            <span class="text-bold">Usertype</span>
                            <select class="form-control" name="usertype" required>
                              <option value="Staff" selected <?php if($row['user_type'] == 'Staff') { echo 'selected'; } ?>>Staff</option>
                              <option value="Admin" <?php if($row['user_type'] == 'Admin') { echo 'selected'; } ?>>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-sm-8 col-8"></div>          
                        <div class="col-md-4 col-sm-6">
                          <span class="text-bold">First name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="First name" value="<?php echo $row['firstname']; ?>" onkeyup="lettersOnly(this)" name="firstname" required>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <span class="text-bold">Middle name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middle name" value="<?php echo $row['middlename']; ?>"  onkeyup="lettersOnly(this)" name="middlename">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <span class="text-bold">Last name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last name" value="<?php echo $row['lastname']; ?>" onkeyup="lettersOnly(this)" name="lastname" required>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                          <span class="text-bold">Suffix</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Suffix" value="<?php echo $row['suffix']; ?>" name="suffix">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <span class="text-bold">Sex</span>
                          <select class="form-control" name="gender" required>
                            <option value=""       <?php if($row['gender'] !== 'Male' || $row['gender'] == 'Female') { echo 'selected'; } ?> disabled>Select gender</option>
                            <option value="Male"   <?php if($row['gender'] == 'Male') { echo 'selected'; } ?> >Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?> >Female</option>
                          </select>
                        </div>  
                        <div class="col-md-5 col-sm-6">
                          <span class="text-bold">Email</span>
                          <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()"  value="<?php echo $row['email']; ?>">
                            <small id="text" style="font-style: italic;"></small>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                          <span class="text-bold">Contact number</span>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-text bg-white">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-5">
                          <span class="text-bold">Date of Birth</span>
                          <div class="form-group">
                            <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);" value="<?php echo $row['dob']; ?>">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <span class="text-bold">Age</span>
                          <div class="form-group">
                            <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly value="<?php echo $row['age']; ?>">
                            <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus" value="<?php echo $row['age']; ?>">
                          </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                          <span class="text-bold">Civil Status</span>
                          <div class="form-group">
                            <select class="form-control" name="civilstatus" required>
                              <option value="" selected disabled>Select status</option>
                              <option value="Single"  <?php if($row['civilstatus'] == 'Single') { echo 'selected'; } ?>>Single</option>
                              <option value="Married" <?php if($row['civilstatus'] == 'Married') { echo 'selected'; } ?>>Married</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Religion</span>
                          <div class="form-group">
                            <input type="text" class="form-control" name="religion" placeholder="Religion" required value="<?php echo $row['religion']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Nationality</span>
                          <div class="form-group">
                            <input type="text" class="form-control" name="nationality" placeholder="Nationality" required value="<?php echo $row['nationality']; ?>">
                          </div>
                        </div>

                        <div class="col-md-12 mt-3">
                          <a class="h5 text-primary"><b>Address</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-sm-12 mb-3">
                          <span class="text-bold">Home address</span>
                          <textarea name="address" id="" class="form-control" cols="30" rows="2" placeholder="Enter your home address here..." required><?php echo $row['address']; ?></textarea>
                        </div>
                        
                        <div class="col-sm-8">
                          <div class="form-group">
                            <span class="text-dark"><b>Upload image</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                          </div>
                        </div>
                         <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-sm-4">
                            <div class="form-group" id="preview">
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->
              </div>
              <div class="card-footer">
              <div class="float-right">
                <a href="users.php" class="btn bg-secondary"><i class="fa-solid fa-ban"></i> Cancel</a>
                <button type="submit" class="btn bg-primary" name="update_system_user" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- END UPDATE FIELDS OF ADMINISTRATOR -->
<?php } else { ?>
<!-- START CREATION FIELDS OF ADMINISTRATOR -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>New Administrator</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Administrator</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-4">
                    <form action="process_save.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-12">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4 mb-3">
                            <span class="text-bold">Usertype</span>
                            <select class="form-control" name="usertype" required>
                              <option value="Staff" selected>Staff</option>
                              <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-sm-8 col-8"></div>          
                        <div class="col-md-4 col-sm-6">
                          <span class="text-bold">First name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="First name" onkeyup="lettersOnly(this)" name="firstname" required>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <span class="text-bold">Middle name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middle name" onkeyup="lettersOnly(this)" name="middlename">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <span class="text-bold">Last name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last name" onkeyup="lettersOnly(this)" name="lastname" required>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                          <span class="text-bold">Suffix</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Suffix" name="suffix">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <span class="text-bold">Sex</span>
                          <select class="form-control" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>  
                        <div class="col-md-5 col-sm-6">
                          <span class="text-bold">Email</span>
                          <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()">
                            <small id="text" style="font-style: italic;"></small>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                          <span class="text-bold">Contact number</span>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-text bg-white">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" name="contact" placeholder = "9123456789" required maxlength="10">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-5">
                          <span class="text-bold">Date of Birth</span>
                          <div class="form-group">
                            <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <span class="text-bold">Age</span>
                          <div class="form-group">
                            <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly>
                            <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus">
                          </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                          <span class="text-bold">Civil Status</span>
                          <div class="form-group">
                            <select class="form-control" name="civilstatus" required>
                              <option value="" selected disabled>Select status</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Religion</span>
                          <div class="form-group">
                            <input type="text" class="form-control" name="religion" placeholder="Religion" required>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Nationality</span>
                          <div class="form-group">
                            <input type="text" class="form-control" name="nationality" placeholder="Nationality" required>
                          </div>
                        </div>

                        <div class="col-md-12 mt-3">
                          <a class="h5 text-primary"><b>Address</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-sm-12 mb-3">
                          <span class="text-bold">Home address</span>
                          <textarea name="address" id="" class="form-control" cols="30" rows="2" placeholder="Enter your home address here..." required></textarea>
                        </div>

                        <div class="col-md-12 mt-3">
                          <a class="h5 text-primary"><b>Account security</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                              <span><b>Password</b></span>
                              <input type="password" class="form-control"  placeholder="Password" name="password" required id="password" minlength="8">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                              <span><b>Confirm password</b></span>
                              <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required id="cpassword" onkeyup="validate_password()" minlength="8">
                              <small id="wrong_pass_alert" style="font-style: italic;"></small>
                            </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <span class="text-dark"><b>Upload image</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                          </div>
                        </div>
                         <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-sm-4">
                            <div class="form-group" id="preview">
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->
              </div>
              <div class="card-footer">
              <div class="float-right">
                <a href="users.php" class="btn bg-secondary"><i class="fa-solid fa-ban"></i> Cancel</a>
                <button type="submit" class="btn bg-primary" name="create_system_user" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </form>
              </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- END CREATION FIELDS OF ADMINISTRATOR -->
<?php } ?>
    
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

<?php } else { include '404.php'; } ?>

<?php include 'footer.php';  ?>

<script>

// GET AGE AUTOMATICALLY FROM SETTINGS DOB

    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
    }

    function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 1);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
      document.getElementById("agestatus").value = age;
      }
      }else{
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      return false;
      }
    }
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }
   

  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }


  function validate_password() {

      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }
</script>