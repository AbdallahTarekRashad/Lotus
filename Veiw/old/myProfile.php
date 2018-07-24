<?php
if(!isset($_SESSION))
{
	session_start();
}
if(isset($_SESSION['id']))
{
    include 'NavBar.php';
}
else
{
     header('Location: ' . filter_var('home.php', FILTER_SANITIZE_URL));
}
?>
<div class="container-fluid main_profile">    
    <div class="row ">
        <div class="col-sm-3 well  text-center">
            <div class="well">
                <?php
                if (isset($_SESSION['picture'])) 
                {
                    if($_SESSION['oauth_provider'] == 'lotus')
                    {
                        echo '<img src="../Resources/UserImages/' . $_SESSION['picture'] . '" class="img-circle" height="65" width="65" alt="Avatar">';
                    }
                    else
                    {
                        echo '<img src="' . $_SESSION['picture'] . '" class="img-circle" height="65" width="65" alt="Avatar">';
                    }
                    
                } 
                else 
                {
                    echo'<img src="../Resources/IMG/6754_09-05-2017_7601_07-05-2017_1492297750_male3.png" class="img-circle" height="65" width="65" alt="Avatar">';
                }
                ?>
            </div>
            <div>
                <table class="">
                    <tbody>
                        <tr>
                            <td class="glyphicon glyphicon-user icons__"> </td>
                            <td><?php
                                echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
                                ?></td>
                        </tr>
                        <tr>
                            <td class="glyphicon glyphicon-envelope icons__"></td>
                            <td><?php
                                echo $_SESSION['email'];
                                ?></td><br>
                    </tr>
                    <?php
                    if (isset($_SESSION['phone'])) {
                        echo '<tr>
                                <td class="glyphicon glyphicon-earphone icons__"> </td>
                                    <td>' . $_SESSION['phone'] . '</td>
                                </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="page-header">
                <h1><small>Products</small></h1>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>
                <a href="#" class="list-group-item products_" style="overflow: hidden">
                    Ahmed Hossam
                    <button class="btn btn-success" role="button" style="float: right">
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>
                </a>


            </div>     
        </div>
        
    </div>
</div>

<?php
include 'footer.php';
?>