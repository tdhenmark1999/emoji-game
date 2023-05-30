<?php 

namespace App\Laravel\Controllers\System;

/**
*
* Models used for this controller
*/
use App\Laravel\Models\User;
use Illuminate\Http\Request as PageRequest;
/**
*
* Requests used for validating inputs
*/
use App\Laravel\Requests\System\CategoryRequest;

/**
*
* Classes used for this controller
*/
use Helper, Carbon, Session, Str,ImageUploader,Auth,DB;

class UserManagementController extends Controller{

	/**
	*
	* @var Array $data
	*/
	protected $data;
	protected $user_model;

	public function __construct () {
		$this->data = [];
		$this->user_model = new User;
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['statuses'] = [ 'active' => "Active","inactive" => "Inactive"];
		$this->data['heading'] = "Player";
		
	}

	public function index () {
		$this->data['page_title'] = " :: Player - Record Data";
		$this->data['userss'] = User::orderBy('updated_at',"DESC")->where('id', '!=', Auth::user()->id)->paginate(100);
		return view('system.user-management.index',$this->data);
	}
	

	public function create () {
		$this->data['page_title'] = " :: Player - Add new record";
		return view('system.user-management.create',$this->data);
	}

	public function store (PageRequest $request) {
		// return $request->all();
		// try {
		// 	$categories = new User;
		// 	$user = $request->user();
        // 	$categories->fill($request->only('name'));
		
		// 	if($categories->save()) {
		// 		session()->flash('notification-status','success');
		// 		session()->flash('notification-msg',"New record has been added.");
		// 		return redirect()->route('system.user_management.index');
		// 	}
		// 	session()->flash('notification-status','failed');
		// 	session()->flash('notification-msg','Something went wrong.');

		// 	return redirect()->back();
		// } catch (Exception $e) {
		// 	session()->flash('notification-status','failed');
		// 	session()->flash('notification-msg',$e->getMessage());
		// 	return redirect()->back();
		// }

		DB::beginTransaction();

		try {
		$this->user_model->result = 0;	
		if($request->hasFile('file')){
			$file = $request->file('file');
			$filename = time().$file->getClientOriginalName();
			$path = public_path().'/uploads/images/';
			$this->user_model->file_name = $filename;
			$this->user_model->directory = $path;
			$this->user_model->full_path = $path."/".$filename;
			$this->user_model->fill($request->except(['file']));
			if($this->user_model->save()){

				$file->move($path, $filename);
				// save training_session

				DB::commit();
				return redirect()->route('system.user_management.index');
			}
		} else {
			// $file = $request->file('file');
			$filename = '1669732992placeholder.png';
			$path = 'D:\Project\Laravel\ordering_system\public/uploads/images/';
			$this->user_model->file_name = $filename;
			$this->user_model->directory = $path;
			$this->user_model->full_path = $path."/".$filename;
			$this->user_model->fill($request->except(['file']));
			if($this->user_model->save()){

				// $file->move($path, $filename);
				// save training_session

				DB::commit();
				return redirect()->route('system.user_management.index');
			}
		}
			

		} catch (\Throwable $th) {
			throw $th;
			DB::rollback();
		}
	}

	// public function edit ($id = NULL) {
	// 	$this->data['page_title'] = " :: Category - Edit record";
	// 	$category = Category::find($id);

	// 	if (!$category) {
	// 		session()->flash('notification-status',"failed");
	// 		session()->flash('notification-msg',"Record not found.");
	// 		return redirect()->route('system.category.index');
	// 	}

	// 	if($id < 0){
	// 		session()->flash('notification-status',"warning");
	// 		session()->flash('notification-msg',"Unable to update special record.");
	// 		return redirect()->route('system.category.index');	
	// 	}

	// 	$this->data['area'] = $category;
	// 	return view('system.category.edit',$this->data);
	// }

	

	// public function update (CategoryRequest $request, $id = NULL) {
	// 	try {
	// 		$category = Category::find($id);

	// 		if (!$category) {
	// 			session()->flash('notification-status',"failed");
	// 			session()->flash('notification-msg',"Record not found.");
	// 			return redirect()->route('system.category.index');
	// 		}

	// 		if($id < 0){
	// 			session()->flash('notification-status',"warning");
	// 			session()->flash('notification-msg',"Unable to update special record.");
	// 			return redirect()->route('system.category.index');	
	// 		}
	// 		$category->fill($request->only('name'));
        	

	// 		if($category->save()) {
	// 			session()->flash('notification-status','success');
	// 			session()->flash('notification-msg',"Record has been modified successfully.");
	// 			return redirect()->route('system.category.index');
	// 		}

	// 		session()->flash('notification-status','failed');
	// 		session()->flash('notification-msg','Something went wrong.');

	// 	} catch (Exception $e) {
	// 		session()->flash('notification-status','failed');
	// 		session()->flash('notification-msg',$e->getMessage());
	// 		return redirect()->back();
	// 	}
	// }

	public function destroy ($id = NULL) {
		try {
			$category = User::find($id);

			if (!$category) {
				session()->flash('notification-status',"failed");
				session()->flash('notification-msg',"Record not found.");
				return redirect()->route('system.user_management.index');
			}

			if($id < 0){
				session()->flash('notification-status',"warning");
				session()->flash('notification-msg',"Unable to remove special record.");
				return redirect()->route('system.user_management.index');	
			}

			if($category->delete()) {
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"Record has been deleted.");
				return redirect()->route('system.user_management.index');
			}

			session()->flash('notification-status','failed');
			session()->flash('notification-msg','Something went wrong.');

		} catch (Exception $e) {
			session()->flash('notification-status','failed');
			session()->flash('notification-msg',$e->getMessage());
			return redirect()->back();
		}
	}

}