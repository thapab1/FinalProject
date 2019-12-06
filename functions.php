<?php
session_start();

function openDB(){
    
	$username = "thapab1";
	$password = "5e13c1f9";
	$dbname = "homework";
	$charset = 'utf8';	

	// $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
    $db = new PDO("mysql:host=csweb.hh.nku.edu;dbname=$dbname; charset=$charset", $username, $password);
	if ($db != true){
    die("Unable to open DB ");
    }
    return($db);             
}

function createTables(){
    $db=openDB();
    		
	    $sql ="DROP TABLE IF EXISTS user, background";
	      $result = $db->query($sql);
            If ( $result != true){
            	die("Unable to drop user and/or background table<br>");
            }
            else{
            	ECHO "<br>User and background tables dropped<br>";                
            }
	            
// NEW TABLES // 

    // USER TABLE
    $sql="CREATE TABLE user ("
    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
    ."username VARCHAR(50) NOT NULL,"
    ."password VARCHAR(50) NOT NULL);"
    ."INSERT INTO user (username, password)"
    ." VALUES"."('thabab1','NKU123');";
        
    $result=$db->query($sql);
    if($result != true){
        die("<br>Unable to create user table<br>");
    }
    else{
        ECHO "<br> User table created<br>";                
    }

// BACKGROUND TABLE
    $sql="CREATE TABLE background ("
    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
    ."userid VARCHAR(50) NOT NULL,"
    ."lname VARCHAR(100) NOT NULL,"
    ."fname VARCHAR(50) NOT NULL,"
    ."sex VARCHAR(50) NOT NULL,"
    ."dob VARCHAR(50) NOT NULL,"
    ."phone VARCHAR(50) NOT NULL,"
    ."address TEXT NOT NULL,"
    ."email VARCHAR(50) NOT NULL,"    
    ."status VARCHAR(50) NOT NULL);"    
    ."INSERT INTO background (userid, lname, fname, sex, dob, phone, address, email, status)"
    ."VALUES"."('1','Smith','David', 'Male','March 12 1988', '5027733456', '701 W Orsmby Rd', 'church@churchorg', 'member');";

    $result=$db->query($sql);
    if($result != true){
        die("<br>Unable to create background table<br>");
    }
    else{

            ECHO "<br> User table created<br>";                
        }

    }

/////////////// Register users and validate logon process ///////////////

function registerUser(){ 
    if(isset($_POST["registerBtn"])){
	// User clicked register button      
        if ($_POST["registerpassword"] != $_POST["confirmpassword"]){
            //echo "<script>alert('Passwords do not match');</script>";
			echo"<script>window.open('register.php','_self');</script>";
            exit();
        }else{
	        echo "<script>alert('password match');</script>";

        }
        
	// Both passwords match, see if user name already in use      
        $db = openDB();               
        $query = "SELECT password FROM user WHERE username= '".$_POST['registername']."' ;";
        $ds = $db->query($query);
        $cnt = $ds->rowCount();
        if ($cnt == 1){	            
        	echo "<script>alert('User name already registered, use different name');</script>";
			echo"<script>window.open('register.php','_self');</script>";
            exit();              
        }else{
            echo "<script>alert('Name is not there');</script>";
        }

                    
        //Add to user table   
        
		$sql ="INSERT INTO `user` (`username`, `password`)"." VALUES " 
                ."( '"
                .$_POST['registername']."','"
                .$_POST['registerpassword']."');"; 
        $result = $db->query($sql);
        if ( $result != true){
        	echo "<script>alert('Registry failed');</script>";
        }else{
			echo "<script>alert('Registry successful');</script>";
				$last_id = $db->lastInsertId();
				session_start();
				$_SESSION["granted"] = "open";
				$_SESSION["userName"] = $_POST['registername'];
				$_SESSION["userId"] = $last_id;
			echo"<script>window.open('churchForm.php?nav=show','_self');</script>"; 
            exit();
        }

    }
  }  
