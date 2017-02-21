<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property integer smer_id
 * @property string avatar
 * @property User User
 */
class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = ['user_id', 'avatar', 'smer_id', 'birth_date', 'about_me'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function smer()
    {
        return $this->belongsTo(Smer::class, 'smer_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skills_users_pivot', 'user_profile_id', 'skill_id');
    }

    public function getAvatarPath($filename = '')
    {
        return asset("avatars/{$this->User->index}/$filename");
    }

    public function getAvatarAttribute()
    {
        return $this->getAvatarPath($this->attributes['avatar']);
    }

    public function getRawAvatarName()
    {
        return $this->attributes['avatar'];
    }
}