<?php

// Set a past date
// source : https://www.geeksforgeeks.org/php-header-function/
//
header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

include('config/db_connect.php');

if (isset($_POST['delete'])) {

	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

	$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

	if (mysqli_query($conn, $sql)) {
		header('Location: index01.php');
	} else {
		echo 'query error: ' . mysqli_error($conn);
	}
}

// check GET request id param
if (isset($_GET['id'])) {

	// escape sql chars
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// make sql
	$sql = "SELECT * FROM pizzas WHERE id = $id";

	// get the query result
	$result = mysqli_query($conn, $sql);

	// fetch result in array format
	$pizza = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn);

	echo "these are the headers:";


	foreach (getallheaders() as $name => $value) {
		echo "$name: $value <br>";
	}
}

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container center grey-text">
    <?php if ($pizza) : ?>
    <h4><?php echo $pizza['title']; ?></h4>
    <p>Created by <?php echo $pizza['email']; ?></p>
    <p><?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo $pizza['ingredients']; ?></p>

    <!-- DELETE FORM -->
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

    <?php else : ?>
    <h5>No such pizza exists.</h5>
    <?php endif ?>
</div>

<?php include('templates/footer.php'); ?>

</html>