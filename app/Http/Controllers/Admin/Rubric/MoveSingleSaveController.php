<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\MoveSingleSaveRequest;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class MoveSingleSaveController extends Controller
{
    /**
     * Перемещение произвольно выбранной рубрики
     * (экспериментальная функция)
     */
    public function __invoke(MoveSingleSaveRequest $request): RedirectResponse
    {
        /* Получение сведения по перемещаемому узлу */
        $movi = Rubric::find($request['id']);
        /* Получение сведения по узлу назначения */
        $target = Rubric::find($request['id-new']);

        $movi->_lft = $target->_lft;
        $movi->_rgt = $target->_rgt;
        $movi->parent_id = $target->parent_id;
        $movi->save();

//        @dd($movi, $target);
//
//        /* Перезапись параметров перемещаемого узла НАПРЯМУЮ В БАЗЕ ДАННЫХ */
//        Rubric::where('id', '=', $request['id'])
//            ->save();

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', 'Рубрика <b>' . $movi->name . '</b> перемещена под рубрику <b>' . $target->name . '</b>!<br><br><b>Возможно требуется обновить дерево!</b> (Если появилась <b>Красная кнопка</b> чуть ниже.)');
    }
}
