<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
   protected $table = 'users';
   protected $primaryKey = 'id';
   protected $useTimestamps = true;
   protected $allowedFields = ['username', 'fullname', 'email', 'password_hash','image','active'];

   public function getUser($username = false) 
   {
        if($username == false) {
            return $this->where('id !=', 1)->findAll();
        }
        return $this->where(['username' => $username])->first();
   }

   public function getRole() 
   {
    $db = \Config\Database::connect();
    return $db->query('SELECT * FROM user_role')->getResultArray();
   }
}