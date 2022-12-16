<title>Online Entrance Examination | Questions</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['quest_Id']) && isset($_GET['cat_Id']))
      $cat_Id = $_GET['cat_Id'];
      $quest_Id = $_GET['quest_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM questions WHERE quest_Id='$quest_Id'");
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
          <div class="col-md-11">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#viewprofile" data-toggle="tab">Update question</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="viewprofile">
                    <form action="process_update.php" method="POST">
                      <input type="hidden" class="form-control" name="cat_Id" value="<?php echo $cat_Id; ?>">
                      <input type="hidden" class="form-control" name="quest_Id" value="<?php echo $quest_Id; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label>Question</label>
                              <textarea name="question" id="" cols="30" rows="2" class="form-control" placeholder="Enter question here..." required><?php echo $row['question']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <span><b>Choice No. 1</b></span>
                              <input type="text" class="form-control"  placeholder="Choice No. 1" name="choice_one"   id="choiceOne" required value="<?php echo $row['choice_one']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <span><b>Choice No. 2</b></span>
                              <input type="text" class="form-control"  placeholder="Choice No. 2" name="choice_two"   id="choiceTwo" required value="<?php echo $row['choice_two']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <span><b>Choice No. 3</b></span>
                              <input type="text" class="form-control"  placeholder="Choice No. 3" name="choice_three" id="choiceThree" required value="<?php echo $row['choice_three']; ?>">
                           </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <span><b>Choice No. 4</b></span>
                              <input type="text" class="form-control" placeholder="Choice No. 4" name="choice_four"  id="choiceFour" required value="<?php echo $row['choice_four']; ?>">
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

                              <button type="submit" class="btn bg-gradient-primary float-sm-right" name="update_question">Submit</button>
                              <a class="btn bg-gradient-secondary float-sm-right" href="category_add_question.php?cat_Id=<?php echo $cat_Id; ?>" style="margin-right: 5px;">Back</a>
                          </div>
                        </div>
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