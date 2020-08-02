<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Strategy\EventStrategy;
use App\Http\Strategy\MagazineStrategy;
use App\Magazine;
use App\Management;
use App\User;
use App\UserEvent;
use Carbon\Carbon;
use DateTime;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
	public $eventStrategy;
	public $magazineStrategy;
	public function __construct(){
		$this->eventStrategy=new EventStrategy();
		$this->magazineStrategy=new magazineStrategy();
	}

    public function eventsData(Request $request){
        $userId=$request->session()->get('srno');
        $events=UserEvent::where('user_id',$userId)->pluck('event_id');
		$events=Event::whereNotIn('id',$events)->where('event_date', '>=',Carbon::now())->orderBy('event_date','ASC')->get();	
        return $this->successResponse($events);

    }
    public function magazineData(){
        
        $magazines=Magazine::orderBy('created_at', 'ASC')->get();
        return $this->successResponse($magazines);
    }
    public function registerEvent(Request $request){
        $validator = Validator::make($request->all(),[
            'event_id' => 'required|exists:events,id',
        ]);

        if($validator->fails()) return redirect('/newevents');

        UserEvent::create([
            'event_id'=>$request->event_id,
            'user_id'=> $request->session()->get('srno')
        ]);

        return redirect('/newevents');
    }
    public function participation(Request $request){
        
        $userId=$request->session()->get('srno');
        $events=UserEvent::where('user_id',$userId)->get();
        $pastArr=[];
        $upcommingArr=[];
        foreach ($events as $key => $event) {
           $data=$event->eventData;
           if(new DateTime() > new DateTime($data->event_date)){
               array_push($pastArr,$data);
            }else{
                array_push($upcommingArr,$data);
            }
        }
        return view('participation',['past_event'=>$pastArr,'upcomming'=>$upcommingArr]);
    }
    public function unregisterEvent(Request $request){
        $validator = Validator::make($request->all(),[
            'event_id' => 'required|exists:events,id',
        ]);

        if($validator->fails()) return redirect('/newevents');

        $userId=$request->session()->get('srno');

        $deletedData=UserEvent::where('user_id',$userId)->where('event_id',$request->event_id)->delete();
       return $this->successResponse(['data is removed']);
	}

	public function editProfile(Request $request){
		$userId=$request->session()->get('srno');
		$user=User::where('srno',$userId)->first();
		return view('editprofile',['data'=>$user,'errors'=>[]]);
	}
	public function strategyMethod(Request $request,$listing,$strategy){
		if($strategy=='event'){
			$userId=$request->session()->get('srno');
			$events=UserEvent::where('user_id',$userId)->pluck('event_id');
			$value=Event::whereNotIn('id',$events)->where('event_date', '>=',Carbon::now())->get();
			$st=$this->eventStrategy;

		}else{
			$value=Magazine::all();
			$st=$this->magazineStrategy; 
		}
		switch($listing){
            case 'new' :
                $data=$st->newToOld($value);
             break;
            case 'old':
                $data=$st->oldToNew($value);
			break;
			case 'atoz':
				$data=$st->aToz($value);
			break;
            default:
                $data=$st->newToOld($events);
		}
		return $this->successResponse($data);
	}
	public  function updateProfile(Request $request){
		$userT=User::where('srno',$request->srno)->first();
		$validator = Validator::make($request->all(),[
		'srno'=>'required|exists:users,srno',
		'firstname' => 'required',
		'lastname' => 'required',
		'city' => 'required',
		'state' => 'required',
		'company' => 'required',
		'password' => 'required|min:8',
		'sec_id' => 'required',
		'sec_answer' => 'required'
	]);
	if($validator->fails())
		return view('/editprofile',['errors'=>$this->validationError($validator),'data'=>$userT]);
	
	$user=User::where('srno',$request->srno)->update(array_filter([
		"password" => $request->password,
		"firstname" => $request->firstname,
		"lastname" =>  $request->lastname,
		"company" =>  $request->company,
		"city" => $request->city,
		"state" =>  $request->state,
		"sec_id" =>  $request->sec_id,
		"sec_answer" => $request->sec_answer,
		"security_status"=>2
	]));
	return  redirect('newevents');
	}
}
