<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index()
    {
        
        return view('dashboard.category.index');
    }


    public function data()
    {
        // Select * from Category 
        $data = Category::query();

        $result = DataTables()->eloquent($data)
        ->addColumn('action',function($data){
            return view('dashboard.category.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('img_name',function($data){
            return view('dashboard.category.action',['type'=>'img_name','data'=>$data]);
            
        })
        ->toJson();
        return $result;
    }


    public function create()
    {
        return view('dashboard.category.create');
    }



    public function store(Request $request)
    {
        // 1 validation  ==> make rule for each element and pass of follow rule 
        // 2 check if there are any logic before store 
        // ex=> store image in server
        // 3 Store in db ==> Insert into Category() values();


        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'img'=>'file|required'
        ]);

        // $request->name;
        // $request->price;
        
        // image //
        
        // $request->file('img');

        // Logic // 
        if($request->file('img'))
        {
            // store image //

            $imgName = time().$request->file('img')->getClientOriginalName();
            
            //  return 1240482023h.jpg

            Storage::disk('category')->put($imgName, file_get_contents($request->file('img')));


            $image = asset('files/category/' . $imgName);


            // array =   [array_of request ]  + [img_name: 1240482023h.jpg] +['img':"http://127.0.0.1:8000/files/doctor/1678339100192c0bda71b2fc4244de0c55073fdfcff24a4fd6.webp"]            
            $data = array_merge($request->all(),['img'=>$image,'img_name'=>$imgName]);
            
            // INSERYT INTO Category() value()
            if(Category::create($data))
            {
                return response()->json(['msg'=>'Category Added','status'=>true], 200);
            }else{
                return response()->json(['error'=>'Error Accure','status'=>false], 200);
            }
        }else
        {
            return response()->json(['error'=>'Error Accure','status'=>false], 200);

        }


    }

    public function update(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            
        ]);

        // update category set name="mohamed" where id=2; 

        $data = Category::findOrFail($request->id);

        if($request->file('img'))
        {
             // delete img if exsit 
            if($data->img_name)
            {
                $imgPath = public_path('files/category/'.$data->img_name);

                // return graduationProject / public / files /category / image name 
                unlink($imgPath);
                // store image //
                // upload new img with new path 
                $imgName = time().$request->file('img')->getClientOriginalName();
                Storage::disk('category')->put($imgName, file_get_contents($request->file('img')));
                $image = asset('files/category/' . $imgName);

            }
            $newdata = array_merge($request->all(),['img'=>$image,'img_name'=>$imgName]);

        }
        

        //  update 
        // update category set name="mohamed" where id=2; 
        $data->update($request->all());
        
        return response()->json(['msg'=>'Category Updated','status'=>true], 200);

    }

    public function edit($id){

        $data = Category::findOrFail($id);
        return view('dashboard.category.edit', compact('data'));
    }


    public function delete(Request $request)
    {
        // DELETE FROM CATEGORY WHERE ID = ID
        $data = Category::findOrFail($request->id);
        $data->delete();
        return response()->json(['status'=>true], 200);
    }
    
    
}
