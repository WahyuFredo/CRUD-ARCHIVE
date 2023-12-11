<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archive extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'title', 'category'];
    protected $table = 'archive';
    public $timestamps = false;
}
