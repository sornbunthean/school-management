@extends('layouts.master')
@section('header')
    <h3>Edit student</h3>
@endsection
@section('content')
<div class="card-body">
      <div class="heading-layout1">
            <div class="item-title">
                  <h3>Student form</h3>
            </div>        
      </div>
      @if(Session::has('success') )
      <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      @endif
      @if(Session::has('error') )
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      @endif
      <form action="{{ route('student.update') }}" class="new-added-form" data-select2-id="18" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method(PATCH)
            <div class="row">
                  <div class="col-md-8 col-8">
                        <div class="row">
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="first_name">Fist Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" autofocus required value="{{ $student->first_name }}">
                              </div>
                              
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}">
                              </div>
                              <!--Father information -->
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="father_name">Father Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" value="{{ $student->father_name }}">
                              </div>
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="mother_name">Mother Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" value="{{ $student->mother_name }}">
                              </div>

                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label>Gender  <span class="text-danger">*</span></label>
                                    <select class="select2" id="gernder" name="gender">
                                        <option value="{{ $student->gender }}">Please Select Gender</option>
                                        <option value="{{ $student->gender }}" >Male</option>
                                        <option value="{{ $student->gender }}" >Female</option>
                                        <option value="{{ $student->gender }}" >Others</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="date">Date Of Birth <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right' name="dob" id="date" value="{{ $student->dob }}">
                                    <i class="far fa-calendar-alt"></i>
                                </div>

                                <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label>Religion  <span class="text-danger">*</span></label>
                                    <select class="select2" id="religion" name="religion">
                                        <option value="">Please Select Religion</option>
                                        <option value="islam" >Islam</option>
                                        <option value="hindu" >Hindu</option>
                                        <option value="chrisian" >Christian</option>
                                        <option value="buddhism" >Buddism</option>
                                        <option value="other" >Others</option>
                                    </select>
                                </div>

                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="email">E-Mail<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required value="{{ $student->email }}">
                              </div>
                                    
                              <div class="col-md-6 col-lg-6 col-6 form-group">
                                    <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                              </div>
                        </div>
                                                
                  </div> 
                  <div class="col-md-4 col-4">
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                              <label class="text-dark-medium">Upload User Photo</label>
                              <input type="file" class="form-control-file" name="photo" accept="image/x-png,image/gif,image/jpeg" 
                                    onchange="preview(event)">
                              <p style="margin-top:10px;">
                                    <img src="{{ $student->photo }}" alt="" id="img" width="200" class="img-thumbnail">
                              </p>
                             
                        </div>
                  </div>  
            </div>
            <div class="row">
                  <div class="col-12 form-group mg-t-8">
                        <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        <a href="{{ route('student.index') }}" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
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