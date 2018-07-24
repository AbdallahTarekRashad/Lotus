<?php 
if(isset($_GET['id']))
{
    include_once '../Models/productClass.php';
    $product = new Product();
    $data = $product->getProduct($_GET['id']);
}
else
{
     header('Location: ' . filter_var('home.php', FILTER_SANITIZE_URL));
}
include 'NavBar.php';
?>
<div class="container-fluid myNavTabs">
    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a href="#teha" data-toggle="pill">Definition</a></li>
        <li><a href="#abdu" data-toggle="pill">Structure</a></li>
        <li><a href="#john" data-toggle="pill">Using Way</a></li>
        <li><a href="#steve" data-toggle="pill">Advantages</a></li>
    </ul>
    <div class="tab-content">
        <div id="teha" class="tab-pane fade in active">
            <div class="row">
                <div class="col-sm-5 prod_img ">
                    <img src="<?php 
                              echo '../Resources/ProductImages/'.$data[0]['image'];
                              ?>">
                </div>
                <div class="col-sm-7 prod_info ">
                    <h4 class="page-header">TRON-PH</h4>
                    <p class="well">
                        <?php
                        echo $data[0]['script_en'];
                        ?>
                    </p>
                </div>
            </div>

        </div>
        <div id="abdu" class="tab-pane fade">
            <ul class="well struc_">
                <li>Effective Material:</li>
                <p class="">
                    Ut enim ad minim veniam, Ut enim ad minim veniam.  
                </p>

                <li>Chemical Group:</li>
                <p>
                    Ut enim ad minim veniam, Ut enim ad minim veniam,<br>
                    Ut enim ad minim veniam,Ut enim ad minim veniam.    
                </p>
                <li>Chemical Group:</li>
                <p>
                    <?php
                    echo $data[0]['script_ar'];
                    ?>
                </p>
            </ul>
        </div>
        <div id="john" class="tab-pane fade">
            <ul class="well struc_">
                <li>How to Use:</li>
                <p class="">
                    Ut enim ad minim veniam, Ut enim ad minim veniam.  
                </p>

                <li>Explation Video:</li>
                <div class="ex_video">
                    <iframe src="https://www.youtube.com/embed/<?php echo $data[0]['video'];?>">
                    </iframe>
                </div>


            </ul>
        </div>
        <div id="steve" class="tab-pane fade">
            <ul class="well advan_">
                <li> <?php echo $_SERVER['REQUEST_URI'] ;?></li>
                <li> Ut enim ad minim veniam, Ut enim ad minim.</li>
                <li> Ut enim ad minim veniam, Ut enim ad minim.</li>
                <li> Ut enim ad minim veniam, Ut enim ad minim.</li>
                <li> Ut enim ad minim veniam, Ut enim ad minim.</li>
                <li> Ut enim ad minim veniam, Ut enim ad minim.</li>
            </ul>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>