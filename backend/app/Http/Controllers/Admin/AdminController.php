<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;

use App\Admin;
use App\Post;
use App\Prayer;
use App\Privacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["total_categories"] = Category::get()
            ->count();
        $data["total_posts"] = Post::get()
            ->count();
        $data["total_events"] = Event::get()
            ->count();
        $admin = Admin::get();
        return view('admin.dashboard.index', ['admin' => $admin, 'data' => $data]);
    }

    public function edit()
    {
        $admin = Auth::user();
        return view('admin.admin.edit', ['title' => 'Edit Admin'])->withAdmin($admin);
    }

    public function update(Request $request)
    {
        $admin = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:admins,email,' . $admin->id,
        ]);
        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = $admin->password;
        } else {
            $input['password'] = bcrypt($input['password']);
        }
        $admin->fill($input)->save();
        Session::flash('success_message', 'Great! admin successfully updated!');
        return redirect()->back();
    }

    public function importPrayer()
    {
        $data_file = public_path('data/PrayerTime.json');
        $content = File::get($data_file);
        $columns = json_decode($content, TRUE);
        $months = $columns['data'];
        foreach ($months as $index => $value) {
            $day = $columns['data'][$index];
            foreach ($day as $r) {
                $prayer = new Prayer();
                $prayer->month = $index;
                $prayer->month_name = $r['date']['gregorian']['month']['en'];
                $prayer->day = $r['date']['gregorian']['day'];
                $prayer->Fajr = $r['timings']['Fajr'];
                $prayer->Sunrise = $r['timings']['Sunrise'];
                $prayer->Dhuhr = $r['timings']['Dhuhr'];
                $prayer->Asr = $r['timings']['Asr'];
                $prayer->Sunset = $r['timings']['Sunset'];
                $prayer->Maghrib = $r['timings']['Maghrib'];
                $prayer->Imsak = $r['timings']['Imsak'];
                $prayer->Midnight = $r['timings']['Midnight'];
                $prayer->Isha = $r['timings']['Isha'];
                $prayer->save();
            }
        }
        dd("ss");
    }

    public function privacyPolicy()
    {
        $privacy=Privacy::findorfail(1);
        return view('admin.privacy.privacy_policy',['privacy'=>$privacy]);
        /*$privacy=Privacy::findorfail(1);
        $privacy->description=$request->description;
        $privacy->save();
        Session::flash('success_message', 'Great! Privacy has been saved successfully!');
        return redirect()->back();*/
    }

    public function privacyPolicyUpdate(Request $request,$id)
    {
        $privacy=Privacy::findorfail($id);
        $privacy->description=$request->description;
        $privacy->save();
        Session::flash('success_message', 'Great! admin successfully updated!');
        return redirect()->back();
        /*$privacy=Privacy::findorfail(1);
        $privacy->description=$request->description;
        $privacy->save();
        Session::flash('success_message', 'Great! Privacy has been saved successfully!');
        return redirect()->back();*/
    }

    public function configCache()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return redirect()->back();
    }
}
