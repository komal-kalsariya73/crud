<?php
namespace App\Models;
use CodeIgniter\model;

class StudentModel extends Model{
    protected $table='student';
    protected $primaryKey = 'id';
    protected $allowedFields=['firstname','lastname','address','gender','pincode','course','email','image'];

    
}

?>