@extends('layouts.master')
@section('header')
    <h3>Department</h3>
@endsection
@section('content')
<div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <a href="{{ route('department.create') }}" class="btn btn-lg btn-oval btn-success">
                              Create
                        </a>
                    </div>
                </div>
                <form class="mg-b-20">
                    <div class="row gutters-8">
                        <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by Roll ..." class="form-control">
                        </div>
                        <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by Name ..." class="form-control">
                        </div>
                        <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by Class ..." class="form-control">
                        </div>
                        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                        </div>
                    </div>
                </form>
                @if(Session::has('success') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                @endif
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table display data-table text-nowrap dataTable no-footer" id="DataTables_Table_0" role="grid">
                        <thead>
                            <tr role="row">
                                  <th class="sorting_asc" rowspan="1" colspan="1" aria-label="Roll" style="width: 100px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input checkAll">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Photo: activate to sort column ascending" style="width: 52px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Photo: activate to sort column ascending" style="width: 52px;">Action</th>

                        </thead>
                        <tbody>
                              @php ($i=1)
                              @foreach($depts as $dept)
                              <tr role="row" class="even">
                                    <td class="sorting_1">
                                          <div class="form-check">
                                          <input type="checkbox" class="form-check-input">
                                          <label class="form-check-label">{{ $i++ }}</label>
                                          </div>
                                    </td>
                                    <td>{{ $dept->name }}</td>
                                    <td>
                                         <a href="{{ route('department.edit', $dept->id) }}" class="btn btn-lg btn-warning text-primary" title="Delete">
                                               <i class="fa fa-trash"></i>
                                         </a> &nbsp; 
                                    </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection