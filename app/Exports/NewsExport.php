<?php
namespace App\Exports;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use phpDocumentor\Reflection\Types\Collection;

class NewsExport implements FromCollection
{
    private function prepare(): array {
        $news = News::get()->getAllNews();
        $cat = Categories::get()->getAllCategories();
        $res = [];
        foreach ($news as $elem) {
            $catId = array_search($elem['categoryId'], array_column($cat, 'id'));
            $elem['category'] = $catId === false ? 'none': $cat[$catId]['title'];
            unset($elem['categoryId']);
            $elem['id'] = (string)$elem['id'];
            $res[] = $elem;
        }
        return $res;
    }

    public function collection()
    {
        return News::get()->getFullView();
        //return [];// $this->prepare();//News::factory()->getAllNews();
    }
}
