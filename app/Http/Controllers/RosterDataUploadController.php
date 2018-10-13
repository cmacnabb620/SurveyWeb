<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use File;
use App\Http\Requests\CsvImportRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\CsvData;
use Session;
use Excel;
use DB;
class RosterDataUploadController extends Controller {

 /*-------Dummy Data Modal--------------*/
    public function getFileUploadPage(){  
        return view('Rosterdata.upload_file');
    }

    /*public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
        'csv_data' => json_encode($data)
        ]);

        $csv_data = array_slice($data, 0, 2);
        return 'success';
        return view('import_fields', compact('csv_data', 'csv_data_file'));
    }*/
    //csvdata end

    //excel data start
  /* public function importExcel(Request $request)
    {
        if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    $data['first_name'] = $row['first_name'];
                    $data['last_name'] = $row['last_name'];
                    $data['email'] = $row['email'];

                    if(!empty($data)) {
                        DB::table('contactss')->insert($data);
                    }
                }
            });
        }

        Session::put('success', 'Youe file successfully import in database!!!');

        return back();
    }*/
    //excel data end
}






