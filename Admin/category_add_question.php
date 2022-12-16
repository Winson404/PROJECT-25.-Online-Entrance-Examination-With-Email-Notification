<title>Online Entrance Examination | Questions</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['cat_Id']))
      $cat_Id = $_GET['cat_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM category WHERE cat_Id='$cat_Id'");
    $row = mysqli_fetch_array($fetch);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Questions</li>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#viewprofile" data-toggle="tab">Question: <?php echo $row['questions_added']; ?> / <?php echo $row['no_of_items']; ?> items</a></li>
                  <li class="nav-item"><a class="nav-link" href="#list" data-toggle="tab">Question lists</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="viewprofile">
                    <form action="process_save.php" method="POST">
                      <input type="hidden" class="form-control" name="cat_Id" value="<?php echo $row['cat_Id']; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label>Question</label>
                              <textarea name="question" id="" cols="30" rows="2" class="form-control" placeholder="Enter question here..." required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <span><b>Choice No. 1</b></span>
                              <input type="text" class="form-control"  placeholder="Choice No. 1" name="choice_one"   id="choiceOne" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <span><b>Choice No. 2</b></span>
                              <input type="text" class="form-control"  placeholder="Choice No. 2" name="choice_two"   id="choiceTwo" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <span><b>Choice No. 3</b></span>
                              <input type="text" class="form-control"  placeholder="Choice No. 3" name="choice_three" id="choiceThree" required>
                           </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <span><b>Choice No. 4</b></span>
                              <input type="text" class="form-control" placeholder="Choice No. 4" name="choice_four"  id="choiceFour" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <span><b>Correct answer</b></span>
                            <select class="form-control" id="correct" onchange="myFunction(this.value)" required>
                              <option selected value="" >Select correct answer</option>
                              <option value="Choice No. 1">Choice No. 1</option>
                              <option value="Choice No. 2">Choice No. 2</option>
                              <option value="Choice No. 3">Choice No. 3</option>
                              <option value="Choice No. 4">Choice No. 4</option>
                            </select>
                          </div>
                        </div>
                        <!-- PASSING VALUES ONCHANGE -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <span class="text-white"><b>Correct answer</b></span>
                                <input type="hidden" class="form-control"  placeholder="Correct answer" name="correct_answer"  id="correctAns" required>
                            </div>
                        </div>
                        <!-- PASSING VALUES ONCHANGE -->
                        <div class="col-lg-12">
                          <div class="form-group">
                              <button type="submit" class="btn bg-gradient-primary float-sm-right" name="save_question">Submit</button>
                          </div>
                        </div>
                     </div>
                    </form>
                  </div>

                  <div class="tab-pane " id="list" >
                      <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>Choice #1</th>
                          <th>Choice #2</th>
                          <th>Choice #3</th>
                          <th>Choice #4</th>
                          <th>Answer</th>
                          <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody id="users_data">
                          <tr>
                            <?php
                              $i = 1; 
                              $sql = mysqli_query($conn, "SELECT * FROM questions WHERE quest_category_Id='$cat_Id' ORDER BY quest_Id");
                              if(mysqli_num_rows($sql) > 0) {
                              while ($row = mysqli_fetch_array($sql)) {
                            ?>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $row['question']; ?></td>
                              <td><?php echo $row['choice_one']; ?></td>
                              <td><?php echo $row['choice_two']; ?></td>
                              <td><?php echo $row['choice_three']; ?></td>
                              <td><?php echo $row['choice_four']; ?></td>
                              <td><?php echo $row['correct_answer']; ?></td>
                              <td>
                                <a class="btn bg-gradient-success" href="category_add_question_update.php?quest_Id=<?php echo $row['quest_Id']; ?>&&cat_Id=<?php echo $cat_Id; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['quest_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                              </td> 
                          </tr>

                          <?php include 'category_add_question_delete.php'; } } else { ?>
                            <td colspan="100%" class="text-center">No record found</td>
                            <tr/>
                          <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Question</th>
                              <th>Choice #1</th>
                              <th>Choice #2</th>
                              <th>Choice #3</th>
                              <th>Choice #4</th>
                              <th>Answer</th>
                              <th>Tools</th>
                            </tr>
                        </tfoot>
                      </table>
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
    <br>
    <br>
    <br>
    <!-- /.content -->
  </div>



<?php include 'footer.php'; ?>
<script>
function myFunction() {
  var one   = document.getElementById("choiceOne").value;
  var two   = document.getElementById("choiceTwo").value;
  var three = document.getElementById("choiceThree").value;
  var four  = document.getElementById("choiceFour").value;

  var x = document.getElementById("correct").value;

  if(x == 'Choice No. 1') {
    document.getElementById("correctAns").value = one;
  } else if(x == 'Choice No. 2') {
    document.getElementById("correctAns").value = two;
  } else if(x == 'Choice No. 3') {
    document.getElementById("correctAns").value = three;
  } else if(x == 'Choice No. 4') {
    document.getElementById("correctAns").value = four;
  } else {
    document.getElementById("correctAns").value = "";
  }
}

</script>