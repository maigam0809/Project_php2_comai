<?php
namespace App\Controllers;

use App\Models\Role;

class RoleController{

    public function index(){
        $roles = Role::all();
        include_once './app/views/role/list.php';
    }

    public function create(){
        include_once './app/views/role/create.php';

    }

    public function edit($id){

    }

    public function delete($id){

    }
}