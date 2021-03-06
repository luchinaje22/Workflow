<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'number_license',
        'phone',

        'expire_license',
        'email',
        'password',
        'level'
    ];
    protected $table = 'users';

    //
    protected $dates = ['expire_license'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    //Relacion UNO A MUCHOS
    public function dictations(){
        return $this->belongsToMany(Dictation::class, 'dictation_user')
                    ->withTimestamps()
                    ->withPivot( 'id', 'quantity', 'ammount', 'reference', 'payment_id', 'status' , 'dictation_id', 'user_id', 'created_at');

    }

    public function adminlte_image() {
        return 'https://i.picsum.photos/id/613/300/300.jpg?hmac=iAlBg400TaxoC7sUHVjQQVaMZ9im8E314SrksFFgfYU';
    }
    public function adminlte_desc(){
        return 'Administrador';
    }

    public function adminlte_profile_url(){
        return view('');
    }

}
