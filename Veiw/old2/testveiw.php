<?php 
/*
include_once '../Models/productClass.php';
include_once '../Models/categoryClass.php';
$category = new Category();
$allCategories = $category->getAllCategories();
print_r($allCategories);
if(isset($_GET['c']))
{
   if(array_search($_GET['c'] ,array_column($allCategories,'id')))
   {
       echo'enter';
   }
}
*/
echo $_SERVER['HTTP_REFERER'];

echo strcmp($_SERVER['HTTP_REFERER'] , 'http://localhost/Lotas/Models/testModels.php');
?>