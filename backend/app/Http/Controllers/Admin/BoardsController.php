<?php

namespace App\Http\Controllers\Admin;

use App\Board;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Image;

class BoardsController extends Controller
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
        return view('admin.boards.index', ['title' => 'Board Member List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBoards(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'created_at',
            3 => 'action'
        );

        $totalData = Board::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Board::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Board::count();
        } else {
            $search = $request->input('search.value');
            $posts = Board::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Board::where('name', 'like', "%{$search}%")
                ->count();
        }

        $data = array();

        if ($posts) {
            foreach ($posts as $r) {
                $edit_url = route('boards.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="boards[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['name'] = $r->name;
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
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Board Member" href="javascript:void(0)">
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


    public function create()
    {
        return view('admin.boards.create', ['title' => 'Add Board Member',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            /*'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:500',*/
            'name' => 'required|max:255',
            'description' => 'required|max:10000',
        ]);

        $input = $request->all();
        $board = new Board();
        $board->name = $input['name'];
        $board->description = $input['description'];
        if ($request->hasFile('featured_image')) {
            if ($request->file('featured_image')->isValid()) {
                $this->validate($request, [
                    'featured_image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('featured_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension('featured_image');
                $fileName = $file->getClientOriginalName('featured_image');
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('featured_image')->move($destinationPath, $fileName);
                $board->featured_image = $fileName;
                $board->save();
                $newImage = public_path() . "/uploads/post/" . $board->featured_image;
                $thumb_image = Image::make($newImage);
                $thumb_image->fit(300);
                $newThumb = public_path() . "/uploads/thumbnail/" . $board->featured_image;
                $thumb_image->save($newThumb);
            }
        }
        $board->save();
        Session::flash('success_message', 'Great! Boards has been saved successfully!');
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
        $board = Board::findOrFail($id);
        return view('admin.boards.edit', ['title' => 'Update Board Details', 'board' => $board]);

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
        $this->validate($request, [
            /*'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:500',*/
            'name' => 'required|max:255',
            'description' => 'required|max:10000',
        ]);

        $input = $request->all();
        $board = Board::findOrFail($id);
        $board->name = $input['name'];
        $board->description = $input['description'];
        if ($request->hasFile('featured_image')) {
            if ($request->file('featured_image')->isValid()) {
                $this->validate($request, [
                    'featured_image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('featured_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension('featured_image');
                $fileName = $file->getClientOriginalName('featured_image');
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('featured_image')->move($destinationPath, $fileName);
                $delete_old_original_image = "uploads/post/" . $board->featured_image;
                $delete_old_thumbnail_image = "uploads/thumbnail/" . $board->featured_image;
                File::delete($delete_old_original_image, $delete_old_thumbnail_image);
                $board->featured_image = $fileName;
                $board->save();
                 $newImage = public_path() . "/uploads/post/" . $board->featured_image;
                 $thumb_image = Image::make($newImage);
                 $thumb_image->fit(300);
                 $newThumb = public_path() . "/uploads/thumbnail/" . $board->featured_image;
                 $thumb_image->save($newThumb);
            }
        }
        $board->save();
        Session::flash('success_message', 'Great! Board Member successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $board = Board::findOrFail($id);
        $board->delete();
        Session::flash('success_message', 'Board Member successfully deleted!');
        return redirect()->route('boards.index');
    }

    public function deleteSelectedRows(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'boards' => 'required',

        ]);

        foreach ($input['boards'] as $index => $id) {

            $board = Board::findOrFail($id);
            $board->delete();
        }
        Session::flash('success_message', 'Boards successfully deleted!');
        return redirect()->back();

    }

    public function boardDetail(Request $request)
    {
        $board = Board::findOrFail($request->input('id'));
        return view('admin.boards.single', ['title' => 'Board Detail', 'board' => $board,]);
    }

}
