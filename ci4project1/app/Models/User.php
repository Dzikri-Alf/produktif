<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama','alamat','username','password'
    ];

    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];
   
    protected function hashPassword(array $data) {
        if(isset($data['data']['password'])) {
            $data['data']['password'] = md5($data['data']['password']);
        }
        return $data;
    }
    public function updateRecord($id, $data){
        return $this->update($id, $data);
    }
}