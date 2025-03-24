<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Model
{
    use HasApiTokens;
    public $timestamps = false;
    protected $table = 'teachers';
    protected $fillable = ['name', 'email', 'batch'];
}