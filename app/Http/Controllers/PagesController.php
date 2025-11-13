<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Requests\PagesRequest;
use App\DataTables\PagesDataTable;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;
use Auth;
use File;

class PagesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index','show']]);
         $this->middleware('permission:page-create', ['only' => ['create','store']]);
         $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PagesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagesRequest $request)
    {
        $validated = $request->all();
        $validated['page_slug'] = Str::slug($request->page_name);
        $pages = Pages::create($validated);

        $upload_dir='pages';
        $path = public_path('upload/'.$upload_dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if(isset($request->page_img) && !empty($request->page_img))
        {
            $microtime=microtime();
            $microtime=str_replace('.','', $microtime);
            $microtime=str_replace(' ','', $microtime);
            $fileName = $microtime.'.'.$request->page_img->extension();
            if($request->page_img->move(public_path('upload/'.$upload_dir), $fileName ))
            {
                $fileupload_data = Pages::where('id',$pages->id)->update([
                    'page_img' => $fileName
                ]);
            }
        }

        return redirect()->route('pages.index')->with('success', config('constants.add_msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['pages'] = Pages::find($id);

        if(blank($this->data['pages']) && empty($this->data['pages']) && !isset($this->data['pages']))
        {
            return  redirect()->route('pages.index')->with('error', config('constants.not_found_msg'));
        }
        
        return view('admin.pages.edit' ,$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(PagesRequest $request, $id)
    {
        $validated = $request->all();
        unset($validated['_token']);
        unset($validated['_method']);
        $validated['page_slug'] = Str::slug($request->page_name);
        $validated['updated_by'] = Auth::user()->id ?? 0;
        $pages = Pages::where('id',$id)->firstOrFail()->update($validated);

        $upload_dir='pages';
        $path = public_path('upload/'.$upload_dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if(isset($request->page_img) && !empty($request->page_img))
        {
            $microtime=microtime();
            $microtime=str_replace('.','', $microtime);
            $microtime=str_replace(' ','', $microtime);
            $fileName = $microtime.'.'.$request->page_img->extension();
            if($request->page_img->move(public_path('upload/'.$upload_dir), $fileName ))
            {
                $fileupload_data = Pages::where('id',$id)->update([
                    'page_img' => $fileName
                ]);
            }
        }
        return redirect()->route('pages.index')->with('success', config('constants.update_msg')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $pages = Pages::where('id',$id)->update([
            'delete_by' => Auth::user()->id ?? 0,
        ]);
        $pages = Pages::where('id',$id)->delete();
        return Response()->json($pages);
    }

    public function pageImageDelete($id)
    {
        $pages = Pages::where('id',$id)->update([
            'page_img' => null,
        ]);
        return response()->json($pages);
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
        $TaxData=Pages::find($id);
        $TaxNumber=$TaxData->page_name; 
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
