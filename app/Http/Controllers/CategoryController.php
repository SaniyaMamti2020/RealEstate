<?php

namespace App\Http\Controllers;

use App\Models\{Category};
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\DataTables\CategoryDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Spatie\Activitylog\Models\Activity;
use Hash;
use Auth;
use File;
use DB;


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
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        $category = Category::create($validated);
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
        return view('admin.category.edit' ,compact('category'));
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
        $category = Category::where('id',$id)->firstOrFail()->update($validated);
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
