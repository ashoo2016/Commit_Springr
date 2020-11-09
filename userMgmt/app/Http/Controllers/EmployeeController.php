<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class EmployeeController extends Controller
{
    public function index(){
    	$employee = DB::table('employees')->latest()->paginate(4);

    	return view('employee.index',compact('employee'));

    }

    public function create() {
    	return view('employee.create');
    }


    public function store(Request $request){

        $this->validate($request,[
            'employee_email' => 'required|email',
            'employee_name' => 'required',
            'date_of_joining' => 'required',
            'employee_avatar' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);

    	$data = array();
    	$data['employee_name'] = $request->employee_name;
    	$data['employee_email'] = $request->employee_email;
    	$data['date_of_joining'] = $request->date_of_joining;
    	$data['date_of_leaving'] = $request->date_of_leaving;
    	$data['is_working'] = $request->is_working;

    	$image = $request->file('employee_avatar');
    	if ($image) {
    		$image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'public/media/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);

    	$data['employee_avatar'] =  $image_url;
    	$employee = DB::table('employees')->insert($data);
    	return redirect()->route('employee.index')
    	                    ->with('success','Employee Created Successfully');

    	}

    	//dd($data);


    }

        public function Delete($id){

    	$data = DB::table('employees')->where('id',$id)->first();
    	$image = $data->employee_avatar;
    	unlink($image);
    	$employee = DB::table('employees')->where('id',$id)->delete();
    	return redirect()->route('employee.index')
    	                    ->with('success','Employee Deleted Successfully');

}



}
