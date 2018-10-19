<?php
namespace App\Http\Controllers\ProjectManager\ManageProjects;

use App\Http\Controllers\Controller;
use File;
use App\Http\Requests\CsvImportRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Client;
use App\Models\Project;
use App\Models\CsvData;
use Validator;
use App\Models\ClientSubmittedRosterInfo;
use Session;
use Excel;
use Vinkla\Hashids\Facades\Hashids;
use DB;
use App\User;
use Carbon\Carbon;

class ProjectManagerRosterDataUploadController extends Controller {

 /*-------Dummy Data Modal--------------*/
public function getFileUploadPage($project_id,$client_id,$week_no,$week_start_date,$week_end_date){
    $client_record =  Client::where('client_id',Hashids::decode($client_id))->first();
    $project_record =  Project::where('project_id',Hashids::decode($project_id))->first();
    $check_client_roster_data_count=ClientSubmittedRosterInfo::where('client_id',Hashids::decode($client_id))->where('project_id',Hashids::decode($project_id))->where('week_number',$week_no)->count();

    return view('ProjectManager.ManageProjects.ActiveProjects.project_manager_upload_file',compact('client_record','project_record','check_client_roster_data_count','week_no','week_start_date','week_end_date'));
}

    public function downloadExcel($type,$client_id,$project_id)
    {
        //$data = User::get()->toArray();
        $client_record =  Client::where('client_id',Hashids::decode($client_id))->first();
        $client_name=\Crypt::decryptString($client_record->name);
        $project_record =  Project::where('project_id',Hashids::decode($project_id))->first();
        $project_name=$project_record->project_name;
        $data =[];
        return Excel::create($client_name.'_'.$project_name.'_roster_format_file', function($excel) use ($data) {
            $excel->sheet('roster_data', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('DOS');});
                $sheet->cell('B1', function($cell) {$cell->setValue('Patient Name');});
                $sheet->cell('C1', function($cell) {$cell->setValue('Home Phone');});
                $sheet->cell('D1', function($cell) {$cell->setValue('Cell Phone');});
                $sheet->cell('E1', function($cell) {$cell->setValue('Provider Name');});
                $sheet->cell('F1', function($cell) {$cell->setValue('Unique ID');});
                $sheet->cell('G1', function($cell) {$cell->setValue('Center');});
                $sheet->cell('H1', function($cell) {$cell->setValue('Department');});
                $sheet->cell('I1', function($cell) {$cell->setValue('Patient Type');});
                $sheet->cell('J1', function($cell) {$cell->setValue('Age');});
                $sheet->cell('K1', function($cell) {$cell->setValue('Sex');});
                $sheet->cell('L1', function($cell) {$cell->setValue('Language');});
                $sheet->cell('M1', function($cell) {$cell->setValue('Payer Type');});
                $sheet->cell('N1', function($cell) {$cell->setValue('Race');});
                $sheet->cell('O1', function($cell) {$cell->setValue('Ethnicity');});
                $sheet->cells('A1:O1', function ($cells) {
                    $cells->setBackground('#008686');
                    $cells->setAlignment('center');
                    $cells->setFontSize(10);
                    $cells->setFontColor('#ffffff');
                });
                /*if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value['firstname']); 
                        $sheet->cell('B'.$i, $value['lastname']); 
                        $sheet->cell('C'.$i, $value['email']); 
                    }
                }*/
            });
        })->download($type);
        return redirect()->back();
    }

    public function storeClientRosterData(Request $request)
     {
        // return $request->all();
        ini_set('max_execution_time',3600);
        $rules = array(
            'import_file' => 'required|mimes:xls,xlsx',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
            $this->throwValidationException($request, $validator);
        }
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        $current_time = Carbon::now();
        $csv_data_file = ClientSubmittedRosterInfo::create([
        'roster_filename' => $request->file('import_file')->getClientOriginalName(),
        'week_number' => $request->get('week_no'),
        'week_start_date' => $request->get('week_start_date'),
        'week_end_date' => $request->get('week_end_date'),
        'flag' => 1,
        'client_id' => $request->get('client_id'),
        'project_id' => $request->get('project_id'),
        'roster_info' => $data,
        'submitted_date' => $current_time->toDateTimeString()
        ]);
       return redirect()->back()->with('success', 'File Uploaded successfully');
    }

//Below code for table roster data devide form single column
    /*public function importFileIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name, 'details' => $value->details];
                }
                if(!empty($arr)){
                    \DB::table('products')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
        }
        dd('Request data does not have any files to import.');      
    } */
    //csvdata end

    //excel data start
    //excel data end
}






