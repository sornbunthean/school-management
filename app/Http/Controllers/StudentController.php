<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use Session;
use QrCode;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = DB::table('students')
            ->paginate(config('app.row'));
        return view('students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $data = array(
            'first_name' => $r->first_name,
            'last_name' => $r->last_name,
            'email' => $r->email,
            'father_name' => $r->father_name,
            'mother_name' => $r->mother_name,
            'gender' => $r->gender,
            'religion' => $r->religion,
            'dob' => $r->dob,
            'phone' => $r->phone
        );

        if($r->photo)
        {
            $data['photo'] = $r->file('photo')->store('uploads/students', 'custom');
        }
        $i = DB::table('students')->insertGetId($data);

        if($i)
        {
            $qr_file = "uploads/students/qrcodes/". $i . "-qrcode.png";
            QrCode::size(500)->format('png')
            ->generate(url('student/check/'.$i), public_path($qr_file));
            DB::table('students')
                ->where('id', $i)
                ->update(['qrcode' => $qr_file]);

            $r->Session()->flash('success', 'Data has been saved!');
            return redirect()->route('student.create');
        }else
        {
            $r->Session()->flash('error', 'Data fails to save');
            return redirect()->route('student.create')->withInput();
        }
        // if($r->photo)
        // {
        //     $file = $r->file('photo');
        //     $ext = $file->getClientOriginalExtension();
        //     $file_name = md5(date('Y-m-d-H-i-s')). " . " .$ext;
        //     $img = Image::make($file->getRatePath())->resize(500,null, function($asp){
        //         $asp->aspectRatio();
        //     });

        //     $img->save('uploads/students/' .$file_name, 100);
        //     $data['photo'] = "uploads/students/". $file_name;
        // }
        // $i = DB::table('students')->insert($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['student'] = DB::table('students')
            ->where('id', $id)
            ->first();
        return view('students.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('students.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $data = array(
            'first_name' => $r->first_name,
            'last_name' => $r->last_name,
            'email' => $r->email,
            'father_name' => $r->father_name,
            'mother_name' => $r->mother_name,
            'gender' => $r->gender,
            'religion' => $r->religion,
            'dob' => $r->dob,
            'phone' => $r->phone
        );

        if($r->photo)
        {
            $data['photo'] = $r->file('photo')->store('uploads/students', 'custom');
        }
        $i = DB::table('students')->update($data);

        if($i)
        {
            $qr_file = "uploads/students/qrcodes/". $i . "-qrcode.png";
            QrCode::size(500)->format('png')
            ->generate(url('student/check/'.$i), public_path($qr_file));
            DB::table('students')
                ->where('id', $i)
                ->update(['qrcode' => $qr_file]);

            $r->Session()->flash('success', 'Data has been saved!');
            return redirect()->route('student.create');
        }else
        {
            $r->Session()->flash('error', 'Data fails to save');
            return redirect()->route('student.create')->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $r)
    {
       DB::table('students')
        ->where('id', $id)
        ->destroy();

        $r->session()->flash('success', 'Data has been deleted!');
        return redirect()->route('student');
    }
}
