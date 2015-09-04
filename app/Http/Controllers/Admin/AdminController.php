<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CatCreateRequest;
use App\Http\Requests\CatUpdateRequest;
use App\Http\Requests\BusinessRegRequest;

use App\Http\Controllers\Controller;

use App\Cat;
use App\SubCat;

use App\Biz;
use App\State;
use App\Address;
use App\Biz_Subcat_pivot;

use DB;

class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $cats = Cat::all();
       $bizs = Biz::all();
       $states = State::all();

    return view('admin.index', compact('biz', 'states', 'featured'))->withCats($cats);
    }

   
}
