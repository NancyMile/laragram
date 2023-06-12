<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user(){
        //un post pertenece a un usuario y  solo quiereo que devuelva el name and username
        return $this->belongsTo(User::class)->select(['name','username']);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
