<?php 

    include 'navbar.php';
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">         
<?php 
    if($page !== 'create') {
      $schedID = $page;
      $fetch = mysqli_query($conn, "SELECT * FROM schedule WHERE schedID='$schedID'");
      $row = mysqli_fetch_array($fetch);
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
                      <a href="schedule.php" type="button" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
                    </div>

                    <form action="process_update.php" method="POST" autocomplete="off">
                      <div class="card-body p-3">
                        <input type="hidden" class="form-control"  placeholder="Specify payment type..." name="schedID" required value="<?php echo $row['schedID']; ?>">
                        <div class="form-group">
                          <span class="text-dark"><b>Date</b></span>
                          <input type="date" class="form-control"  placeholder="Specify payment type..." name="date" required value="<?php echo $row['schedDate']; ?>">
                        </div>
                        <div class="form-group">
                          <span class="text-dark"><b>Time Start</b></span>
                          <input type="time" class="form-control"  placeholder="Enter amount here..." name="timestart" required value="<?php echo $row['schedTimeStart']; ?>">
                        </div>
                        <div class="form-group">
                          <span class="text-dark"><b>Time End</b></span>
                          <input type="time" class="form-control"  placeholder="Enter amount here..." name="timeend" required value="<?php echo $row['schedTimeEnd']; ?>">
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm" name="update_schedule">Submit</button>
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
                  <h3>New schedule</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New schedule</li>
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
                      <a href="schedule.php" type="button" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
                    </div>

                    <form action="process_save.php" method="POST" autocomplete="off">
                      <div class="card-body p-3">
                        <div class="form-group">
                          <span class="text-dark"><b>Date</b></span>
                          <input type="date" class="form-control"  placeholder="Specify payment type..." name="date" required>
                        </div>
                        <div class="form-group">
                          <span class="text-dark"><b>Time Start</b></span>
                          <input type="time" class="form-control"  placeholder="Enter amount here..." name="timestart" required>
                        </div>
                        <div class="form-group">
                          <span class="text-dark"><b>Time End</b></span>
                          <input type="time" class="form-control"  placeholder="Enter amount here..." name="timeend" required>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm" name="new_schedule">Submit</button>
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
