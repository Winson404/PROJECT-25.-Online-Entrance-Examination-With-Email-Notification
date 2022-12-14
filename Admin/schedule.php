<title>SPS Entrance Exam. | Schedule mgmt.</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Schedule Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Schedule</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <a href="schedule_add_update.php?page=create" type="button" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Schedule</a> 

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>

              </div>
              <div class="card-body p-3">

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
                          <a href="schedule_add_update.php?page=<?php echo $row['schedID']; ?>" type="button" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['schedID']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td> 
                    </tr>
                    <?php include 'schedule_delete.php'; } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>

              </div><!-- /.card-body -->
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
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>

