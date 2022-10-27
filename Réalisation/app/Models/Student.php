<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable =["Id_student","First_name","Last_name","Email", "PromotionID"];
    protected $primaryKey = 'Id_student';

    public $timetamps = false;
}