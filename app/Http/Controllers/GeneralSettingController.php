<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use File;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generalSetting = GeneralSetting::first();
        return view('admin.general-setting.index',['generalSetting'=>$generalSetting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generalSetting = GeneralSetting::first();
        if(isset($generalSetting) && !empty($generalSetting) && $generalSetting != null)  //UPDATE
        {
            $id = $generalSetting->id;
            $validated = $request->all();
            unset($validated['_token']);
            unset($validated['_method']);
            $generalSetting = GeneralSetting::where('id',$id)->update($validated);

            $upload_dir='generalsetting';
            $path = public_path('upload/'.$upload_dir);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            if(isset($request->icon_img) && !empty($request->icon_img))
            {
                $microtime=microtime();
                $microtime=str_replace('.','', $microtime);
                $microtime=str_replace(' ','', $microtime);
                $fileName = $microtime.'.'.$request->icon_img->extension();
                if($request->icon_img->move(public_path('upload/'.$upload_dir), $fileName ))
                {
                    $fileupload_data = GeneralSetting::where('id',$id)->update([
                        'icon_img' => $fileName
                    ]);
                }
            }
            if(isset($request->logo_img) && !empty($request->logo_img))
            {
                $microtime=microtime();
                $microtime=str_replace('.','', $microtime);
                $microtime=str_replace(' ','', $microtime);
                $fileName = $microtime.'.'.$request->logo_img->extension();
                if($request->logo_img->move(public_path('upload/'.$upload_dir), $fileName ))
                {
                    $fileupload_data = GeneralSetting::where('id',$id)->update([
                        'logo_img' => $fileName
                    ]);
                }
            }

            if(isset($request->footer_logo_img) && !empty($request->footer_logo_img))
            {
                $microtime=microtime();
                $microtime=str_replace('.','', $microtime);
                $microtime=str_replace(' ','', $microtime);
                $fileName = $microtime.'.'.$request->footer_logo_img->extension();
                if($request->footer_logo_img->move(public_path('upload/'.$upload_dir), $fileName ))
                {
                    $fileupload_data = GeneralSetting::where('id',$id)->update([
                        'footer_logo_img' => $fileName
                    ]);
                }
            }

            return back()->with('success', config('constants.update_msg'));
            //return response()->json(['success'=> config('constants.update_msg')]);
        }
        else //INSERT
        {
            $validated = $request->all();
            $generalSetting = GeneralSetting::create($validated);

            $upload_dir='generalsetting';
            $path = public_path('upload/'.$upload_dir);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            if(isset($request->icon_img) && !empty($request->icon_img))
            {
                $microtime=microtime();
                $microtime=str_replace('.','', $microtime);
                $microtime=str_replace(' ','', $microtime);
                $fileName = $microtime.'.'.$request->icon_img->extension();
                if($request->icon_img->move(public_path('upload/'.$upload_dir), $fileName ))
                {
                    $fileupload_data = GeneralSetting::where('id',$generalSetting->id)->update([
                        'icon_img' => $fileName
                    ]);
                }
            }
            if(isset($request->logo_img) && !empty($request->logo_img))
            {
                $microtime=microtime();
                $microtime=str_replace('.','', $microtime);
                $microtime=str_replace(' ','', $microtime);
                $fileName = $microtime.'.'.$request->logo_img->extension();
                if($request->logo_img->move(public_path('upload/'.$upload_dir), $fileName ))
                {
                    $fileupload_data = GeneralSetting::where('id',$generalSetting->id)->update([
                        'logo_img' => $fileName
                    ]);
                }
            }

            if(isset($request->footer_logo_img) && !empty($request->footer_logo_img))
            {
                $microtime=microtime();
                $microtime=str_replace('.','', $microtime);
                $microtime=str_replace(' ','', $microtime);
                $fileName = $microtime.'.'.$request->footer_logo_img->extension();
                if($request->footer_logo_img->move(public_path('upload/'.$upload_dir), $fileName ))
                {
                    $fileupload_data = GeneralSetting::where('id',$generalSetting->id)->update([
                        'footer_logo_img' => $fileName
                    ]);
                }
            }
            return back()->with('success', config('constants.add_msg'));
            //return response()->json(['success'=> config('constants.add_msg')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
