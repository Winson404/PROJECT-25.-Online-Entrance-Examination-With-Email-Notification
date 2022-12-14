<?php include 'navbar.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">         

          <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Booking examination schedule</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Booking examination schedule</li>
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
                <div class="col-md-10">
                  <div class="card">
                    <div class="card-header col-12">
                      <?php 
                          $booked = mysqli_query($conn, "SELECT * FROM exam_bookings JOIN schedule ON exam_bookings.bookingsSchedID=schedule.schedID WHERE bookingsUserId='$id'");
                          if(mysqli_num_rows($booked) > 0) {
                            $aa = mysqli_fetch_array($booked);
                      ?>
                          <a href="#">
                            Booked schedule: <b><?php echo date("F d, Y", strtotime($aa['schedDate'])); echo '@ exactly '.$aa['schedTimeStart'].' - '.$aa['schedTimeEnd'].' ' ?></b> <br> 
                            Booking Status: 
                            <?php if($aa['bookingsStatus'] == 'Pending'): ?>
                              <span class="text-muted"><?php echo $aa['bookingsStatus']; ?></span>
                            <?php else: ?>
                              <span><b>Confirmed</b></span>
                            <?php endif; ?>
                          </a>
                      <?php      
                          } else {
                      ?>
                      <a href="#">
                        Booked schedule: You haven't booked a schedule yet. Book now! <br> 
                        Booking Status: N/A
                      </a>
                      <?php } ?>
                    </div>

                    <form action="process_save.php" method="POST" autocomplete="off">
                      <div class="card-body p-3">
                        <h5 class="text-center">Available schedules</h5>
                        <hr>
                          <table id="example1" class="table table-bordered table-hover text-sm">
                            <thead>
                            <tr>
                              <th>Schedule Date</th>
                              <th>Time Start</th>
                              <th>Time End</th>
                              <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody id="users_data">
                              <tr>
                                <?php 
                                  $sql = mysqli_query($conn, "SELECT * FROM schedule");
                                  if(mysqli_num_rows($sql) > 0 ) {
                                  while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                  <td><?php echo date("F d, Y", strtotime($row['schedDate'])); ?></td>
                                  <td><?php echo $row['schedTimeStart']; ?></td>
                                  <td><?php echo $row['schedTimeEnd']; ?></td>
                                  <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#confirm<?php echo $row['schedID']; ?>"><i class="fa-solid fa-circle-check"></i> Book schedule</button>
                                  </td> 
                              </tr>
                              <?php  include 'bookExamSchedule.php'; } } else { ?>
                                  <td colspan="100%" class="text-center">No record found</td>
                                </tr>
                              <?php }?>
                            </tbody>
                          </table>
                      
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </section> 

        </div>
    

<?php include 'footer.php';  ?>
