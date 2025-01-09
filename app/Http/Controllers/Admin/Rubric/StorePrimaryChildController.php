<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\StorePrimaryChildRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class StorePrimaryChildController extends Controller
{
    /**
     * Запись создания новой Первой дочерней рубрики
     */
    public function __invoke(StorePrimaryChildRequest $request): RedirectResponse
    {
        /* Получение родительского узла */
        $parent = Rubric::find($request['parent_id']);

        $node = new Rubric($request->toArray());
        $parent->prependNode($node);

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Новая подрубрика <b>' . $request['name'] . '</b> создана <b>первой</b> в подрубрике <b>' . $parent['name'] . '</b>!');
    }
}
