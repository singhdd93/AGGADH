<? include './header.php';

if(isset($_GET['error']))
{
    ?>

<style type="text/css">
    #login-error
    {
        display: block;
    }
</style>
<?
}
?>


<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-circle-plus ico-white"></i>Log In</h2>

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
					
					<!-- start: About Us -->
					<div id="signup">
						<div class="title"><h3>Log In</h3></div>
                                                
                                                <div id="login-error" class="row-fluid alert alert-error">
                                                    <h4>Incorrect Username/Password</h4>
                                                    <p> Please Enter the Correct Details Below</p>
                                                </div>
					
                                                <div class="signup-form">
                                                    <form action="logincheck.php" method="POST">
                                                <div class="input">
                                                <input type="text" name="user_name" value="" placeholder="User Name" />
                                                </div>
                                                <div class="input">
                                                    
                                                <input type="password" name="pass" value="" placeholder="Password" />
                                                </div>
                                                
                                                
                                                <div class="actions">
                                                <input type="submit" name="sub" value="Log In" />
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
