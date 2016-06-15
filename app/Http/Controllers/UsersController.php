<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\State;
use App\Lga;
use App\Biz;
use App\Cat;
use App\SubCat;
use Input;
use App\Review;
use App\User;
use App\Owner;

class UsersController extends Controller
{
     private $newsletterList;

    function __construct()
    {
        $this->middleware('auth');
    }

     public function profile($username,$id)
    {
        $cats = Cat::all();
        $user= User::where(['username'=>$username,'id'=>$id])->first();
        $owner= $user->claims;
        $bizs= $user->favours;
        $favourites=\DB::table('favourites')->whereUserId(\Auth::user()->id)->lists('biz_id');
        //$bizs = Biz::orderBy('created_at', 'desc')->paginate(6);
        $stateList= State::lists('name','name');
        $stateIds=State::lists('name','id');
        $catIds=Cat::lists('name','id');
        $lgaList= Lga::lists('name','id');
        $catList   = Cat::lists('name','name'); 
         $featured= Biz::whereFeatured('YES')->paginate(3);
         $recent= Biz::orderBy('created_at', 'desc')->paginate(2);
        // dd($featured);
        return view('pages.user-profile', compact('stateList','stateIds','owner','lgaList','catList','catIds','cats',
            'bizs','user','featured','recent', 'totalBiz', 'totalCat'));
    }

    public function userphotos(Request $request,$id)
     {
        $file= $request->file('file');
        $name= time(). $file->getClientOriginalName();
        $file->move('users/photos', $name);
        $user= \App\User::findOrFail($id);
        $user->photos()->create(['path'=>"/users/photos/{$name}"]);
        return 'Done';
     }

     public function userprofilephoto(Request $request,$id)
     {
     
      $picture = [
           'image' => $request->file('image'),
        ];

        $rules = [
             'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = \Validator::make($picture, $rules);
        if ($validator->passes())
         {

          $user_id= $request->get('id');
          $user= \App\User::findorFail($user_id);
          $profilePhoto = $user->profilePhoto; 

           $image= $request->file('image');
           $name= time(). $image->getClientOriginalName();
           $image->move('user/profile', $name);

          if (! isset($profilePhoto->image))
          {
          $pic= new \App\ProfilePhoto;
          $pic->image ='user/profile/'.$name;
          $user->profilePhoto()->save($pic);

             return \Redirect::back()
            ->with('message', 'profile photo added!!!');
          }
          if(isset($profilePhoto->image))
           { 
                  
           $profilePhoto->image ='user/profile/'.$name;
            
           $user->profilePhoto()->save( $profilePhoto);
           return \Redirect::back()
            ->with('success', ' profile photo updated!');
           }
    
        }
         return \Redirect::back()
        ->with('errors', $validator->messages());
           
    }  

    public function claim()
    {
      //This is never going to show
    }
    public function userphoto()
    {
      //This is never going to show
    }

    public function report()
    {
      //This is never going to show
    }

    public function deletefav(Request $request)
    {
      //dd($request->all());
      $userId=$request->get('userId');
      $bizId =$request->get('yes');
      //dd($bizId);
      $user= \App\User::findOrFail($userId)->favours()->detach($bizId);
      return redirect('profile/'.$userId.'#fav')->with('fav', 'Favourite biz removed successfully');

    }
    public function deleteclaim(Request $request)
    {
      //dd($request->all());
      $userId=$request->get('userId');
      $bizId =$request->get('yes');
      $user= \App\User::findOrFail($userId);
      $bizs= $user->claims()->detach($bizId);

      $biz= Biz::findorFail($bizId);
      $biz->claimed=0;
            $biz->status="public";
            $biz->owner ='';
      $biz->save();

      $owner=Owner::where('biz_id', $bizId)->first();

      
      return redirect('profile/'.$userId.'#claimed-biz')->with('claim', 'Claimed biz removed successfully');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $user= User::findorFail($id);
        $cats= $request->get('cats');
        //dd($cats);
        //dd($request->all());
        $email=$request->get('email');
       // $method= $request->get('notify') ? 'subscribeTo' : 'unsubscribeFrom';
        //$this->newsletterList->{$method}('BeazeaDirSubscribers',$email);
        foreach($cats as $cat){
          $newCat= Cat::findorFail($cat);
          $catt=str_replace(' ', '', $newCat->name);  
          dd($catt);       
          //$this->newsletterList->subscribeTo($catt.'Subscribe',$email);

          //$user->subscribeCat


        }
        return \Redirect::back()
        ->with('success', 'Profile updated!!!');
    }

    public function claimbiz(Request $request)
{
  //dd($request->all());
  $data = [
           'image' => $request->file('image'),
           'fullname' => $request->get('fullname'),
           'email' => $request->get('email'),
           'ownership'=>$request->get('ownership'),

        ];

        $rules = [
             'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
             'fullname'=> 'required',
             'email' => 'required | email',
             'ownership' => 'required',
        ];

        $validator = \Validator::make($data, $rules);
        if ($validator->passes())
         {
      $owner= new owner();
      $biz_id= $request->get('biz_id');
      $owner->biz_id= $biz_id;
      $owner->fullname=$request->get('fullname');
      $owner->email= $request->get('email');
      $owner->ownership= $request->get('ownership');
      $owner->user_id= \Auth::user()->id;
      $owner->status=0;
      
      $image= $request->file('image');
            $name= time(). $image->getClientOriginalName();
            $image->move('claimed/proofs', $name);
            $owner->proof ='claimed/proofs/'.$name;
            $owner->save();

            $biz= Biz::where('id', $biz_id)->first();
            $biz->claimed=1;
            $biz->status="pending";
            $biz->owner =\Auth::user()->id;
            $biz->save();
           return \Redirect::back()
           ->with('success_code', 230)
            ->with('success_claim', 'Thanks for claiming this business, your application will be approved shortly !!!');
    
        }
         return \Redirect::back()
        ->with('error_code', 5)
        ->with('errors2', $validator->messages());
     
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
        //
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

    public function activate($code)
    {
        $user = User::where('confirmation_code', '=', $code)->first();
          if($user)
          {
            $user->confirmed = 1;
            $user->confirmation_code = null;
            $user->save();
            session()->flash('alert','your account has been activated.');
              session()->flash('alert_type','alert-success');
             return redirect('/profile/'.$user->username.'/'.$user->id);
         }
         else{
            session()->flash('alert','Sorry,you are already activated');
              session()->flash('alert_type','alert-danger');
                return redirect('/profile/'.$user->username.'/'.$user->id);
              
         }
    }
}
