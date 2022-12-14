<!-- CONFIRM -->
<div class="modal fade" id="confirm<?php echo $row['schedID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Confirm booking schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="user_Id">
          <input type="hidden" class="form-control" value="<?php echo $row['schedID']; ?>" name="schedID">
          <h6 class="text-center">Confirm examination booking schedule?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="confirm_booking"><i class="fa-solid fa-circle-check"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>