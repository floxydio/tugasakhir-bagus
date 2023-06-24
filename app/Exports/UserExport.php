<?php

namespace App\Exports;

use App\Models\Absen;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements WithHeadings, FromQuery   {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DB::table("tbl_user")->select("*")->orderBy("id", "desc");
    }

    public function headings(): array
    {
        return [
            'id',
            'nama',
            'id_card',
            'alamat',
            'divisi'
        ];
    }
}