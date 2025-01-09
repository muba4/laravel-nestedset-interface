<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Kalnoy\Nestedset\NodeTrait;

class Rubric extends Model
{
    use NodeTrait;

    protected $table = 'rubrics';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'alias',
        'is_used',
        'icon',
        'link',
    ];

    static public function orderedTree()
    {
        $tree = \DB::select('SELECT node.*, (COUNT(parent.id) - 1) AS level
            FROM rubrics AS node,
            rubrics AS parent
            WHERE node._lft BETWEEN parent._lft AND parent._rgt
            GROUP BY node.name
            ORDER BY node._lft;
        ');

        return $tree;
    }
}
