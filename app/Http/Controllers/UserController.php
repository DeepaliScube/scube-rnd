<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;

class UserController extends Controller
{
    public function importView(Request $request){
		return view('importFile');
	}

	public function import(Request $request){
        Excel::load($request, function($reader) {
            $lastrow = $reader->getActiveSheet()->getHighestRow();
            dd($lastrow);
        });
        // Excel::import(new ImportUser,
		// 			$request->file('file')->store('files'));
        dd('jdksjdjk');
		return redirect()->back();
	}

	public function exportUsers(Request $request){
		return Excel::download(new ExportUser, 'users.xlsx');
	}
}
