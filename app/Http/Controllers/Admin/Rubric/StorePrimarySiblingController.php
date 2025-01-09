<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\StorePrimarySiblingRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class StorePrimarySiblingController extends Controller
{
    /**
     * Запись при создании новой дочерней рубрики перед выбранной
     */
    public function __invoke(StorePrimarySiblingRequest $request): RedirectResponse
    {
        /* Получение родственного узла */
        $neighbor = Rubric::find($request['neighbor']);

        $node = new Rubric($request->toArray());
        $node->insertBeforeNode($neighbor);;

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Новая рубрика <b>' . $request['name'] . '</b> создана перед рубрикой <b>' . $neighbor['name'] . '</b>!');
    }
}
