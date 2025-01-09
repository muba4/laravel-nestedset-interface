<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\StoreRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    /**
     * Создание новой Рубрики в конец дерева
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        Rubric::create($request->all());

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Новая рубрика <b>' . $request['name'] . '</b> создана!');
    }
}
