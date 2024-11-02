<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // name of the project
        'user_id', // user id of the project
        'description',// description of the project
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

// protected static function booted()
//     {
//         static::creating(function ($project) {
//             $project->user_id = Auth::id();
//         });
//     }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function assignment_user(){
        return $this->belongsToMany(User::class, 'user_project');

}

}
