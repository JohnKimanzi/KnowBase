<?php
namespace App\Exports;
use App\Models\AssessmentAttempt;
// use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AssessmentAttemptsExport implements FromQuery,WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */  
    // use Exportable;

    public function headings(): array
    {
        return [
            'Name',
            'Status',
            'Lesson',
            'Quiz Score',
            'Quiz Date',
        ];
    }
    public function query()
    {
        return AssessmentAttempt::query();
        /*you can use condition in query to get required result
         return AssessmentAttempt::query()->whereRaw('id > 5');*/
    }
    public function map($attempt): array
    {
        return [
            $attempt->user->name,
            $attempt->status,
            $attempt->score,
            $attempt->lesson->name,
            date('Y-m-d', strtotime($attempt->created_at)),
        ];
    }

}