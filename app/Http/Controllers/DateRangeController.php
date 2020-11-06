<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Exports\CandidateExport;
use App\Imports\CandidatesImport;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class DateRangeController extends Controller
{
    public function index(Request $request)
    {
     	return view('daterange');
	}

	function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = Candidate::whereBetween('interviewDate', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = Candidate::orderBy('interviewDate', 'desc')->get();
      }
      echo json_encode($data);
     }

    }

    public function export(Request $request) 
    {
        return Excel::download(new CandidateExport($request->input('startDate'), $request->input('endDate')), 'candidates.xlsx');
    }

    // Generate PDF
    public function createPDF(Request $request) {
      // retreive all records from db
      if($request->input('startDate') != '' && $request->input('endDate') != '')
      {
       $data = Candidate::whereBetween('interviewDate', array($request->input('startDate'), $request->input('endDate')))
         ->get();
      }
      else
      {
       $data = Candidate::orderBy('interviewDate', 'desc')->get();
      }

      // share data to view
      view()->share('candidate',$data);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    // import view display 
    public function importExportView()
    {
      return view('import');
    }

    public function import() 
    {
        Excel::import(new CandidatesImport,request()->file('file'));
           
        return back()->with('success', 'Candidate Import Successfully');  ;
    }
}
