<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\StoreFinalizingChildRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class StoreFinalizingChildController extends Controller
{
    /**
     * Запись создания новой Последней дочерней рубрики
     */
    public function __invoke(StoreFinalizingChildRequest $request): RedirectResponse
    {
        /* Получение родительского узла */
        $parent = Rubric::find($request['parent_id']);

        $node = new Rubric($request->toArray());
        $parent->appendNode($node);

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Новая подрубрика <b>' . $request['name'] . '</b> создана <b>последней</b> в подрубрике <b>' . $parent['name'] . '</b>!');
    }
}
