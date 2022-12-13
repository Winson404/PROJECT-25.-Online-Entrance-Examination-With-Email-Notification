<title>SPS Entrance Exam. | Admin profile</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <?php if($row['image'] == ""): ?>
                    <img src="../dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
                    <?php else: ?>
                    <img class="profile-user-img img-fluid img-circle"src="../images-users/<?php echo $row['image']; ?>"alt="User profile picture"  style="height: 90px; width: 90px; border-radius: 50%;">
                    <?php endif; ?>
                    
                </div>
                <h3 class="profile-username text-center"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?></h3>
                <p class="text-muted text-center"><?php echo $row['user_type']; ?></p>
                <a class="btn bg-gradient-primary btn-block">Profile</a>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header bg-gradient-primary">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fa-solid fa-flag"></i> Nationality</strong>
                <p class="text-muted"><?php echo $row['nationality']; ?></p>
                <hr>

                <strong><i class="fa-solid fa-location-dot"></i> Home address</strong>
                <p class="text-muted"><?php echo $row['address']; ?></p>
                <hr>
                
                <strong><i class="fa-solid fa-cake-candles"></i> Date of birth</strong>
                <p class="text-muted"><?php echo ''.$row['dob'].' - '.$row['age'].''; ?></p>
                <hr>

                <strong><i class="fa-solid fa-calendar-days"></i> Date registered</strong>
                <p class="text-muted ml-3"><?php echo $row['date_registered']; ?></p>
                <hr>
              </div>
            </div>

          </div>


          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#viewprofile" data-toggle="tab">Profile info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#updateprofile" data-toggle="tab">Update info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#profileupdate" data-toggle="tab">Profile update</a></li>
                  <li class="nav-item"><a class="nav-link" href="#accountsecurity" data-toggle="tab">Account security</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">








                  <div class="active tab-pane" id="viewprofile">
                     <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Email" placeholder="Email" value="<?php echo $row['gender']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="input-group-text">+63</div>
                            <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="Contact number" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a type="button" class="btn bg-gradient-primary" href="#updateprofile" data-toggle="tab">Update info</a>
                        </div>
                      </div>
                  </div>













                  <div class="tab-pane" id="updateprofile">
                      <form action="process_update.php" method="POST">
                      <div class="row">
                        <input type="hidden" class="form-control" id="Date of birth" placeholder="User Id" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                        <div class="col-md-12">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">First name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="First name" value="<?php echo $row['firstname']; ?>" onkeyup="lettersOnly(this)" name="firstname" required>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Middle name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middle name" value="<?php echo $row['middlename']; ?>"  onkeyup="lettersOnly(this)" name="middlename">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Last name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last name" value="<?php echo $row['lastname']; ?>" onkeyup="lettersOnly(this)" name="lastname" required>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span class="text-bold">Suffix</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Suffix" value="<?php echo $row['suffix']; ?>" name="suffix">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span class="text-bold">Gender</span>
                          <select class="form-control" name="gender" required>
                            <option value=""       <?php if($row['gender'] !== 'Male' || $row['gender'] == 'Female') { echo 'selected'; } ?> disabled>Select gender</option>
                            <option value="Male"   <?php if($row['gender'] == 'Male') { echo 'selected'; } ?> >Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?> >Female</option>
                          </select>
                        </div>  
                        <div class="col-sm-6">
                          <span class="text-bold">Email</span>
                          <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()"  value="<?php echo $row['email']; ?>">
                            <small id="text" style="font-style: italic;"></small>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Contact number</span>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-text bg-white">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <span class="text-bold">Date of Birth</span>
                          <div class="form-group">
                            <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);" value="<?php echo $row['dob']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span class="text-bold">Age</span>
                          <div class="form-group">
                            <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly value="<?php echo $row['age']; ?>">
                            <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus" value="<?php echo $row['age']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <span class="text-bold">Civil Status</span>
                          <div class="form-group">
                            <select class="form-control" name="civilstatus" required>
                              <option value="" selected disabled>Select status</option>
                              <option value="Single"  <?php if($row['civilstatus'] == 'Single') { echo 'selected'; } ?> >Single</option>
                              <option value="Married" <?php if($row['civilstatus'] == 'Married') { echo 'selected'; } ?> >Married</option>
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
                        <div class="col-sm-12">
                          <span class="text-bold">Home address</span>
                          <textarea name="address" id="" class="form-control" cols="30" rows="2" placeholder="Enter your home address here..." required><?php echo $row['address']; ?></textarea>
                        </div>

                        <div class="col-sm-12">
                            <div class="dropdown-divider"></div>
                            <button type="submit" class="btn bg-gradient-primary" id="update_admin" name="update_profile">Submit</button>
                        </div>
                      </div>
                     </form>
                  </div>




                  <div class="tab-pane" id="accountsecurity">
                    <form action="process_update.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                      <div class="form-group row">
                        <label for="Old password" class="col-sm-2 col-form-label">Old password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="Old password" placeholder="Old password" name="OldPassword" required minlength="8">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="new_password" class="col-sm-2 col-form-label">New password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Password" name="password" required id="new_password" minlength="8">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="cpassword" class="col-sm-2 col-form-label">Confirm password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required id="new_cpassword" onkeyup="new_validate_password()" minlength="8">
                          <small id="new_wrong_pass_alert" style="font-style: italic;"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-gradient-primary" name="update_password_admin" id="update_password_admin">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>



                  <div class="tab-pane" id="profileupdate">
                    <form action="process_update.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                      <div class="row d-flex justify-content-center">
                        <!-- LOAD IMAGE PREVIEW -->
                      <div class="col-lg-10">
                          <div class="form-group" id="user_preview">
                          </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="form-group">
                          <span class="text-dark"><b>Update profile</b></span>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="newgetImagePreview(event)" required>
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>

                          </div>
                          <p class="help-block text-danger">Max. 500KB</p>
                        </div>
                        <hr>
                     </div>

                      </div>
                     <div class="ml-3">
                       <button type="submit" class="ml-5 btn bg-gradient-primary" name="update_profile_admin">Submit</button>
                     </div>
                    </form>
                  </div>


                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php include 'footer.php'; ?>


<script>
  
  function new_validate_password() {

      var pass = document.getElementById('new_password').value;
      var confirm_pass = document.getElementById('new_cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('new_wrong_pass_alert').style.color = 'red';
        document.getElementById('new_wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('update_password_admin').disabled = true;
        document.getElementById('update_password_admin').style.opacity = (0.4);
      } else {
        document.getElementById('new_wrong_pass_alert').style.color = 'green';
        document.getElementById('new_wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('update_password_admin').disabled = false;
        document.getElementById('update_password_admin').style.opacity = (1);
      }
    }


 function newgetImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('user_preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="150";
    newimg.height="150";
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
        document.getElementById('update_admin').disabled = false;
        document.getElementById('update_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('update_admin').disabled = true;
        document.getElementById('update_admin').style.opacity = (0.4);
        
    }
  }






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

</script>
