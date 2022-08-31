<?php
namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


class ProductsImport implements ToModel, WithProgressBar, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading, SkipsEmptyRows
{
    use Importable;

    public function model(array $row)
    {
        return new Product([
            'name'     => $row['product_name'],
            'part_number'    => $row['part_number'],
            'article_group_id' => $row['articel_group_id'],
            'prize' => $row['prize'],
        ]);
    }

    public function rules(): array
    {
        return [
            'product_name' => 'required',
            'part_number' => 'required',
            'articel_group_id' => 'required|numeric',
            'prize' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function customValidationMessages()
    {
        return [
            'prize' => array(
                'regex' => 'Prize Must be a number.',
            ),
            'product_name' => 'must be found'
        ];
    }
}
