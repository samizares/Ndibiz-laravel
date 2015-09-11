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

class HomeController extends Controller
{
   public function index()
	{
		$cats = Cat::all();
		$stateList= State::lists('name','id');
		$catList   = SubCat::lists('name','id'); 
	    $featured= Biz::whereFeatured('YES')->get();
		return view('pages.index', compact('stateList','catList','cats','featured'));
	}

	public function businesses()
	{
		$cats = Cat::all();
		$bizs = Biz::orderBy('created_at', 'desc')->paginate(6);
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		 $featured= Biz::whereFeatured('YES')->paginate(3);
		 $recent= Biz::orderBy('created_at', 'desc')->paginate(1);
		// dd($featured);
		return view('pages.businesses', compact('stateList','catList','cats','bizs','featured','recent'));
	}

	public function categories()
	{
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList  = Cat::lists('name','name'); 
		$cats=  Cat::all();
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);
		return view('pages.categories', compact('stateList','catList','featured','cats','recent'));
	}

	public function searchResults()
	{
		
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->get();

         return view('pages.search-results', compact('stateList','catList','cats','featured'));
	}
	
	public function regbiz()
	{
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name');

		return view('pages.regbiz', compact('stateList', 'catList'));
	}

	public function searchResult()
	{	
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);
		$val= Input::get('category');
		$loc=Input::get('location');
		if( $sub= SubCat::whereName($val)->first()){
			$subID= $sub->id;
				
	      		if( $area=Lga::whereName($loc)->first()) {
	      				$areaID=$area->id;
	      				$bizs= Biz::bySub($subID)->byArea($areaID)->get();	      				
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$sub->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}    				
	      	
	       			} else {
	      			 	$state=State::whereName($loc)->first();
	      			 	$stateID=$state->id;
	      			 	$bizs= Biz::bySub($subID)->byState($stateID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$sub->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','key','loc'));
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
		return view('pages.activate');
	}

	public function getBusiness($catId)
	{
	 		$biz = Biz::where('cat_id', $catId)->first();
        // Get all reviews that are not spam for the business and paginate them
        $reviews = $biz->reviews()->with('user')->approved()->notSpam()
        ->orderBy('created_at','desc')->paginate(50);

         return view('pages.biz-result', array('biz'=>$biz,'reviews'=>$reviews));
    }
	 
	 public function getBizreview($id)
	 {
	 	$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name');
	 	  $biz = Biz::findOrFail($id);
        // Get all reviews that are not spam for the business and paginate them
        $reviews = $biz->reviews()->with('user')->approved()->notSpam()
        ->orderBy('created_at','desc')->paginate(50);

         return view('pages.biz-profile', array('biz'=>$biz,'reviews'=>$reviews,
         		'stateList'=>$stateList,'catList'=>$catList));
	 }

	 public function bizSub($id)
	 {
	 	$sub= SubCat::findOrFail($id);
	 	$bizs=$sub->biz;
	 	$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$loc=Input::get('location');
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);

		return view('pages.biz-sub',compact('bizs','stateList','catList','loc','cats','featured','recent','sub'));
	 }

	 public function postReview()
	 {
	 	$input = array(
			'comment' => \Input::get('comment'),
			'rating'  => \Input::get('rating')
 			 );
 			 // instantiate Rating model
 			 $review = new Review;

  			// Validate that the user's input corresponds to the rules specified in the review model
  		$validator = \Validator::make( $input, $review->getCreateRules());

  		// If input passes validation - store the review in DB, otherwise return to product page with error message 
  		if ($validator->passes()) {
			$review->storeReviewForBiz($id, $input['comment'], $input['rating']);
			return redirect('review/biz'.$id.'#reviews-anchor')->with('review_posted',true);
  					}		

  		return redirect('review/biz/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
	 }
}
