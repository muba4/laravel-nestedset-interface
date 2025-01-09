<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\DeletingSingleRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class DeletingSingleController extends Controller
{
    /**
     * Удаление произвольно выбранной рубрики
     */
    public function __invoke(DeletingSingleRequest $request): RedirectResponse
    {
        /* Получение сведения по удаляемому узлу */
        $parent = Rubric::find($request['id']);

        /* Удаление произвольного узла НАПРЯМУЮ ИЗ БАЗЫ ДАННЫХ */
        Rubric::where('id', '=', $request['id'])->delete();

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Рубрика <b>' . $parent['name'] . '</b> удалена!<br><br><b>Возможно требуется обновить дерево!</b> (Если появилась <b>Красная кнопка</b> чуть ниже.)');
    }
}
