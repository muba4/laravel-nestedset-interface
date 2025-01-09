<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class MoveDownController extends Controller
{
    /**
     * Сдвиг узла вниз по своей ветке вместе с потомками
     */
    public function __invoke(Rubric $rubric): RedirectResponse
    {
        $rubric->down()
            ? $message = 'Рубрика <b>' . $rubric->name . '</b> сдвинута <b>вниз</b> со своими потомками'
            : $message = 'При сдвиге <b>вниз</b> рубрики <b>' . $rubric->name . '</b> <b><u>что-то пошло не так</u>!</b>';

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', $message);
    }
}
