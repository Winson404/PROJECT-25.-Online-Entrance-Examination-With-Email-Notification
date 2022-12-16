<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['cat_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Update category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control form-control-sm"  placeholder="Category name" name="category_Id" value="<?php echo $row['cat_Id']; ?>" required>
        <div class="form-group">
          <label>Category name</label>
          <input type="text" class="form-control form-control-sm"  placeholder="Category name" name="category_name" required value="<?php echo $row['cat_name']; ?>">
        </div>
        <div class="form-group">
            <label>No. of items</label>
            <input type="number" class="form-control form-control-sm"  placeholder="No. of items" name="no_items" required value="<?php echo $row['no_of_items']; ?>">
        </div>
        <div class="form-group">
          <label>Time limit</label>
          <select class="form-control form-control-sm" name="timelimit" required>
            <option selected disabled>Select time limit</option>
            <option value="6 minutes"         <?php if($row['time_limit'] == '6 minutes')         { echo 'selected'; } ?> >6 minutes</option>
            <option value="12 minutes"        <?php if($row['time_limit'] == '12 minutes')        { echo 'selected'; } ?> >12 minutes</option>
            <option value="30 minutes"        <?php if($row['time_limit'] == '30 minutes')        { echo 'selected'; } ?> >30 minutes</option>
            <option value="1 hour"            <?php if($row['time_limit'] == '1 hour')            { echo 'selected'; } ?> >1 hour</option>
            <option value="1 hour 30 minutes" <?php if($row['time_limit'] == '1 hour 30 minutes') { echo 'selected'; } ?> >1 hour 30 minutes</option>
            <option value="1 hour 45 minutes" <?php if($row['time_limit'] == '1 hour 45 minutes') { echo 'selected'; } ?> >1 hour 45 minutes</option>
            <option value="2 hours"           <?php if($row['time_limit'] == '2 hours')           { echo 'selected'; } ?> >2 hours</option>
            <option value="2 hour 30 minutes" <?php if($row['time_limit'] == '2 hour 30 minutes') { echo 'selected'; } ?> >2 hour 30 minutes</option>
            <option value="2 hour 45 minutes" <?php if($row['time_limit'] == '2 hour 45 minutes') { echo 'selected'; } ?> >2 hour 45 minutes</option>
            <option value="3 hours"           <?php if($row['time_limit'] == '3 hours')           { echo 'selected'; } ?> >3 hours</option>
          </select>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_category"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['cat_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Delete category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST" enctype="multipart/form-data">
          
        <input type="hidden" class="form-control form-control-sm"  placeholder="Category name" name="category_Id" value="<?php echo $row['cat_Id']; ?>" required>
        <h6 class="text-center">Delete category</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_category"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

