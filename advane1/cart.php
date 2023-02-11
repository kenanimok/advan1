<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
    <title>Add to Cart</title>
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
    document.getElementById('CD_Number').style.display = "none";
}

function selectPaymentMethod() {
    var p = document.getElementById('Payment_Method').value;
    if (p == "Credit/Debit") {
        document.getElementById('CD_Number').style.display = "inline";
    } else {
        document.getElementById('CD_Number').style.display = "none";
    }
}
</script>

<body onload="defaultElements()">
    <?PHP
include "include_banner.html";
?>
    <div class="container">
        <p align="left"><a href="costume.php"><img src="home.png" width="50" height="50"></a></p>
        <p align="right" id="p_1">
            <?PHP session_start();
$_SESSION['refresh'] = 0;
if (isset($_SESSION['userName'])) {
    echo "Welcome: " . $_SESSION['userName'];
}

if (isset($_SESSION['guest'])) {
    echo "Welcome: " . $_SESSION['guest'];
}

ini_set('display_errors', 0); // hide warning
include "connectDB.php";
?>
        <form name="logout_form" method="get" action="logout.php" align="right">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </p>
        <div class="row">
            <div class="col-sm-4">
                <p id="h_1">สินค้าในตะกร้า</p>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <h3 align="right" id="h_3"><a id="h_3" href="costume.php?username=<?PHP echo
    $username; ?>">Back</a></h3>
            </div>
        </div>
    </div>
    <?PHP
$c_id = $_REQUEST['c_id'];
if (isset($_SESSION['userName'])) {
    $username = $_SESSION['userName'];
}

if (isset($_SESSION['guest'])) {
    $username = $_SESSION['guest'];
}

$cnt = $_REQUEST['cnt'];
$gender = $_REQUEST['gender'];
$color = $_REQUEST['color'];
$price = $_REQUEST['price'];
$total = $cnt * $price;
$refresh = $_REQUEST['cart'];
$amount = $_REQUEST['amount'];
// show cart
if ($amount == 0) {echo "<p align='center' id='p2'>ไม่มีสินค้าในตะกร้า !</p>";} else {
    $sql = "select * from cart inner join cloth on cart.c_id = cloth.c_id and cart.username
= '$username'" or die("Error:" . mysqli_error());
    $result = mysqli_query($conn, $sql);
    if (!$result) {echo "Can not Show Data";}
    $total = 0;
    ?>
    <br>
    <table width="1150" align="center">
        <tr bgcolor="#F09C13" height="50">
            <th id="th_1"></th>
            <th id="th_1">ชื่อสินค้า</th>
            <th id="th_1">เพศ</th>
            <th id="th_1">สี</th>
            <th id="th_1">จ านวน</th>
            <th id="th_1">ราคา</th>
            <th id="th_1">ราคารวม</th>
            <th colspan="2"></th>
        </tr>
        <?PHP
while ($rs = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>
                <font id="a3"> <img src="<?PHP echo " images/" . $rs['pic']; ?>" height="180"
                    width="150"> </font>
            </td>
            <td>
                <font id="a3">
                    <?PHP echo $rs['c_name']; ?>
                </font>
            </td>
            <td>
                <font id="a3">
                    <?PHP echo $rs['gender']; ?>
                </font>
            </td>
            <td>
                <font id="a3">
                    <?PHP echo $rs['color']; ?>
                </font>
            </td>
            <td>
                <font id="a3">
                    <?PHP echo $rs['amount']; ?>
                </font>
            </td>
            <td>
                <font id="a3">
                    <?PHP echo $rs['price']; ?>
                </font>
            </td>
            <td>
                <font id="a3">
                    <?PHP echo $rs['total']; ?>
                </font>
            </td>
            <td><a href="delUserOrder.php?cart_id=<?PHP echo $rs['cart_id']; ?>&amount=<?PHP
echo $rs['amount']; ?> " id="a1">Delete</td>
        </tr>
        <?PHP
$total = $total + $rs['total'];
    }
    ?>
        <tr style="font-size:1.4em;font-weight: bold;">
            <td colspan="6" style="text-align:right;">
                <?PHP echo "Total Price: "; ?>
            </td>
            <td>
                <?PHP echo number_format($total) . " Bath"; ?>
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr height="70">
            <td colspan="2">
                <p id="p3" style="font-weight: bold;">Pleas Enter Payment
                    Number:</p>
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr height="70">
            <td>
                <p id="p_1">Credit/Debit Number :&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </td>
            <form name="placeOrder" action="placeOrder.php" method="GET">
                <td><input type="text" name="card_number" required>
                </td>
        </tr>
        <tr>
            <td align="right">
                <form name="placeOrder" action="placeOrder.php" method="GET">
                    <input type="hidden" name="username" value="<?PHP echo $username;
    ?>" />
                    <input type="hidden" name="date_order" value="<?PHP echo date(" Y-md"); ?>" />
                    <input type="hidden" name="total" value="<?PHP echo $total; ?>" />
                    <input type="hidden" name="order_status" value="placed" />
                    <button type="submit" class="btn btn-warning btn-lg" style="width:120px">Plac Order</button>
                </form>
            </td>
            <td align="left" id="space">
                <form name="cancel" action="cancelOrder.php" method="GET">
                    <input type="hidden" name="username" value="<?PHP echo $username;
    ?>" />
                    <button type="submit" name="cancel" class="btn btn-danger btn-lg"
                        style="width:120px">Cancel</button>
                </form>
            </td>
        </tr>
    </table>
    <br><br>
    <br><br>
    <?PHP }
mysqli_close($conn);
include "include_footer.html";
?>
</body>

</html>