<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id', 'name', 'email', 'age', 'role_id', 'company_id', 'work_id')
            ->searchName()
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            '名前',
            'メールアドレス',
            '年齢',
            'ステータス',
            '所属企業',
            '職種'
        ];
    }
}
