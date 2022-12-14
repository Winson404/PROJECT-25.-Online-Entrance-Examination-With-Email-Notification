<?php 

    include 'navbar.php';
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">         
<?php 
    if($page !== 'create') {
      $bookingsId = $page;
      $fetch = mysqli_query($conn, "SELECT * FROM exam_bookings WHERE bookingsId='$bookingsId'");
      $row_bookings = mysqli_fetch_array($fetch);
?>
          <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Update schedule</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update schedule</li>
                  </ol>
                </div>
              </div>
            </div>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header col-12">
                      <a class="h6 text-primary"><b>Fill in the required fields</b></a>
                      <a href="sched_ExamTakers.php" type="button" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
                    </div>

                    <form action="process_update.php" method="POST" autocomplete="off">
                      <div class="card-body p-3">
                        <input type="hidden" class="form-control" value="<?php echo $row_bookings['bookingsId']; ?>" name="bookingsId">
                        <div class="form-group">
                          <span class="text-dark"><b>Examinee</b></span>
                          <select name="examinee" id="" class="form-control" required>
                            <option value="" selected disabled>Select examinee</option>
                            <?php 
                                $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Examinee' ");
                                if(mysqli_num_rows($fetch) > 0) {
                                  while ($row = mysqli_fetch_array($fetch)) {
                            ?>
                                  <option value="<?php echo $row['user_Id']; ?>" <?php if($row['user_Id'] == $row_bookings['bookingsUserId']) { echo 'selected'; } ?> ><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></option>
                            <?php } } else { ?>
                                  <option value="" selected>No record found</option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <span class="text-dark"><b>Schedule Date and Time</b></span>
                          <select name="dateSched" id="" class="form-control" required>
                            <option value="" selected disabled>Select schedule</option>
                            <?php 
                                $fetch = mysqli_query($conn, "SELECT * FROM schedule");
                                if(mysqli_num_rows($fetch) > 0) {
                                  while ($row = mysqli_fetch_array($fetch)) {
                            ?>
                                  <option value="<?php echo $row['schedID']; ?>" <?php if($row['schedID'] == $row_bookings['bookingsSchedID']) { echo 'selected'; } ?>><?php echo ' '.$row['schedDate'].' @ exactly '.$row['schedTimeStart'].' - '.$row['schedTimeEnd'].' '; ?></option>
                            <?php } } else { ?>
                                  <option value="" selected>No record found</option>
                            <?php } ?>
                          </select>
                        </div>
                      <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm" name="update_bookingSchedule">Submit</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </section> 


<?php } else { ?>

          <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h3>New Examinee schedule</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Examinee schedule</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

         <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header col-12">
                      <a class="h6 text-primary"><b>Fill in the required fields</b></a>
                      <a href="sched_ExamTakers.php" type="button" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
                    </div>

                    <form action="process_save.php" method="POST" autocomplete="off">
                      <div class="card-body p-3">
                        <div class="form-group">
                          <span class="text-dark"><b>Examinee</b></span>
                          <select name="examinee" id="" class="form-control" required>
                            <option value="" selected disabled>Select examinee</option>
                            <?php 
                                $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Examinee' ");
                                if(mysqli_num_rows($fetch) > 0) {
                                  while ($row = mysqli_fetch_array($fetch)) {
                            ?>
                                  <option value="<?php echo $row['user_Id']; ?>"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></option>
                            <?php } } else { ?>
                                  <option value="" selected>No record found</option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <span class="text-dark"><b>Schedule Date and Time</b></span>
                          <select name="dateSched" id="" class="form-control" required>
                            <option value="" selected disabled>Select schedule</option>
                            <?php 
                                $fetch = mysqli_query($conn, "SELECT * FROM schedule");
                                if(mysqli_num_rows($fetch) > 0) {
                                  while ($row = mysqli_fetch_array($fetch)) {
                            ?>
                                  <option value="<?php echo $row['schedID']; ?>"><?php echo ' '.$row['schedDate'].' @ exactly '.$row['schedTimeStart'].' - '.$row['schedTimeEnd'].' '; ?></option>
                            <?php } } else { ?>
                                  <option value="" selected>No record found</option>
                            <?php } ?>
                          </select>
                        </div>
                      <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm" name="new_bookingSchedule">Submit</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </section> 

<?php } ?>

        </div>
    
<?php  } else { include '404.php'; } ?>

  

<?php include 'footer.php';  ?>
