<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','deadline','assigned_to','created_by'];

    public function user(){
        return $this->belongsTo(User::class,'assigned_to');
    }

    public function createTask($data) {
        return self::query()->create($data);
    }

    public function getTasks() {
        return self::query()->with('user')->get();
    }
}
