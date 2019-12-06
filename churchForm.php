<?php include 'includes/header.php';?>
<?php 
if($_SESSION["granted"]=="open"){

}else{
    echo"<script>alert('You must sign in first');</script>";
    echo"<script>window.open('index.php','_self');</script>";
exit(); 
}
?>

<h1>Home — Add new member or visitor</h1>

        <form action="displayMembers.php?nav=show" method="post" id="">

            Last name:<br/> 
            <input type="text" name="bkg-lname" class="" style="width:400px">
            <br/>
            <br/>
            First name:<br/> 
            <input type="text" name="bkg-fname" class="" style="width:400px">
            <br>
            <br/>
            Sex:<br/> 
            <select name="bkg-sex" class="" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br/>
            <br/>
            DOB: MM-DD-YYYY<br/>
            <input type="text" name="bkg-dob" class="" style="width:400px">
            <br/>
            <br/>
            Phone: Format: 502-555-1234<br/>
            <input type="tel" name="bkg-phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="" style="width:400px">
            <br/>
            <br/>
            Address<br/>
            <textarea name="bkg-address" class="" id="bkg-address" rows="3"></textarea> 
            <br/>
            <br/>
            Email:<br/> 
            <input type="email" name="bkg-email" class="" style="width:400px">
            <br/>
            <br/>
            Status:<br/> 
            <select name="bkg-status" class="" >
                <option value="Member">Member</option>
                <option value="Visitor">Visitor</option>
            </select>
            <br/>
            <br/>                        
            <input type="submit" name="bkg-submit-btn"  value="Submit">
		
            <br/>                        
        </form>  

<?php include 'includes/footer.php';?>