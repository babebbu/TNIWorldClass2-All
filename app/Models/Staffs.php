<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id', 'firstname', 'lastname', 'mobile', 'shirt_size', 'congenital_disease', 'food_allergies'];
}
