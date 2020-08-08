<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Calendar;
use App\Meeting;
use App\User;
use Auth;
class MeetingController extends Controller
{
	//add new meeting view function

    function index(){

    	$attendences = User::select('id','name')->get();
    	//dd($attendences);
        return view('AddNewMeeting', compact('attendences'));
    }

	//add new meeting submit function

	function AddNewMeeting(Request $request){

		//dd($request);
    	$data = $request->validate([
    		'meeting_name'=> ['required', 'string', 'max:255'],
			'client_id'=> ['required', 'string',  'max:255'],
			'meeting_vanue'=> ['required', 'string', 'max:255'],
			'attendences' => ['required'],
			'date'=> ['required', 'string', 'max:255'],
			'end_time'=> ['required', 'string', 'max:255'],
			'meeting_details'=> ['required', 'string'],

		]);
		//dd($data);
		if($data){
			$data['host_id'] = Auth::user()->id;
			$data['meeting_status'] = 1;
			$data['attendences'] = json_encode($data['attendences']);
			//dd($data);
			Meeting::create($data);
			return redirect()->back()->with('Success', 'New Meeting data saved successfully');
		}
		else{
			return redirect()->back()->with('Failed', 'Error! New Meeting cannot be saved');
		}

	}

	//all meetings history view function

    function Meetings(){
		$allMeetingData = Meeting::with('user')->get();
		//dd($allMeetingData);
		return view('MeetingHistory', compact('allMeetingData'));
    }

    //new meetings view function

    function NewMeetings(){
		$allMeetingData = Meeting::whereDate('date', '>=', date('Y-m-d'))->with('user')->get();

		return view('NewMeetings', compact('allMeetingData'));
    }

    //a single meeting view function

    function ViewMeeting($id){
		$viewData = Meeting::findorfail($id);
		$startTime = $viewData->date;
		$endTime = $viewData->end_time;
		$formatStartTime = date('d/m/Y @ h:i a', strtotime($startTime));
		$formatEndTime = date('h:i a', strtotime($endTime));
		//dd($formatEndTime);
		$attendences= array();
		foreach (json_decode($viewData->attendences) as $attn_id) {
		    $attendences[] = User::where('id', $attn_id)->get();
		}
		$user_name= array();
		foreach($attendences as $value) {
			$user_name[]=  $value[0]->name;
		}
		$user_name= implode(', ', $user_name);
		return view('ViewMeeting', compact('viewData', 'user_name', 'formatStartTime', 'formatEndTime'));
    }

    //edit a meeting view function

    function EditMeeting($id){
		$editViewData = Meeting::findorfail($id);
		$meetingStatus = Meeting::select('id','meeting_status')->get();
		$attendences = User::select('id','name')->get();
		/*echo "<pre>";
		print_r($editViewData);
		exit();*/
		return view('EditMeeting', compact('editViewData', 'attendences', 'meetingStatus'));
    }

    //update meeting submit function

    function UpdateMeeting(Request $request,$id){
    	//dd($request->all());
		$data = $request->validate([
    		'meeting_name'=> ['required', 'string', 'max:255'],
			'client_id'=> ['required', 'string',  'max:255'],
			'meeting_vanue'=> ['required', 'string', 'max:255'],
			'attendences' => ['required'],
			'date'=> ['required', 'string', 'max:255'],
			'end_time'=> ['required', 'string', 'max:255'],
			'meeting_details'=> ['required', 'string', 'max:255'],
			'meeting_status'=> ['required'],
		]);
		//dd($data);
		if($data){
			$data['attendences'] = json_encode($data['attendences']);
			//$data['meeting_status'] = json_encode($data['meeting_status']);
			$updateMeeting = Meeting::where('id',$id)->update($data);
			if($updateMeeting){
        	session()->flash('Success','Meeting has edited successfully.');
        	}
        	else{
        		session()->flash('Error','Meeting cannot be edited!!');
        	}
        	return redirect()->back();
		}
		else{
			session()->flash('Error','Meeting cannot be edited!!');
			return redirect()->back;
		}
    }

    //delete meeting function

    public function DeleteMeeting($id)
    {
        $softDelete = Meeting::destroy($id);
        if($softDelete){
        	session()->flash('Success','Meeting has removed successfully.');
        }
        else{
        	session()->flash('Error','Meeting cannot be removed!!');
        }
        return redirect()->back();
        
    }

    //add meeting report view function

	function AddMeetingReport($id){

    	$meetingReportData = Meeting::findorfail($id);
    	/*echo "<pre>";
		print_r($meetingReportData);
		exit();*/
      	return view('AddReport', compact('meetingReportData'));
    }

    //add meeting report submit function

