<?php

namespace App\Http\Controllers;

use App\Models\{Testimonial};
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\DataTables\TestimonialDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Spatie\Activitylog\Models\Activity;
use Hash;
use Auth;
use File;
use DB;
use Str;


class TestimonialController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','show']]);
         $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
         $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TestimonialDataTable $dataTable)
    {
        return $dataTable->render('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $validated = $request->all();
        $testimonial = Testimonial::create($validated);

        $upload_dir='testimonial';
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
                $fileupload_data = Testimonial::where('id',$testimonial->id)->update([
                    'image' => $fileName
                ]);
            }
        }

        return redirect()->route('testimonial.index')->with('success', 'Testimonial Added Successfully' );
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
        $testimonial = Testimonial::find($id);
        if(blank($testimonial) && empty($testimonial) && !isset($testimonial))
        {
            return  redirect()->route('testimonial.index')->with('error', 'No Data Found');
        }
        return view('admin.testimonial.edit' ,compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        $validated = $request->all();
        $validated['updated_by'] = Auth::user()->id;
        unset($validated['_token']);
        unset($validated['_method']);
        $testimonialold = Testimonial::where('id', $id)->first();
        $testimonial = Testimonial::where('id',$id)->firstOrFail()->update($validated);

        $upload_dir='testimonial';
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
                if (!empty($testimonialold->image) && File::exists($path . '/' . $testimonialold->image)) {
                    File::delete($path . '/' . $testimonialold->image);
                }
                $fileupload_data = Testimonial::where('id',$id)->update([
                    'image' => $fileName
                ]);
            }
        }
        return redirect()->route('testimonial.index')->with('success', 'Testimonial Update Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image) {
            File::delete(public_path('upload/testimonial/' . $testimonial->image));
        }
        $testimonial = Testimonial::where('id',$id)->firstOrFail()->update(['delete_by' => Auth::user()->id]);
        $testimonial = Testimonial::where('id',$id)->delete();
        return Response()->json($testimonial);
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
        ->where('subject_type','App\Models\Testimonial')
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
        ->where('subject_type','App\Models\Testimonial')
        ->where('subject_id',$id)
        ->whereNotIn('event',['created'])
        ->orderBy('id','DESC')
        ->limit(5)->get()->toArray();
        $TaxData=Testimonial::find($id);
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


    public function testimonialImageDelete($id)
    {
        $testimonial = Testimonial::where('id',$id)->update([
            'image' => null,
        ]);
        return response()->json($testimonial);
    }
}
