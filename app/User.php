<?php 
/**
* User model for Portfolio
*
* @category Class
* @package  PAS.DUTOUT
* @author   Aupet Christophe <christophe.aupet@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://jaipas.com
*/
namespace App;

use App\Skill;
use App\Experience;
use App\Education;
use App\Project;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
* User model for Portfolio
*
* @category Class
* @package  PAS.DUTOUT
* @author   Aupet Christophe <christophe.aupet@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://jaipas.com
*/
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['login', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Skill 
     *
     * @return associated result in table skill
     */
    public function skill()
    {
        return $this->hasMany('App\Skill');
    }

    /**
     * Experience
     *
     * @return associated result in table experiences
     */
    public function experience()
    {
        return $this->hasMany('App\Experience');
    }

    /**
     * Education
     *
     * @return associated result in table education
     */
    public function education()
    {
        return $this->hasMany('App\Education');
    }

    /**
     * Project 
     *
     * @return associated result in table projects
     */
    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
