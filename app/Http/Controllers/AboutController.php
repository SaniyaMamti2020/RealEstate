<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use File;
use Auth;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index',['about'=>$about]);
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
        $about = About::first();
        if(isset($about) && !empty($about) && $about != null)  //UPDATE
        {
            $id = $about->id;
            $validated = $request->all();
            $validated['updated_by'] = Auth::user()->id;
            unset($validated['_token']);
            unset($validated['_method']);
            $about = About::where('id',$id)->update($validated);

            $upload_dir='about';
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
                    $fileupload_data = About::where('id',$id)->update([
                        'page_img' => $fileName
                    ]);
                }
            }

            return back()->with('success', config('constants.update_msg'));
            //return response()->json(['success'=> config('constants.update_msg')]);
        }
        else //INSERT
        {
            $validated = $request->all();
            $about = About::create($validated);

            $upload_dir='about';
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
                    $fileupload_data = About::where('id',$about->id)->update([
                        'page_img' => $fileName
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
