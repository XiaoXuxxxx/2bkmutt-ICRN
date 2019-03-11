<?php
	if(!empty($_SESSION['citizen']) && !empty($_SESSION['user'])){
		$session_auth=$_SESSION['user'];
		//include ('class/UserClass.php');
	}
	if(empty($session_auth)){
		error_reporting(0);

		?>

				<script type="text/javascript">
					swal("ผิดพลาด","กรุณาเข้าสู่ระบบ","error").then((value) => {
				 	 window.location='index.php';
					});				
				</script>
			<?php
			exit();
		//$url='index.php';
		//header("Location: $url");
	}
?>
