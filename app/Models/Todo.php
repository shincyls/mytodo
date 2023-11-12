<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','description','due_date','is_completed','created_on','updated_on'];
    public $timestamps = false;

    use HasFactory;
}
