<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';
    protected $fillable = ['title','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
