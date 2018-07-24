<?php include './NavBar.php'; ?>

<div class="container-fluid myNavTabs text-center">

    <form action="" method="POST" enctype="multipart/form-data" >
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#defention" data-toggle="pill">Definition</a></li>
            <li><a href="#structure" data-toggle="pill">Structure</a></li>
            <li><a href="#usingWay" data-toggle="pill">Using Way</a></li>
            <li><a href="#advantages" data-toggle="pill">Advantages</a></li>
        </ul>
        <div class="tab-content">
            <div id="defention" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm-5 well" >

                        <div class=" admin_prod_img">
                            <img src="https://placehold.it/270x357?text=IMAGE">
                        </div>
                        <div class="text-center upload_form" >
                            <input required="required" type="file" name="image">
                        </div>

                    </div>
                    <div class="col-sm-7 prod_info ">
                        <h4 class="page-header">TRON-PH</h4>
                        <div class="new_definition well text-center">
                            <textarea class="well" required maxlength="545"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div id="structure" class="tab-pane fade product_struct well">

                <ul class="struc_">
                    <li>Effective Material:</li>
                    <textarea class="well" required maxlength="545"></textarea>

                    <li>Chemical Group:</li>
                    <textarea class="well" required maxlength="545"></textarea>

                    <li>Chemical Group:</li>
                    <textarea class="well" required maxlength="545"></textarea>

                </ul>

            </div>
            <div id="usingWay" class="tab-pane fade product_struct well">
                <ul class="well struc_">
                    <li>How to Use:</li>
                    <textarea class="well" required maxlength="545"></textarea>

                    <li>Explation Video URL:</li>
                    <textarea class="well" required maxlength="545"></textarea>
                </ul>
            </div>
            <div id="advantages" class="tab-pane fade new_definition well text-center">
                <textarea class="well" required maxlength="545"></textarea>
            </div>
        </div>
        <input type="submit" name="apply" value="Done"
                class="btn btn-success btn-md done">
    </form>    
</div>

<?php
include './footer.php';
