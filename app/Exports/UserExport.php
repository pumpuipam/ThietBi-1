<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection,WithHeadings,WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all()->where('role', '=', 4);
    }

    //title excel
    public function headings(): array {
        return [
            'ID',
            'lastName',
            'firstName',
            'Name',
            'Email',    
            'Phone',    
            'Address',    
            "Created"
        ];
    }
 
    //Dữ liệu
    public function map($row): array {
        return [
            $row->id,
            $row->lastName,
            $row->firstName,
            $row->username,
            $row->email,
            $row->phone,
            $row->address,
            $row->created_at
        ];
    }
}
