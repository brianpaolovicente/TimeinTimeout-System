<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('posts',$user->posts);

        
    }
    public function sheet(){
        $sheets = Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))

        ->sheetById(config('sheets.post_sheet_id'))

        ->all();
        $posts = array();

        foreach ($sheets AS $data) {

            $posts[] = array(

                'name' => $data[0],

                'message' => $data[1],

                'created_at' => $data[2],

            );

        }

    }
}
