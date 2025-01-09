<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\DeletingWitchChildrenRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class DeletingWitchChildrenController extends Controller
{
    /**
     * Удаление рубрики со всеми подрубриками
     */
    public function __invoke(DeletingWitchChildrenRequest $request): RedirectResponse
    {
        /* Получение родительского узла */
        $node = Rubric::find($request['id']);

        $node->delete();

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Рубрика <b>' . $node['name'] . '</b> удалена со всеми подрубриками!');
    }
}
