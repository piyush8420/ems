<?php

namespace App\Http\Controllers;
use DB;
use App\Event;
use Illuminate\Http\Request;
use DateTime;
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
        
         $event = Event::latest()->paginate(5);
        return view('event.index',compact('event'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    
    //    return view('event.index',);    
    }
}
