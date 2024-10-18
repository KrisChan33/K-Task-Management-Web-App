<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'project_id', // project id
        'title', // name of the task
        'description',// description of the task
        'status', // status of the task
        'start_date',// start date of the task
        'end_date', // end date of the task
        ];



        protected $casts = [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];


    public function project(){
        return $this->belongsTo(Project::class);
    }
}
