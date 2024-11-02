<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    
    use HasFactory;

    protected $table = 'user_project';

    protected $fillable = [
        'user_id', // user id of the project
        'project_id', // task id of the project
        'status', // status of the project
        ];

          /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
