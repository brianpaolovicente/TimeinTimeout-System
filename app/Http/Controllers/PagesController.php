<?php

namespace App\Http\Controllers;
use App\Services\GoogleSheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GoogleSheet $googlesheet)
    {
        $this->middleware('auth');
        $this->googlesheet=$googlesheet;
    }


    public function index(){
        $title = 'Welcome to DOTR';
        return view ('pages.index', compact ('title'));
        

        // return $sheets = $this->googlesheet->readGoogleSheets();
}
    public function about(){
        $title = 'About';
        return view ('pages.about',compact('title'));
}
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['GG','GG2']
        );
        return view ('pages.services')->with($data);
}
    public function timeinout(GoogleSheet $googlesheet,Request $request){
        date_default_timezone_set('Asia/Manila');
        $date = Carbon::now()->toDateString();
        $mytime = Carbon::now()->toTimeString();
        $users = Auth::user();
        $ip = '136.158.31.91';
        $data = \Location::get($ip);
        
       
        switch($request->submitbutton) {
        
        case 'Time In': 
            $values = [
                [$users->id,$users->name,$date,$mytime,"Time In",$data->cityName]
            ];
            $savedData = $googlesheet->saveDataSheet($values);
            
        break;
        
        case 'Time Out': 
            $values = [
                [$users->id,$users->name,$date,$mytime,"Time Out",$data->cityName]
            ];
            $savedData = $googlesheet->saveDataSheet($values);
        break;
    
    }
        return view ('pages.index')->with("Success","Timed In");
    
    
        
}
    public function display(){
        return view ('pages.timeinout')->with("Success","Timed Out");
    }
}