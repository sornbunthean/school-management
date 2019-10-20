<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $data['users'] = DB::table('users')
            ->paginate(config('app.row'));
        return view('users.index', $data);
    }
    // Create user function
    public function create()
    {
        return view('users.create');
    }

    //Save user function
    public function store(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'username' => $r->username,
            'email' => $r->email,
            'password' => bcrypt($r->passwprd)
        );
       
        if($r->photo)
        {
            $data['photo'] = $r->file('photo')->store('uploads/users', 'custom');
        }
        $i = DB::table('users')
            ->insert($data);
        
        if($i)
            {
                $r->session()->flash('success', 'User has been saved!');
                return redirect()->route('user.create');
            }
            else{
                $r->session()->flash('error', 'User can not saved!');
                return redirect()->route('user.create')->withInput();
            }
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $data['user'] = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('users.edit', $data);
    }

    public function update($id, Request $r)
    {
        
        $data = array(
            'name' => $r->name,
            'username' => $r->username,
            'email' => $r->email,
            'password' => bcrypt($r->passwprd)
        );
       
        if($r->photo)
        {
            $data['photo'] = $r->file('photo')->store('uploads/users', 'custom');
        }
        $i = DB::table('users')
            ->where('id', $r->id)
            ->update($data);
        
        if($i)
            {
                $r->session()->flash('success', 'User has been saved!');
                return redirect()->route('user.create');
            }
            else{
                $r->session()->flash('error', 'User can not saved!');
                return redirect()->route('user.create')->withInput();
            }
    }

    public function destroy($id, Request $r)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect('user'); 
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
