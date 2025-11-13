<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User};
use Auth;
use Hash;

class CommonController extends Controller
{
    public function changeStatus(Request $request)
    {
        //dd($request->modal);
        if($request->modal == 'Policy')
        {

            $model_name = '\App\Models\\'.$request->modal;
            if($request->status == 1)
            {
                $model_name::where('id','!=',$request->id)->update(['status' => 0]);
                $data = $model_name::where('id',$request->id)->update(['status' => $request->status]);
            }
            else
            {
                $data = $model_name::where('id',$request->id)->update(['status' => $request->status]);
            }
        }
        else
        {
            $model_name = '\App\Models\\'.$request->modal;
            $data = $model_name::where('id',$request->id)->update(['status' => $request->status]);
        }
        
       return redirect()->back()->with('success', 'Added Success' );
    }

    public function changePosition(Request $request)
    {
        $model_name = '\App\Models\\'.$request->modal;
        $fieldName = $request->field_name;
        if(isset($request->list_order) && !empty($request->list_order))
        {
            $list = explode(',' , $request->list_order);
            $oi = 1 ;
            foreach($list as $id) {
                $dbid=explode("_",$id);
                $myid=$dbid[1];
                $activitiesdata = $model_name::where($fieldName,$myid)->update([
                    'disp_order' => $oi,
                ]);
                $oi++;
            }
            echo 1;
            exit;
        }
        else
        {
            echo 0;
            exit;
        }
    }

    public function cacheClearGet()
    {
        return view('admin.clear-cache');
    }

    public function cacheClearpost()
    {
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        return redirect()->route('dashboard')->with(['success' => 'Clear Cache Successfully']);
    }

    public function changePassword()
    {
        if(Auth::user() != null)
        {
            return view('admin.change-password');
        }
        else
        {
            return redirect('/admin');
        }
    }

    public function changePasswordPost(Request $request)
    {
        if(Auth::user() != null)
        {
            $request->validate([
              'old_password' => 'required|required',
              'password' => 'required|confirmed',
              'password_confirmation' => 'required'
            ]);
            $userId = Auth::user()->id;
            $user = User::where('id',$userId)->where('user_type','admin')->first();
            if(Hash::check($request->old_password, $user->password))
            {
                User::where('id',$userId)->update(['password' => Hash::make($request->password)]);
                return redirect()->route('dashboard')->with('success','Password Change Successfully');
            }
            else
            {
                return back()->withErrors(['old_password'=> 'Old Password is wrong']);
            }
        }
        else
        {
            return redirect('/admin');
        }
    }
}
