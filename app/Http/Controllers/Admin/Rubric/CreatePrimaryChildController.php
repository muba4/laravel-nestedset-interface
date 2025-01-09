<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\View\View;

class CreatePrimaryChildController extends Controller
{
    /**
     * Вьюха для создания новой Рубрики
     */
    public function __invoke(): View
    {
        $rubric = Rubric::find(\Request::route()->parameter('rubric'));

        return view('admin.rubrics.create_primary_child')
            ->with(['rubric' => $rubric]);
    }
}