    function UploadMeetingReport(Request $request,$id){
     	//return $request->meeting_discussion;
     	$data = $request->validate([
    		'meeting_discussion'=> ['nullable', 'string'],
    		'meeting_discussion_date'=> ['nullable', 'string'],
		]);
		//dd($data);
		$meeting_report_files = $request->file('meeting_report_files');
		$filname = "";
		if($meeting_report_files !== null){
     		$filname = uniqid('report_',true).str_random(10).'.'.$meeting_report_files->getClientOriginalExtension();
	 		if($meeting_report_files->isValid()){
				$dt= $request->meeting_report_files->move(base_path('public/meeting_reports'), $filname);
				$data['meeting_report_files'] = $filname;
			}

		}

		if($data){
			Meeting::where('id',$id)->update($data);
			return redirect()->back()->with('Success', 'Meeting report has saved successfully');
		}
		else{
			return redirect()->back()->with('Failed', 'Meeting report cannot be saved');
		}
	}


	 public function DownloadReport($file)
    {
    	return response()->download('meeting_reports/'.$file);
    }


	//individual meeting view function

    public function IndividualMeetings()
    {
    	$attendences = User::select('id','name')->get();
        return view('IndividualMeetings', compact('attendences'));
    }

    //individual meeting search function

    public function IndividualMeetingsData($id)
    {
    	
    	$searchIndividualData = Meeting::where('host_id',$id)->whereDate('date', '>=', date('Y-m-d'))->orderBy('date','asc')->get();
    	//dd($searchIndividualData->all());

        return view('GetIndividialmeetingData', compact('searchIndividualData'));
    }

    //edit user profile view function

    function EditProfile($id){
    	$editUserData = User::findorfail($id);
		return view('EditUserProfile', compact('editUserData'));
    }

    //update user profile function

    function UpdateUserprofile(Request $request,$id){
    	//dd($request->all());
    	$viewUserData = User::findorfail($id);
    	$userEmail = $viewUserData->email;
    	$userPass = $viewUserData->password;
    	$reqUserEmail = $request->email;
    	$reqUserPass = $request->password;
    	//dd($reqUserPass);
    	if($reqUserPass == null){
			$reqUserPass = Auth::user()->password;
    	}
    	//dd($reqUserPass);
    	if($userEmail == $reqUserEmail ){
    		//dd($reqUserPass);
    		$data = $request->validate([
    		'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dasignation' => ['required', 'string', 'max:255'],
            
			]);
 			if($userPass == $reqUserPass){
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255'],
            	'dasignation' => ['required', 'string', 'max:255'],
            	
				]);
				//dd($data);
				if($data){
				User::where('id',$id)->update($data);

				return redirect()->back()->with('Success', 'User data has updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    		
    		else{
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255'],
            	'dasignation' => ['required', 'string', 'max:255'],
            	'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				//dd($data);
				//$viewUserData->password = Hash::make($data['password']);
				//dd($viewUserData->password);
				if($data){
					//dd($data);
					//$viewUserData->password = Hash::make($data['password']);
					//dd($viewUserData->password);
					//dd($data);
					User::where('id',$id)->update([
						'name' => $data['name'],
			            'email' => $data['email'],
			            'dasignation' => $data['dasignation'],
			            'password' => Hash::make($data['password']),
					]);
					return redirect()->back()->with('Success', 'User data updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    	}
    	else{

    		if($userPass == $reqUserPass){
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            	'dasignation' => ['required', 'string', 'max:255'],
 
				]);
				//dd($data);
				if($data){
				User::where('id',$id)->update($data);
				return redirect()->back()->with('Success', 'User data updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    		
    		else{
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            	'dasignation' => ['required', 'string', 'max:255'],
            	'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				//dd($data);
				if($data){
				User::where('id',$id)->update([
						'name' => $data['name'],
			            'email' => $data['email'],
			            'dasignation' => $data['dasignation'],
			            'password' => Hash::make($data['password']),
					]);

				return redirect()->back()->with('Success', 'User data updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    	}
    }

	//calendar event for meetings function

    function EventCalender(){

    	$events = [];
		$data = Meeting::all();
//		dd($allMeetingData);
		if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->meeting_name,
                    false,
                    new \DateTime($value->date),
                    new \DateTime($value->date),
					$value->id,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => 'http://127.0.0.1:8000/view_meeting/'.$value->id,
	                ]
                );
            }
            //dd($events);
        }
        $calendar = Calendar::addEvents($events);
        //dd($calendar);
		return view('EventCalender',compact(['calendar']));
    }




    //test function
	function indexMeetingHistory(){

      return view('MeetingHistory');
    }
    //test functions
    function register(){
        return view('Register');
    }
}

