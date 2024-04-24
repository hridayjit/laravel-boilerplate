<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $table = 'software_master';

    protected $fillable = [
        'client_name',
        'project_name',
        'project_logo',
        'software_version',
        'client_logo',
        'is_deleted'
    ];

    public $timestamps = false;
}
