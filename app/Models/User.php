<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Post;
use App\Models\Follower;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts(){
        //relacion de one to many
        return $this->hasMany(Post::class);
    }

    public function likes(){
        //un usuario puede tener multiples likes, puede dar like en variias publicaciones
        return $this->hasMany(Like::class);
    }

    //almacena los seguidores de un usuario
    public function followers(){
        //un usuario puede tener muchos seguidores
        // esto va a guardar en la  tabla followes user_id, Follower_id
        // como los datos  vienen de la tabla  user y nuestra tabla se llama followers hay que especicicarla
        return $this->belongsToMany(User::class, 'followers', 'user_id','follower_id');
    }

    //check si un usuario ya etsa siguiendo a otro
    public function siguiendo(User $user){
        // en este caso user es el usuario que esta visitando el muro osea el autenticado
        // y this viene ha ser el usuario que estamos visitando
        return $this->followers->contains($user->id);
    }


    //almacenar los que seguimos
}
