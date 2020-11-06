<?php

namespace App\Imports;

use App\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidatesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Candidate([
            'first_name'     => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name'    => $row['last_name'], 
            'email' => $row['email'],
            'selectEducation' => $row['selecteducation'],
            'applyFor' => $row['applyfor'],
            'totalExperience' => $row['totalexperience'],
            'currentCTC' => $row['currentctc'],
            'expectedCTC' => $row['expectedctc'],
            'noticePeriod' => $row['noticeperiod'],
            'interviewDate' => date("Y-m-d", strtotime($row['interviewdate'])),
            'selectStatus' => $row['selectstatus'],
            'reason_to_leave_job' => ($row['reason_to_leave_job']) ? $row['reason_to_leave_job'] : '',
        ]);
    }
}
