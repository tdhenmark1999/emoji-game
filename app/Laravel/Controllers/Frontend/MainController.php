<?php

namespace App\Laravel\Controllers\Frontend;
use App\Laravel\Models\User;
use App\Laravel\Models\Product;



use Helper, Carbon, Session, Str, DB,Input,Event;

class MainController extends Controller
{	
	protected $data;

	public function __construct () {
		
	}

    public function index(){
		DB::table('user')->update(['result' => '0']);

		$this->data['userss'] = User::orderBy('updated_at',"DESC")->where('type', '=', 'user')->get();
			return view ('frontend.homepage',$this->data);
	}

}
