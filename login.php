<?php
/*Created using class notes from Professor Wergeles' CS2830 at the University of Missouri - Columbia*/

    // HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: UpdateScreen2(Centered).php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	        
//        // Require the credentials
        require_once 'db.conf';
//        
//        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//        
//        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
			require "login_form.php";
            exit;
        }
     
     $username = $mysqli->real_escape_string($username);
     $password = $mysqli->real_escape_string($password);
     
     //more secure password storing for website
     $password = sha1($password);
     
     //build query
     $query = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password';";
     
     //sometimes it's nice to print the query, that way you know what SQL you're working with.
//     print $query;
//     exit;
     
     //run query
     $mysqliResult = $mysqli->query($query);
     
     //if a result...
     if($mysqliResult){
         //how many?
         $match = $mysqliResult->num_rows;
         
         //close results
         $mysqliResult->close();
         //close DB connection
         $mysqli->close();
         
         //if there was a match, login
         if($match==1){
            $_SESSION['loggedin'] = $username;
             header("Location: UpdateScreen2(Centered).php");
             exit;
         }
         else {
             $error = 'Error: Incorrect username or password';
             require "login_form.php";
             exit;
         }
     }else {
          $error = 'Login Error: Please contact the system administrator.';
          require "login_form.php";
          exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}
	
?>
