<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AdminAddNewsController extends Controller
{
    public function __invoke(Request $request)
    {
        // TODO: save data to file and redirect to this news

        if ($request->isMethod('post')) {
            return $this->addNew($request);
        }
        else
            return view('admin.addNews')
                ->with('categories', Category::all());
    }

    private function addNew(Request $request)
    {
    }

}
