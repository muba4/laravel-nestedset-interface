<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\StoreFinalizingSiblingRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class StoreFinalizingSiblingController extends Controller
{
    /**
     * Запись при создании новой дочерней рубрики после выбранной
     */
    public function __invoke(StoreFinalizingSiblingRequest $request): RedirectResponse
    {
        /* Получение родственного узла */
        $neighbor = Rubric::find($request['neighbor']);

        $node = new Rubric($request->toArray());
        $node->insertAfterNode($neighbor);;

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Новая рубрика <b>' . $request['name'] . '</b> создана после рубрикои <b>' . $neighbor['name'] . '</b>!');
    }
}
