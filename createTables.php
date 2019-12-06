<?php include 'includes/header.php';?>
<?php 
if($_SESSION["granted"]=="open"){

}else{
    echo"<script>alert('You must sign in first');</script>";
    echo"<script>window.open('index.php','_self');</script>";
exit(); 
}
?>
	
<h1>Reset — Delete and reset</h1>

		<?php	
			if(isset($_POST['createTables'])){
		  		$db = createTables();
		 	}  	
		?>

		<div class="">
			
			<div class="">
				<form action="createTables.php" method="post"  autocomplete='off'>

					<input type="submit" class="" name="createTables" value="Create Tables">	
								
				</form> 
			</div>	
			
		</div>

<?php include 'includes/footer.php';?>