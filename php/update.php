<?php 

if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$id = validate($_POST['id']);
        $phone = validate($_POST['phone']);

	if (empty($name)) {
		header("Location: ../update.php?id=$id&error=Digite o Nome");
	}else if (empty($email)) {
		header("Location: ../update.php?id=$id&error=Digite o Email");
	}else if (empty($phone)) {
		header("Location: ../update.php?id=$id&error=Digite o Telefone");
	}
        else {

       $sql = "UPDATE users
               SET name='$name', email='$email', phone='$phone'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=Atualizado com sucesso");
       }else {
          header("Location: ../update.php?id=$id&error=Erro desconhecido&$user_data");
       }
	}
}else {
	header("Location: read.php");
}