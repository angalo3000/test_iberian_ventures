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

class UsersExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public $id;

    public function __construct($id)
    // public function __construct($message, $options)
    {
        // $this->message = $message;
        $this->id = $id;
    }

    public function view(): View
    {
        
        $test = view('exports.test', [
            'companies' => DB::table('companies')
                                ->select('*')
                                ->leftJoin('results', 'companies.id', '=', 'results.result_id')
                                ->whereResultId($this->id)
                                ->get()
        ]);

        // Storage::put('public/excel', $test);
        return $test;
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:C1'; // All headers
                $cell_total = 'E2'; // All headers
                $cell_decision = 'E4'; // All headers
                $cell_sector = 'E6'; // All headers
                $cell_email = 'E8'; // All headers
                $event->sheet->getDelegate()->getProtection()->setSheet(true);
                // $event->sheet->getDelegate()->getProtection()->setPassword($password);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('5B9BD5');
                $event->sheet->getDelegate()->getStyle($cell_total)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cell_total)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('5B9BD5');
                $event->sheet->getDelegate()->getStyle($cell_decision)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cell_decision)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('5B9BD5');
                $event->sheet->getDelegate()->getStyle($cell_sector)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cell_sector)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('5B9BD5');
                $event->sheet->getDelegate()->getStyle($cell_email)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cell_email)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('5B9BD5');

            },
        ];
    }
}
