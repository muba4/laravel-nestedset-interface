<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;

class MoveUpController extends Controller
{
    /**
     * Сдвиг узла вверх по своей ветке вместе с потомками
     */
    public function __invoke(Rubric $rubric): RedirectResponse
    {
        $rubric->up()
            ? $message = 'Рубрика <b>' . $rubric->name . '</b> сдвинута <b>вверх</b> со своими потомками'
            : $message = 'При сдвиге <b>вверх</b> рубрики <b>' . $rubric->name . '</b> <b><u>что-то пошло не так</u>!</b>';

        return redirect()
            ->route('admin.rubrics.index')
            ->with('status', $message);
    }
}
