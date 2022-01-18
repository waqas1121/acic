@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Pages</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('pages.index') }}">Dashboard</a></li>
                    <li class="active">Manage Pages</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
-
                    <div class="btn-group pull-right" role="group">
                        
                        <a class="btn btn-success" href="{{asset('admin/pagess/newpage')}}">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                    </div>

                    <h3 class="box-title m-b-0">Manage Pages</h3>
                    <p class="text-muted m-b-30">Pages List</p>
                    <div class="table-responsive">
                        
                            <table  class="table table-striped responsive nowrap" width="100%">
                                <thead>
                                
                                <th>Id</th>
                                <th>Title</th>
                                
                                <th>Action</th>
                                </thead>
                                
                                <tbody>
                                   @foreach ($cms as $page)
                                    <tr role="row" class="odd">
                                        
                            <td>{{ $page->id }}</td>
                            <td>{{$page->title}}</td>
                            
                            <td>
                                <div>
                                
                                    <a class="btn btn-info btn-circle" href="{{asset('/admin/pages/')}}/destroy/{{$page->id}}" onclick="return confirm('Are you sure you want to delete?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a title="Edit Row" class="btn btn-primary btn-circle" href="{{asset('/admin/pages/')}}/edit/{{$page->id}}">
                                       <i class="fa fa-edit"></i>
                                    </a>
                              
                                
                                </div> 
                            </td>
                            </tr>
                            @endforeach
                            
                            
                          
                            </tbody>
                            
                            </table>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


@stop
