<?php
session_start();
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Web Tasarım Sitesi Giriş Paneli</title>
		<meta name="description" content="Web Tasarım Sitesi Giriş Paneli" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
						<span class="brand-text">Web Tasarım Sitesi</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Admin Panel Girişi</h3>											
										</div>	
										<div class="form-wrap">
										
											<?php 
												require_once '../assets/setting/mysql.php';
												require_once '../assets/setting/tool.function.php';
												global $Hata;
											    if(isset($_POST["formGonderBtn"])){
													$userTxt = @mysql_real_escape_string($_POST("userTxt"));
													$sifreTxt =@mysql_real_escape_string($_POST("sifreTxt"));
													if($userTxt=="" || $sifreTxt==""){
														echo '<div class="alert alert-warning">Boş Alan Bırakmayınız..</div>';
													}
													else{
														$Sor = Sor("SELECT username, password FROM users WHERE username='{$userTxt}' AND password='{$sifreTxt}' ");
														if(Say($Sor)>0){
															$Yaz = Yaz($Sor);
															$userS = sYap(array('user' => $Yaz["username"]));
															$passS = sYap(array('pass' => $Yaz["password"]));
															$oturum = sYap(array('oturum' => md5($Yaz["password"].$_SERVER["REMOTE_ADDR"])));
															if($userS==true AND $passS==true AND $oturum==true){
																echo '<div class="alert alert-success">Giriş Başarılı</div>';
																go("index.php", 2);
															}
															else{
																 echo '<div class="alert alert-danger">Oturum Açılamadı !</div>';
															}
														}
														else{
															echo '<div class="alert alert-danger">Hatalı Bilgiler !</div>';
														}

													}

												}
												
											?>
		
											<form action="" method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="userTxt">Kullanıcı Adı</label>
													<input type="text" class="form-control" name="userTxt" required="" id="userTxt" placeholder="Kullanıcı Adı Giriniz">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="password">Şifre</label>
													<div class="clearfix"></div>
													<input type="password" class="form-control" name="sifreTxt" required="" id="sifreTxt" placeholder="Şifreyi Giriniz">
												</div>
												
												<div class="form-group">
												
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" id="formGonderBtn" name="formGonderBtn" class="btn btn-info btn-success btn-rounded">Giriş</button>>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
