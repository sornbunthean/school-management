<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class EmployeeController extends Controller
{
    public function import()
    {
        return view('employee.import');
    }

    public function save()
    {
        $path = $r->file('import_file')->getRealPath();
        
                // get all data in the file
                $data = Excel::load($path, function($reader){ })->get();
        
                // check if file has data
                if($data->count() && !empty($data))
                {
                    foreach($data as $kem
                        $employee = array(
                            'first_name' => $value->first_name,
                            'last_name' => $value->last_name,
                            'gender' => $value->gender,
                            'email' => $value->email,
                            'phone' => $value->phone,
                            'address' => $value->address
                        );
                        DB::table('employees')->insert($product);
                    }
                    if(!empty($employee))
                    {
                        return redirect('employee/import')->with('success', 'Data has been imported successfully!');
                    }
                    else{
                        return redirect('employee/import')->with('error', 'Fail to import data, please check again!');
                    }
                }
    }
}
