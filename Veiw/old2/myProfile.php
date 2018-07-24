<?php
if(!isset($_SESSION))
{
	session_start();
}
if(!isset($_SESSION['id']))
{
    header('Location: ' . filter_var('home.php', FILTER_SANITIZE_URL));
}
include_once '../Models/orderClass.php';
$order = new Order();
$num = $order->getNumberOfOrdersOfUser($_SESSION["id"]);
$OrdersNumber=ceil($num/10);
//$OrdersNumber=$num;
if (!isset($_GET['page'])) {
    $page = 1;
}
elseif($_GET['page']>$OrdersNumber)
{
    header('Location: '.filter_var('myProfile.php', FILTER_SANITIZE_URL));
}
else
{
    $page = (int)$_GET['page'];
}
$OrdersData=$order->GetOrdersByLIMITUser($page,$_SESSION["id"]);
include_once '../Models/productClass.php';
include_once 'NavBar.php';
?>
<div class="container-fluid main_profile">    
    <div class="row ">
        <div class="col-sm-3 well  text-center">
            <div class="well profile_img">
                <?php
                if($_SESSION["oauth_provider"] == "lotus") {
                    echo '<img src="../Resources/UserImages/' . $_SESSION['picture'] . '" class="img-circle" height="65" width="65" alt="Avatar">';
                }
                else {
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
                            <td><?php echo $_SESSION["email"];?></td><br>
                    </tr>
                    <?php
                    if (isset($_SESSION['phone'])) {
                        echo '<tr>
                                <td class="glyphicon glyphicon-earphone icons__"> </td>
                                <td>'.$_SESSION["phone"].'</td>
                            </tr>';
                    }    
                    ?>
                    
                    </tbody>
                </table>
            </div><br>
            <div class="well">
                <?php
                if($_SESSION['oauth_provider'] == 'lotus')
                echo '
                <span class="btn btn-success "  data-toggle="modal" data-target="#updateModal" role="button" style="margin-right: 10px">
                    <i class="glyphicon glyphicon-edit"></i>
                </span>';
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
                foreach($OrdersData as $value)
                {
                    $productData=$product->getProduct($value['product']);
                    echo '
                    <span class="list-group-item" style="padding:3px">
                    <div class="row">
                       <span class="col-xs-5">'.$productData[0]["name_en"].$value["quantity"].'</span> 
                            
                        <form action="../Controllers/updateOrderController.php"class="col-xs-6">
                                
                                    <input type="number" name="quantity" placeholder="quantity: '.$value["quantity"].'" class="form-control">
                                    <input type"text" name="id" value="'.$value["id"].'" style="display:none" >
                                    <input type="submit" name="submit" id="applyButton" class="btn btn-success" role="button" value="Update" >
                                        
                                    
                                
                            </form>
                            
                        <div class="col-xs-1"> 
                            <a href="../Controllers/deleteOrderController.php?id='.$value["id"].'"class="btn btn-danger" role="button">
                            <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                       
                    </div>
                    </span>
                    ';
                }
                ?>
                <span href="" class="list-group-item products_" style="overflow: hidden">
                    <div id="editProductButton" >
                        <a href="">Ahmed Hossam</a>
                        <button id="" class="btn btn-danger" role="button" style="float: right">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                        <button id="editButton" class="btn btn-success" role="button" style="float: right; margin-right: 10px">
                            <i class="glyphicon glyphicon-edit"></i>
                        </button>
                    </div>
                    <div id="editProductForm" class="row" style="display: none">
                        <div class="col-sm-7">
                            <a href="">Ahmed Hossam</a>
                        </div>
                        <div class="col-sm-5">
                            <form>
                                <div class="input-group">
                                    <input type="number" placeholder="quantity: 50" class="form-control">
                                    <span id="applyButton" class="btn btn-success input-group-addon" role="button" >
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </span>
            </div>  
            <div class="pages_number text-center">
                    <ul class="pagination">
                        
                        <?php
                        /*
                        $previousPage = (int)$_GET['page']-1;
                        $nextPage = (int)$_GET['page']+1;
                        if($_GET['page'] != 1)
                        {
                           
                        }
                        for ($page = 1 ; $page <=$OrdersNumber ; $page++)
                        {
                            if($_GET['page'] == $page)
                            {
                                echo'<li class="active"><a href="#">'.$page.'</a></li>';
                            }
                            else
                            {
                                echo'<li><a href="myProfile.php?page='.$page.'">'.$page.'</a></li>';
                            }
                        }
                        if($_GET['page'] != $OrdersNumber)
                        {
                            echo'<li class="next"><a href="myProfile.php?page='.$nextPage.'">next</a></li>';
                        }
                        */
                        ?>
                        
                        <!-- If the current page is more than 1, show the First and Previous links -->
                        <?php
                        $previousPage = (int)$page-1;
                        $nextPage = (int)$page+1;
                        if($page > 1)
                        {
                         echo'<li class="previous "><a href="myProfile.php?page='.$previousPage.'">Previous</a></li>';
                        }
                        //setup starting point
                        //$max is equal to number of links shown
                        $max = 7;
                        if($page< $max)
                        {
                            $sp = 1;
                        }   
                        elseif($page >= ($OrdersNumber - floor($max / 2)) )
                        {
                            $sp = $OrdersNumber - $max+2;
                        }
                        elseif($page >= $max)
                        {
                            $sp = $page  - floor($max/2);
                        }  
                        
                        /*If the current page >= $max then show link to 1st page -->**/
                        if($page >= $max)
                        {
                            echo'<li><a href="myProfile.php?page=1">1</a></li>';
                            echo'<li><a >...</a></li>';
                        }
                        //Loop though max number of pages shown and show links either side equal to $max / 2 -->
                        for($i = $sp; $i <= ($sp + $max -1);$i++)
                        {
                            if($i > $OrdersNumber)
                            {
                                continue;
                            }
                            if($page == $i)
                            {
                                echo'<li class="active"><a href="#">'.$page.'</a></li>';
                            }
                            else
                            {
                                echo'<li><a href="myProfile.php?page='.$i.'">'.$i.'</a></li>';
                            }
                        }
                        //<!-- If the current page is less than say the last page minus $max pages divided by 2-->
                        if($page  < ($OrdersNumber - floor($max / 2))-1)
                        {
                            echo'<li><a >...</a></li>';
                        }
                        if($page  < ($OrdersNumber - floor($max / 2))) 
                        {
                            echo'<li><a href="myProfile.php?page='.$OrdersNumber.'">'.$OrdersNumber.'</a></li>';
                        }
                        //<!-- Show last two pages if we're not near them -->
                        if($page < $OrdersNumber)
                        {
                            echo'<li class="next"><a href="myProfile.php?page='.$nextPage.'">next</a></li>';
                        }
                        ?>
                    </ul>
                </div>
        </div>
        
    </div>
    <!-- Model Update -->
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
                            <input  type="text" class="form-control" placeholder="<?php echo $_SESSION["first_name"]; ?>" name="first_name" >
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input  type="text" class="form-control" placeholder="<?php echo $_SESSION["last_name"]; ?>"  name="last_name" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password" >
                        </div>
                        <div class="form-group">
                            <label >Repeat Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password again" name="resetpassword" >
                        </div>
                        <div class="form-group">
                            <label >Phone :</label>
                            <input type="text" class="form-control" placeholder="<?php
                            if(isset($_SESSION["phone"]))
                            {
                                echo $_SESSION["phone"];
                            }
                            else
                            {
                                echo 'Enter Your Phone Number';
                            }
                            ?>
                            " name="phone" >
                        </div>
                        <div class="form-group">
                            <label>Photo:</label>
                            <div class="text-center upload_form" >
                                <input  class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <input name="submit" type="submit" class="btn btn-success" style="width: 100%" value="Update" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>