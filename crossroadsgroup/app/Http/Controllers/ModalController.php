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


class ModalController extends Controller {

 /*-------Dummy Data Modal--------------*/
    public function index(){
        
        return view('Modal.modal_example');
    }

    public function datepicker(){
        
        return view('Modal.datepickers');
    }

    
    public function imageUpload(){

        return view('Modal.imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost()

    {

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        
        request()->image->move(public_path('images'), $imageName);

        // if(File::exists(public_path('images/1538047884.jpg'))){
        //   File::delete(public_path('images/1538047884.jpg')); 
        // }else{
        //   dd('File does not exists.');
        // }

        return back()
                    ->with('success','You have successfully upload image.')
                    ->with('image',$imageName);

    }

    public function checkemial(){
        return view('Modal.emialcheck');
    }

    //csv data upload only
    public function demoExcel(){
        return view('sample_data');
    }
    public function parseImport(CsvImportRequest $request)
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
    }
    //csvdata end

    //excel data start
   public function importExcel(Request $request)
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
    }
    //excel data end
}






