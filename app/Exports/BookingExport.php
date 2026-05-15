<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Override;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BookingExport implements FromCollection , WithHeadings, ShouldAutoSize, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::with([
            'vehicle',
            'driver',
            'requester'
        ])->get();
    }
    
    #[Override]
    public function headings(): array
    {
        return [
            'ID',
            'Kendaraan',
            'Driver',
            'Requester',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Tujuan',
            'Keperluan',
            'Status'
        ];
    }
    
    #[Override]
    public function map($booking): array
    {
        return [
            $booking->id,
            $booking->vehicle->vehicle_name ?? '-',
            $booking->driver->name ?? '-',
            $booking->requester->name ?? '-',
            $booking->start_date,
            $booking->end_date,
            $booking->destination,
            $booking->purpose,
            strtoupper($booking->status)
        ];
    }
    
    public function styles(Worksheet $sheet){
        return [
            1=>[
                'font'=> [
                    'bold'=>true,
                    'color'=>[
                        'rgb' => 'FFFFFF'
                    ]
                ],
                'fill'=>[
                    'fillType' => 'solid',
                    'startColor' => [
                        'rgb' => '1F4E78'
                    ]
                ]
            ]
        ];
    }
}
