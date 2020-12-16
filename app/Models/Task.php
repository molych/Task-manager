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
     * @var array
     */

    protected $fillable = ['name', 'description', 'status_id', 'assigned_to_id', 'created_by_id'];

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus', 'status_id');
    }

    public function createBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by_id');
    }

    public function assignee()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to_id');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Models\Label');
    }
}
