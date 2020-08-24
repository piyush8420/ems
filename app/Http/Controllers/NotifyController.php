<?php

namespace App\Http\Controllers;
use DB;
use App\Event;
use App\log;
use App\Notify;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notify = Notify::latest()->paginate(5);
        return view('notify.index',compact('notify'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function generate_log($id,$action,$user_data_log){

          DB::table('log')->insert(
        ['event_id' =>  $id, 'action' =>  $action,'user_data_log' =>  $user_data_log ]
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('notify.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               
        $request->validate([
            'name' => 'required',

        ]);
  
        Notify::create($request->all());
         $event_val=$request->all();
        $event_id=DB::getPdo()->lastInsertId();;
        $this->generate_log($event_id,"Store Notification",json_encode($event_val));
        return redirect()->route('notify.index')
                        ->with('success','Notify created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function show(Notify $notify)
    {
         return view('notify.show',compact('notify'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function edit(Notify $notify)
    {
         return view('notify.edit',compact('notify'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notify $notify)
    {
         $request->validate([
             'name' => 'required',
         ]);
  
        $notify->update($request->all());
         $event_id=$request->segment(2);
        $event_val=$request->all();
        $this->generate_log($event_id,"Update Notification",json_encode($event_val));
        return redirect()->route('notify.index')
                        ->with('success','Notify updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notify $notify)
    {
         $notify->delete();
  
        return redirect()->route('notify.index')
                        ->with('success','notify deleted successfully');
    }
}
