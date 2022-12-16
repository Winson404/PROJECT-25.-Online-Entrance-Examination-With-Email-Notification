<title>Online Entrance Examination | Category</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
              <div class="card-header">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
              </div>
              <div class="card-body">

                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category name</th>
                    <th class="text-center">No. of items</th>
                    <!-- <th class="text-center">Time Limit</th> -->
                    <th class="text-center">Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM category");
                        if(mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td class="text-center">
                            <?php if($row['questions_added'] == $row['no_of_items']): ?>
                            <span class="badge bg-success"><?php echo $row['questions_added']; ?> / <?php echo $row['no_of_items']; ?> items</span>
                            <?php else: ?>
                            <span class="badge bg-warning"><?php echo $row['questions_added']; ?> / <?php echo $row['no_of_items']; ?> items</span>
                            <?php endif; ?>
                        </td>
                        <!-- <td class="text-center"><?php //echo $row['time_limit']; ?></td> -->
                        <td class="text-center">
                          <a href="category_add_question.php?cat_Id=<?php echo $row['cat_Id']; ?>" class="btn bg-gradient-primary"><i class="fa-solid fa-question"></i></a>
                          <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['cat_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['cat_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>

                    <?php include 'category_update_delete.php'; } } else { ?>
                      <td colspan="100%" class="text-center">No record found</td>
                      <tr/>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Category name</th>
                        <th class="text-center">No. of items</th>
                        <!-- <th class="text-center">Time Limit</th> -->
                        <th class="text-center">Tools</th>
                      </tr>
                  </tfoot>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
  </div>


<?php include 'category_add.php'; ?>
<?php include 'footer.php';  ?>

