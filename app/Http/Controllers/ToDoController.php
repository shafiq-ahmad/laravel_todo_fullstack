<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\ToDo;

class ToDoController extends Controller{
	
	public function index(){
		//$tasks = ToDo::all();
		//$tasks = ToDo::where("iscompleted", false)->orderBy("id", "DESC")->get();
		$id = Auth::id();
		$tasks = ToDo::where("iscompleted", false)
		->where("user_id", $id)
		->orderBy("id", "DESC")->get();
		$completed_todo = ToDo::where("iscompleted", true)
		->where("user_id", $id)
		->get();
		
		//echo $id;exit;
		return view("welcome", compact("tasks", "completed_todo"));
	}
	
	public function complete($id){
		$todo = ToDo::find($id);
		
		if($todo->user_id != auth()->user()->id){
			return Redirect::back()->with("error", "Unautherised");
		}
		$todo->iscompleted = true;
		$todo->save();
		return Redirect::back()->with("message", "ToDo added");
	}
}
