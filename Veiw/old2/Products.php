<?php
include_once '../Models/productClass.php';
include_once '../Models/categoryClass.php';
$category = new Category();
$allCategories = $category->getAllCategories();
if(!isset($_GET['c']))
{
    $categoryId=0;
}
else
{
    if(!in_array($_GET['c'] ,array_column($allCategories,'id')))
    {
       header('Location: ' . filter_var('Products.php', FILTER_SANITIZE_URL));
    }
    else
    {
        $categoryId = $_GET['c'];
    }
}

include_once 'NavBar.php'; ?>

<div class="container-fluid ">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Categories</h4>
            <ul class="nav nav-pills nav-stacked">
                <?php
                if($categoryId === 0)
                {
                    echo '<li class="active"><a href="Products.php">all</a></li>';
                }
                else
                {
                    echo '<li><a href="Products.php">all</a></li>';
                }
                foreach($allCategories as $value)
                {
                    if($value['id'] == $categoryId)
                    {
                        echo '<li class="active"><a href="Products.php?c='.$value["id"].'">'.$value['name_en'].'</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="Products.php?c='.$value["id"].'">'.$value['name_en'].'</a></li>';
                    }
                    
                }
                ?>
                
            </ul><br>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Product..">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-sm-9">   
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img">
                            <img src="../Resources/IMG/prod_01.jpg" class="img-responsive" style="" alt="Image"></div>
                        <div class="panel-footer">
                            <span id="price">23.99 </span> EGP
                            <a href="" class="btn btn-primary apply_btn" data-toggle="modal" data-target="#orderModal">Apply</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-danger text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-success text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img">
                            <img src="../Resources/IMG/prod_01.jpg" class="img-responsive" style="" alt="Image"></div>
                        <div class="panel-footer">
                            <span>23.99 </span> EGP
                            <a href="" class="btn btn-primary apply_btn">Apply</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-danger text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-success text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img">
                            <img src="../Resources/IMG/prod_01.jpg" class="img-responsive" style="" alt="Image"></div>
                        <div class="panel-footer">
                            <span>23.99 </span> EGP
                            <a href="" class="btn btn-primary apply_btn">Apply</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-danger text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-success text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img">
                            <img src="../Resources/IMG/prod_01.jpg" class="img-responsive" style="" alt="Image"></div>
                        <div class="panel-footer">
                            <span>23.99 </span> EGP
                            <a href="" class="btn btn-primary apply_btn">Apply</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-danger text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-success text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img">
                            <img src="../Resources/IMG/prod_01.jpg" class="img-responsive" style="" alt="Image"></div>
                        <div class="panel-footer">
                            <span>23.99 </span> EGP
                            <a href="" class="btn btn-primary apply_btn">Apply</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-danger text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-success text-center">
                        <div class="panel-heading">BLACK FRIDAY DEAL</div>
                        <div class="panel-body product_img"><img src="../Resources/IMG/BC1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <?php
                            if (@$_SESSION['username'] != 'admin@g.com') {
                                echo '  <a href="Admin_edit_product.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                            } else {
                                echo '<a href="" class="btn btn-primary apply_btn">Apply</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pages_number text-center">
                <ul class="pagination">
                    <li class="previous "><a href="#">previous</a></li>
                    <li><a href="#">1</a></li>
                    <li class="disabled"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="active"><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li class="next"><a href="#">next</a></li>
                </ul>
            </div>

        </div><br>
    </div>

    <!-- Model Order -->
    <div class="modal fade" id="orderModal" role="dialog">
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action=" " class="well" method="POST">

                        <div class="form-group">
                            <span style="color: green">Quantity :</span>
                            <input  type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>

                        <div class="form-group">
                            <span style="color: green">Full Price : </span><span id="total_price">0 </span> EGP<br>
                        </div>
                        <input name="submit" type="submit" class="btn btn-success apply_btn" value="Order" >
                    </form>
                </div>

            </div>

        </div>
    </div>
    <script src="../Resources/JS/products.js"></script>
</div>



<?php include './footer.php'; ?>