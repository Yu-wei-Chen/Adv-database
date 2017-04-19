<?
	session_start();

	unset($_SESSION['mStoreid']);
    unset($_SESSION['job']);
    unset($_SESSION['mstate']);
    unset($_SESSION['Mid']);

	echo "<script>alert('Logout Success!');location.href = 'index.php';</script>";

?>