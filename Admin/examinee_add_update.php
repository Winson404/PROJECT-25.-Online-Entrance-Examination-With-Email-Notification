<title>SPS Entrance Exam. | Examinee account</title>
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
            <h3>Update Examinee</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Examinee</li>
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
                        <input type="hidden" class="form-control" placeholder="First name" name="user_Id" required value="<?php echo $row['user_Id']; ?>">
                        <div class="col-md-12">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4 mb-3">
                            <span class="text-bold">Category</span>
                            <select class="form-control" id="myCatFunc" name="category" required onchange="myCatFunction()">
                              <option value="" selected disabled>Select category</option>
                              <option value="Senior High School" <?php if($row['examineeCategory'] == 'Senior High School') { echo 'selected'; } ?>>Senior High School</option>
                              <option value="College" <?php if($row['examineeCategory'] == 'College') { echo 'selected'; } ?>>College</option>
                              <option value="Law" <?php if($row['examineeCategory'] == 'Law') { echo 'selected'; } ?>>Law</option>
                              <option value="Graduate School" <?php if($row['examineeCategory'] == 'Graduate School') { echo 'selected'; } ?>>Graduate School</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-sm-8 col-8">
                            <div class="d-none" id="SHS">
                              <span class="text-bold">SHS Strand</span>
                              <select class="form-control" id="SHSVal" name="interestedAt">
                                <option value="" selected disabled>Select strand</option>
                                <option value="Academic: Accountancy, Business and Management (ABM)" <?php if($row['interestedAt'] == 'Academic: Accountancy, Business and Management (ABM)') { echo 'selected'; } ?>>Academic: Accountancy, Business and Management (ABM)</option>
                                <option value="Academic: General Acamedic Strand (GAS)" <?php if($row['interestedA'] == 'Academic: General Acamedic Strand (GAS)') { echo 'selected'; } ?>>Academic: General Acamedic Strand (GAS)</option>
                                <option value="Academic: Science, Technology, Engineering, and Mathematics (STEM)" <?php if($row['interestedAt'] == 'Academic: Science, Technology, Engineering, and Mathematics (STEM)') { echo 'selected'; } ?>>Academic: Science, Technology, Engineering, and Mathematics (STEM)</option>
                                <option value="Academic: Humanities and Social Sciences (HUMSS)" <?php if($row['interestedAt'] == 'Academic: Humanities and Social Sciences (HUMSS)') { echo 'selected'; } ?>>Academic: Humanities and Social Sciences (HUMSS)</option>
                                <option value="Technical-Vocational-Livelihood: Home Economics (TVL-HE)" <?php if($row['interestedAt'] == 'Technical-Vocational-Livelihood: Home Economics (TVL-HE)') { echo 'selected'; } ?>>Technical-Vocational-Livelihood: Home Economics (TVL-HE)</option>
                                <option value="Technical-Vocational-Livelihood: Informatin and Communication Technology (TVL-ICT)" <?php if($row['interestedAt'] == 'Technical-Vocational-Livelihood: Informatin and Communication Technology (TVL-ICT)') { echo 'selected'; } ?>>Technical-Vocational-Livelihood: Informatin and Communication Technology (TVL-ICT)</option>
                                <option value="Sports" <?php if($row['interestedAt'] == 'Sports') { echo 'selected'; } ?>>Sports</option>
                                <option value="Arts and Design" <?php if($row['interestedA'] == 'Arts and Design') { echo 'selected'; } ?>>Arts and Design</option>
                                <option value="Pre-baccalaureate Maritime" <?php if($row['interestedAt'] == 'Pre-baccalaureate Maritime') { echo 'selected'; } ?>>Pre-baccalaureate Maritime</option>
                              </select>
                            </div>
                            <div class="d-none" id="College">
                              <span class="text-bold">College Course</span>
                              <select class="form-control" id="CollegeVal" name="interestedAt">
                                <option value="" selected disabled>Select course</option>
                                <option value="Bachelor of Arts in Communiation" <?php if($row['interestedAt'] == 'Bachelor of Arts in Communiation') { echo 'selected'; } ?>>Bachelor of Arts in Communiation</option>

                                <option value="Bachelor of Arts in Political Science" <?php if($row['interestedAt'] == 'Bachelor of Arts in Political Science') { echo 'selected'; } ?>>Bachelor of Arts in Political Science</option>

                                <option value="Bachelor of Arts in Psychology" <?php if($row['interestedAt'] == 'Bachelor of Arts in Psychology') { echo 'selected'; } ?>>Bachelor of Arts in Psychology</option>

                                <option value="Bachelor of Science in Psychology" <?php if($row['interestedAt'] == 'Bachelor of Science in Psychology') { echo 'selected'; } ?>>Bachelor of Science in Psychology</option>

                                <option value="Bachelor of Early Childhood Education" <?php if($row['interestedAt'] == 'Bachelor of Early Childhood Education') { echo 'selected'; } ?>>Bachelor of Early Childhood Education</option>

                                <option value="Bachelor of Elementary Education" <?php if($row['interestedAt'] == 'Bachelor of Elementary Education') { echo 'selected'; } ?>>Bachelor of Elementary Education</option>

                                <option value="Bachelor of Special Need Education" <?php if($row['interestedAt'] == 'Bachelor of Special Need Education') { echo 'selected'; } ?>>Bachelor of Special Need Education</option>

                                <option value="Bachelor of Secondary Education" <?php if($row['interestedAt'] == 'Bachelor of Secondary Education') { echo 'selected'; } ?>>Bachelor of Secondary Education</option>

                                <option value="Bachelor of Library and Information Science" <?php if($row['interestedAt'] == 'Bachelor of Library and Information Science') { echo 'selected'; } ?>>Bachelor of Library and Information Science</option>

                                <option value="Bachelor of Physical Education" <?php if($row['interestedAt'] == 'Bachelor of Physical Education') { echo 'selected'; } ?>>Bachelor of Physical Education</option>

                                <option value="Bachelor of Science in Accountancy" <?php if($row['interestedAt'] == 'Bachelor of Science in Accountancy') { echo 'selected'; } ?>>Bachelor of Science in Accountancy</option>

                                <option value="Bachelor of Science in Business Administration Major in Business Management" <?php if($row['interestedAt'] == 'Bachelor of Science in Business Administration Major in Business Management') { echo 'selected'; } ?>>Bachelor of Science in Business Administration Major in Business Management</option>

                                <option value="Bachelor of Science in Management Accounting" <?php if($row['interestedAt'] == 'Bachelor of Science in Management Accounting') { echo 'selected'; } ?>>Bachelor of Science in Management Accounting</option>

                                <option value="Bachelor of Science in Business Administration Major in Marketing Management" <?php if($row['interestedAt'] == 'Bachelor of Science in Business Administration Major in Marketing Management') { echo 'selected'; } ?>>Bachelor of Science in Business Administration Major in Marketing Management</option>

                                <option value="Bachelor of Science in Business Administration in Human Resource Management" <?php if($row['interestedAt'] == 'Bachelor of Science in Business Administration in Human Resource Management') { echo 'selected'; } ?>>Bachelor of Science in Business Administration in Human Resource Management</option>

                                <option value="Bachelor of Science in Aircraft Maintenance Technology" <?php if($row['interestedAt'] == 'Bachelor of Science in Aircraft Maintenance Technology') { echo 'selected'; } ?>>Bachelor of Science in Aircraft Maintenance Technology</option>

                                <option value="Bachelor of Science in Aviation Electronics Technology" <?php if($row['interestedAt'] == 'Bachelor of Science in Aviation Electronics Technology') { echo 'selected'; } ?>>Bachelor of Science in Aviation Electronics Technology</option>

                                <option value="Bachelor of Science in Architecture" <?php if($row['interestedAt'] == 'Bachelor of Science in Architecture') { echo 'selected'; } ?>>Bachelor of Science in Architecture</option>

                                <option value="Bachelor of Science in Civil Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science in Civil Engineering') { echo 'selected'; } ?>>Bachelor of Science in Civil Engineering</option>

                                <option value="Bachelor of Science in Computer Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science in Computer Engineering') { echo 'selected'; } ?>>Bachelor of Science in Computer Engineering</option>

                                <option value="Bachelor of Science in Electrical Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science in Electrical Engineering') { echo 'selected'; } ?>>Bachelor of Science in Electrical Engineering</option>

                                <option value="Bachelor of Science in Electronics Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science in Electronics Engineering') { echo 'selected'; } ?>>Bachelor of Science in Electronics Engineering</option>

                                <option value="Bachelor of Science in Industrial Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science in Industrial Engineering') { echo 'selected'; } ?>>Bachelor of Science in Industrial Engineering</option>

                                <option value="Bachelor of Science in Mechanical Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science in Mechanical Engineering') { echo 'selected'; } ?>>Bachelor of Science in Mechanical Engineering</option>

                                <option value="Bachelor of Science in Computer Science" <?php if($row['interestedAt'] == 'Bachelor of Science in Computer Science') { echo 'selected'; } ?>>Bachelor of Science in Computer Science</option>
                                <option value="Bachelor of Science in Information Technology" <?php if($row['interestedAt'] == 'Bachelor of Science in Information Technology') { echo 'selected'; } ?>>Bachelor of Science in Information Technology</option>

                                <option value="Bachelor of Science in Criminology" <?php if($row['interestedAt'] == 'Bachelor of Science in Criminology') { echo 'selected'; } ?>>Bachelor of Science in Criminology</option>
                                <option value="Bachelor of Science in Hospitality Management" <?php if($row['interestedAt'] == 'Bachelor of Science in Hospitality Management') { echo 'selected'; } ?>>Bachelor of Science in Hospitality Management</option>

                                <option value="Assosiate in Hotel and Restaurant Management" <?php if($row['interestedAt'] == 'Assosiate in Hotel and Restaurant Management') { echo 'selected'; } ?>>Assosiate in Hotel and Restaurant Management</option>

                                <option value="Bachelor of Science in Tourism Management" <?php if($row['interestedAt'] == 'Bachelor of Science in Tourism Management') { echo 'selected'; } ?>>Bachelor of Science in Tourism Management</option>

                                <option value="Bachelor of Science in Nutrition and Dietetics" <?php if($row['interestedAt'] == 'Bachelor of Science in Nutrition and Dietetics') { echo 'selected'; } ?>>Bachelor of Science in Nutrition and Dietetics</option>

                                <option value="Bachelor of Science in Marine Transportation" <?php if($row['interestedAt'] == 'Bachelor of Science in Marine Transportation') { echo 'selected'; } ?>>Bachelor of Science in Marine Transportation</option>

                                <option value="Bachelor of Science Marine Engineering" <?php if($row['interestedAt'] == 'Bachelor of Science Marine Engineering') { echo 'selected'; } ?>>Bachelor of Science Marine Engineering</option>
                              </select>
                            </div>

                            <div class="d-none" id="GraduateSchool">
                              <span class="text-bold">Graduate School</span>
                              <select class="form-control" id="GraduateVal" name="interestedAt">
                                <option value="" selected disabled>Select course</option>
                                <option value="Doctor of Philosophy Major in Business Management" <?php if($row['interestedAt'] == 'Doctor of Philosophy Major in Business Management') { echo 'selected'; } ?>>Doctor of Philosophy Major in Business Management</option>
                                <option value="Doctor of Philosophy Major in Educational Management" <?php if($row['interestedAt'] == 'Doctor of Philosophy Major in Educational Management') { echo 'selected'; } ?> >Doctor of Philosophy Major in Educational Management</option>
                                <option value="Doctor of Occupational Therapy (DOT)" <?php if($row['interestedAt'] == 'Doctor of Occupational Therapy (DOT)') { echo 'selected'; } ?>>Doctor of Occupational Therapy (DOT)</option>
                                <option value="Doctor of Physical Therapy (DPT)" <?php if($row['interestedAt'] == 'Doctor of Physical Therapy (DPT)') { echo 'selected'; } ?>>Doctor of Physical Therapy (DPT)</option>
                                <option value="Master in Business Administration (MBA)" <?php if($row['interestedAt'] == 'Master in Business Administration (MBA)') { echo 'selected'; } ?>>Master in Business Administration (MBA)</option>
                                <option value="Master in Hospital Administration (MHA)" <?php if($row['interestedAt'] == 'Master in Hospital Administration (MHA)') { echo 'selected'; } ?>>Master in Hospital Administration (MHA)</option>
                                <option value="Master of Arts in Education Major in Teaching English as Second Language (MAEd-TESL)" <?php if($row['interestedAt'] == 'Master of Arts in Education Major in Teaching English as Second Language (MAEd-TESL)') { echo 'selected'; } ?>>Master of Arts in Education Major in Teaching English as Second Language (MAEd-TESL)</option>
                                <option value="Master of Arts in Education Major in Educational Management (MAEd-EM)" <?php if($row['interestedAt'] == 'Master of Arts in Education Major in Educational Management (MAEd-EM)') { echo 'selected'; } ?>>Master of Arts in Education Major in Educational Management (MAEd-EM)</option>

                                <option value="Master of Arts in Education Major in Special Education (MAEd-SPED)" <?php if($row['interestedAt'] == 'Master of Arts in Education Major in Special Education (MAEd-SPED)') { echo 'selected'; } ?>>Master of Arts in Education Major in Special Education (MAEd-SPED)</option>
                                <option value="Master of Library and Information Science (MLIS)" <?php if($row['interestedAt'] == 'Master of Library and Information Science (MLIS)') { echo 'selected'; } ?>>Master of Library and Information Science (MLIS)</option>
                                <option value="Master of Science in Microbiology (MSM)" <?php if($row['interestedAt'] == 'Master of Science in Microbiology (MSM)') { echo 'selected'; } ?>>Master of Science in Microbiology (MSM)</option>
                                <option value="Master of Science of Clinical Program Development (MSCPD)" <?php if($row['interestedAt'] == 'Master of Science of Clinical Program Development (MSCPD)') { echo 'selected'; } ?>>Master of Science of Clinical Program Development (MSCPD)</option>
                                <option value="Master of Arts in Radiology Technology (MSRT)" <?php if($row['interestedAt'] == 'Master of Arts in Radiology Technology (MSRT)') { echo 'selected'; } ?>>Master of Arts in Radiology Technology (MSRT)</option>
                                <option value="Master of Science in Information Technology (MSIT)" <?php if($row['interestedAt'] == 'Master of Science in Information Technology (MSIT)') { echo 'selected'; } ?>>Master of Science in Information Technology (MSIT)</option>
                                <option value="Master of Science in Psychology Major in Development Psychology (MSPsy)" <?php if($row['interestedAt'] == 'Master of Science in Psychology Major in Development Psychology (MSPsy)') { echo 'selected'; } ?>>Master of Science in Psychology Major in Development Psychology (MSPsy)</option>
                                <option value="Master of Science in Management Engineering (MSME)" <?php if($row['interestedAt'] == 'Master of Science in Management Engineering (MSME)') { echo 'selected'; } ?>>Master of Science in Management Engineering (MSME)</option>
                                <option value="Master of Science in Pharmacy (MSPharma)" <?php if($row['interestedAt'] == 'Master of Science in Pharmacy (MSPharma)') { echo 'selected'; } ?>>Master of Science in Pharmacy (MSPharma)</option>
                                <option value="Master of Science in Clinical Laboratory Science (MSCLS)" <?php if($row['interestedAt'] == 'Master of Science in Clinical Laboratory Science (MSCLS)') { echo 'selected'; } ?>>Master of Science in Clinical Laboratory Science (MSCLS)</option>
                                <option value="Master of Arts in Communication" <?php if($row['interestedAt'] == 'Master of Arts in Communication') { echo 'selected'; } ?>>Master of Arts in Communication</option>
                                <option value="Master of Arts in Guidance and Counseling" <?php if($row['interestedAt'] == 'Master of Arts in Guidance and Counseling') { echo 'selected'; } ?>>Master of Arts in Guidance and Counseling</option>
                                <option value="Master of Arts in Education Major in Mathematics (MAEd-MATH)" <?php if($row['interestedAt'] == 'Master of Arts in Education Major in Mathematics (MAEd-MATH)') { echo 'selected'; } ?>>Master of Arts in Education Major in Mathematics (MAEd-MATH)</option>
                                <option value="Master of Arts in Education Major in Filipino (MAEd-Filipino)" <?php if($row['interestedAt'] == 'Master of Arts in Education Major in Filipino (MAEd-Filipino)') { echo 'selected'; } ?>>Master of Arts in Education Major in Filipino (MAEd-Filipino)</option>
                                <option value="Juris Doctor (JD)" <?php if($row['interestedAt'] == 'Juris Doctor (JD)') { echo 'selected'; } ?>>Juris Doctor (JD)</option>
                              </select>
                            </div>
                        </div>          
                        <div class="col-md-4 col-sm-6">
                          <span class="text-bold">First name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="First name" onkeyup="lettersOnly(this)" name="firstname" required value="<?php echo $row['firstname']; ?>">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <span class="text-bold">Middle name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middle name" onkeyup="lettersOnly(this)" name="middlename" value="<?php echo $row['middlename']; ?>">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <span class="text-bold">Last name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last name" onkeyup="lettersOnly(this)" name="lastname" required value="<?php echo $row['lastname']; ?>">
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                          <span class="text-bold">Suffix</span>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Suffix" name="suffix" value="<?php echo $row['suffix']; ?>">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <span class="text-bold">Sex</span>
                          <select class="form-control" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="Male"   <?php if($row['gender'] == 'Male') { echo 'selected'; } ?>>Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?>>Female</option>
                          </select>
                        </div>  
                        <div class="col-md-5 col-sm-6">
                          <span class="text-bold">Email</span>
                          <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()" value="<?php echo $row['email']; ?>">
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
                        <div class="col-sm-12 mb-3">
                          <span class="text-bold">Home address</span>
                          <textarea name="address" id="" class="form-control" cols="30" rows="2" placeholder="Enter your home address here..." required><?php echo $row['address']; ?></textarea>
                        </div>

                        <div class="col-md-12 mt-3">
                          <a class="h5 text-primary"><b>Parent / Guardian Information</b></a>
                          <div class="dropdown-divider"></div>
                        </div> 
                        <div class="col-sm-8">
                          <span class="text-bold">Parent / Guardian's Name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" name="parentName" placeholder="Parent / Guardian's Name" required value="<?php echo $row['parentsName']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <span class="text-bold">Parent / Guardian's Contact number</span>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-text bg-white">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" name="parentContact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['parentsContact']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Parent / Guardian's Email address</span>
                          <div class="form-group">
                            <input type="email" class="form-control" id="parentemail" name="parentEmail" placeholder = "email@gmail.com" required onkeydown="parentValidation()" onkeyup="parentValidation()" value="<?php echo $row['parentsEmail']; ?>">
                            <small id="parenttext" style="font-style: italic;"></small>
                          </div>
                        </div>

                        <div class="col-md-12 mt-3">
                          <a class="h5 text-primary"><b>School information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                              <span><b>School last attended</b></span>
                              <input type="text" class="form-control"  placeholder="School last attended" name="schoolLastAttended" required value="<?php echo $row['school']; ?>">
                            </div>
                        </div>

                       
                    </div>
                    <!-- END ROW -->
              </div>
              <div class="card-footer">
              <div class="float-right">
                <a href="examinee.php" class="btn bg-secondary"><i class="fa-solid fa-ban"></i> Cancel</a>
                <button type="submit" class="btn bg-primary" name="update_examinee" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
            <h3>New Examinee</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Examinee</li>
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
                            <span class="text-bold">Category</span>
                            <select class="form-control" id="myCatFunc" name="category" required onchange="myCatFunction()">
                              <option value="" selected disabled>Select category</option>
                              <option value="Senior High School">Senior High School</option>
                              <option value="College">College</option>
                              <option value="Law">Law</option>
                              <option value="Graduate School">Graduate School</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-sm-8 col-8">

                            <div class="d-none" id="SHS">
                              <span class="text-bold">SHS Strand</span>
                              <select class="form-control" id="SHSVal" name="interestedAt">
                                <option value="" selected disabled>Select strand</option>
                                <option value="Academic: Accountancy, Business and Management (ABM)">Academic: Accountancy, Business and Management (ABM)</option>
                                <option value="Academic: General Acamedic Strand (GAS)">Academic: General Acamedic Strand (GAS)</option>
                                <option value="Academic: Science, Technology, Engineering, and Mathematics (STEM)">Academic: Science, Technology, Engineering, and Mathematics (STEM)</option>
                                <option value="Academic: Humanities and Social Sciences (HUMSS)">Academic: Humanities and Social Sciences (HUMSS)</option>
                                <option value="Technical-Vocational-Livelihood: Home Economics (TVL-HE)">Technical-Vocational-Livelihood: Home Economics (TVL-HE)</option>
                                <option value="Technical-Vocational-Livelihood: Informatin and Communication Technology (TVL-ICT)">Technical-Vocational-Livelihood: Informatin and Communication Technology (TVL-ICT)</option>
                                <option value="Sports">Sports</option>
                                <option value="Arts and Design">Arts and Design</option>
                                <option value="Pre-baccalaureate Maritime">Pre-baccalaureate Maritime</option>
                              </select>
                            </div>

                            <div class="d-none" id="College">
                              <span class="text-bold">College Course</span>
                              <select class="form-control" id="CollegeVal" name="interestedAt">
                                <option value="" selected disabled>Select course</option>
                                <option value="Bachelor of Arts in Communiation">Bachelor of Arts in Communiation</option>
                                <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
                                <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
                                <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                                <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
                                <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                                <option value="Bachelor of Special Need Education">Bachelor of Special Need Education</option>
                                <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                                <option value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option>
                                <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                                <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                                <option value="Bachelor of Science in Business Administration Major in Business Management">Bachelor of Science in Business Administration Major in Business Management</option>
                                <option value="Bachelor of Science in Management Accounting">Bachelor of Science in Management Accounting</option>
                                <option value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management</option>
                                <option value="Bachelor of Science in Business Administration in Human Resource Management">Bachelor of Science in Business Administration in Human Resource Management</option>
                                <option value="Bachelor of Science in Aircraft Maintenance Technology">Bachelor of Science in Aircraft Maintenance Technology</option>
                                <option value="Bachelor of Science in Aviation Electronics Technology">Bachelor of Science in Aviation Electronics Technology</option>
                                <option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
                                <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                                <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                                <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                                <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                                <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                                <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                                <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                                <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                                <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                                <option value="Assosiate in Hotel and Restaurant Management">Assosiate in Hotel and Restaurant Management</option>
                                <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                                <option value="Bachelor of Science in Nutrition and Dietetics">Bachelor of Science in Nutrition and Dietetics</option>
                                <option value="Bachelor of Science in Marine Transportation">Bachelor of Science in Marine Transportation</option>
                                <option value="Bachelor of Science Marine Engineering">Bachelor of Science Marine Engineering</option>
                              </select>
                            </div>

                            <div class="d-none" id="GraduateSchool">
                              <span class="text-bold">Graduate School</span>
                              <select class="form-control" id="GraduateVal" name="interestedAt">
                                <option value="" selected disabled>Select course</option>
                                <option value="Doctor of Philosophy Major in Business Management">Doctor of Philosophy Major in Business Management</option>
                                <option value="Doctor of Philosophy Major in Educational Management">Doctor of Philosophy Major in Educational Management</option>
                                <option value="Doctor of Occupational Therapy (DOT)">Doctor of Occupational Therapy (DOT)</option>
                                <option value="Doctor of Physical Therapy (DPT)">Doctor of Physical Therapy (DPT)</option>
                                <option value="Master in Business Administration (MBA)">Master in Business Administration (MBA)</option>
                                <option value="Master in Hospital Administration (MHA)">Master in Hospital Administration (MHA)</option>
                                <option value="Master of Arts in Education Major in Teaching English as Second Language (MAEd-TESL)">Master of Arts in Education Major in Teaching English as Second Language (MAEd-TESL)</option>
                                <option value="Master of Arts in Education Major in Educational Management (MAEd-EM)">Master of Arts in Education Major in Educational Management (MAEd-EM)</option>
                                <option value="Master of Arts in Education Major in Special Education (MAEd-SPED)">Master of Arts in Education Major in Special Education (MAEd-SPED)</option>
                                <option value="Master of Library and Information Science (MLIS)">Master of Library and Information Science (MLIS)</option>
                                <option value="Master of Science in Microbiology (MSM)">Master of Science in Microbiology (MSM)</option>
                                <option value="Master of Science of Clinical Program Development (MSCPD)">Master of Science of Clinical Program Development (MSCPD)</option>
                                <option value="Master of Arts in Radiology Technology (MSRT)">Master of Arts in Radiology Technology (MSRT)</option>
                                <option value="Master of Science in Information Technology (MSIT)">Master of Science in Information Technology (MSIT)</option>
                                <option value="Master of Science in Psychology Major in Development Psychology (MSPsy)">Master of Science in Psychology Major in Development Psychology (MSPsy)</option>
                                <option value="Master of Science in Management Engineering (MSME)">Master of Science in Management Engineering (MSME)</option>
                                <option value="Master of Science in Pharmacy (MSPharma)">Master of Science in Pharmacy (MSPharma)</option>
                                <option value="Master of Science in Clinical Laboratory Science (MSCLS)">Master of Science in Clinical Laboratory Science (MSCLS)</option>
                                <option value="Master of Arts in Communication">Master of Arts in Communication</option>
                                <option value="Master of Arts in Guidance and Counseling">Master of Arts in Guidance and Counseling</option>
                                <option value="Master of Arts in Education Major in Mathematics (MAEd-MATH)">Master of Arts in Education Major in Mathematics (MAEd-MATH)</option>
                                <option value="Master of Arts in Education Major in Filipino (MAEd-Filipino)">Master of Arts in Education Major in Filipino (MAEd-Filipino)</option>
                                <option value="Juris Doctor (JD)">Juris Doctor (JD)</option>
                              </select>
                            </div>

                        </div>          
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

                        <div class="col-md-12 mt-32">
                          <a class="h5 text-primary"><b>Parent / Guardian Information</b></a>
                          <div class="dropdown-divider"></div>
                        </div> 
                        <div class="col-sm-8">
                          <span class="text-bold">Parent / Guardian's Name</span>
                          <div class="form-group">
                            <input type="text" class="form-control" name="parentName" placeholder="Parent / Guardian's Name" required>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <span class="text-bold">Parent / Guardian's Contact number</span>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-text bg-white">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" name="parentContact" placeholder = "9123456789" required maxlength="10">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <span class="text-bold">Parent / Guardian's Email address</span>
                          <div class="form-group">
                            <input type="email" class="form-control" id="parentemail" name="parentEmail" placeholder = "email@gmail.com" required onkeydown="parentValidation()" onkeyup="parentValidation()">
                            <small id="parenttext" style="font-style: italic;"></small>
                          </div>
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

                        <div class="col-md-12 mt-3">
                          <a class="h5 text-primary"><b>School information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                              <span><b>School last attended</b></span>
                              <input type="text" class="form-control"  placeholder="School last attended" name="schoolLastAttended" required>
                            </div>
                        </div>

                       
                    </div>
                    <!-- END ROW -->
              </div>
              <div class="card-footer">
              <div class="float-right">
                <a href="examinee.php" class="btn bg-secondary"><i class="fa-solid fa-ban"></i> Cancel</a>
                <button type="submit" class="btn bg-primary" name="create_examinee" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
              </div>
              </form>
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

