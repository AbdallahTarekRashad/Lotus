<?php
include_once '../Models/gpConfig.php';
include_once '../Models/fbConfig.php';
$permissions = ['email'];
$facebook = $helper->getLoginUrl($redirectURL, $permissions);
$google = $gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../Resources/CSS/main.css">
        <link rel="shortcut icon" href="../Resources/IMG/favicon1.png" >
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <!-- NavBar -->
        <nav class="navbar nav_ navbar-fixed-top" >
            <div class="">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle navbar-toggle_" data-toggle="collapse" data-target="#NavBar">
                        <span class="icon-bar" style="background-color: darkgreen"></span>
                        <span class="icon-bar" style="background-color: darkgreen"></span>
                        <span class="icon-bar" style="background-color: darkgreen"></span>
                    </button>
                    <a href="" class="navbar-brand" style="color: white">Our Logo</a>
                </div>
                <div id="NavBar" class="collapse navbar-collapse" style="margin-right: 60px">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#myPage">Home</a></li>
                        <li><a href="#values">Values.</a></li>
                        <li><a href="#services">Services.</a></li>
                        <li><a href="#contact">Contact.</a></li>
                        <li><a href="Products.php">Products.</a></li>
                        <?php
                        
                        if(isset($_SESSION['id'])) 
                        {
                            echo '<li><a href="myProfile.php?page=1"><span class="glyphicon glyphicon-user test" ></span> profile</a></li>
                                      <li><a href="../Controllers/logoutUserController.php"><span class="glyphicon glyphicon-log-out test" ></span> Logout</a></li>';
                        }
                        elseif (isset($_SESSION['admin'])) 
                        {
                            echo '<li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                            Maintain
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" style="background-color: #75c598">
                                            <li><a href="Admin_Home.php">edit home scripts</a></li>
                                            <li><a href="Admin_add_product.php">add product</a></li>
                                            <li><a href="" data-toggle="modal" data-target="#categoryModal_">add Category</a></li>
                                            <li><a href="Orders_and_Users.php?pageUser=1&pageOrder=1">orders & users</a></li>
                                        </ul>
                                    </li> 
                                    ';

                            echo ' <li><a href="../Controllers/logoutAdminController.php"><span class="glyphicon glyphicon-log-out test" ></span> Logout</a></li>';
                        }
                        else
                        {
                            echo '<li><a href="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-lock test" ></span> Login</a></li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="cover" >
            <img src="../Resources/IMG/img1.jpg">
        </div>


        <!-- Modal Login -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container_">
                            <form action="../Controllers/loginUserController.php" method="POST">
                                <div class="row_">
                                    <div class="vl_">
                                        <span class="vl-innertext">or</span>
                                    </div>

                                    <div class="col_">
                                        <a href="<?php echo $facebook; ?>" class="fb btn_">
                                            <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                        </a>
                                        <a href="<?php echo $google; ?>" class="google btn_"><i class="fa fa-google fa-fw">
                                            </i> Login with Google+
                                        </a>
                                        <a href="" class="google btn_" data-dismiss="modal"  data-toggle="modal" data-target="#signupModal" style="background-color:#6cc16c"><i class="fa fa-google fa-fw">
                                            </i> Sign Up
                                        </a>
                                    </div>

                                    <div class="col_">
                                        <div class="hide-md-lg">
                                            <p>Or sign in manually:</p>
                                        </div>

                                        <input class="input_" type="text" name="email" placeholder="Username" required style="color:#000">
                                        <input class="input_" type="password" name="password" placeholder="Password" required style="color:#000">
                                        <input name="submit" type="submit" class="input_" value="LogIn" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Model Sign Up -->
        <div class="modal fade" id="signupModal" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <form action="../Controllers/signupUserController.php" class="well" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="pwd">First Name:</label>
                                <input  type="text" class="form-control" id="fn" placeholder="Enter first name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input  type="text" class="form-control" id="ln" placeholder="Enter last name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label >Repeat Password:</label>
                                <input type="password" class="form-control" id="re_pwd" placeholder="Enter password again" name="resetpassword" required>
                            </div>
                            <div class="form-group">
                                <label >Gender:</label>
                                <select name="gender" class="gender" required style="width: 50%; border-radius: 5px">
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photo:</label>
                                <div class="text-center upload_form" >
                                    <input required="required" type="file" name="image" class="form-control" >
                                </div>
                            </div>
                            <input name="submit" type="submit" class="btn btn-success" style="width: 100%" value="SignUp" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Model Category -->
        <div class="modal fade" id="categoryModal_" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                         <form action="../Controllers/addCategoryController.php" method="get" class="well" >
                            <div class="form-group">
                                <span>Category Name :</span>
                                <input  type="text" class="form-control" placeholder="Enter category name" name="name_en" required>
                            </div>
                            <div class="form-group" style="direction: rtl">
                                <span>ادخل اسم الصنف</span>
                                <input  type="text" class="form-control"  placeholder="اسم الصنف" name="name_ar" required>
                            </div>
                            <input name="submit" type="submit" class="btn btn-success" style="width: 100%" value="addcategory" >
                        </form>
                        <form action="../Controllers/deleteCategoryController.php" method="post" class="well">
                            <div class="form-group">
                                <span >Delete Category : </span><br>
                                <select name="id" class=""  style="width: 50%; height: 35px; border-radius: 5px; margin-bottom:10px">
                                    <?php
                                    include_once '../Models/categoryClass.php';
                                    $category = new Category();
                                    $data = $category->getAllCategories();
                                    foreach($data as $cat)
                                    {
                                        echo '<option value="'.$cat['id'].'">'.$cat['name_en'].'</option>';
                                    }
                                    ?>
                                </select>
                                <input name="submit" type="submit" class="btn btn-success" style="width: 100%" value="DeleteCategory" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
