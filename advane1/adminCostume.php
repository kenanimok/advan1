<!DOCTYPE html>
<html lang="en">
        <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>
        <head>
        <title>Admin Costume</title>
        <link rel="stylesheet" type='text/css' href="style.css">
        <link rel="icon" type="image/png" href="glasses.ico" sizes="96x96">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
 <script>
        function defaultElements() {
            document.getElementById('ct_id').style.display = "none";
        }
        function selectCategory() {
        var c = document.getElementById('type_search').value;

        if (c == 'ct_id') {
        document.getElementById('ct_id').style.display = "inline";
        document.getElementById('searching').style.display = "none";
        }else{
        document.getElementById('ct_id').style.display = "none";
        document.getElementById('searching').style.display = "inline";
        }
     }
 </script>
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
 <body onload="defaultElements()">
 <?PHP
 include("include_banner.html");
 ?>
 
 <div class="container">
 
        <form name='search' action="" method="get">
            <table align ="center" width="1100" border="0">
            <tr>
            <td width="20"><p align ="left" > <a href = "adminCostume.php"><img src =
                "home.png" width="50" height="50"></a></p></td>
                <td width="320" ><p align ="right" id="p_1">ค้นหาสินค้าจาก: &nbsp;&nbsp;</p></td>
                <td width="80"><p id="p_1">
                <select name="type_search" id="type_search" class="select-css"
                onchange="selectCategory()">
                <option value="c_name">ชื่อสินค้า</option>
                <option value="ct_id">ประเภทสินค้า</option>
                <option value="color">สี</option>
                <option value="size">ไซส์</option>
                <option value="gender">เพศ</option>
                </select>
                </p>
                </td>
                <td align ="left" width="80"><p id="p_1"><input type="text" id="searching" name="searching" value="" />
                <select name="category" id="ct_id" class="select-css" >
                <option value="1">Clothing - เสื้อผ้า</option>
                <option value="2">Jewery - เครื่องประดับ</option>
                <option value="3">Shoes - รองเท้า</option>
                </select>
                </p></td>

                 <td width="80"><p id="p_1">
                    <select name="type_price" id="type_price" class="select-css">
                    <option value="asc">ราคาน้อยไปมาก</option>
                    <option value="desc">ราคามากไปน้อย</option>
                    </select>
                    </p>
                 </td>
                 <td align ="left"><p align ="left" id="p_1" > <button type="submit" />ค้นหา
        </button></p></td>
        </tr>
        </table>
    </form>
    <p align ="right" id="p_1">
        <?PHP session_start();
             if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
             echo"<script>alert('Please Login before Enter This Shop');
    window.location='index.html'</script>";
            exit();
            }
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
         </div>
         <br>

         <?PHP
         if(isset($_GET['searching'])){
             if($_GET['searching'] != '') {
                if(isset($_GET['type_search'])) {
                    $type_price = $_GET['type_price'];
                    if($_GET['type_search'] == 'c_name') {
                        $c_name = $_GET['searching'];
                         $sql = "SELECT * FROM cloth where c_name like '%". $c_name ."%' ORDER by price
            $type_price";
            }
                    if($_GET['type_search'] == 'color'){
                        $color = $_GET['searching'];
                        $sql = "SELECT * FROM cloth where color like '%". $color . "%' ORDER by price
                        $type_price";
                         }
                        if($_GET['type_search'] == 'size') {
                            $size = strtoupper($_GET['searching']);
                            $sql = "SELECT * FROM cloth where size like '$size' ORDER by price $type_price";
                            }
                        if($_GET['type_search'] == 'gender') {
                            if($_GET['searching']=="female" or $_GET['searching']=="Female") {$gender =
                           "F";}
                            if($_GET['searching']=="male" or $_GET['searching']=="Male") {$gender = "M";}
                            if($_GET['searching']=="m" or $_GET['searching']=="f") {$gender =
                           strtoupper($_GET['searching']);}
                            if($_GET['searching']=="M" or $_GET['searching']=="F") {$gender =
                           $_GET['searching'];}
                            if($_GET['searching']=="u") {
                            $gender = strtoupper($_GET['searching']);
                            }
                           if($_GET['searching']=="Unisex" or $_GET['searching']=="unisex") {
                            $gender = "U";
                            $sql = "SELECT * FROM cloth where gender like '$gender' ORDER by price
                           $type_price";
                            }
                           $sql = "SELECT * FROM cloth where gender like '$gender' or gender like 'U' ORDER
                           by price $type_price";
                            }
                            }

                        }else if ($_GET['type_price'] != '' and $_GET['searching'] == '') {
                            $type_price = $_GET['type_price'];
                        if($_GET['type_price'] == 'desc'){
                            $sql = "SELECT * FROM cloth ORDER by price $type_price";
                                }else{
                           $sql = "SELECT * FROM cloth ORDER by price $type_price";
                            }
                           }else{
                            $sql = "select * from cloth";
                            }
                        }
                        if($_GET['type_search'] == 'ct_id' and $_GET['searching']==''){
                            if($_GET['category'] != '') {
                            $ct_id = $_GET['category'];
                                echo $ct_id;
                            $sql = "SELECT * FROM cloth where ct_id like $ct_id ORDER by price $type_price";
                            }
                            }
                            if(!isset($_GET['searching']) and !isset($_GET['ct_id'])) {$sql = "select * from cloth";}
                            $result = mysqli_query($conn, $sql);
                            ?>
                            <div class="container">
                            <?PHP
                            $cnt = 0;
                            while($rs = mysqli_fetch_array($result)){
                            ?>
                            <div class="col-sm-4">
                                    <img src = "<?PHP echo "images/".$rs['pic']; ?>" height="300" width="250">
                                    <p></p>
                                    <p><font id="a3">Name:</font> <font id="p_1"><?PHP echo $rs['c_name']; ?></font> </p>
                                    <p><font id="a3">Size:</font> <font id="p_1"><?PHP echo $rs['size']; ?></font> </p>
                                    <p><font id="a3">Gender:</font> <font id="p_1"><?PHP echo $rs['gender']; ?></font> </p>
                                    <p><font id="a3">Color:</font> <font id="p_1"><?PHP echo $rs['color']; ?></font> </p>
                                    <p><font id="a3">Price:</font> <font id="p_1"><?PHP echo $rs['price']; ?>Bath</font>
                                    </p>
                                    <p><font id="a3">Stock:</font> <font id="p_1"><?PHP if($rs['stock']<1){ echo "สินค้าหมด"; }
                                    else{ echo $rs['stock']." ea"; } ?> </font> </p>
                                    <p><a href="editFormCostume.php?c_id=<?PHP echo $rs['c_id']; ?>" id ="a2">Edit</a>
                                    <a href="delCostume.php?c_id=<?PHP echo $rs['c_id']; ?> "id ="a1">Delete</a></p>
                            </div>

                                    
                            
                            <?PHP
                            
                            $cnt++;
                            }
                            if($cnt == 0){ echo "<p align='center' id='p2'>ไม่พบสินค้าที่ค้นหา !</p>";}
                            ?>
                            </div>
                            <?PHP
                            mysqli_close($conn);
                            include("include_footer.html");
                            ?>
 <br><br>

</body>
</html>

                            

                            
