<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\View\View;

class DeleteSingleController extends Controller
{
    /**
     * Вьюха для удаления одиночной рубрики.
     * (тупо потестировать, "как делать не надо")
     */
    public function __invoke(): View
    {
        $rubric = Rubric::find(\Request::route()->parameter('rubric'));

        $descendants = Rubric::descendantsOf(\Request::route()->parameter('rubric'))->count();

        return view('admin.rubrics.delete_single', compact('rubric', 'descendants'));
    }
}
