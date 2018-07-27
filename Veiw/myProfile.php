<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header('Location: ' . filter_var('home.php', FILTER_SANITIZE_URL));
}
include_once '../Models/orderClass.php';
$order = new Order();
$num = $order->getNumberOfOrdersOfUser($_SESSION["id"]);
$OrdersNumber = ceil($num / 10);
//$OrdersNumber=$num;
if (!isset($_GET['page']))
{
    $page = 1;
} 
elseif ($_GET['page'] > $OrdersNumber) 
{
    header('Location: ' . filter_var('myProfile.php', FILTER_SANITIZE_URL));
} 
else 
{
    $page = (int) $_GET['page'];
}
$OrdersData = $order->GetOrdersByLIMITUser($page, $_SESSION["id"]);
include_once '../Models/productClass.php';
include_once 'NavBar.php';
?>
<div class="container-fluid main_profile">    
    <div class="row ">
        <div class="col-sm-3 well  text-center">
            <div class="well profile_img">
                <?php
                if ($_SESSION["oauth_provider"] == "lotus") 
                {
                    echo '<img src="../Resources/UserImages/' . $_SESSION['picture'] . '" class="img-circle" height="65" width="65" alt="Avatar">';
                } 
                else 
                {
                    echo '<img src="' . $_SESSION['picture'] . '" class="img-circle" height="65" width="65" alt="Avatar">';
                }
                ?>
            </div>
            <div class="">
                <table >
                    <tbody>
                        <tr>
                            <td class="glyphicon glyphicon-user icons__"> </td>
                            <td><?php echo $_SESSION["first_name"] . ' ' . $_SESSION["last_name"]; ?></td>
                        </tr>
                        <tr>
                            <td class="glyphicon glyphicon-envelope icons__"></td>
                            <td><?php echo $_SESSION["email"]; ?></td><br>
                    </tr>
                    <?php
                    if (isset($_SESSION['phone'])) 
                    {
                        echo '<tr>
                                <td class="glyphicon glyphicon-earphone icons__"> </td>
                                <td>' . $_SESSION["phone"] . '</td>
                            </tr>';
                    }
                    ?>

                    </tbody>
                </table>
            </div><br>
            <div class="well">
                <?php
                if ($_SESSION['oauth_provider'] == 'lotus')
                {
                    echo '
                        <span class="btn btn-success "  data-toggle="modal" data-target="#updateModal" role="button" style="margin-right: 10px">
                            <i class="glyphicon glyphicon-edit"></i>
                        </span>';
                }
                else
                {
                    echo '
                        <span class="btn btn-success "  data-toggle="modal" data-target="#updatePhoneModal" role="button" style="margin-right: 10px">
                            <i class="glyphicon glyphicon-edit"></i>
                        </span>';
                }
                    
                ?>

                <a href="../Controllers/deleteUserController.php?submit=DeleteUser"class="btn btn-danger" role="button" >
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="page-header">
                <h1><small>Your Orders</small></h1>
            </div>
            <div class="list-group">
                <?php
                $product = new Product();
                foreach ($OrdersData as $value) 
                {
                    $productData = $product->getProduct($value['product']);
                    echo '
                        <span href="" class="list-group-item myOrders">
                            <a>'. $productData[0]["name_en"] .'</a>
                           
                            <form action="../Controllers/updateOrderController.php">
                                <input type="number" name="quantity" placeholder="quantity: ' . $value["quantity"] . '">
                                <input type"text" name="id" value="' . $value["id"] . '" style="display:none" >
                                <input type="submit" name="submit"  value="Update">
                                <a href="../Controllers/deleteOrderController.php?id=' . $value["id"] . '"class="btn btn-danger" role="button" style="margin-bottom: 5px;">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </form>
                        </span> ';
                }
                ?>
            </div> 
            <div class="pages_number text-center">
                <ul class="pagination">
                    <?php
                    $previousPage = (int) $page - 1;
                    $nextPage = (int) $page + 1;
                    if ($page > 1) {
                        echo'<li class="previous "><a href="myProfile.php?page=' . $previousPage . '">Previous</a></li>';
                    }
                    $max = 7;
                    if ($page < $max) {
                        $sp = 1;
                    } 
                    elseif ($page >= ($OrdersNumber - floor($max / 2))) {
                        $sp = $OrdersNumber - $max + 2;
                    } 
                    elseif ($page >= $max) {
                        $sp = $page - floor($max / 2);
                    }
                    if ($page >= $max) {
                        echo'<li><a href="myProfile.php?page=1">1</a></li>';
                        echo'<li><a >...</a></li>';
                    }
                    for ($i = $sp; $i <= ($sp + $max - 1); $i++) {
                        if ($i > $OrdersNumber) {
                            continue;
                        }
                        if ($page == $i) {
                            echo'<li class="active"><a href="#">' . $page . '</a></li>';
                        } else {
                            echo'<li><a href="myProfile.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    if ($page < ($OrdersNumber - floor($max / 2)) - 1) {
                        echo'<li><a >...</a></li>';
                    }
                    if ($page < ($OrdersNumber - floor($max / 2))) {
                        echo'<li><a href="myProfile.php?page=' . $OrdersNumber . '">' . $OrdersNumber . '</a></li>';
                    }
                    if ($page < $OrdersNumber) {
                        echo'<li class="next"><a href="myProfile.php?page=' . $nextPage . '">next</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php 
    if($_SESSION['oauth_provider'] == 'lotus')
    {
        
        if (isset($_SESSION["phone"])) 
        {
            $phone = $_SESSION["phone"];
        }
        else 
        {
            $phone ='Enter Your Phone Number';
        }
        
        echo'<!-- Model Update -->
            <div class="modal fade" id="updateModal" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="../Controllers/updateUserController.php" class="well" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="pwd">First Name:</label>
                                    <input  type="text" class="form-control" placeholder="'.$_SESSION["first_name"].'" name="first_name" >
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input  type="text" class="form-control" placeholder=" '.$_SESSION["last_name"].'"  name="last_name" >
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" id="pwd" class="form-control" placeholder="Enter password" name="password" >
                                </div>
                                <div class="form-group">
                                    <label >Repeat Password:</label>
                                    <input type="password" id="rpwd" class="form-control" placeholder="Enter password again" name="resetpassword" >
                                    <b id="notMatched" style="color:#ca1a1a; display: none">not matched</b>
                                    <b id="matched" style="color:green; display: none">matched</b>
                                </div>
                                <div class="form-group">
                                    <label >Phone :</label>
                                    <input type="text" class="form-control" placeholder="'.$phone.'" name="phone" >
                                </div>
                                <div class="form-group">
                                    <label>Photo:</label>
                                    <div class="text-center upload_form" >
                                        <input  class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <input name="Update" type="submit" class="btn btn-success" style="width: 100%" value="Update" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
    }
    else
    {
        if (isset($_SESSION["phone"])) 
        {
            $phone = $_SESSION["phone"];
        } 
        else 
        {
            $phone ='Enter Your Phone Number';
        }
        echo'<div class="modal fade" id="updatePhoneModal" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="../Controllers/updatePhoneUserController.php" class="well" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Phone :</label>
                                    <input type="text" class="form-control" placeholder="'.$phone.'" name="phone" >
                                </div>
                                <input name="Update" type="submit" class="btn btn-success" style="width: 100%" value="Update" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
    }
    ?>    
</div>
<?php
include 'footer.php';
?>