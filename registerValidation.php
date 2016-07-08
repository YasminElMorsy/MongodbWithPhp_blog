<?php
	session_start();
	require 'DbConnection.php';
	$errors = [];
	// echo "hi";
	if(isset($_POST['ok'])) {
		// echo "hi2";
		if(!isset($_POST['usernamesignup']) || empty(trim($_POST['usernamesignup']))){
			$errors[] = "Please, Enter a valid name";
		}

		if(!isset($_POST['passwordsignup']) || empty(trim($_POST['passwordsignup']))){
			$errors[] = "Please, Enter a valid password";
		} else if($_POST['passwordsignup'] != $_POST['passwordsignup_confirm']) {
			$errors[] = "Your 2 passwords must be the same";
		} else {
			$name =$collection->find(array('userName' => $_POST['usernamesignup']));
			foreach ($name as $key) {
				var_dump($key);
			}
			
			// if(isset($name)){
			// 	$errors[]="unavailable name";
			// 	$_SESSION['errors']= $errors;
				echo "<meta http-equiv='Refresh' content='0;url=registeration.php#toregister' />"; 
			// }

			// $user = new User;
			// if($user->if_exist($_POST['usernamesignup'])) {
			// 	$errors[]="unavailable name";
			// 	$_SESSION['errors']= $errors;
			// 	echo "<meta http-equiv='Refresh' content='0;url=registration.php' />"; 

			// }
		}

		if(!empty($errors)) {
			$_SESSION['errors'] = $errors;
			echo "<meta http-equiv='Refresh' content='0;url=registeration.php' />"; 
		} else {
			//insert into data base
			$document = array( 
		      "userName" => $_POST['usernamesignup'], 
		      "password" => $_POST['passwordsignup']
		      );
	        $collection->insert($document);
			unset($_SESSION['errors']);
			echo "<meta http-equiv='Refresh' content='0;url=registeration.php#tologin' />"; 
				}
			}
		else {
		header("location:registeration.php");
	}
?>