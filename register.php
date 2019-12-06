<?php include 'includes/header.php'; ?>

<!-- 
	<script>
		$(function(){
			$(".backBtn").click(function(){
				 window.history.back();
			});
		})
	</script>	 -->
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
            registerUser();
        }
    ?>
	
			
			<div>
				<form method="post" autocomplete='off' action="register.php">
												
					<input type="text" id="registername" name="registername" value="Username" onblur="if(this.value==''){ this.value='Username';}" onfocus="if(this.value=='Username'){this.value=''}"/>
					<br>
					<br>
					<input type="text" id="registerpassword" name="registerpassword" value="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password'){ this.value=''; this.type='password';}"/>
					<br>
					<br>
					<input type="text" id="confirmpassword" name="confirmpassword" value="Confirm Password" onblur="if(this.value==''){ this.value='Confirm Password'; this.type='text'}" onfocus="if(this.value=='Confirm Password'){ this.value=''; this.type='password';}"/>
					<br>
					<br>
					<input type="submit" class="registerBtn" name="registerBtn" value="Register"> &nbsp;&nbsp; <button type="button" class="backBtn"><a href="index.php">Back</a></button>	
								
				</form> 
			</div>	
			

	<?php include "includes/footer.php";?>	
	
</html>