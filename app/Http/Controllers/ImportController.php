<?php

namespace App\Http\Controllers;

use App\Matching;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
     public function getImport()
    {
        return view('import');
    }

 
    public function processImport(Request $request)
	{
	    // $data = CsvData::find($request->csv_data_file_id);
	    // $csv_data = json_decode($data->csv_data, true);

	    $path = $request->file('csv_file')->getRealPath();

	    $data = array_map('str_getcsv', file($path));
	    
	    if(count($data) > 0){
    		$csv_header_fields[0] = 'Tanggal Transaksi';
    		$csv_header_fields[1] = 'Keterangan';
    		$csv_header_fields[2] = 'Cabang';
    		$csv_header_fields[3] = 'Jumlah';
    		$csv_header_fields[4] = 'Saldo';

	    	$csv_data = array_slice($data, 7);

	    	$csv_data_file = CsvData::create([
		        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
		        'csv_data' => json_encode($csv_data)
	    	]);
	    }
	    else{
	    	return redirect()->back();
	    }

	    foreach ($csv_data as $row) {
        	if($row[0] != NULL){
        		$table = new Matching();

        		// $table->id_csv = $idcsv;
        		
        		$row[3] = str_replace( ',', '', $row[3]);
        		$row[3] = str_replace( '.00', '', $row[3]);
        		$row[3] = str_replace( 'CR', '', $row[3]);

        		$row[4] = str_replace( ',', '', $row[4]);
        		$row[4] = str_replace( '.00', '', $row[4]);

        		$table->tanggal = $row[0];
				$table->keterangan = $row[1];
				$table->cabang= $row[2];
				$table->jumlah = (int)$row[3];
				$table->saldo = $row[4];
				
				$table->save();
					
        	}
	    }
	    return view('import_success', compact('csv_header_fields','csv_data', 'csv_data_file'));
	    // return view('import_success');
	}
}








 //    public function parseImport(CsvImportRequest $request)
	// {
 //    	$path = $request->file('csv_file')->getRealPath();

	//     $data = array_map('str_getcsv', file($path));
	    
	//     if(count($data) > 0){
 //    		$csv_header_fields[0] = 'Tanggal Transaksi';
 //    		$csv_header_fields[1] = 'Keterangan';
 //    		$csv_header_fields[2] = 'Cabang';
 //    		$csv_header_fields[3] = 'Jumlah';
 //    		$csv_header_fields[4] = 'Saldo';

	//     	$csv_data = array_slice($data, 7);

	//     	$csv_data_file = CsvData::create([
	// 	        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
	// 	        'csv_data' => json_encode($csv_data)
	//     	]);
	//     }
	//     else{
	//     	return redirect()->back();
	//     }
	//     return view('import_fields', compact('csv_header_fields','csv_data', 'csv_data_file'));
	// }
