<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\State;
use App\Cat;

class HomeController extends Controller
{
   public function index()
	{
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		return view('pages.index', compact('stateList','catList','cats'));
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
}
