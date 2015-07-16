<?php 
/**
* Education model for Portfolio
*
* @category Class
* @package  PAS.DUTOUT
* @author   Aupet Christophe <christophe.aupet@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://jaipas.com
*/
namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
* Education model for Portfolio
*
* @category Class
* @package  PAS.DUTOUT
* @author   Aupet Christophe <christophe.aupet@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://jaipas.com
*/
class Education extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'education';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'description', 'title', 'env'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * User.
     *
     * @return response
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
