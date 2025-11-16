<?php

namespace App\Http\Controllers;

use DB;
use Str;
use Hash;
use Auth;
use File;
use App\Models\{Category};
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;
use Spatie\Activitylog\Models\Activity;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        $categoryData = category::where('status',1)->orderBy('disp_order', 'asc')->pluck('name', 'id')->toArray();
        return $dataTable->render('admin.category.index', compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selectedParentId = '';
        $parentMember = Category::where('status', 1)->whereNull('parent_id')->pluck('name', 'id');
        return view('admin.category.create', compact('parentMember', 'selectedParentId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->all();
        $validated['parent_id'] = $validated['parent_id'] ?: null;
        $validated['slug'] = Str::slug($request->name);
        $category = Category::create($validated);

        $upload_dir='category';
        $path = public_path('upload/'.$upload_dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if(isset($request->image) && !empty($request->image))
        {
            $microtime=microtime();
            $microtime=str_replace('.','', $microtime);
            $microtime=str_replace(' ','', $microtime);
            $fileName = $microtime.'.'.$request->image->extension();
            if($request->image->move(public_path('upload/'.$upload_dir), $fileName ))
            {
                $fileupload_data = Category::where('id',$category->id)->update([
                    'image' => $fileName
                ]);
            }
        }
        
        return redirect()->route('category.index')->with('success', 'Category Added Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(blank($category) && empty($category) && !isset($category))
        {
            return  redirect()->route('category.index')->with('error', 'No Data Found');
        }

        $parentMember = Category::where('status', 1)->whereNull('parent_id')->where('id', '!=', $category->id)->pluck('name', 'id');
        $selectedParentId = $category->parent_id;
        return view('admin.category.edit' ,compact('category', 'parentMember', 'selectedParentId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->all();
        $validated['updated_by'] = Auth::user()->id;
        unset($validated['_token']);
        unset($validated['_method']);
        $validated['slug'] = Str::slug($request->name);
        $category = Category::where('id',$id)->firstOrFail()->update($validated);

        $upload_dir='category';
        $path = public_path('upload/'.$upload_dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if(isset($request->image) && !empty($request->image))
        {
            $microtime=microtime();
            $microtime=str_replace('.','', $microtime);
            $microtime=str_replace(' ','', $microtime);
            $fileName = $microtime.'.'.$request->image->extension();
            if($request->image->move(public_path('upload/'.$upload_dir), $fileName ))
            {
                if (!empty($categoryold->image) && File::exists($path . '/' . $categoryold->image)) {
                    File::delete($path . '/' . $categoryold->image);
                }
                $fileupload_data = Category::where('id',$id)->update([
                    'image' => $fileName
                ]);
            }
        }

        return redirect()->route('category.index')->with('success', 'Category Update Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $category = Category::where('id',$id)->update(['delete_by' => Auth::user()->id]);
        $category = Category::where('id',$id)->delete();
        return Response()->json($category);
    }

    public function getChildById($id)
    {
        $categoryData = Category::where('parent_id', $id)->where('status',1)->orderBy('disp_order', 'asc')->get(['id', 'name']);
        return response()->json($categoryData);
    }

     public function getModelLog($id) {

        $data_first = Activity::select([
            \DB::raw('activity_log.id'),
            \DB::raw('activity_log.event'),
            \DB::raw('activity_log.subject_type'),
            \DB::raw('activity_log.subject_id'),
            \DB::raw('activity_log.properties'),
            \DB::raw('users.username'),
            \DB::raw('DATE_FORMAT(activity_log.created_at, "%d-%m-%Y <br> %r") as created_date'),
            \DB::raw('DATE_FORMAT(activity_log.updated_at, "%d-%m-%Y <br> %r") as updated_date'),   
        ])
        ->join("users", function($join) {
            $join->on("users.id","=","activity_log.causer_id");
        })
        ->where('subject_type','App\Models\Category')
        ->where('subject_id',$id)
        ->limit(1)->get()->toArray();
        
        $data_last = Activity::select([
            \DB::raw('activity_log.id'),
            \DB::raw('activity_log.event'),
            \DB::raw('activity_log.subject_type'),
            \DB::raw('activity_log.subject_id'),
            \DB::raw('activity_log.properties'),
            \DB::raw('users.username'),
            \DB::raw('DATE_FORMAT(activity_log.created_at, "%d-%m-%Y <br> %r") as created_date'),
            \DB::raw('DATE_FORMAT(activity_log.updated_at, "%d-%m-%Y <br> %r") as updated_date'),
        ])
        ->join("users", function($join) {
            $join->on("users.id","=","activity_log.causer_id");
        })
        ->where('subject_type','App\Models\Category')
        ->where('subject_id',$id)
        ->whereNotIn('event',['created'])
        ->orderBy('id','DESC')
        ->limit(5)->get()->toArray();
        $TaxData=Category::find($id);
        $TaxNumber=$TaxData->name; 
       // dd($TaxNumber);
        $data = [];
        if(isset($data_last) && !empty($data_last)) {
            foreach($data_last as $key => $val) {
                $attributesData=$val['properties']['attributes'];
                unset($attributesData['updated_at']);
                unset($attributesData['created_at']);
                unset($attributesData['updated_by']);
                unset($attributesData['created_by']);
                $attributesDataString='';
                if(isset($attributesData) && !empty($attributesData))
                {
                    $attributesData=array_keys($attributesData);
                    $attributesData=str_replace('_',' ',  implode(', ', $attributesData));
                    $attributesDataString=' - ( '.$attributesData.' )';
                }   
                $data[$key]['id'] = $val['id'];
                $data[$key]['name'] = $TaxNumber;
                $data[$key]['event'] = ucwords($val['event']);
                $data[$key]['subject_type'] = $val['subject_type'];
                $data[$key]['subject_id'] = $val['subject_id'];
                $data[$key]['ip'] = isset($val['properties']['ip']) ? $val['properties']['ip'] : '0.0.0.0';
                $data[$key]['username'] = $val['username'];
                $data[$key]['attributes_data'] = $attributesDataString;
                $data[$key]['created_date'] = $val['created_date'];
                $data[$key]['updated_date'] = $val['updated_date'];
            }
        }

        if(isset($data_first) && !empty($data_first)) {
            $i = 9;
            foreach($data_first as $keyf => $valf) {
                $data[$i]['id'] = $valf['id'];
                $data[$i]['name'] = $TaxNumber;
                $data[$i]['event'] = ucwords($valf['event']);
                $data[$i]['subject_type'] = $valf['subject_type'];
                $data[$i]['subject_id'] = $valf['subject_id'];
                $data[$i]['ip'] = isset($valf['properties']['ip']) ? $valf['properties']['ip'] : '0.0.0.0';
                $data[$i]['username'] = $valf['username'];
                $data[$i]['created_date'] = $valf['created_date'];
                $data[$i]['updated_date'] = $valf['updated_date'];
                $i++;
            }
        }
       // dd($data);
        if(isset($data) && !empty($data)) {
            return ['status'=>'success', 'data'=>$data];
        }
        return ['status'=>'error', 'data'=>[]];
    }
}
