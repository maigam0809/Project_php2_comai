<?php
namespace App\Models;
use App\Core\BaseModel;

class Comment extends BaseModel {
    protected $tableName = 'comments';

    public static function joinUser(){
        $model = new static();
        $model->queryBuilder = "select $model->tableName.id ,$model->tableName.content,
                                $model->tableName.created_at, $model->tableName.user_id,
                                $model->tableName.product_id, users.user_name, products.name
                                from $model->tableName 
                                inner join users 
                                on $model->tableName.user_id = users.id 
                                inner join products 
                                on $model->tableName.product_id = products.id ";
        return $model;
    }
    public static function get_cmt($product_id,$user_id,$content){
        $model = new static();
        $model->queryBuilder = "select $model->tableName.content,
                                $model->tableName.created_at, $model->tableName.user_id,
                                $model->tableName.product_id, users.user_name, products.name
                                from $model->tableName 
                                inner join users 
                                on $model->tableName.user_id = users.id 
                                inner join products 
                                on $model->tableName.product_id = products.id 
                                WHERE $model->tableName.product_id = $product_id 
                                AND $model->tableName.user_id= $user_id
                                AND $model->tableName.content like '%$content%' ";
        return $model;
    }
   

    public static function tkComment(){
        $model = new static();
        $model->queryBuilder = "select products.name,
                                count($model->tableName.id) 'so_luong_cmt'
                                from $model->tableName 
                                inner join products 
                                on $model->tableName.product_id = products.id 
                                where $model->tableName.product_id
                                group by $model->tableName.product_id
                                order by products.id asc";
        return $model;
    }




}

