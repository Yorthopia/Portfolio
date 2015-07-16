<?php 
/**
* Pages Controller for Portfolio
*
* @category Class
* @package  PAS.DUTOUT
* @author   Aupet Christophe <christophe.aupet@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://jaipas.com
*/
namespace App\Http\Controllers;

use App\User;
use App\Skill;
use App\Experience;
use App\Project;
use App\Education;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
use Input;
use Validator;
use Mail;
use Redirect;
use Auth;
use Hash;
use Session;

use Illuminate\Http\Request;

/**
* Pages Controller for Portfolio
*
* @category Class
* @package  PAS.DUTOUT
* @author   Aupet Christophe <christophe.aupet@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://jaipas.com
*/
class PagesController extends Controller
{

    private $_password;

    /**
     * Index display the page.
     *
     * @return Response
     */
    public function index()
    {
        $dateBirth = new DateTime('1990-08-02');
        $dateNow = new DateTime('now');
        $age = $dateBirth->diff($dateNow);
        $user = User::find(1);
        return view('cube', compact('age', 'user'));
    }

    /**
     * Jstest display a new javascript ressource.
     *
     * @return Response
     */
    public function jstest() 
    {

        $skill = "var skill = {";

        $user = User::find(1);
        foreach ($user->skill as $value) {
            if ($value->type === 'php') {
                $skill .= "'php': ".$value->skill_value.", ";
            }

            if ($value->type === 'JavaScript') {
                $skill .= "'js': ".$value->skill_value.", ";
            }

            if ($value->type === "HTML/CSS") {
                $skill .= "'html': ".$value->skill_value.", ";
            }

            if ($value->type === "sql") {
                $skill .= "'sql': ".$value->skill_value.", ";
            }
        }
        $skill = substr($skill, 0, -2);
        $skill .= "};";
        return $skill;
    }

    /**
     * Send a mail.
     *
     * @return Response
     */
    public function send()
    {
        $rules = [
        'mail_sender' => 'required|email',
        'mail_subject'=> 'required|min:4',
        'content'     => 'required|min:4'
        ];

        $input = Input::all();

        $validate = Validator::make($input, $rules);

        if ($validate->fails()) {
            return Redirect::back()->withInput()->withErrors($validate);
        }

        Mail::send(
            'emails.template',
            ['info' => $input], 
            function ($message) {
                $message->to('christophe.aupet@gmail.com', 'christophe Aupet')
                    ->subject('Portfolio Visitor');
                $message->from('foo@bar.com', 'Laravel');
            }
        );

        return Redirect::back();
    }

    /**
     * Log display Auth form.
     *
     * @return Response
     */
    public function log()
    {
        return view('logForm');
    }

    /**
     * Auth.
     *
     * @return Response
     */
    public function auth()
    {
        $input = Input::all();
        if (Auth::attempt(array('login' => $input['login'], 'password' => $input['password']))) {
            return redirect('admin');
        } else {
            Session::flash('flash_danger', "Login ou mot de passe incorrecte.");
            return redirect('/');
        }
    }

    /**
     * Admin display home admin page.
     *
     * @return Response
     */
    public function admin()
    {
        if (Auth::check()) {
            return view('admin');
        } else {
            return redirect('/');
        }
    }

