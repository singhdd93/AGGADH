<? include './header.php';?>


<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-circle-plus ico-white"></i>Contact Us</h2>

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
						<div class="title"><h3>Send Us a Message with your Query / Review</h3></div>
                                                
                                                
					
                                                <div class="signup-form">
                                            <form action="sendconemail.php" method="POST">
                                                <div class="input">
                                                <input type="text" name="uname" required="required" value="" id="name" placeholder="Name" />
                                                <div class="input">
                                                <input type="email" name="email" required="required" value="" placeholder="Email" />
                                                </div>
                                                                                               
                                                <div class="input">
                                                    <textarea  name="message" required="required"  placeholder="Message" ></textarea>
                                                </div>
                                                
                                              <!--  <div class="input">
                                                    
                                                <input type="text" name="captcha" value="" placeholder="Confirm Password" />
                                                </div>-->
                                                <div class="actions">
                                                <input type="submit" name="submit" value="Submit" />
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
