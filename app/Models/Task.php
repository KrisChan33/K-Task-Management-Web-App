<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'description',
        'status',
        'repeater_data',
        'project_id',
        ];

        protected $casts = [
            'repeater_data' => 'array',
        ];
        
    public function project(){
        return $this->belongsTo(Project::class);
    }
}