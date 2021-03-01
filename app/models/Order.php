<?php
namespace App\Models;
use App\Core\BaseModel;

class Order extends BaseModel {
    protected $tableName = 'orders';
    protected $tableName2 = 'orders_detail';

    public static function joinUser(){
        $model = new static();
        $model->queryBuilder = "select * from $model->tableName orders inner join users on orders.user_id = users.id ";
        return $model;
    }
    
}

