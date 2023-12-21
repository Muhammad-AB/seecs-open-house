<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    // Relationships
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function evaluator()
    {
        return $this->hasOne(Evaluator::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
