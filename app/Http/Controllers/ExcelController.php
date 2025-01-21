<?php

namespace App\Http\Controllers;

use App\Imports\EmailImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
    public function upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $path = $request->file('excel_file')->store('temp');
        $import = new EmailImport();
        Excel::import($import, $path);

        return redirect()->route('home')->with('success', 'File uploaded and processed successfully!');
    }
}
