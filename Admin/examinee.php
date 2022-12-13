<title>SPS Entrance Exam. | Examinee account mgmt.</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Examinee account mgmt.</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Examinee account mgmt.</li>
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
                <a href="examinee_add_update.php?page=create" type="button" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Examinee</a> 

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
                    <th>Full name</th>
                    <th>Contact details</th>
                    <th>Category</th>
                    <th>Address</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 'Examinee' ");
                        if(mysqli_num_rows($sql) > 0 ) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td class="text-sm">
                          +63 <?php echo $row['contact']; ?><br>
                          <?php echo $row['email']; ?>
                        </td>
                        <td><?php echo $row['examineeCategory']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                          <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update<?php //echo $row['officialID']; ?>"><i class="fas fa-folder"></i> View</button> -->
                          <a href="examinee_add_update.php?page=<?php echo $row['user_Id']; ?>" type="button" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#password<?php echo $row['user_Id']; ?>"><i class="fa-solid fa-lock"></i> Security</button>
                          <?php if($row['user_type'] != "Admin"): ?>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['user_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                          <?php endif; ?>
                        </td> 
                    </tr>
                    <?php include 'examinee_delete.php'; } } else { ?>
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

