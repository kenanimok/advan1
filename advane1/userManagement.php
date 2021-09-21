<!DOCTYPE html>
<html lang="en">
 <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>
 <head>
 <title>Admin-User Information</title>
 <link rel="stylesheet" type='text/css' href="style.css">
 <link rel="icon" type="image/png" href="glasses.ico" sizes="96x96">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
<style type ="text/css">
a{
 color: #C8BEA1;
 font-family: Kanit, serif;
 font-size: 1.7em;
 }
 a:hover {
 text-decoration: underline;
 color: #EF9121;
 font-style: italic;
 }
 </style>
 <body>
 <?PHP
 include("include_banner.html");
 ?>
 <div class="container">
 <p align ="left" ><a href = "adminCostume.php"><img src = "home.png" width="50"
height="50"></a> </p>
 <p align ="right" id="p_1">
 <?PHP session_start();
 if(isset($_SESSION['userName'])) echo "Welcome: " . $_SESSION['userName'];
 if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");
 ?>
<form name ="logout_form" method="get" action = "logout.php" align ="right">
 <button type="submit" class = "btn btn-danger">Logout</button>
 </form>
 </p>
 <p>
 <div class="col-sm-4">
 <a href="userManagement.php">User Management</a>
 </div>
<div class="col-sm-4">
 <a href="addCostume.php">Add Costume</a>
 </div>
<div class="col-sm-4">
 <a href="ordersManagement.php">Orders Management</a>
 </div>
 </p>
 <div class="row">
 <div class="col-sm-4">
 <p id="h_1">ข้อมูลผู้ใช้</p>
 </div>
<div class="col-sm-4">
 </div>
<div class="col-sm-4">
 <h3 align="right" id="h_3"><a id="h_3" href = "adminCostume.php?username=<?PHP echo
$username; ?>">Back</a></h3>
 </div>
 </div>
 </div>
 <?PHP
 $sql = "select * from user" or die("Error:" . mysqli_error());
 $result = mysqli_query($conn, $sql);
 ?>
 <table width ="1150" align="center" border="0">
 <tr bgcolor="#F09C13" height="50">
 <th id="th_1">id</th><th id="th_1">name</th><th id="th_1">username</th><th
id="th_1">password</th><th id="th_1">email</th><th id="th_1">status</th> <th colspan="2"></th>
 </tr>
 <?PHP
 while($rs = mysqli_fetch_array($result)){
 ?>
 <tr>
 <td><font id="a3"><?PHP echo $rs['user_id']; ?> </font> </td>
 <td><font id="a3"> <?PHP echo $rs['name']; ?> </font> </td>
 <td><font id="a3"> <?PHP echo $rs['username']; ?> </font> </td>
 <td><font id="a3"> <?PHP echo $rs['password']; ?> </font> </td>
 <td><font id="a3"> <?PHP echo $rs['email']; ?> </font> </td>
 <td><font id="a3"> <?PHP echo $rs['status']; ?> </font> </td>
 <td><a href="editFormUser.php?user_id=<?PHP echo $rs['user_id']; ?> " id
="a2">Edit</td>
 <td><a href="delUser.php?user_id=<?PHP echo $rs['user_id']; ?> "id ="a1">Delete</td>
 </tr>
 <?PHP
 }
mysqli_close($conn);
 ?>
 </tr>
 </table>
 <br><br>
 <?PHP
 include("include_footer.html");
 ?>
 </body>
</html>