<?php } else { include '404.php'; } ?>

<?php include 'footer.php';  ?>

<script>

  // AUTO CHANGE FOR COURSE FOR COLLEGE AND STRAND FOR SHS
  function myCatFunction() {
    
    var cat = document.getElementById("myCatFunc").value;
    var shslabel = $("#SHS");
    var college = $("#College");
    var graduate = $("#GraduateSchool");
    var s = document.getElementById("SHSVal");
    var c = document.getElementById("CollegeVal");
    var gs = document.getElementById("GraduateVal");

    if(cat == "Senior High School") {
      shslabel.removeClass('d-none');
      college.addClass('d-none');
      graduate.addClass('d-none');
      graduateValue = document.getElementById("GraduateVal").value = "";
      collegeValue = document.getElementById("CollegeVal").value = "";
      c.removeAttribute('required');
      gs.removeAttribute('required');
      s.setAttribute('required', '');

    } else if(cat == "College") {
      college.removeClass('d-none');
      shslabel.addClass('d-none');
      graduate.addClass('d-none');
      shslabelValue = document.getElementById("SHSVal").value = "";
      graduateValue = document.getElementById("GraduateVal").value = "";
      s.removeAttribute('required');
      gs.removeAttribute('required');
      c.setAttribute('required', '');
      
    } else if(cat == "Graduate School") {
      college.addClass('d-none');
      shslabel.addClass('d-none');
      graduate.removeClass('d-none');
      shslabelValue = document.getElementById("SHSVal").value = "";
      collegeValue = document.getElementById("CollegeVal").value = "";
      s.removeAttribute('required');
      c.removeAttribute('required');
      gs.setAttribute('required', '');
      
    } else {
      college.addClass('d-none');
      shslabel.addClass('d-none');
      graduate.addClass('d-none');
      collegeValue = document.getElementById("CollegeVal").value = "";
      shslabelValue = document.getElementById("SHSVal").value = "";
      graduateValue = document.getElementById("GraduateVal").value = "";
      c.removeAttribute('required');
      s.removeAttribute('required');
      gs.removeAttribute('required');
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


  function getAge(dateString) {
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


  function getAgeVal(pid) {
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


  // DISABLE NUMERIC
  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }


  // EMAIL VALIDATION
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


  // PARENT EMAIL VALIDATION
  function parentValidation() {
    var email = document.getElementById("parentemail").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('parenttext').style.color = 'green';
        document.getElementById('parenttext').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('parenttext').style.color = 'red';
        document.getElementById('parenttext').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }

  // PASSWORD VALIDATION
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