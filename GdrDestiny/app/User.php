<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Classes\methodRole;
use App\Classes\Objects;

class User extends Authenticatable
{
    use Notifiable;
    use methodRole;
    use Objects;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','immagine_miniavatar' ,'last_chat','surname','email','url_music','data_di_nascita','nazionalità','password','sesso','id_razza','note_fato','background','note_off','immagine_avatar','last_activity','id_emisfero','role'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }
    public function hemispere(){
        return $this->belongsTo('App\Hemispere','id_emisfero','id');
    }

    public function breed(){
        return $this->belongsTo('App\Breed','id_razza','id');
    }

    public function classes(){
        return $this->belongsToMany('App\Classe','userclasses','id_user','id_classe');
    }

    public function skills(){
        return $this->belongsToMany('App\Skill','userskills','id_user','id_skill')->withPivot('livello');
    }
    public function expsGotted(){
        return $this->hasMany('App\Exp','id_user_to');
    }
    public function expsGiven(){
        return $this->hasMany('App\Exp','id_user_from');
    }
    public function specs(){
        return $this->belongsToMany('App\Specialization','userspecializations','id_user','id_specialization');
    }
    public function medicalrecords(){
        return $this->hasMany('App\Medicalrecord','id_user_to');
    }
    public function objects(){
        return $this->hasMany('App\Userobject','id_user');
    }
    public function mecha(){
        return $this->hasOne('App\Usermecha','id_user');
    }
    public function moneyGotted(){
        return $this->hasMany('App\Money','id_user_to');
    }
    public function moneyGiven(){
        return $this->hasMany('App\Money','id_user_from');
    }
    //retrieve the logs of user's login
    public function logs(){
        return $this->hasMany('App\Userloggedlog','id_user');
    }
    public function messagesGotted(){
        return $this->hasMany('App\Message','id_user_to')->orderBy('created_at','desc');
    }
    public function messagesGiven(){
        return $this->hasMany('App\Message','id_user_from');
    }
   
    


}