//////// Returning user  ///////////////////////////
if(isset($_POST["logIn"])){

    $db = openDB();               
    $query = "SELECT password, id FROM user WHERE username='".$_POST['userName']."' ;";
    $ds = $db->query($query);
    $cnt = $ds->rowCount();		
    if ($cnt == 1 ){
        
        $row = $ds->fetch(); // Get data row			
                    
        if($row["password"]==$_POST['userPassword']){
            session_start();
            $_SESSION["granted"] = "open";
            $_SESSION["userName"] = $_POST['userName'];
            $_SESSION["userId"] = $row["id"];
            echo"<script>window.open('churchForm.php?nav=show','_self');</script>"; 
            exit();
            }else{
                echo"<script>alert('User name or password is incorrect.')</script>";
                echo"<script>window.open('index.php','_self');</script>"; //index.php is correct 
                exit();
            }
        }else{
            echo"<script>alert('User name or password is incorrect.')</script>";
            echo"<script>window.open('index.php','_self');</script>"; //index.php is correct 
            exit();
        }	
}
// Update Background Table //

if (isset($_POST["bkg-update-btn"])){
    $db = openDB();
        $sql ="UPDATE `background`"
                . " SET `userid` = '".$_SESSION["userId"]."',"
                . "`lname` =  '".$_POST['bkg-lname']."',"
                . "`fname` =  '".$_POST['bkg-fname']."',"
                . "`sex` =  '".$_POST['bkg-sex']."',"
                . "`dob` =  '".$_POST['bkg-dob']."',"
                . "`phone` =  '".$_POST['bkg-phone']."',"
                . "`address` =  '".$_POST['bkg-address']."',"
                . "`email` =  '".$_POST['bkg-email']."',"
                . "`status` =  '".$_POST['bkg-status']."'"
                . "WHERE id = ". "'".$_POST['bkg-memberid']."'";               

        $result = $db->query($sql);
        if ( $result != true){    
            ECHO "Could not update background info";
        }
        else{
            ECHO 'Background info updated';
        }
}
// Add New Member //
if (isset($_POST["bkg-submit-btn"])){
    $db = openDB();
        $sql ="INSERT INTO background (userid, lname, fname, sex, dob, phone, address, email, status)"
                  ." VALUES " 
                ."( '"
                .$_SESSION["userId"]."','"
                .$_POST['bkg-lname']."','"
                .$_POST['bkg-fname']."','"
                .$_POST['bkg-sex']."','"
                .$_POST['bkg-dob']."','"
                .$_POST['bkg-phone']."','"
                .$_POST['bkg-address']."','"
                .$_POST['bkg-email']."','"
                .$_POST['bkg-status']."');";

        $result = $db->query($sql);
        if ( $result != true){
            ECHO "Unable to save member";
        }
        else{
            ECHO '<div class="successOverlay">Task saved</div>';
        }
}
 // Display Church Members from Background Table //

  function displayMembers(){
    $db = openDB();               
    $query = "SELECT id, lname, fname, sex, dob, phone, address, email, status FROM background WHERE userid='".$_SESSION["userId"]."' ORDER BY lname ASC";

    $ds = $db->query($query);
    $cnt = $ds->rowCount();

    if ($cnt == 0){
        echo 'No members found.';
        return; // No contacts 
    }             
	
    foreach ($ds as $row){
        echo "<tr><td>".$row["lname"]."</td><td>".$row["fname"]."</td><td>".$row["sex"]."</td><td>".$row["dob"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td><td>".$row["email"]."</td><td>".$row["status"]."</td><td><button type='button'><a href='editMember.php?nav=show&memberid=".$row["id"]."'>Edit</a></button></td></tr>";
        
    }
} 
// Retrieve Form Info //
 
	$db = openDB();
    $sql = "SELECT lname, fname, sex, dob, phone, address, email, status FROM background WHERE id = "."'".$_GET['memberid']."'"; 
    $ds = $db->query($sql);
    $cnt = $ds->rowCount();  
        
        $row = $ds->fetch(); // Get data row
		    
	if ( $row != true){                
            //    ECHO "Unable to retrieve members";
    }

// Delete Data //

if (isset($_POST["bkg-delete-btn"])){
    $db = openDB();
        $sql ="DELETE FROM `background` WHERE id = "."'".$_POST['bkg-memberid']."'"; 
        $result = $db->query($sql);
      
} 
?>
