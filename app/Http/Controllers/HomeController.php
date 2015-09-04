<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\State;
use App\Biz;
use App\Cat;
use App\Review;

class HomeController extends Controller
{
   public function index()
	{
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		 $featured= Biz::whereFeatured('YES')->get();
		return view('pages.index', compact('stateList','catList','cats','featured'));
	}

	public function businesses()
	{
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->get();
		return view('pages.businesses', compact('stateList','catList','cats','featured'));
	}

	public function categories()
	{
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->get();
		return view('pages.categories', compact('stateList','catList','cats','featured'));
	}
	
	public function regbiz()
	{
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name');

		return view('pages.regbiz', compact('stateList', 'catList'));
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
