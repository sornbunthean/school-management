@extends('layouts.master')
@section('header')
    <strong>Import Employees</strong>
@endsection
@section('content')
    <div class="card">
        <div class="card-block">
          
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>
                        {{session('success')}}
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            <form action="{{url('employee/import/save')}}" method="POST" 
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label for="import_file" class="col-sm-3">File <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="import_file" 
                                    name='import_file' required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button class="btn btn-primary btn-oval btn-sm">
                                    <i class="fa fa-save"></i> Import Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection