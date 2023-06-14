<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Hash;
use Validator;

class DepartmentController extends Controller
{

    public function index(){
        $department = Department::get();
        
        return response()->json([
            'message' => 'success',
            'data' => $department,
        ], 200);
    }

    public function detail($id_department){
        $department = Department::first();
        
        return response()->json([
            'message' => 'success',
            'data' => $department,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'department'      => 'required',
        ]);

        Department::create([
            'department'      => $request->department,
        ]);

        return response()->json([
            'message' => 'Data berhasil di Tambahakan',
        ], 200);

    }


    public function update($id_department, Request $request){
        
        $request->validate([
            'department'      => 'required',
        ]);

        $data = [
            'department' => $request->department
        ];

        Department::where('id_department', $id_department)->update($data);

        return response()->json([
            'message' => 'Data berhasil di Ubah',
        ], 200);

    }

    public function delete($id_department){
        
       
        Department::where('id_department', $id_department)->delete();

        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
