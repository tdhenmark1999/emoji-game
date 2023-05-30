<?php

namespace App\Laravel\Controllers\Frontend;
use App\Laravel\Models\User;
use App\Laravel\Models\Product;
use Illuminate\Http\Request as PageRequest;


use App\Laravel\Requests\Frontend\QuestionRequest;

use Helper, Carbon, Session, Str, DB,Input,Event;

class QuestionController extends Controller
{	
	protected $data;

	public function __construct () {
		
	}

	public function question($id = NULL) {
		$category = Product::find($id);
		$this->data['users'] = User::orderBy('result',"DESC")->where('type', '=', 'user')->get();
		$this->data['player_list'] = User::orderBy('name',"ASC")->where('type', '=', 'user')->get();
		$this->data['question'] = $category;
		$winners = User::orderBy('result',"DESC")->where('type', '=', 'user')->limit(3)->get();
		$this->data['first'] = $winners[0];
		$this->data['second'] = $winners[1];
		$this->data['third'] = $winners[2];
		return view('frontend.question.index',$this->data);
	}

	public function result() {
		$winners = User::orderBy('result',"DESC")->where('type', '=', 'user')->limit(3)->get();
		$this->data['first'] = $winners[0];
		$this->data['second'] = $winners[1];
		$this->data['third'] = $winners[2];
		return view('frontend.question.result',$this->data);
	}

	public function update(QuestionRequest $request, $id=NULL){
		// return dd($request);
		try {
			
			DB::beginTransaction();
			$user_id = $request->only('result');
			$question = Product::find($id);
			$item = User::select("result")->where('id' , $user_id)->first();
			$users = User::where('id' , $user_id)->first();
			$users->result =  $item->result + 1;
			$users->save();

			DB::commit();
			session()->flash('notification-status','success');
			session()->flash('notification-msg',"Parameter .");
			if($question->count() == $id) {
				return redirect()->route("frontend.result");
			}
			else {
		
				return redirect()->route("frontend.question", $id +1);
			}

			
		
		} catch (Exception $e) {
			DB::rollback();
			session()->flash('notification-status','warning');
			session()->flash('notification-msg',"Went something wrong".$e->message());
			return redirect()->back();
		}
	}

}
