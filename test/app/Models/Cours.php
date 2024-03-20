<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
       
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'UserCours', 'id_cours', 'user_id');
    }
}
