<?php
if(!isset($_SESSION))
{
	session_start();
}
if($_POST['submit'] == 'UpdateProduct'&& isset($_SESSION['admin']))
{
    try
    {
        include '../Models/productClass.php';
        $product = new Product();
        if($_POST['script_en']!='')
        {
            $product->updateproduct($_POST['id'],'script_en',$_POST['script_en']);
        }
        if($_POST['script_ar']!='')
        {
            $product->updateproduct($_POST['id'],'script_ar',$_POST['script_ar']);
        }
        if($_POST['name_en']!='')
        {
            $product->updateproduct($_POST['id'],'name_en',$_POST['name_en']);
        }   
        if($_POST['name_ar']!='')
        {
            $product->updateproduct($_POST['id'],'name_ar',$_POST['name_ar']);
        }
        if($_POST['video']!='')
        {
            $product->updateproduct($_POST['id'],'video',$_POST['video']);
        }
        if($_POST['price']!='')
        {
            $product->updateproduct($_POST['id'],'price',$_POST['price']);
        }
        if(isset($_FILES) && !empty($_FILES['image']['name']))
        {
            //get the old image director and delete it
            $image = $product->selectPeoduct($_POST['id'],'image');
            $imageDir='../Resources/ProductImages/'.$image[0]['image'];
            include_once '../Models/fileManagerClass.php';
            $fileManager = new fileManger();
            $fileManager->delete($imageDir);
            $allowedext = array('png','jpeg','jpg','gif');
            $file = $_FILES['image'];
            $dir = "../Resources/ProductImages/";
            //upload the new image and save director in DB
            $diractor = $fileManager->upload($file,$allowedext,$dir);
            $product->updateproduct($_POST['id'],'image',$diractor);
        }
        header('Location: ' . filter_var('../Veiw/ProductInfo.php?id='.$_POST['id'], FILTER_SANITIZE_URL));
    }
    catch (Exception $ex) 
    {
        //someting wrong find an idea
        echo $ex->getMessage();
    }
}
else
{
    //someone go direct to this page and route to home
    header('Location: ' . filter_var('../Veiw/home.php', FILTER_SANITIZE_URL));
}