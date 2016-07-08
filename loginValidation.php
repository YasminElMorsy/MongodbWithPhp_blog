<?php
	session_start();
	require 'DbConnection.php';
	$errors = [];
	if(isset($_POST['okay'])) {
		if(!isset($_POST['username']) || empty(trim($_POST['username']))){
			$errors[] = "Please, Enter a valid name";
		}

		if(!isset($_POST['password']) || empty(trim($_POST['password']))){
			$errors[] = "Please, Enter a valid password";
		} 
		else {
			$name =$collection->find(array('userName' => $_POST['username'],'password'=>$_POST['password']));
			$user;
			foreach ($name as $key) {
				var_dump($key);
				$user=$key['userName'];
				// print_r('expression');
			}
			if($user==$_POST['username']){
				if ($_POST['username']=='admin' && $_POST['password']=='admin') {
				echo "<meta http-equiv='Refresh' content='0;url=admin.php' />"; 
				$_SESSION['user_name'] = $_POST['username'];
				}else{
				$_SESSION['user_name'] = $_POST['username'];
				var_dump($_SESSION['user_name']);
				echo "<meta http-equiv='Refresh' content='0;url=home.php' />";
				} 
			}else{
				echo "<meta http-equiv='Refresh' content='0;url=login.php#tologin' />"; 
			}
		}
	} else {
		header("location:registeration.php");
	}
?>