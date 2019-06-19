<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Redirect;
use App\User;
use App\ToDo;
use	DB;

class ToDoController extends Controller{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //$this->middleware('auth', ['except' => ['index','show']]);
        $this->middleware('auth');
    }
	
	public function index(){
		//$tasks = ToDo::where('iscompleted', false)
		
		$tasks = DB::table('todos AS t')->join('users AS u', 'u.id','=', 't.user_id')
		->select('t.*','u.name AS userName')
		->where("iscompleted", false)
		->orderBy("id", "DESC")
		->get();
		$completed_todo = DB::table('todos AS t')->join('users AS u', 'u.id','=', 't.user_id')
		->select('t.*','u.name AS userName')
		->where("iscompleted", true)
		->get();
		$users = User::all();
		return view("admin", compact("tasks", "completed_todo", "users"));
		//$tasks = ToDo::all();
		//$user = auth()->user();
		//echo $user->id;exit;
		//$user=User::find($user_id);
		//$completed_todo = ToDo::where("iscompleted", true)
		//->where("user_id", $user->id)
		//->get();
		//var_dump($completed_todo);exit;
		//$completed_todo = ToDo::where("iscompleted", true)
	}
	
	
	public function getActive(){
		$user_id = auth()->user('id');
		//$user=User::find($user_id);
		$match = ['iscompleted' => false, 'user_id' => $user_id];
		$todo = ToDo::where($match)->get();
		return view("api", compact("todo"));
	}
	
	public function getCompleted(){
		$user_id = auth()->user('id');
		//$user=User::find($user_id);
		$match = ['iscompleted' => false, 'user_id' => $user_id];
		$todo = ToDo::where($match)->get();
		return view("api", compact("todo"));
	}
	
	public function getUsers(){
		$users = User::where("is_admin", 1)
		->orderBy("id", "DESC")->get();
		$completed_todo = ToDo::where("iscompleted", true)
		->get();
		
		return view("users", compact("users"));
	}
	
	public function store(Request $request){
		$input = $request->all();
		$todo = new ToDo();
		$todo->title = request("title");
		$todo->iscompleted = '0';
		$todo->user_id = auth()->user()->id;
		$todo->save();
		return Redirect::back()->with("message", "Todo created");
	}
	
	public function complete($id){
		$todo = ToDo::find($id);
		$todo->iscompleted = true;
		$todo->save();
		return Redirect::back()->with("message", "ToDo completed");
	}
	
	public function destroy($id){
		$todo = ToDo::find($id);
		$todo->delete();
		return Redirect::back()->with('message', "ToDo entry deleted");
	}
}
