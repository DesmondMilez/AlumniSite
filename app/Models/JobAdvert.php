<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer views
 * @property string subject
 * @property Collection Skills
 * @property User Admin
 */
class JobAdvert extends Model
{
    use SoftDeletes;

    protected $table = 'job_adverts';

    protected $fillable = ['admin_id', 'subject', 'description', 'views'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_adverts_skills_pivot', 'job_ad_id', 'skill_id');
    }

    public function getNamesOfSkills()
    {
        return implode(', ', $this->Skills->lists('name')->toArray());
    }
}