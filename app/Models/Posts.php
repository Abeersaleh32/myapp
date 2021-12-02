<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public $table= 'posts';
    protected $primaryKey= 'id';
    protected $fillable=['userid','picture','paragraph'];
}
