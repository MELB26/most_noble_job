<?php  

require_once 'dbConfig.php';

function getAllUsers($pdo) {
	$sql = "SELECT * FROM search_users_data 
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByID($pdo, $id) {
	$sql = "SELECT * from search_users_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAUser($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM search_users_data WHERE 
			CONCAT(first_name,last_name,email,gender,
				years_exp,fave_comp_lang,nationality,job_title,date_added) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function insertNewUser($pdo, $first_name, $last_name, $email, 
	$gender, $years_exp, $fave_comp_lang, $nationality, $job_title) {

	$sql = "INSERT INTO search_users_data 
			(
				first_name,
				last_name,
				email,
				gender,
				years_exp,
				fave_comp_lang,
				nationality,
				job_title
			)
			VALUES (?,?,?,?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([
		$first_name, $last_name, $email, 
		$gender, $years_exp, $fave_comp_lang, 
		$nationality, $job_title,
	]);

	if ($executeQuery) {
		return true;
	}

}

function editUser($pdo, $first_name, $last_name, $email, $gender, 
	$years_exp, $fave_comp_lang, $nationality, $job_title, $id) {

	$sql = "UPDATE search_users_data
				SET first_name = ?,
					last_name = ?,
					email = ?,
					gender = ?,
					years_exp = ?,
					fave_comp_lang = ?,
					nationality = ?,
					job_title = ?
				WHERE id = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, 
		$years_exp, $fave_comp_lang, $nationality,$job_title, $id]);

	if ($executeQuery) {
		return true;
	}

}


function deleteUser($pdo, $id) {
	$sql = "DELETE FROM search_users_data 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}
}




?>