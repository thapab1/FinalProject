<?php include 'includes/header.php';?>
<?php 
if($_SESSION["granted"]=="open"){

}else{
    echo"<script>alert('You must sign in first');</script>";
    echo"<script>window.open('index.php','_self');</script>";
exit(); 
}
?>

<h1>List — All members and visitors</h1>

<table style="width:100%">
  <tr>
    <th align="left">Last Name</th>
    <th align="left">First Name</th> 
    <th align="left">Sex</th>
    <th align="left">dob</th>
    <th align="left">Phone</th>
    <th align="left">Address</th>
    <th align="left">Email</th>
    <th align="left">Status</th>
  </tr>
      <?php echo displayMembers();?>
	  <p><a href="churchForm.php"> Add a Member </a></p> 	  
</table>

<?php include 'includes/footer.php';?>

