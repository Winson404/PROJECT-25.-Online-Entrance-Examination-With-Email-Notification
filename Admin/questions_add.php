<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Create category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Category</label>
              <select class="form-control" name="cat_Id" required>
                <option selected disabled value="">Select category</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM category");
                  while($row = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row['cat_Id']; ?>"><?php echo $row['cat_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6"></div>
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
         
       </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="save_quest"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



