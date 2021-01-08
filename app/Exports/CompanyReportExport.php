<?php

namespace App\Exports;

use App\User;
use App\Models\Company;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Excel;
use Storage;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CompanyReportExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): View
    {
        
        $test = view('exports.company_report', [
            'companies' => DB::table('companies')
                                ->select('*')
                                ->leftJoin('results', 'companies.id', '=', 'results.result_id')
                                ->get()
        ]);

        // Storage::put('public/excel', $test);
        return $test;
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:L1'; // All headers
                $event->sheet->getDelegate()->getProtection()->setSheet(true);
                // $event->sheet->getDelegate()->getProtection()->setPassword($password);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('5B9BD5');

            },
        ];
    }
}
