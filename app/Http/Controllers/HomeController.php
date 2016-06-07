<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ReviewRequest;
use App\Http\Controllers\Controller;
use App\State;
use App\Lga;
use App\Biz;
use App\Cat;
use App\SubCat;
use Input;
use App\Review;
use App\Setting;
use App\BizPhoto;

class HomeController extends Controller
{

	public function __construct()
    {
//        $this->middleware('auth',['only'=>['home','businesses','profile','getBizreview']]);
        $this->middleware('auth',['only'=>['home','favours']]);
        $this->middleware('confirm',['only'=>['home']]);

    }

   public function index()
	{
		$cats = Cat::all()->take(8);
		$bizs = Biz::orderBy('created_at', 'desc')->take(6);
		$recentBiz = Biz::orderBy('created_at', 'desc')
			->whereNotNull('claimed')
			->take(12)->get();
		$totalCat=Cat::count();
		$totalSubCat=subCat::count();
		$stateList= State::lists('name','id');
		$catList   = SubCat::lists('name','id')->take(4);

          $featured = Biz::whereFeatured('YES')->get();
          $settings=Setting::findOrFail(1);

		return view('pages.index', compact('stateList','settings','catList', 'bizs','cats','featured', 'recentBiz',
			'totalCat', 'totalSubCat', 'subs'));
	}

	public function home()
	{
		$cats = Cat::all()->take(8);
		$bizs = Biz::orderBy('created_at', 'desc')->take(6);
		$totalCat=Cat::count();
		$totalSubCat=subCat::count();
		$stateList= State::lists('name','id');
		$catList   = SubCat::lists('name','id')->take(4);
//	    $featured= Biz::whereFeatured('YES')->take(8)->get();
		return view('pages.index', compact('stateList','catList','cats', 'bizs','featured', 'totalCat', 'totalSubCat',
		 'subs'));
	}

	public function businesses()
	{
		$bizs = Biz::orderBy('created_at', 'desc')->paginate(9);
		//$cats=  Cat::lists('name','id');
		$stateListID= State::lists('name','id');
		$catt= Cat::lists('name','id')->all();
		$subcatt=SubCat::lists('name','id')->all();
		$new=array_merge($catt,$subcatt);
		//$cats = \DB::table('cats')->lists('name', 'id');
		if (\Request::ajax()) {
            return \Response::json(\View::make('partials.ajax-result')
            	->with(compact('bizs'))
            	->render());
        }
		return view('pages.businesses', compact('bizs','new','stateListID'));
	}
	public function businesses2()
	{
		$bizs = Biz::orderBy('created_at', 'desc')->paginate(9);
		$stateListID= State::lists('name','id');
		if (\Request::ajax()) {
			return \Response::json(\View::make('partials.ajax-result')->with(compact('bizs'))->render());
		}
		return view('pages.businesses2', compact('bizs','stateListID'));
	}
	public function map()
	{
		$bizs = Biz::orderBy('created_at', 'desc')->paginate(6);
		return view('pages.map', compact('bizs'));
	}

	public function categories()
	{

		return view('pages.categories');
	}

	public function locations()
	{
		$states = State::all();
        $totalState = State::count();
        $totalBiz=Biz::count();
        $stateList= State::lists('name','name');
		return view('pages.locations', compact('states','totalState','stateList','totalBiz'));
	}

	public function searchResults()
	{

		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name');
		$featured= Biz::whereFeatured('YES')->get();

         return view('pages.search-results', compact('stateList','catList','cats','featured'));
	}

