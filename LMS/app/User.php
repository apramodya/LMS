<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'username', 'password'
    ];
    protected $guarded = ['id','admin'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'users';

    public function lecturers(){
        return $this->hasMany(Lecturer::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
}
