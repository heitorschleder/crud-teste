<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);

	$user_data = 'name='.$name. '&email='.$email. '&phone='.$phone;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Email is required&$user_data");
	}else if (empty($phone)) {
		header("Location: ../index.php?error=Phone is required&$user_data");
	}else {

       $sql = "INSERT INTO users(name, email, phone) 
               VALUES('$name', '$email', '$phone')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=Criado com Sucesso!");
       }else {
          header("Location: ../index.php?error=Erro desconhecido&$user_data");
       }
	}

}