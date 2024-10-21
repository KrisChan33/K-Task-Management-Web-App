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
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        // 'name',
        // 'description',
        // 'status',
       'repeater_data',
        'project_id',
        ];

        protected $casts = [

            'repeater_data' => 'json',
           
        ];
        
    public function project(){
        return $this->belongsTo(Project::class);
    }
}