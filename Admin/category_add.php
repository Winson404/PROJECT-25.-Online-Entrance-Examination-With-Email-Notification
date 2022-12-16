<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Create category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Category name</label>
          <input type="text" class="form-control"  placeholder="Category name" name="category_name" required>
        </div>
        <div class="form-group">
            <label>No. of items</label>
            <input type="number" class="form-control"  placeholder="No. of items" name="no_items" required>
        </div>
        <div class="form-group">
          <label>Time limit</label>
          <select class="form-control" name="timelimit" required>
            <option selected disabled>Select time limit</option>
            <option value="6 minutes">6 minutes</option>
            <option value="12 minutes">12 minutes</option>
            <option value="30 minutes">30 minutes</option>
            <option value="1 hour">1 hour</option>
            <option value="1 hour 30 minutes">1 hour 30 minutes</option>
            <option value="1 hour 45 minutes">1 hour 45 minutes</option>
            <option value="2 hours">2 hours</option>
            <option value="2 hour 30 minutes">2 hour 30 minutes</option>
            <option value="2 hour 45 minutes">2 hour 45 minutes</option>
            <option value="3 hours">3 hours</option>
          </select>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="category"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



