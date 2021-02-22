<?php
namespace App\Models;
use App\Core\BaseModel;

class Product extends BaseModel{
    protected $tableName = 'products';

    public static function thong_ke_hang_hoa(){
        $model = new static();
        $model->queryBuilder = "SELECT cate.id, cate.name 'Loại',"
                . " COUNT(hh.cate_id) sl,"
                . " COUNT(cate.id) so_luong,"
                . " MIN(hh.price) gia_min,"
                . " MAX(hh.price) gia_max,"
                . " AVG(hh.price) gia_avg"
                . " FROM $model->tableName hh "
                . " JOIN categories cate ON cate.id = hh.cate_id "
                . " GROUP BY cate.id, cate.name";
        return $model;
    }


    public static function takeId($cate_name){
        $model = new Static();
        $model->queryBuilder = "
        SELECT products.*,categories.name 'cate_name' FROM `categories` INNER JOIN $model->tableName products on products.cate_id = categories.id 
        where categories.name  like '%$cate_name%';
        ";
        return $model;
    }

    public static function takeCateId($cate_id){
        $model = new Static();
        $model->queryBuilder = "
        SELECT products.*,
       
        categories.name 'cate_name' FROM `categories` INNER JOIN $model->tableName products on products.cate_id = categories.id 
        where categories.id = $cate_id;
        ";
        return $model;
    }

   
    public static function joinUserProId($id){
        $model = new static();
        $model->queryBuilder = "select comments.content,
                                comments.created_at,
                                users.user_name, 
                                products.name,
                                products.id
                                from $model->tableName 
                                inner join comments 
                                on $model->tableName.id = comments.product_id 
                                inner join users 
                                on comments.user_id = users.id 
                                where comments.product_id = $id";
        return $model;
    }

    public static function takeSearch($search){
        $model = new Static();
        $model->queryBuilder = "
        SELECT products.*,
         categories.name 'cate_name' FROM `categories` INNER JOIN $model->tableName products on products.cate_id = categories.id 
        where categories.name like '%$search%'  or products.name like '%$search%'
        ";
        return $model;
    }

    



    


}