<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name', // name of the project
        'description',// description of the project
        'status', // status of the project
        // 'user_id'
        'start_date',// start date of the project
        'end_date', // end date of the project
        ];

        protected $casts = [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    
}
