<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Meeting;
use App\User;
use Auth;
class MeetingController extends Controller
{
	//add new meeting view function

    function index(){

    	$attendences = User::select('id','name')->get();
        return view('AddNewMeeting', compact('attendences'));
    }

	//add new meeting submit function

	function AddNewMeeting(Request $request){

    	$data = $request->validate([
    		'meeting_name'=> ['required', 'string', 'max:255'],
			'client_id'=> ['required', 'string',  'max:255'],
			'meeting_vanue'=> ['required', 'string', 'max:255'],
			'attendences' => ['required'],
			'date'=> ['required', 'string', 'max:255'],
			'end_time'=> ['required', 'string', 'max:255'],
			'meeting_details'=> ['required', 'string'],

		]);
		if($data){
			$data['host_id'] = Auth::user()->id;
			$data['meeting_status'] = 1;
			$data['attendences'] = json_encode($data['attendences']);
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
		return view('MeetingHistory', compact('allMeetingData'));
    }

    //new meetings view function

    function NewMeetings(){

		$allMeetingData = Meeting::whereDate('date', '>=', now())->orderBy('date','asc')->with('user')->get();
		$jsonData = json_decode($allMeetingData);
		return view('NewMeetings', compact('allMeetingData'));
    }

    //a single meeting view function

    function ViewMeeting($id){

		$viewData = Meeting::findorfail($id);
		$attendences= array();
		foreach (json_decode($viewData->attendences) as $attn_id) {
		    $attendences[] = User::where('id', $attn_id)->get();
		}
		$user_name= array();
		foreach($attendences as $value) {
			$user_name[]=  $value[0]->name;
		}
		$user_name= implode(', ', $user_name);
		return view('ViewMeeting', compact('viewData', 'user_name'));
    }

    //edit a meeting view function

    function EditMeeting($id){

		$editViewData = Meeting::findorfail($id);
		$meetingStatus = Meeting::select('id','meeting_status')->get();
		$attendences = User::select('id','name')->get();
		return view('EditMeeting', compact('editViewData', 'attendences', 'meetingStatus'));
    }

    //update meeting submit function

    function UpdateMeeting(Request $request,$id){

		$data = $request->validate([
    		'meeting_name'=> ['required', 'string', 'max:255'],
			'client_id'=> ['required', 'string',  'max:255'],
			'meeting_vanue'=> ['required', 'string', 'max:255'],
			'attendences' => ['required'],
			'date'=> ['required', 'string', 'max:255'],
			'end_time'=> ['required', 'string', 'max:255'],
			'meeting_details'=> ['required', 'string'],
			'meeting_status'=> ['required', 'int'],
		]);
		
		if($data){
			$data['attendences'] = json_encode($data['attendences']);
			$updateMeeting = Meeting::where('id',$id)->update($data);
			if($updateMeeting){
        	session()->flash('Success','Meeting has updated successfully.');
        	}
        	else{
        		session()->flash('Error','Meeting cannot be updated!!');
        	}
        	return redirect()->back();
		}
		else{
			session()->flash('Error','Meeting cannot be edited!!');
			return redirect()->back;
		}
    }

    //delete meeting function

    public function DeleteMeeting($id){

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
      	return view('AddReport', compact('meetingReportData'));
    }

    //add meeting report submit function

    function UploadMeetingReport(Request $request,$id){
     	$data = $request->validate([
    		'meeting_discussion'=> ['nullable', 'string'],
    		'meeting_discussion_date'=> ['nullable', 'string'],
		]);
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
    	$allMeetingData = Meeting::with('user')->get();
    	$items = strval($id);
    	$jsonData = json_encode($items);
    	$searchIndividualData = Meeting::where('host_id',$id)
    				->orWhere('attendences','LIKE',"%$jsonData%")
			    	->whereDate('date', '>=', date('Y-m-d'))->orderBy('date','asc')
			    	->get();			

        $getName= User::find($id);

        return view('GetIndividialmeetingData', compact('searchIndividualData','getName'));
    }


	//calendar event for meetings function

    function EventCalender(){

    	$events = [];
		$data = Meeting::all();
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
            
        }
        $calendar = Calendar::addEvents($events);
		return view('EventCalender',compact(['calendar']));
    }
}

