<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * Вьюха для создания новой Рубрики
     */
    public function __invoke(): View
    {
        return view('admin.rubrics.create');
    }
}