    /**
     * UserPannel display user ressources.
     *
     * @return Response
     */
    public function userPannel()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            return view('userAdmin', compact('user'));
        } else {
            return redirect('/');
        }
    }

    /**
     * UpdateUser.
     *
     * @return Response
     */
    public function updateUser()
    {
        if (Auth::check()) {
            $input = Input::all();
            $user = User::find(Auth::user()->id);
            if (!empty($input['login'])) {
                $user->login = $input['login'];
            }

            if (!empty($input['password'])) {
                $user->password = Hash::make($input['password']);
            }

            if (!empty($input['email'])) {
                $user->email = $input['email'];
            }

            if (!empty($input['adresse'])) {
                $user->adresse = $input['adresse'];
            }
            $user->save();
            return redirect('admin/user');
        } else {
            return redirect('/');
        }
    }

    /**
     * SkillPannel display skill ressources.
     *
     * @return Response
     */
    public function skillPannel()
    {
        if (Auth::check()) {
            $user = User::find(1);
            $skill = $user->skill;
            return view('skillAdmin', compact('user', 'skill'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Affskill display the selected item.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function affSkill($id)
    {
        if (Auth::check()) {
            $skill = Skill::find($id);
            return view('updateSkill', compact('skill'));
        } else {
            return redirect('/');
        }
    }

    /**
     * UpdateSkill.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function updateSkill($id)
    {
        if (Auth::check()) {
            $input = Input::all();
            $skill = Skill::find($id);
            if (!empty($input['type'])) {
                $skill->type = $input['type'];
            }

            if (!empty($input['skill_value'])) {    
                $skill->skill_value = $input['skill_value'];
            }

            if (!empty($input['master'])) {
                $skill->master = $input['master'];
            }
            $skill->save();
            Session::flash('flash_message', 'Information succesfully turned in');
            return redirect('admin/skill');
        } else {
            return redirect('/');
        }
    }

    /**
     * AddSkill.
     *
     * @return Response
     */
    public function addSkill()
    {
        if (Auth::check()) {
            $input = Input::all();
            $skill = new Skill();
            $skill->type = $input['type'];
            $skill->user_id = Auth::user()->id;
            $skill->skill_value = $input['skill_value'];
            $skill->master = $input['master'];
            $skill->save();
            Session::flash('flash_message', 'Information succesfully turned in');
            return redirect('admin/skill');
        } else {
            return redirect('/');
        }
    }

    /**
     * DeleteSkill.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function deleteSkill($id)
    {
        if (Auth::check()) {
            $skill = Skill::find($id);
            $skill->delete();
            return redirect('admin/skill');
        } else {
            return redirect('/');
        }
    }

    /**
     * EducPannel display education ressources.
     *
     * @return Response
     */
    public function educPannel()
    {
        if (Auth::check()) {
            $user = User::find(1);
            $educ = $user->education;
            return view('educAdmin', compact('user', 'educ'));
        } else {
            return redirect('/');
        }
    }

    /**
     * AddEduc.
     *
     * @return Response
     */
    public function addEduc()
    {
        if (Auth::check()) {
            $input = Input::all();
            $educ = new Education();
            $educ->user_id = Auth::user()->id;
            $educ->title = $input['title'];
            $educ->env = $input['env'];
            $educ->description = $input['description'];
            $educ->date = $input['date'];
            $educ->save();
            return redirect('admin/educ');
        } else {
            return redirect('/');
        }
    }

    /**
     * AffEduc display the selected item.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function affEduc($id)
    {
        if (Auth::check()) {
            $educ = Education::find($id);
            return view('updateEduc', compact('educ'));
        } else {
            return redirect('/');
        }
    }

    /**
     * UpdateEduc.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function updateEduc($id)
    {
        if (Auth::check()) {
            $input = Input::all();
            $educ = Education::find($id);
            if (!empty($input['title'])) {
                $educ->title = $input['title'];
            }

            if (!empty($input['env'])) {
                $educ->env = $input['env'];
            }

            if (!empty($input['description'])) {
                $educ->description = $input['description'];
            }

            if (!empty($input['date'])) {
                $educ->date = $input['date'];
            }
            $educ->save();
            return redirect('admin/educ');
        } else {
            return redirect('/');
        }
    }

    /**
     * DeleteEduc.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function deleteEduc($id)
    {
        if (Auth::check()) {
            $educ = Education::find($id);
            $educ->delete();
            return redirect('admin/educ');
        } else {
            return redirect('/');
        }
    }

    /**
     * ExpPannel display experience ressources.
     *
     * @return Response
     */
    public function expPannel()
    {
        if (Auth::check()) {
            $user = User::find(1);
            $exp = $user->experience;
            return view('expAdmin', compact('user', 'exp'));
        } else {
            return redirect('/');
        }
    }

    /**
     * AddExp.
     *
     * @return Response
     */
    public function addExp()
    {
        if (Auth::check()) {
            $input = Input::all();
            $exp = new Experience();
            $exp->title = $input['title'];
            $exp->user_id = Auth::user()->id;
            $exp->env = $input['env'];
            $exp->description = $input['description'];
            $exp->date = $input['date'];
            $exp->save();
            return redirect('admin/exp');
        } else {
            return redirect('/');
        }
    }

    /**
     * AffExp display the selected item.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function affExp($id)
    {
        if (Auth::check()) {
            $exp = Experience::find($id);
            return view('updateExp', compact('exp'));
        } else {
            return redirect('/');
        }
    }

    /**
     * UpdateExp.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function updateExp($id)
    {
        if (Auth::check()) {
            $input = Input::all();
            $exp = Experience::find($id);
            if (!empty($input['title'])) {
                $exp->title = $input['title'];
            }

            if (!empty($input['env'])) {
                $exp->env = $input['env'];
            }

            if (!empty($input['description'])) {
                $exp->description = $input['description'];
            }

            if (!empty($input['date'])) {
                $exp->date = $input['date'];
            }
            $exp->save();
            return redirect('admin/exp');
        } else {
            return redirect('/');
        }
    }

    /**
     * DeleteExp.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function deleteExp($id)
    {
        if (Auth::check()) {
            $exp = Experience::find($id);
            $exp->delete();
            return redirect('admin/exp');
        } else {
            return redirect('/');
        }
    }

    /**
     * ProjectPannel dispay project ressources.
     *
     * @return Response
     */
    public function projectPannel()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $project = $user->project;
            return view('projectAdmin', compact('user', 'project'));
        } else {
            return redirect('/');
        }
    }

    /**
     * AddProject.
     *
     * @return Response
     */
    public function addProject()
    {
        if (Auth::check()) {
            $input = Input::all();
            $file_name = $input['file']->getClientOriginalName();
            $file_name .= ".".$input['file']->getClientOriginalExtension();
            $project = new Project();
            $project->user_id = Auth::user()->id;
            $project->title = $input['title'];
            $project->file_name = $file_name;
            $project->description = $input['description'];
            $project->save();
            $input['file']->move('storage/', $file_name);
            return redirect('admin/project');
        } else {
            return redirect('/');
        }
    }

    /**
     * AffProject display the selected item.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function affProject($id)
    {
        if (Auth::check()) {
            $project = Project::find($id);
            return view('updateProject', compact('project'));
        } else {
            return redirect('/');
        }
    }

    /**
     * UpdateProject.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function updateProject($id)
    {
        if (Auth::check()) {
            $input = Input::all();
            $project = Project::find($id);
            if (!empty($input['title'])) {
                $project->title = $input['title'];
            }

            if (!empty($input['file'])) {
                $file = $input['file']->getClientOriginalName();
                $file .= ".".$input['file']->getClientOriginalExtension();
                unlink('storage/'.$project->file_name);
                $input['file']->move('storage/'.$file);
                $project->file_name = $file;
            }

            if (!empty($input['description'])) {
                $project->description = $input['description'];
            }
            $project->save();
            return redirect('admin/project');
        } else {
            return redirect('/');
        }
    }

    /**
     * DeleteProject.
     *
     * @param int $id selected item
     *
     * @return Response
     */
    public function deleteProject($id)
    {
        if (Auth::check()) {
            $project = Project::find($id);
            unlink('storage/'.$project->file_name);
            $project->delete();
            return redirect('admin/project');
        } else {
            return redirect('/');
        }
    }
}
