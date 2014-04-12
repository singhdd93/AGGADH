<? include './header.php';?>


<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-circle-plus ico-white"></i>Sign Up</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
			<!--start: Row -->
	    	<div class="row">
		
				<div class="span12">
					
					
					<div id="signup">
						<div class="title"><h3>Sign Up</h3></div>
					
                                                <div class="signup-form">
                                            <form action="confirm.php" method="POST">
                                                <div class="input">
                                                <input type="email" name="email" value="" placeholder="Email" />
                                                </div>
                                                <div class="input">
                                                <input type="password" name="pass" value="" id="password" placeholder="Password" />
                                                <div class="input password_strength" id="password_strength">
                                                </div>
                                                </div>
                                                
                                                <div class="input">
                                                <input type="password" name="confirmpass" value="" placeholder="Confirm Password" />
                                                </div>
                                                
                                              <!--  <div class="input">
                                                    
                                                <input type="text" name="captcha" value="" placeholder="Confirm Password" />
                                                </div>-->
                                                <div class="actions">
                                                <input type="submit" name="submit" value="Sign Up" />
                                                </div>
                                            </form>
                                                </div>
                                        </div>

					
					
					
				</div>	
				
				
				
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->
				
			

	</div>
	<!-- end: Wrapper  -->	
       


<? include './footer.php';?>
