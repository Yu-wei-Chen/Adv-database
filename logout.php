<?
	session_start();

	unset($_SESSION['id']);
	unset($_SESSION['type']);

	echo "<script>alert('Logout Success!');location.href = 'index.php';</script>";

?>