<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\View\View;

class DeleteWitchChildrenController extends Controller
{
    /**
     * Вьюха для удаления рубрики со всеми подрубриками
     */
    public function __invoke(): View
    {
        $rubric = Rubric::find(\Request::route()->parameter('rubric'));
        $nodes = Rubric::defaultOrder()
            ->descendantsAndSelf(\Request::route()->parameter('rubric'));

        $level = -1;
        $parent_id = 0;
        $parents_id = [];
        foreach ($nodes as $node) {
            if ( in_array($node->parent_id, $parents_id) && ($parent_id == $node->parent_id) ) {
                $node->level = $level;
            } else if ( in_array($node->parent_id, $parents_id) && ($parent_id != $node->parent_id) ) {
                $level = $level - 1;
                $node->level = $level;
            } else {
                $level = $level + 1;;
                $node->level = $level;
                $parents_id[] = $node->parent_id;
            }
            $parent_id = $node->parent_id;
        }

        return view('admin.rubrics.delete_witch_children')
            ->with([
                'rubric' => $rubric,
                'nodes' => $nodes,
            ]);
    }
}