	public function searchResult()
	{
		$cats = Cat::all();
		//$stateList= State::lists('name','name');
		//$catList   = Cat::lists('name','name');
		//$featured= Biz::whereFeatured('YES')->paginate(3);
		//$recent= Biz::orderBy('created_at', 'desc')->paginate(1);
		$val= Input::get('category');
		$loc=Input::get('location');
		if( $sub= SubCat::whereName($val)->first()){
			$subID= $sub->id;

	      		if( $area=Lga::whereName($loc)->first()) {
	      				$areaID=$area->id;
	      				$bizs= Biz::bySub($subID)->byArea($areaID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','cats','val','loc'));
	  					}else{
	  						$bizs=$sub->biz;
	  						return view('pages.no-search',compact('bizs','cats','val','loc'));
	  					}

	       			} else {
	      			 	$state=State::whereName($loc)->first();
	      			 	$stateID=$state->id;
	      			 	$bizs= Biz::bySub($subID)->byState($stateID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','cats','val','loc'));
	  					}else{
	  						$bizs=$sub->biz;
	  						return view('pages.no-search',compact('bizs','cats','val','loc'));
	  					}
	  				}


		  } else {
		   	$cat= Cat::whereName($val)->first();
		   	$catID=$cat->id;
		   			if( $area=Lga::whereName($loc)->first()) {
	      				$areaID=$area->id;
	      				$bizs= Biz::byCat($catID)->byArea($areaID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$cat->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}


	       			} else {
	      			 	$state=State::whereName($loc)->first();
	      			 	$stateID=$state->id;
	      			 	$bizs= Biz::byCat($catID)->byState($stateID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$cat->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}
	      			 }


		    }

	}

	public function search()
	{
		return view('pages.search');
	}
	public function confirm()
	{
		return view('emails.confirm');
	}

	public function getBusiness($catId)
	{
	 		$biz = Biz::where('cat_id', $catId)->first();
        // Get all reviews that are not spam for the business and paginate them
        $reviews = $biz->reviews()->with('user')->approved()->notSpam()
        ->orderBy('created_at','desc')->paginate(50);

         return view('pages.biz-result', array('biz'=>$biz,'reviews'=>$reviews));
    }

	 public function getBizreview($slug,$id)
	 {

	 	  $stateList= State::lists('name','name');
		  $lgaList= Lga::lists('name','id');
		  $subList= SubCat::lists('name','id');
		  $catList   = Cat::lists('name','name');
	 	  //$biz = Biz::findOrFail($id);
	 	  $biz= Biz::where(['id'=>$id,'slug'=>$slug])->firstOrFail();
	 	  $sub= $biz->subcats->lists('id')->all();

	 	   $favours= $biz->favoured->count();
	 	  // dd($favours);
	 	 // $favourites= \DB::table('favourites')->where('user_id', \Auth::user()->id)->lists('biz_id');
	 	  // $favourites= \Auth::user()->favours->lists('id')->all();
	 	  //dd($favourites);

	 	 // $hours=$biz->hours;
	 	 // $mon=$biz->hours->where('day','MON')->first();
	 	 // $tue=$biz->hours->where('day','TUE')->first();
	 	 // $wed=$biz->hours->where('day','WED')->first();
	 	 // $thu=$biz->hours->where('day','THU')->first();
	 	 // $fri=$biz->hours->where('day','FRI')->first();
	 	 // $sat=$biz->hours->where('day','SAT')->first();
	 	 // $sun=$biz->hours->where('day','SUN')->first();
	 	  //dd($mon->open_time);

	 	 // $mon=\App\BusinessHour::all();
        // Get all reviews that are not spam for the business and paginate them
        $reviews = $biz->reviews()->with('user')->approved()->notSpam()
        ->orderBy('created_at','desc')->paginate(50);
        $featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(3);

         return view('pages.biz-profile', array('biz'=>$biz,'reviews'=>$reviews,'sub'=>$sub,'stateList'=>$stateList,'lgaList'=>$lgaList,
				 'subList'=>$subList,'favours'=>$favours,
         	'catList'=>$catList), compact('featured','recent'));
	 }

	 public function postReview($id)
	 {
	 	$input = array(
		'comment' => \Input::get('comment'),
		'rating'  => \Input::get('rating')
	   );

	 	$review = new Review();
	 	$validator = \Validator::make( $input, $review->getCreateRules());
	 	$biz=Biz::where('id',$id)->first();

	 	if ($validator->passes()) {
	 		$review->storeReviewForBiz($id, $input['comment'], $input['rating']);
				return redirect('biz/profile/'.$biz->slug.'/'.$id.'#company-reviews')->with('success','Review Submitted successfully');
	         		  }

	       		return redirect('biz/profile/'.$biz->slug.'/'.$id.'#company-reviews')->with('errors', $validator->messages())->withInput();
	 }

