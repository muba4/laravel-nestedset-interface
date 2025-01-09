<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Вьюха с таблицей Рубрик
     */
    public function __invoke(): View
    {
        $nodes = Rubric::orderedTree();
        return view('admin.rubrics.index', compact('nodes'));
    }
}
