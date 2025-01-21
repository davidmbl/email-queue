<?php
namespace App\Imports;

use App\Models\EmailRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmailImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return EmailRecord
     */
    public function model(array $row)
    {
        \Log::info('Importing:', $row);

        return new EmailRecord([
            'name' => $row['name'],
            'email' => $row['email']
        ]);
    }
}
