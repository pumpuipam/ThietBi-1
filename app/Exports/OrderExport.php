<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::all();
    }

    //title excel
    public function headings(): array
    {
        return [
            'ID',
            'Email',
            'Phone',
            'Address',
            'Payment Type',
            'Status',
            "Created"
        ];
    }

    //Dữ liệu
    public function map($row): array
    {
        return [
            $row->id,
            $row->email,
            $row->phone,
            $row->address,
            $row->payment_type,
            $row->status == 0 ? 'pending' : ($row->status == 1 ? 'success' : 'cancel'),
            $row->created_at
        ];
    }
}
