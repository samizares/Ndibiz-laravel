<?php

namespace App\Http\Controllers\Admin;
use App\Newsletters\NewsletterList;
use Illuminate\Http\Request;
use App\Report;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reports= Report::all();
        $totalReport=Report::count();
      // dd($reports2);
       // dd( response()->json($reports)->setCallback('sammy'));
 
      // dd(json_encode($reports));  

      
     
       return view('admin.report.index', compact('reports','totalReport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $user= \Auth::user();
         return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //dd(\Input::get());
        \Auth::user()->updateCredentials(\Input::all());
        $email=\Auth::user()->email;
        $method=\Input::get('notify') ? 'subscribeTo' : 'unsubscribeFrom';
        $this->newsletterList->{$method}('BeazeaDirSubscribers',$email);
        return 'Done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteReport(Request $request)
    {
       // dd($request->all());
        $reportID =$request->get('yes');
        $report= Report::findorFail($reportID);
        $report->delete();

   return \Redirect::back()
        ->with('success_code', 220)
        ->with('report', 'Report deleted successfully');
    }
}
