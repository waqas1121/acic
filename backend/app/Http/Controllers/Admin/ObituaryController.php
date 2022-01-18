<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Obituary;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;


class ObituaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        return view('admin.obituaries.index', ['title' => 'Post List']);
    }

    public function getObituaries(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'date_of_death',
            3 => 'date_of_burial',
            4 => 'created_at',
            5 => 'action'
        );

        $totalData = Obituary::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Obituary::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Obituary::count();
        } else {
            $search = $request->input('search.value');
            $posts = Obituary::where('name', 'like', "%{$search}%")
                ->orWhere('date_of_death', 'like', "%{$search}%")
                ->orWhere('date_of_burial', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Obituary::where('title', 'like', "%{$search}%")
                ->count();
        }

        $data = array();

        if ($posts) {
            foreach ($posts as $r) {
                $edit_url = route('obituaries.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="obituaries[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['name'] = $r->name;
                $nestedData['date_of_death'] = $r->date_of_death;
                $nestedData['date_of_burial'] = $r->date_of_burial;
                $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-info btn-circle" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View Details" href="javascript:void(0)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a title="Edit Row" class="btn btn-primary btn-circle"
                                       href="' . $edit_url . '">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Obituary" href="javascript:void(0)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                </div> 
                            ';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.obituaries.create', ['title' => 'Add Obituary']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            /*'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:500',*/
            'name' => 'required|max:255',
            'date_of_death' => 'required',
            'cemetry' => 'required|max:255',
            'date_of_burial' => 'required',
            'description' => 'required|max:10000',
            'image' => 'required',
        ]);
        $input = $request->all();
        $obituary = new Obituary();
        $obituary->name = $input['name'];
        $obituary->cemetry = $input['cemetry'];
        $obituary->date_of_death = $input['date_of_death'];
        $obituary->date_of_burial = $input['date_of_burial'];
        $obituary->description = $input['description'];

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension('image');
                $fileName = $file->getClientOriginalName('image');
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('image')->move($destinationPath, $fileName);
                $obituary->image = $fileName;
                $obituary->save();
                $newImage = public_path() . "/uploads/post/" . $obituary->image;
                $thumb_image = Image::make($newImage);
                $thumb_image->fit(300);
                $newThumb = public_path() . "/uploads/thumbnail/" . $obituary->image;
                $thumb_image->save($newThumb);
            }
        }
        $obituary->save();
        Session::flash('success_message', 'Great! Obituary has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obituary = Obituary::findOrFail($id);
        return view('admin.obituaries.edit', ['title' => 'Update Obituary Details', 'obituary' => $obituary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            /*'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:500',*/
            'name' => 'required|max:255',
            'date_of_death' => 'required',
            'cemetry' => 'required|max:255',
            'date_of_burial' => 'required',
            'description' => 'required|max:10000',
        ]);

        $input = $request->all();
        $obituary = Obituary::findOrFail($id);
        $obituary->name = $input['name'];
        $obituary->cemetry = $input['cemetry'];
        $obituary->date_of_death = $input['date_of_death'];
        $obituary->date_of_burial = $input['date_of_burial'];
        $obituary->description = $input['description'];
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension('image');
                $fileName = $file->getClientOriginalName('image');
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('image')->move($destinationPath, $fileName);
                $delete_old_original_image = "uploads/post/" . $obituary->image;
                $delete_old_thumbnail_image = "uploads/thumbnail/" . $obituary->image;
                File::delete($delete_old_original_image, $delete_old_thumbnail_image);
                $obituary->image = $fileName;
                $obituary->save();
                $newImage = public_path() . "/uploads/post/" . $obituary->image;
                $thumb_image = Image::make($newImage);
                $thumb_image->fit(300);
                $newThumb = public_path() . "/uploads/thumbnail/" . $obituary->image;
                $thumb_image->save($newThumb);
            }
        }
        $obituary->save();
        Session::flash('success_message', 'Great! Obituary successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obituary = Obituary::findOrFail($id);
        $obituary->delete();
        Session::flash('success_message', 'Obituary successfully deleted!');
        return redirect()->route('obituaries.index');
    }

    public function deleteSelectedRows(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'obituaries' => 'required',

        ]);

        foreach ($input['obituaries'] as $index => $id) {

            $post = Obituary::findOrFail($id);
            $post->delete();
        }
        Session::flash('success_message', 'Obituaries successfully deleted!');
        return redirect()->back();

    }

    public function obituaryDetail(Request $request)
    {
        $obituaries = Obituary::findOrFail($request->input('id'));
        return view('admin.obituaries.single', ['title' => 'Obituary Detail', 'obituaries' => $obituaries,]);
    }
}
