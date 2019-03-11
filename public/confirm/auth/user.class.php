<?php 
	class userClass{
		public function userLogin($user,$pwd){
			try{
				$db = getDB();
				$stmt = $db->prepare("SELECT * FROM user_profiles WHERE citizen_id=:user AND password=:pwd"); 
				$stmt->bindParam("user", $user,PDO::PARAM_STR) ;
				$stmt->bindParam("pwd", $pwd,PDO::PARAM_STR) ;
				$stmt->execute();
				$count=$stmt->rowCount();
				$data=$stmt->fetch(PDO::FETCH_OBJ);
				$db = null;
					if($count){
						$_SESSION["citizen"] = $data->citizen_id;
						$_SESSION['user'] = $data->id;
						$time = date('H:i:s');
						$_SESSION['time'] =	md5($time);
						return 1;						
					}else{
						return 0;
					} 
			}
			catch(PDOException $e) {
				echo '{"error":{"text":'. $e->getMessage() .'}}';
			}

		}


		public function userDetails($session_auth){
			try{
				$db = getDB();
				$stmt = $db->prepare("SELECT * FROM user_profiles WHERE id=:session_auth"); 
				$stmt->bindParam("session_auth", $session_auth,PDO::PARAM_INT);
				$stmt->execute();
				$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
				return $data;
			}
			catch(PDOException $e) {
				echo '{"error":{"text":'. $e->getMessage() .'}}';
			}
		}

		public function userLogout(){
			$_SESSION['user'] = ''; 
			$_SESSION['citizen'] = '';

			?>

				<script type="text/javascript">
					swal("สำเร็จ","ออกจากระบบเรียบร้อยแล้ว","success").then((value) => {
				 	 window.location='index.php';
					});				
				</script>
			<?php			
		}

	}


?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>