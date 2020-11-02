<?php
namespace App\Exports;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use phpDocumentor\Reflection\Types\Collection;

class NewsExport implements FromArray
{
    private function prepare(): array {
        return News::getAllNews()->toArray();
    }

    public function array(): array
    {
        return $this->prepare();
    }
}
