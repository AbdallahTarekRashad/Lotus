<?php
include_once 'DB.php';
class Order
{
    /*
    ** function addOrder add order by User On specific product
    ** $userId User Id in table user in database
    ** $productId product id from database
    ** $quantity the quantity the user want from product
    */
    public function addOrder($userId, $productId , $quantity)
    {
        $query = "INSERT INTO
                        `orders`
                    SET 
                        product = '".$productId."',
                        user = '".$userId."',
                        quantity = '".$quantity."'";
        $db = new DB();
        $insert = $db->prepare($query);
        $insert->execute();
        $db = NULL;
    }
    /*
    ** function deleteOrder delete order from database by id of order it used for Admin Only
    ** if deleted return true else false
    */
    public function deleteOrder($id)
    {
        $db = new DB(); 
        $query = "DELETE FROM `orders` WHERE `id`= ".$id;
        $stm = $db->prepare($query);
        if($stm->execute())
        {
            $db = NULL;
            return TRUE;   
        } 
        else 
        {
            $db = NULL;
            return false;    
        }
    }
    /*
    ** function delete order by user take user id and order id and it used for users
    ** $userId is user id from database
    ** $orderId is order id
    ** if order for this user it will deleted and if not return false
    */
    public function deleteOrderByUser($userId,$orderId)
    {
        $db = new DB(); 
        $query = "DELETE FROM `orders` WHERE `id`= ".$orderId." AND `user` = ".$userId;
        $stm = $db->prepare($query);
        if($stm->execute())
        {
            $db = NULL;
            return TRUE;   
        } 
        else 
        {
            $db = NULL;
            return false;    
        }
    }
    /*
    ** function updateOrder used for by user to update quantity of an order 
    ** $id order Id
    ** $quantity new quantity you want to update
    ** $userId user id that he order this order and want to update it
    */
    public function updateOrder($id,$quantity,$userId)
    {
        $db = new DB(); 
        $query = "UPDATE
                    `orders` 
                SET 
                    `quantity` = '".$quantity."' 
                WHERE 
                    `id` = ".$id."
                AND 
                `user` =".$userId;
        $stm = $db->prepare($query);
        if($stm->execute())
        {
            $db = NULL;
            return TRUE;
        } 
        else 
        {
            $db = NULL;
            return FALSE; 
        }

    }
    /*
    ** function getNumberOfOrders return number of orders in database 
    ** Used by Admin only
    */
    public function getNumberOfOrders()
    {
        $query = "SELECT * FROM `orders`";
        $db = new DB();
        $result = $db->prepare($query);
        $result->execute();
        $data = $result->rowCount();
        $db = NULL;
        return $data;
    }
    /*
    ** function getOrderByLimit take the number of page and return 10 rows for this page
    ** example if $pageid = 5 function return from 40th row to 50th row from database sorted by 
    ** time of add order from new to old
    ** Used By Admin Only
    */
    public function GetOrdersByLIMIT($pageid)
    {
        $db = new DB();
        $start = 10*($pageid-1);
        $row = 10;
        $query = "SELECT * FROM `orders` ORDER BY `dateOfOrder` DESC LIMIT $start,$row";
        $stm = $db->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll();
        $db = NULL;
        return $result;
    }
    /*
    ** function getNumberOfOrdersOfUser return number of orders ordered by spesific user in database 
    ** $userId id of user in database
    ** Used by User only
    */
    public function getNumberOfOrdersOfUser($userId)
    {
        $query = "SELECT * FROM `orders` WHERE `user` =" .$userId;
        $db = new DB();
        $result = $db->prepare($query);
        $result->execute();
        $data = $result->rowCount();
        $db = NULL;
        return $data;
    }
    /*
    ** function getOrderByLimitUser take the number of page and return 10 rows for this page
    ** example if $pageid = 5 function return from 40th row to 50th row from database sorted by 
    ** time of add order from new to old
    ** get orders of specific user
    ** Used By User Only
    */
    public function GetOrdersByLIMITUser($pageid,$userId)
    {
        $db = new DB();
        $start = 10*($pageid-1);
        $row = 10;
        $query = "select * from `orders` WHERE `user` = $userId ORDER BY `dateOfOrder` DESC LIMIT  $start,$row ";
        $stm = $db->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll();
        $db = NULL;
        return $result;
    }
}