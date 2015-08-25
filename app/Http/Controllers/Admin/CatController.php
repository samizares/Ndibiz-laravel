<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatCreateRequest;
use App\Http\Requests\CatUpdateRequest;
use App\Cat;
use App\SubCat;
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

    return view('admin.cat.index')
            ->withCats($cats);
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
        $subcats= SubCat::lists('name','name');

         return view('admin.cat.create', compact('cats','image_class','subcats'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CatCreateRequest $request)
    {  
      //  dd($request->input('sub_cats'));
            $category=new Cat();
            $category->name= $request->input('name');
            $category->meta_description=$request->input('meta_description');
            $category->image_class= $request->input('image_class');
            $category->save();

           // $obj=$category->cat()->

            $sub_cats= $request->input('sub_cats');


          //  $name=[];
            if($category){
                foreach ($sub_cats as $sub) {

                    if ($existingCat= SubCat::where('name', $sub)->first()) {

                        return back()
                         ->withError("The Sub-Category  '$existingCat->name' already belongs to another Category.");

                    } else{
                         $newCat = new SubCat();
                         $newCat -> name = $sub;
                         $newCat -> cats_id = $category->id; 
                         $newCat->save();
                        }
                    }
                 }

                    return redirect('/admin/cat')
                     ->withSuccess("The Category '$category->name' was created.");

 }    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $image_class= Cat::lists('image_class','image_class');
        $cats  = Cat::lists('name', 'name'); 
        $subcats= SubCat::lists('name','name');
        $cat =  Cat::findOrFail($id);
        $list= $cat->subcats->lists('name')->all();

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

       //  dd($cat->subcats);
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

           /**   foreach ($sub_cats as $sub) {
                $newCat = new Sub_cat();
                $newCat ->name  = $sub;
                $newCat->save();
            if ($cat->subcats->contains($newCat))
            {

            }
        }  */


       /**      $catsId =[];
              if($cat){
               foreach ($sub_cats as $sub) {

                    if (  $existingCat = Sub_cat::where('name', $sub)->first()) {
                       //  $catsId[]= $existingCat->id;
                         $existingCat->cat()->associate($cat)->save();
                        
                   }
                    else{
                         $newCat = new Sub_cat();
                         $newCat ->name  = $sub;
                       //  $newCat ->cats_id = $cat->id; 
                          $newCat ->cat()->associate($cat)->save();
                    

                
                        }
                    }
                 } 
               //  $cat->subcats()->attach($cat->id);  */



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
        $cat->delete();

    return redirect('/admin/cat')
        ->withSuccess("The '$cat->name' tag has been deleted.");
    }
}
