<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Month;
use App\Post;
use App\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.prayers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrayers(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'month_name',
            2 => 'day',
            3 => 'created_at',
            4 => 'action'
        );

        $totalData = Prayer::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Prayer::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Prayer::count();
        } else {
            $search = $request->input('search.value');
            $posts = Prayer::where('month_name', 'like', "%{$search}%")
                ->orWhere('day', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Prayer::where('month_name', 'like', "%{$search}%")
                ->orWhere('day', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }

        $data = array();

        if ($posts) {
            foreach ($posts as $r) {
                $edit_url = route('prayers.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="months[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['month_name'] = $r->month_name;
                $nestedData['day'] = $r->day;
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
        $months = Month::pluck('name', 'id');
        return view('admin.prayers.create', ['months' => $months, 'title' => 'Add Prayer']);
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
            'month' => 'required',
            'title' => 'required|max:255',
            'time' => 'required|',
        ]);
        $time = $request->input('time');
        $title = $request->input('title');
        for ($i = 0; $i < count($time); $i++) {
            $prayer = new Prayer();
            if ($time[$i] != "" && $title[$i] != "") {
                $prayer->month_id = $request->month;
                $prayer->title = $title[$i];
                $prayer->time = Carbon::now($time[$i])->format('g:i A');
                /* if ($amount[0]){
                     dd($amount[$i]);
                 }*/
                $prayer->save();
            }
        }
        Session::flash('success_message', 'Great! Prayers has been saved successfully!');
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
        $prayers = Prayer::findorfail($id);
        return view('admin.prayers.edit', ['title' => 'Update Prayer Details', 'prayers' => $prayers]);
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
            'Imsak' => 'required',
            'Fajr' => 'required',
            'Sunrise' => 'required',
            'Dhuhr' => 'required',
            'Sunset' => 'required',
            'Maghrib' => 'required',
        ]);
        $prayer = Prayer::findOrFail($id);
        $prayer->Imsak = $request->input('Imsak');
        $prayer->Fajr = $request->input('Fajr');
        $prayer->Sunrise = $request->input('Sunrise');
        $prayer->Dhuhr = $request->input('Dhuhr');
        $prayer->Sunset = $request->input('Sunset');
        $prayer->Maghrib = $request->input('Maghrib');
        $prayer->save();
        Session::flash('success_message', 'Great! Prayer has been updated successfully!');
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
        $prayer = Prayer::findOrFail($id);
        $prayer->delete();
        Session::flash('success_message', 'Prayer deleted successfully!');
        return redirect()->route('prayers.index');
    }

    public function deleteSelectedRows(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'months' => 'required',
        ]);

        foreach ($input['months'] as $index => $id) {

            $month = Month::findOrFail($id);
            $month->delete();
        }
        Session::flash('success_message', 'Prayer successfully deleted!');
        return redirect()->back();
    }

    public function prayerDetail(Request $request)
    {

        $prayer = Prayer::findOrFail($request->input('id'));


        return view('admin.prayers.single', ['title' => 'Prayer Detail', 'prayer' => $prayer]);
    }

    public function getDate()
    {
        return view('admin.prayers.date');
    }

    public function searchRecordByDate(Request $request)
    {
        $month = Carbon::createFromFormat('Y-m-d', $request->date)->month;
        $day = Carbon::createFromFormat('Y-m-d', $request->date)->day;
        $prayers = Prayer::where('month', $month)
            ->where('day', $day)
            ->first();
        return view('admin.prayers.edit', ['title' => 'Update Prayer Details', 'prayers' => $prayers]);
    }
}
