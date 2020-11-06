<?php

namespace App\Exports;

use App\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidateExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $startDate;
    protected $endDate;

    function __construct($startDate, $endDate) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
    	if($this->startDate != '' && $this->endDate != '')
        {
          return Candidate::select("id", "first_name", "last_name", "email", "applyFor", "selectStatus", "interviewDate")->whereBetween('interviewDate', array($this->startDate, $this->endDate))
           ->get();
        }
        else
        {
          return Candidate::select("id", "first_name", "last_name", "email", "applyFor", "selectStatus", "interviewDate")->orderBy('interviewDate', 'desc')->get();
        }

    }

    public function headings(): array
    {
        return ["id", "first_name", "last_name", "email", "applyFor", "selectStatus", "interviewDate"];
    }
}
