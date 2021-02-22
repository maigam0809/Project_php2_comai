<?php
namespace App\Models;
use App\Core\BaseModel;

class User extends BaseModel {
    protected $tableName = 'users';
    public static function tkRole(){
        $model = new static();
        $model->queryBuilder = "select users.name,
                                count($model->tableName.role) 'so_luong'
                                from $model->tableName 
                                inner join users 
                                on $model->tableName.product_id = users.id 
                                where $model->tableName.product_id
                                group by $model->tableName.product_id
                                order by users.id asc";
        return $model;
    }

    public static function lietKeRole(){
        $model = new static();
        $model->queryBuilder = "select $model->tableName.role 'Quyền',
                                count($model->tableName.role) 'so_luong'
                                from $model->tableName 
                                where $model->tableName.role
                                group by $model->tableName.role
                                order by $model->tableName.role asc";
        return $model;
    }
}

