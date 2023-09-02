<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
   protected $table = 'employee';
   protected $primaryKey = 'idemployee';
   protected $useTimestamps = true;
   protected $allowedFields = ['name', 'email' ,'phone_number', 'image', 'nip','place','date_birth','gender','address','position','status_employee','hire_date'];
   public function getEmployee($nip = false) 
   {
        if($nip == false) {
            return $this->findAll();
        }
        return $this->where(['nip' => $nip])->first();
   }

   public function numRowEmployee() 
   {
        return $this->countAll();
   }
}