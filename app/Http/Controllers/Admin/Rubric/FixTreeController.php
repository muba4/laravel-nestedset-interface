<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class FixTreeController extends Controller
{
    /**
     * Исправление дерева рубрикатора
     */
    public function __invoke(): RedirectResponse
    {
        Rubric::fixTree();

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Дерево рубрикатора <b>исправлено</b>!');
    }
}
