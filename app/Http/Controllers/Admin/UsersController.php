<?php

namespace App\Http\Controllers\Admin;
use App\Newsletters\NewsletterList;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    private $newsletterList;

    function __construct(NewsletterList $newsletterList)
    {
        $this->newsletterList=$newsletterList;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users= User::all();
        $totalUser=User::count();
      //  dd($totalBiz);
     //  foreach( $bizs as $biz)             
     
       return view('admin.user.index', compact('users','totalUser'));
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
}
