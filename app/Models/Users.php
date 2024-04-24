<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user_master';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'role_id',
        'password',
        'salt',
        'created_at',
        'updated_at',
        'is_deleted'
    ];

    protected $hidden = [
        'password',
        'salt'
        //'remember_token',
    ];

    public $timestamps = false;
}
