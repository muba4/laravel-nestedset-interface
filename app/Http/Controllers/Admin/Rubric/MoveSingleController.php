<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\View\View;

class MoveSingleController extends Controller
{
    /**
     * Вьюха для перемещения одиночной рубрики.
     * (тупо потестировать, "как делать не надо")
     */
    public function __invoke(): View
    {
        $rubric = Rubric::find(\Request::route()->parameter('rubric'));

        return view('admin.rubrics.move_single', compact('rubric'));
    }
}
