<title>Online Entrance Examination | Questions</title>
<?php include 'navbar.php'; ?>

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
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
              </div>
              <div class="card-body">

               <form method="POST">
                  <div class="row bg-light">
                    <div class="col-6">
                      <div class="form-group">
                          <span><b>Filter Questions by category:</b></span>
                          <select class="select2" data-placeholder="Shelf location" id="category" style="width: 100%;" onchange="myFunctionCategory(this.value)">
                              <option selected disabled>Select category</option>
                              <?php  
                                  $fetch = mysqli_query($conn, "SELECT * FROM questions JOIN category ON questions.quest_category_Id=category.cat_Id GROUP BY cat_Id");
                                  while($row = mysqli_fetch_array($fetch)) {
                              ?>
                              <option value="<?php echo $row['cat_Id']; ?>"><?php echo $row['cat_name']; ?></option>
                              <?php } ?>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control" id="as_is_category" name="category" required>
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>
                    <!-- <div class="col-2 mt-4">
                      <div class="form-group">
                        <button type="submit" class="btn btn-default" name="search">Search</button>
                      </div>
                    </div> -->
                  </div>
                </form>

                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
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
                          $sql = mysqli_query($conn, "SELECT * FROM questions JOIN category ON questions.quest_category_Id=category.cat_Id");
                          if(mysqli_num_rows($sql) > 0) {
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <td><?php echo $row['question']; ?></td>
                          <td><?php echo $row['choice_one']; ?></td>
                          <td><?php echo $row['choice_two']; ?></td>
                          <td><?php echo $row['choice_three']; ?></td>
                          <td><?php echo $row['choice_four']; ?></td>
                          <td><?php echo $row['correct_answer']; ?></td>
                          <td>
                            <a class="btn bg-gradient-success" href="questions_update.php?quest_Id=<?php echo $row['quest_Id']; ?>&&cat_Id=<?php echo $row['cat_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['quest_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                          </td> 
                      </tr>

                      <?php include 'questions_delete.php'; } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                        <tr/>
                      <?php } ?>
                    </tbody>
                  <tfoot>
                      <tr>
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
      </div>
    </section>
  </div>


<?php include 'questions_add.php'; ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php';  ?>

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

 <script>
    function myFunctionCategory(cat_Id){ 

      var x = document.getElementById("category").value;
      document.getElementById("as_is_category").value = x;
      
      $.ajax({
      type:'post',
      url: 'ajax.php',
      data : 'request=' + x, 
      success : function(data){
      $('#users_data').html(data);
      }
      })
    }
</script>