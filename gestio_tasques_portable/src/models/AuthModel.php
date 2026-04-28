<?php
require_once "db.php";

class AuthModel {

	public function login($usuario, $password) {

    	$conn = conectar();


    	$stmt = $conn->prepare(
        	"SELECT * FROM usuarios WHERE usuario = ?"
    	);
    	$stmt->execute([$usuario]);
    	$user = $stmt->fetch(PDO::FETCH_ASSOC);

    	if (isset($user["id"]) && password_verify($password,$user['password'])) {
        	return $user;
    	}

    	return false;
	}
}
