<?php

namespace App\Http\Controllers;

use App\Event;
use App\Magazine;
use App\Management;
use App\User;
use App\UserEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    
    public function adminEventSubmit(Request $request){
        
        $validator = Validator::make($request->all(),[
            'event_title' => 'required',
            'details' => 'required',
            'city' => 'required',
            'state' => 'required',
            'date' => 'required'
        ]);
        if($validator->fails())
            return view('/addnewenvent',['errors'=>$this->validationError($validator)]);
        
        $evnet=Event::create([
            "title" => $request->event_title,
            "desc" => $request->details,
            "city" => $request->city,
            "state" =>  $request->state,
            "event_date" =>  $request->date
        ]);

        return  redirect('adminhomepage');
      
    }
    public function adminEventList(Request $request){
        $events=Event::all();
        foreach ($events as $key => $event) {
           $eventsUsers=UserEvent::where('event_id',$event->id)->get();
           $ii=[];
           foreach ($eventsUsers as $key => $value) {
              $ii[]=$value->userData->toArray();
           }
           $array[] = Arr::add($event->toArray(), 'participates', $ii);
        }
   
        return view('adminhomepage',['data'=>$array]);
    }   
    public function editAdmin(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:events,id',
            'event_title' => 'nullable',
            'details' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'date' => 'nullable'
        ]);
        if($validator->fails())
            return view('/addnewenvent',['errors'=>$this->validationError($validator)]);
        
        $editevent=Event::where('id',$request->id)->update(array_filter([
            "title" => $request->event_title,
            "desc" => $request->details,
            "city" => $request->city,
            "state" =>  $request->state,
            "event_date" =>  $request->date
        ]));
        return  redirect('adminhomepage');
    }
	public function deleteEvent($id){
		UserEvent::where('event_id',$id)->delete();
		Event::where('id',$id)->delete();
		return redirect('/adminhomepage');
	}
	public function deleteMagazine($id){
		Magazine::where('id',$id)->delete();
		return redirect('/magazinelist');
	}
	public function magazineList(Request $request){
		$magazine=Magazine::all();
		return view('magazinelist',['data'=>$magazine->toArray()]);
	}
    public function adminMagazineSubmit(Request $request){
        
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'desc' => 'required',
            'file' => 'required|file',
            'date' => 'required'
        ]);
        if($validator->fails())
            return view('/adminmagazines',['errors'=>$this->validationError($validator)]);

        $filename = str_replace(' ','_',pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME));
        
        $uniqueName=self::getUniqueFileName(".".$request->file->getClientOriginalExtension(),$filename);

        Storage::put($uniqueName, file_get_contents($request->file));

        $magazine=Magazine::create([
            "title" => $request->title,
            "desc" => $request->desc,
            "city" => $request->city,
            "magazines_path" =>  $uniqueName,
            "date" =>  $request->date
        ]);

        return  redirect('adminhomepage');
      
    }
    public static function getUniqueFileName($fileExt="",$suffix = null){
        return isset($suffix) ? Carbon::now()->timestamp."_$suffix".$fileExt : Carbon::now()->timestamp.$fileExt;
   }
   public function editAdminProfile(Request $request){
		$userId=$request->session()->get('srno');
		$user=Management::where('srno',$userId)->first();
		return view('editadminprofile',['data'=>$user,'errors'=>[]]);

   }
   public  function updateAdminProfile(Request $request){
	$userT=Management::where('srno',$request->srno)->first();
	$validator = Validator::make($request->all(),[
	'srno'=>'required|exists:management,srno',
	'firstname' => 'required',
	'lastname' => 'required',
	'password' => 'required|min:8'
]);
if($validator->fails())
	return view('/editadminprofile',['errors'=>$this->validationError($validator),'data'=>$userT]);

$user=User::where('srno',$request->srno)->update(array_filter([
	"password" => $request->password,
	"firstname" => $request->firstname,
	"lastname" =>  $request->lastname,
]));
return  redirect('adminhomepage');
}

}
