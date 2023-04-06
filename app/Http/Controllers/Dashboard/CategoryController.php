<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    protected $model;
    protected $viewPath = 'admin.category.';
    protected $route = 'admin.category.';

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index()
    {
    
        return view('dashboard.category.index');
    }


    public function data()
    {
        $data = Category::query();
        $result = DataTables()->eloquent($data)
        ->addColumn('action',function($data){
            return view('dashboard.category.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('img_name',function($data){
            return view('dashboard.category.action',['type'=>'image','data'=>$data]);
            
        })
        ->toJson();
        return $result;
    }


    public function create()
    {
        return view('dashboard.category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'img'=>'image|required'
        ]);

        if($request->file('img'))
        {
            // store image //
            $imgName = time().$request->file('img')->getClientOriginalName();
            Storage::disk('category')->put($imgName, file_get_contents($request->file('img')));
            $image = asset('files/category/' . $imgName);
            $data = array_merge($request->all(),['img'=>$image,'img_name'=>$imgName]);
            
            if(Category::create($data))
            {
                return response()->json(['msg'=>'Category Added','status'=>true], 200);
            }else{
                return response()->json(['error'=>'Error Accure','status'=>false], 200);
            }
        }
    }

    // public function update(Request $request)
    // {
    //     $data = 
    // }

    public function edit($id){
        $data = Category::findOrFail($id);
        return view('dashboard.admins.edit',compact('data'));
    }


    public function delete(Request $request)
    {
        $data = Category::findOrFail($request->id);
        $data->delete();
        return response()->json(['success'=>true], 200);
    }
    
    
}
