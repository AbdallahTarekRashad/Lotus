<?php
/*
**this page for admin to add product in database and product must have unique name_en
**and unique name_ar and the extension of image file like array $allawedext
**and you have unlimeted size of your image you upload
*/
if(!isset($_SESSION))
{
	session_start();
}
if(isset($_POST['addProduct'])&& isset($_SESSION['admin']))
{
    if(isset($_FILES))
    {
        if(!empty($_FILES['image']['name'])){
            try
            {
                include_once '../Models/fileManagerClass.php';
                $allowedext = array('png','jpeg','jpg','gif');
                $file = $_FILES['image'];
                $dir = "../Resources/ProductImages/";
                $fileManager = new fileManger();
                $diractor = $fileManager->upload($file,$allowedext,$dir);
                $productInfo ['script_en'] = $_POST['script_en'];
                $productInfo ['script_ar'] = $_POST['script_ar'];
                $productInfo ['name_en']   = $_POST['name_en'];
                $productInfo ['name_ar']   = $_POST['name_ar'];
                $productInfo ['video']     = $_POST['video'];
                $productInfo ['price']     = $_POST['price'];
                $productInfo ['image']     = $diractor;
                $productInfo ['category']  = $_POST['category'];
                include_once'../Models/productClass.php';
                $product = new Product();
                $id = $product->addProduct($productInfo);
                if($id == false)
                {
                    echo '//enter product with the same name for old product find an idea';
                }
                elseif($id === 'Not Inserted')
                {
                    echo '//product not inserted find an idea';
                }
                else
                {
                    //product is inserted and rout him to productinfo
                    header('Location: ' . filter_var('../Veiw/ProductInfo.php?id='.$id, FILTER_SANITIZE_URL));
                }    
            }
            catch (Exception $ex) 
            {
                //someting wrong find an idea
                echo $ex->getMessage();
            }
            
        } 
        else 
        {
            //file not exist find an idea
        }
    }
    else
    {
        //file not exist find an idea
    }
}
else
{
    //someone go direct to this page and route to home
    header('Location: ' . filter_var('../Veiw/home.php', FILTER_SANITIZE_URL));
}
?>