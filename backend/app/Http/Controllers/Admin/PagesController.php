<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Pages;
use DB;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('select * from cms');
        return view('admin.pages.index',['cms'=>$data]);
    }
    
    public function edit($id){
        
        $page = Pages::findOrFail($id);
        return view('admin.pages.edit',['title' => 'Update Page Details', 'obituary' => $page]);
    }
    
    
    
    public function update(Request $request,$id){
        
        $obituary = Pages::findOrFail($id);
        $obituary->title = $request['title'];
        $obituary->content = $request['content'];
        $obituary->save();
        Session::flash('success_message', 'Great! Obituary successfully updated!');
        return redirect()->back();
    }
    
    public function destroy($id){
        
        $daata = Pages::findOrFail($id);
        $daata->delete();
        
        Session::flash('success_message', 'Page successfully deleted!');
        return redirect()->route('pages.index');
    }
    
    public function newpage(){
        
       return view('admin.pages.create');
    }
    
    public function store(Request $request){
        
        $input = $request->all();
        
        $this->validate(request(),[
            //put fields to be validated here
            ]);         
       
       $user= new Pages();
        $user->title= $request['title'];
        $user->content= $request['content'];
    // add other fields
    $user->save();

            
        
        Session::flash('success_message', 'Great! Page has been saved successfully!');
        return redirect()->back();
    }
    
   

}
