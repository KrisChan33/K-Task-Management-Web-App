<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relatios\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Task extends Model 
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>t
     */
    
    protected $fillable = [
        'name',
        'project_id',
        'description',
        'status',
        ];
        // protected static function booted()
        // {
        //     static::creating(function ($task) {
        //         $task->project_id = Auth::id();
        //     });
        // }
        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
    
}