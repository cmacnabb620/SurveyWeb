<?php

namespace App\Http\Controllers\SuperAdmin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Vinkla\Hashids\Facades\Hashids;
use Carbon\Carbon;


class RoleController extends Controller {

//Admin Role displayed
    public function index(){
    	$user_types=UserType::all();
        return view('Admin.Roles.admin_roles',compact('user_types')); 
    }

    public function addRole(Request $request){
        $rules = array(
			'role_name' => 'required|unique:user_type,user_type_desc',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			$this->throwValidationException($request, $validator);
		}else{
			$current_time = Carbon::now();
			$usertype=new UserType;
			$usertype->user_type_desc=$request->get('role_name');
			$usertype->last_update= $current_time->toDateTimeString();
			$usertype->save();
			return redirect()->back()->with('message', 'User Type Successfully Created');
        }
    }

    public function editRole($roleid){
    	$role_id= Hashids::decode($roleid);
    	if(count($role_id) == 0){
    		return redirect()->to('admin/page-not-found');
    	}else{
    		$user_types=UserType::all();
    		$edit_record=UserType::where('user_type_id',$role_id)->first();
    		return view('Admin.Roles.edit_roles',compact('user_types','edit_record')); 
    	}

    }


    public function updateRole(Request $request){
        $rules = array(
			'role_name' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			$this->throwValidationException($request, $validator);
		}else{
			if($request->get('role_name_for_validation') == $request->get('role_name')){
				$usertype=UserType::where('user_type_id',$request->get('role_id'))->first();
			    $usertype->user_type_desc=$request->get('role_name');
			    $usertype->save();
			    return redirect()->to('/admin/roles')->with('message', 'User Type Successfully Updated');
			}else{
				$usertype=UserType::where('user_type_desc',$request->get('role_name'))->count();
				if($usertype == 0){
					$current_time = Carbon::now();
					$usertype=UserType::where('user_type_id',$request->get('role_id'))->first();
			        $usertype->user_type_desc=$request->get('role_name');
			        $usertype->last_update= $current_time->toDateTimeString();
			        $usertype->save();
			        return redirect()->to('/admin/roles')->with('message', 'User Type Successfully Updated');
				}
				return redirect()->to('admin/roles/edit-role/'.Hashids::encode($request->get('role_id')))->with('fail', 'Sorry, User Type Already Existed');
			}
			
        }
    }

    public function deleteRole($roleid){
       	$role_id= Hashids::decode($roleid);
    	if(count($role_id) == 0){
    		return redirect()->to('admin/page-not-found');
    	}
    	$usertype=UserType::where('user_type_id',$role_id)->delete();
    	return redirect()->to('/admin/roles')->with('message', 'User Type Deleted Successfully');
    }

}






