<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::pluck('value','name')->all();
        $all_columns =array(
            array(
                'name'=>'site_title',
                'id'=>'site_title',
                'type'=>'text',
                'label'=>'Site Title',
                'place_holder'=>'Enter Site Title',
                'class'=>'form-control',
                'style'=>'width:30px;max-width:100%;margin-top:12px'
            ),
            array(
                'name'=>'phone',
                'id'=>'meta_keywords',
                'type'=>'text',
                'label'=>'Phone',
                'place_holder'=>'Enter Your Phone',
                'class'=>'form-control',
                'style'=>'width:30px;max-width:100%;margin-top:12px',
            ),
            array(
                'name'=>'adress',
                'id'=>'meta_desc',
                'type'=>'text',
                'label'=>'Address',
                'place_holder'=>'Enter Your Address',
                'class'=>'form-control',
                'style'=>'width:30px;max-width:100%;margin-top:12px',
            ),
            array(
                'name' => 'favicon',
                'id' => 'favicon',
                'type' => 'file',
                'label' => 'Favicon (Png)',
                'class' => 'form-control',
                'style' => 'width:60px;max-width:100%;margin-top:12px'
            ),
            array(
                'name'=>'favicon',
                'type'=>'hidden',
                'value'=>'',

            ),
            array(
                'name'=>'logo',
                'id'=>'logo',
                'type'=>'file',
                'label'=>'Login Page Logo',
                'class'=>'form-control',
                'style'=>'width:120px;max-width:100%;margin-top:12px'
            ),
            array(
                'name'=>'logo',
                'type'=>'hidden',
                'value'=>'',

            ),
            array(
                'name'=>'admin_logo',
                'id'=>'admin_logo',
                'type'=>'file',
                'label'=>'Admin Logo',
                'class'=>'form-control',
                'style'=>'width:120px;max-width:100%;margin-top:12px'
            ),
            array(
                'name'=>'admin_logo',
                'type'=>'hidden',
                'value'=>'',
            ),
            array(
                'name'=>'video_url',
                'id'=>'video_url',
                'type'=>'text',
                'label'=>'Youtube Channel Link',
                'place_holder'=>'Enter Youtube Channel Link',
                'class'=>'form-control',
            ),
            array(
                'name'=>'live_streaming',
                'id'=>'live_streaming',
                'type'=>'text',
                'label'=>'Live Streaming Link',
                'place_holder'=>'Enter Live Streaming Link',
                'class'=>'form-control',
            ),

            array(
                'name'=>'email',
                'id'=>'email',
                'type'=>'text',
                'label'=>'Receiver Email',
                'place_holder'=>'Enter email where you want to get emails',
                'class'=>'form-control',
            ),
            array(
                'name'=>'facebook',
                'id'=>'facebook',
                'type'=>'text',
                'label'=>'Facebook URL',
                'place_holder'=>'Enter your facebook URL',
                'class'=>'form-control',
            ),

            array(
                'name'=>'instagram',
                'id'=>'instagram',
                'type'=>'text',
                'label'=>'Instagram URL',
                'place_holder'=>'Enter your instagram URL',
                'class'=>'form-control',

            ),
            array(
                'name'=>'twitter',
                'id'=>'twitter',
                'type'=>'text',
                'label'=>'Twitter URL',
                'place_holder'=>'Enter your twitter URL',
                'class'=>'form-control',
            ),
            array(
                'name'=>'auth_page_heading',
                'id'=>'auth_page_heading',
                'type'=>'text',
                'label'=>'Auth Page Heading',
                'place_holder'=>'',
                'class'=>'form-control',
            ),
            array(
                'name'=>'auth_page_desc',
                'id'=>'auth_page_desc',
                'type'=>'textarea',
                'label'=>'Auth Page Description',
                'place_holder'=>'',
                'class'=>'form-control',
            ),
            array(
                'name'=>'payp_pal_id',
                'id'=>'payp_pal_id',
                'type'=>'text',
                'label'=>'Paypal Id',
                'place_holder'=>'Enter Paypal Id',
                'class'=>'form-control',
            ),
            array(
                'name'=>'copy_right',
                'id'=>'copy_right',
                'type'=>'text',
                'label'=>'Copyright Text',
                'place_holder'=>'Enter Copyright text',
                'class'=>'form-control',
            ),
        );
        return view('admin.settings.index', ['title' => 'Site Setting','settings'=>$settings,
            'all_columns'=>$all_columns]);
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
        $input = $request->all();
        $settings = Setting::pluck('value', 'name')->all();

        $data = array();
        if(!empty($request->file())){

            foreach($request->file() as $name=>$file_data){

                if ($request->hasFile($name)) {

                    if ($request->file($name)->isValid()) {

                        $this->validate($request, [
                            $name => 'required|mimes:jpeg,png,jpg,audio/mpeg,mpga,mp3,wav'
                        ]);

                        $file = $request->file($name);

                        $fileName = $file->getClientOriginalName();

                        $newFileName = rand().$fileName;

                        $destinationPath = public_path('/uploads/');

                        $request->file($name)->move($destinationPath,$newFileName);

                        if (isset($settings[$name])) {
                            if (file_exists(public_path('/uploads/'.$settings[$name]))) {

                                $delete_old_file = public_path('/uploads/'.$settings[$name]);

                                File::delete($delete_old_file);
                            }
                        }

                        $data[$name] = $newFileName;
                    }
                }
            }
        }

        DB::table('settings')->truncate();

        unset($input['_token']);

        unset($input['_method']);

        if(count($data)>0){
            $input = array_merge($input,$data);
        }
        foreach ($input as $key => $value) {
            $setting = new Setting();

            $setting->name = $key;

            $setting->value = $value;

            $setting->save();

        }
        Session::flash('success_message', 'Settings saved successfully!');

        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
