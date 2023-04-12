<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Group;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
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
    ];

    // a user has many tags
    public function tags()
    {
        return $this->hasMany(Tag::class,'owner_id');
    }

    
    public function belongs_to_groups() 
    {
// returns the groups that the user belongs to and the union of  the groups that he is the owner
        return $this->belongsToMany(Group::class);

        
        

    }

    // user has many groups
    public function group_owns()
    {
        return $this->hasMany(Group::class , 'owner_id');
    }
    
    


}
