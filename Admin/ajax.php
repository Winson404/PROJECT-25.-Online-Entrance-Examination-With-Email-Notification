<?php 
	
	include '../config.php';

	// DISPLAY QUESTION BY CATEGORY - QUESTIONS.PHP
	if(isset($_POST['request'])) {
		$cat_Id = $_POST['request'];
		$questions = mysqli_query($conn, "SELECT * FROM questions JOIN category ON questions.quest_category_Id=category.cat_Id WHERE quest_category_Id='$cat_Id' ");
		if(mysqli_num_rows($questions) > 0) {
?>
		<tr>
        <?php while ($row = mysqli_fetch_array($questions)) { ?>
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

<?php } } else { ?>	

		<td colspan="100%" class="text-center">No record found</td>
    <tr/>
    
<?php } } ?>