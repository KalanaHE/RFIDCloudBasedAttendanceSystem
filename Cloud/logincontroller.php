

 <?php
   require 'dbconnect.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pword']); 
      
      $sql = "SELECT id FROM login WHERE uname='$myusername' AND password = '$mypassword' ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         echo "done";
         header("location: webview/");
      }else {
         header("location: index.php?msg=Your Login Name or Password is invalid");
         
      }
   }
?>

