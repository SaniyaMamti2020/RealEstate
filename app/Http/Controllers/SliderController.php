<?php

namespace App\Http\Controllers;

use App\Models\{Slider};
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\DataTables\SliderDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Spatie\Activitylog\Models\Activity;
use Hash;
use Auth;
use File;
use DB;


class SliderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','show']]);
         $this->middleware('permission:slider-create', ['only' => ['create','store']]);
         $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderDataTable $dataTable)
    {
        $sliderData = Slider::where('status',1)->get();
        return $dataTable->render('admin.slider.index',compact('sliderData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $validated = $request->all();
        $slider = Slider::create($validated);

        $upload_dir='slider';
        $path = public_path('upload/'.$upload_dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if(isset($request->slider_img) && !empty($request->slider_img))
        {
            $microtime=microtime();
            $microtime=str_replace('.','', $microtime);
            $microtime=str_replace(' ','', $microtime);
            $fileName = $microtime.'.'.$request->slider_img->extension();
            if($request->slider_img->move(public_path('upload/'.$upload_dir), $fileName ))
            {
                $fileupload_data = Slider::where('id',$slider->id)->update([
                    'slider_img' => $fileName
                ]);
            }
        }

        return redirect()->route('slider.index')->with('success', 'Slider Added Successfully' );
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
        $slider = Slider::find($id);
        if(blank($slider) && empty($slider) && !isset($slider))
        {
            return  redirect()->route('slider.index')->with('error', 'No Data Found');
        }
        return view('admin.slider.edit' ,compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $validated = $request->all();
        $validated['updated_by'] = Auth::user()->id;
        unset($validated['_token']);
        unset($validated['_method']);
        $sliderold = Slider::where('id', $id)->first();
        $slider = Slider::where('id',$id)->firstOrFail()->update($validated);
       
        $upload_dir='slider';
        $path = public_path('upload/'.$upload_dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if(isset($request->slider_img) && !empty($request->slider_img))
        {
            $microtime=microtime();
            $microtime=str_replace('.','', $microtime);
            $microtime=str_replace(' ','', $microtime);
            $fileName = $microtime.'.'.$request->slider_img->extension();
            if($request->slider_img->move(public_path('upload/'.$upload_dir), $fileName ))
            {
                if (!empty($sliderold->slider_img) && File::exists($path . '/' . $sliderold->slider_img)) {
                    File::delete($path . '/' . $sliderold->slider_img);
                }
                $fileupload_data = Slider::where('id',$id)->firstOrFail()->update([
                    'slider_img' => $fileName
                ]);
            }
        }

        return redirect()->route('slider.index')->with('success', 'Slider Update Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $slider = Slider::findOrFail($id);

        if ($slider->slider_img) {
            File::delete(public_path('upload/slider/' . $slider->slider_img));
        }
        $slider = Slider::where('id',$id)->firstOrFail()->update(['delete_by' => Auth::user()->id]);
        $slider = Slider::where('id',$id)->delete();
        return Response()->json($slider);
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
        ->where('subject_type','App\Models\Slider')
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
        ->where('subject_type','App\Models\Slider')
        ->where('subject_id',$id)
        ->whereNotIn('event',['created'])
        ->orderBy('id','DESC')
        ->limit(5)->get()->toArray();
        $TaxData=Slider::find($id);
        $TaxNumber=$TaxData->title; 
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
