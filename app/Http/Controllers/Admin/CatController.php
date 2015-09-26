<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatCreateRequest;
use App\Http\Requests\CatUpdateRequest;
use App\Cat;
use App\SubCat;
use DB;

class CatController extends Controller
{
    protected $fields = [
         'name' => '',
         'meta_description' => '',
         'image_class' => '',
   
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $cats = Cat::all();
       $totalCat=Cat::count();

    return view('admin.cat.index',compact('cats','totalCat'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cats   = Cat::lists('name','name'); 
        $image_class= Cat::lists('image_class','image_class');
        $all_image= DB::table('subcategory')->lists('name','name');
        $subcats= SubCat::lists('name','name');
       // $subcats_image=SubCat::lists('image_class','image_class');

         return view('admin.cat.create', compact('cats','image_class','subcats','all_image'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CatCreateRequest $request)
    {  
      // dd($request->input('sub_cats'));
             $catName= $request->input('category_name');
             $subName= $request->input('subcategory_name');
             $catImage=$request->input('cat_image');
             if($existingCat= Cat::where('name', $catName)->first()) {
                 return redirect('/admin/cat/create')
                  ->withErrors("The Category '$existingCat->name' Is already existing");

            } 
           
              foreach($subName as $subb) {
                if($existingSub= SubCat::where('name', $subb)->first()) {
                 return back()
                  ->withErrors("The Sub-Category '$existingSub->name' Is already existing");
              }

          }
                if(! $existingImage= DB::table('subcategory')->where('name', $catImage)->first()) {
                 
                     $image= DB::table('subcategory')->insert(
                        array( 'name'   => $catImage )
                      );

            }

              

              $category=new Cat();
                 $category->name= $request->input('category_name');
                 $category->meta_description=$request->input('meta_description');
                 $category->image_class= $catImage;
                 $category->save();

                  
                    foreach($subName as $subb){
                  $freshSub= new SubCat();
                  $freshSub->name= $subb;
                  $freshSub->cat_id= $category->id;
                  $freshSub->save(); 
                  }    





             /*   $existingCat->meta_description=$request->input('meta_description');
                $existingCat->image_class=$request->input('cat_image');
                $existingCat->save();

                if($request->input('subcat') ){
                $newSub= new SubCat();
                $newSub->name=$request->input('subcat');
                $newSub->image_class=$request->input('sub_image');
                $newSub->cat_id=$existingCat->id;
                 }

                 return redirect('/admin/cat')
                     ->withSuccess("The Category '$existingCat->name' has been updated."); */
                 
       /*      }
             else{
                 $category=new Cat();
                 $category->name= $request->input('category_name');
                 $category->meta_description=$request->input('meta_description');
                 $category->image_class= $request->input('cat_image');
                 $category->save();

                  
                    foreach($subName as $subb){
                  $freshSub=new SubCat();
                  $freshSub->name=$request->input('subcat');
                  $freshSub->image_class= $request->input('sub_image');
                  $freshSub->cat_id= $category->id;
                  $freshSub->save();
                 }  */


                  return redirect('/admin/cat/')
                     ->withSuccess("The Category '$category->name' has been created.");
                

        }
           

   



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cat =  Cat::findOrFail($id);
        $list= $cat->subcats->lists('name')->all();
        $image_class= Cat::lists('image_class','image_class');
        $cats  = Cat::lists('name', 'name'); 
        $subcats= SubCat::lists('name','name');
        

     // dd($cat->subcats->lists('id')->all());
       //  $data = ['id' => $id];
   // foreach (array_keys($this->fields) as $field) {
    //  $data[$field] = old($field, $cat->$field);
   // }

    return view('admin.cat.edit')
    ->withCats($cats)
    ->withCat($cat)
    ->withSubcats($subcats)
    ->withList($list)
    ->withImage_class($image_class);
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CatUpdateRequest $request, $id)
    {
        $cat = Cat::findOrFail($id);

        $cat->name= $request->input('name');
        $cat->meta_description=$request->input('meta_description');
        $cat->image_class= $request->input('image_class');
        
             $cat->save();
        $sub_cats= $request->input('sub_cats');
         $real= [];

         $cat->subcats()->delete();
          foreach ($sub_cats as $sub) {
            if( $existingCat = SubCat::where('name', $sub)->first()) {
                 $real[]= $existingCat;
                }
                 else{
                     $newCat = new SubCat();
                     $newCat ->name  = $sub;
                     $newCat->save();
                 $real[]=$newCat;
                 }
            }
                $cat->subcats()->saveMany($real); 


    return redirect("/admin/cat/")
        ->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cat = Cat::findOrFail($id);
         $cat->subcats()->delete();
         $cat->delete();

    return redirect('/admin/cat')
        ->withSuccess("The '$cat->name' category and its subcategories has been deleted.");
    }
}