	 public function postMessage(MessageRequest $request, $id)
	 {
	 	$review = new Review();
	 	$biz=Biz::where('id',$id)->first();
	 	$review->storeReviewForBiz($id, $request->comment, $request->rating);
		return redirect('biz/profile/'.$biz->slug.'/'.$id.'#company-reviews')->with('success','Review Submitted successfully');
	 }
	 public function bizSub($slug)
	 {
	 	$sub= SubCat::whereSlug($slug)->firstOrFail();
	 	$bizs=$sub->biz;
		$loc=Input::get('location');

		return view('pages.biz-sub',compact('bizs','loc','sub'));
	 }

	  public function bizCat($slug)
	 {
	 	$cat= Cat::whereSlug($slug)->firstOrFail();
	 	$bizs=$cat->biz;
	 	return view('pages.biz-cat',compact('bizs','cat'));
	 }


	 public function favoured()
	 {
	    $biz_id=\Input::get('biz_id');
	    $biz= Biz::findOrFail($biz_id);
	    $favourites= \Auth::user()->favours->lists('id')->all();
	    if($favourited=in_array($biz_id, $favourites)){
	    	\Auth::user()->favours()->detach($biz_id);
	    	 $data[]=array('id' =>0, 'count' => $biz->favoured->count(), 'text'=>'favorited');
	    	 return \Response::json(['data'=> $data]);
		  }
		  else {
		  	\Auth::user()->favours()->attach($biz_id);
		  	$data[]=array('id' =>1, 'count' => $biz->favoured->count(), 'text'=>'not-favorited');
	    	 return \Response::json(['data'=> $data]);
		  }

  		// \Auth::user()->favours()->attach(\Input::get('biz_id'));
    	//	 return \Redirect::back();
	 }

	 public function favours()
	 {

    		 return \Redirect::back();
	 }



	 public function unfavoured($biz_id)
	 {

  		 \Auth::user()->favours()->detach($biz_id);
    		 return \Redirect::back();
	 }


	 public function bizphotos(Request $request,$id)
	 {
	 	$file= $request->file('file');
	 	$name= time(). $file->getClientOriginalName();
	 	$file->move('bizz/photos', $name);
	 	$biz= Biz::findOrFail($id);
	 	$biz->photos()->create(['path'=>"/bizz/photos/{$name}"]);
	 	return 'Done';
	 }



    public function bizprofilephoto(Request $request,$id)
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

          $biz_id= $request->get('id');
          $biz= Biz::findorFail($biz_id);
          $profilePhoto = $biz->profilePhoto;

           $image= $request->file('image');
           $name= time(). $image->getClientOriginalName();
           $image->move('bizz/profile', $name);

          if (! isset($profilePhoto->image))
          {
          $pic= new \App\BizProfilePhoto;
          $pic->image ='bizz/profile/'.$name;
          $biz->profilePhoto()->save($pic);

             return \Redirect::back()
            ->with('message', 'Biz profile photo added!!!');
          }
          if(isset($profilePhoto->image))
           {

           $profilePhoto->image ='bizz/profile/'.$name;

           $biz->profilePhoto()->save( $profilePhoto);
           return \Redirect::back()
            ->with('message', ' profile photo updated!');
           }

        }
         return \Redirect::back()
        ->with('errors', $validator->messages());


    }


	 public function favourites()
	 {

	 }

	public function contact()
	{
		return view('pages.contact');
	}

	public function aboutus()
	{
		return view('pages.aboutus');
	}

	public function tos()
	{
		return view('pages.tos');
	}

	public function faqs()
	{
		return view('pages.faqs');
	}

	public function privacy()
	{
		return view('pages.privacy');
	}

}
