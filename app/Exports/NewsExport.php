<?php
namespace App\Exports;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    public function collection(): Collection
    {
        return News::all();
    }
}
