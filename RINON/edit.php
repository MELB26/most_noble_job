<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name" value="<?php echo $getUserByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name" value="<?php echo $getUserByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="text" name="email" value="<?php echo $getUserByID['email']; ?>">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender" value="<?php echo $getUserByID['gender']; ?>">
		</p>
		<p>
			<label for="firstName">Years of exp.</label> 
			<input type="text" name="years_exp" value="<?php echo $getUserByID['years_exp']; ?>">
		</p>
		<p>
			<label for="firstName">Computer Language</label> 
			<input type="text" name="fave_comp_lang" value="<?php echo $getUserByID['fave_comp_lang']; ?>">
		</p>
		<p>
			<label for="firstName">Nationality</label> 
			<input type="text" name="nationality" value="<?php echo $getUserByID['nationality']; ?>">
		</p>
		<p>
			<label for="firstName">Job Title</label> 
			<input type="text" name="job_title" value="<?php echo $getUserByID['job_title']; ?>">
			<input type="submit" value="Save" name="editUserBtn">
		</p>
	</form>
</body>
</html>
