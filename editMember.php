<?php include 'includes/header.php';?>
<?php 
if($_SESSION["granted"]=="open"){

}else{
    echo"<script>alert('You must sign in first');</script>";
    echo"<script>window.open('index.php','_self');</script>";
exit(); 
}
?>



<h1>Edit — Update new member or visitor</h1>

        <form action="displayMembers.php?nav=show" method="post" id="">

            Last name:<br/> 
            <input type="text" name="bkg-lname" class="" style="width:400px" value="<?php echo $row['lname'];?>">
            <br/>
            <br/>
            First name:<br/> 
            <input type="text" name="bkg-fname" class="" style="width:400px" value="<?php echo $row['fname'];?>">
            <br>
            <br/>
            Sex:<br/> 
            <select name="bkg-sex" class="" >
                <option value="male" <?php if($row['sex']=="male"){echo "selected";} ?>>Male</option>
                <option value="female" <?php if($row['sex']=="female"){echo "selected";} ?>>Female</option>
            </select>
            <br/>
            <br/>
            DOB: MM-DD-YYYY<br/>
            <input type="text" name="bkg-dob" class="" style="width:400px" value="<?php echo $row['dob'];?>">
            <br/>
            <br/>
            Phone: Format: 502-555-1234<br/>
            <input type="tel" name="bkg-phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="" style="width:400px" value="<?php echo $row['phone'];?>">
            <br/>
            <br/>
            Address<br/>
            <textarea name="bkg-address" class="" id="bkg-address" rows="3"><?php echo $row['address'];?></textarea> 
            <br/> 
            <br/>
            Email:<br/> 
            <input type="email" name="bkg-email" class="" style="width:400px" value="<?php echo $row['email'];?>">
            <br/>
            <br/>
            Status:<br/> 
            <select name="bkg-status" class="" >
                <option value="member" <?php if($row['status']=="member"){echo "selected";} ?>>Member</option>
                <option value="visitor" <?php if($row['status']=="visitor"){echo "selected";} ?>>Visitor</option>
            </select>
            <br/>
            <br/>
            <br/>
            <input type="text" name="bkg-memberid" class="" style="width:400px; display:none" value="<?php echo $_GET['memberid'];?>">                           
            <input type="submit" name="bkg-update-btn"  value="Update">
            <input type="submit" name="bkg-delete-btn"  value="Delete">
            <br/>                        
        </form>  

<?php include 'includes/footer.php';?>