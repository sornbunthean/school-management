@extends('layouts.master')
@section('header')
      <h3>Student Detail</h3>
@endsection
@section('content')
<div class="card height-auto">
      <div class="card-body">
          <div class="heading-layout1">
              <div class="item-title">
                  <h3>About Me</h3>
              </div>
          </div>
          <div class="single-info-details">
              <div class="item-img">
                  <img src="{{ $student->photo }}" alt="student">
              </div>
              <div class="item-content">
                  <div class="header-inline item-header">
                      <h3 class="text-dark-medium font-medium">{{ $student->first_name }}</h3>
                      <div class="header-elements">
                          <ul>
                              <li><a href="#"><i class="far fa-edit"></i></a></li>
                              <li><a href="#"><i class="fas fa-print"></i></a></li>
                              <li><a href="#"><i class="fas fa-download"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale 
                  word moun taiery.Aliquam erat volutpaturabiene natis massa sedde  sodale 
                  word moun taiery.</p>
                  <div class="info-table table-responsive">
                      <table class="table text-nowrap">
                          <tbody>
                              <tr>
                                  <td>Name:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->last_name }} &nbsp; {{ $student->first_name }}</td>
                              </tr>
                              <tr>
                                  <td>Gender:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->gender }}</td>
                              </tr>
                              <tr>
                                  <td>Father Name:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->father_name }}</td>
                              </tr>
                              <tr>
                                  <td>Mother Name:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->mother_name }}</td>
                              </tr>
                              <tr>
                                  <td>Date Of Birth:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->dob }}</td>
                              </tr>
                              <tr>
                                  <td>Religion:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->religion }}</td>
                              </tr>
                              <tr>
                                  <td>Father Occupation:</td>
                                  <td class="font-medium text-dark-medium">Graphic Designer</td>
                              </tr>
                              <tr>
                                  <td>E-mail:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->email }}</td>
                              </tr>
                              <tr>
                                  <td>Admission Date:</td>
                                  <td class="font-medium text-dark-medium">07.08.2019</td>
                              </tr>
                              <tr>
                                  <td>Class:</td>
                                  <td class="font-medium text-dark-medium">2</td>
                              </tr>
                              <tr>
                                  <td>Section:</td>
                                  <td class="font-medium text-dark-medium">Pink</td>
                              </tr>
                              <tr>
                                  <td>Roll:</td>
                                  <td class="font-medium text-dark-medium">10005</td>
                              </tr>
                              <tr>
                                  <td>Address:</td>
                                  <td class="font-medium text-dark-medium">House #10, Road #6, Australia</td>
                              </tr>
                              <tr>
                                  <td>Phone:</td>
                                  <td class="font-medium text-dark-medium">{{ $student->phone }}</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endsection