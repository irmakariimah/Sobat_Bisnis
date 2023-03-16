<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Edubisnis;
// use App\Models\Kursusbisnis;

class Admin extends Model
{
    use HasFactory;
    
    protected $fill = [
        'name','username','email','password'
    ];
    public function getRouteKeyName(){
        return 'id';
    }

    public function getEdukasi(){
        return $this->hasMany(Edubisnis::class);
    }
    public function getKursus(){
        return $this->hasMany(Kursusbisnis::class);
    }
}
