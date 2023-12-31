<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
