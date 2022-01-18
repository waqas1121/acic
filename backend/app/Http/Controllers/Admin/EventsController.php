<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.events.index', ['title' => 'Events List']);
    }

    public function getEvents(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'from_date',
            3 => 'to_date',
            4 => 'created_at',
            5 => 'action'
        );

        $totalData = Event::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $events = Event::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Event::count();
        } else {
            $search = $request->input('search.value');
            $events = Event::where('title', 'like', "%{$search}%")
                ->orWhere('from_date', 'like', "%{$search}%")
                ->orWhere('to_date', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Event::where('title', 'like', "%{$search}%")
                ->orWhere('from_date', 'like', "%{$search}%")
                ->orWhere('to_date', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }


        $data = array();

        if ($events) {
            foreach ($events as $r) {
                $edit_url = route('events.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="events[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['title'] = $r->title;
                $nestedData['from_date'] = $r->from_date;
                $nestedData['to_date'] = $r->to_date;
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
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Event" href="javascript:void(0)">
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
        return view('admin.events.create', ['title' => 'Add Events']);
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
            'title' => 'required|max:255',
            'from_date' => 'required|max:255',
            'to_date' => 'required|max:255',
            'description' => 'required|max:10000',
        ]);
        $input = $request->all();
        $event = new Event();
        $event->title = $input['title'];
        $event->description = $input['description'];
        $event->from_date = $input['from_date'];
        $event->to_date = $input['to_date'];
        $event->save();
        Session::flash('success_message', 'Great! Events has been saved successfully!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', ['title' => 'Update Event Details', 'event' => $event]);

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
        $event=Event::findorfail($id);
        $this->validate($request, [
            'title' => 'required|max:255',
            'from_date' => 'required|max:255',
            'to_date' => 'required|max:255',
            'description' => 'required|max:10000',
        ]);
        $input = $request->all();
        $event->title = $input['title'];
        $event->description = $input['description'];
        $event->from_date = $input['from_date'];
        $event->to_date = $input['to_date'];
        $event->save();
        Session::flash('success_message', 'Great! Event has been saved successfully!');
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
        $event = Event::findOrFail($id);
        $event->delete();
        Session::flash('success_message', 'Event successfully deleted!');
        return redirect()->route('events.index');
    }

    public function deleteSelectedRows(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'events' => 'required',

        ]);

        foreach ($input['events'] as $index => $id) {

            $post = Event::findOrFail($id);
            $post->delete();
        }
        Session::flash('success_message', 'Events successfully deleted!');
        return redirect()->back();

    }

    public function eventDetail(Request $request)
    {
        $event = Event::findOrFail($request->input('id'));
        return view('admin.events.single', ['title' => 'Event Detail', 'event' => $event]);
    }

    public function showEvents()
    {
        $events=Event::get();
        return view('admin.events.events', ['title' => 'Events','events'=>$events,]);
    }


}
