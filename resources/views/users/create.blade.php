@extends('layouts.master')
@section('header')
    <h3>Create user</h3>
@endsection
@section('content')
<div class="card-body">
      <div class="heading-layout1">
            <div class="item-title">
                  <h3>Add new user</h3>
            </div>        
      </div>
      <form action="{{ route('user.store') }}" class="new-added-form" data-select2-id="18" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                  <div class="col-md-8 col-8">
                        <div class="row">
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" autofocus required value="{{ old('name') }}">
                              </div>
                              
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                              </div>

                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="email">Email Address<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                              </div>
                                    
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" >
                              </div>
                        </div>
                                                
                  </div> 
                  <div class="col-md-4 col-4">
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                              <label class="text-dark-medium">Upload User Photo</label>
                              <input type="file" class="form-control-file" name="photo" accept="image/x-png,image/gif,image/jpeg" 
                                    onchange="preview(event)">
                              <p style="margin-top:10px;">
                                    <img src="" alt="" id="img" width="200" class="img-thumbnail">
                              </p>
                             
                        </div>
                  </div>  
            </div>
            <div class="row">
                  <div class="col-12 form-group mg-t-8">
                        <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        <a href="{{ route('user.index') }}" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
                  </div>
            </div>
      </form>
</div>
@endsection
@section('js')
      <script>
            function preview(evt){
               let img = document.getElementById('img');
               img.src = URL.createObjectURL(evt.target.files[0]);
            }
        </script> 
@endsection