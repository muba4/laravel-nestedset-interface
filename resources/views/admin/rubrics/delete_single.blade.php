@extends('layouts.base')

@section('page.title')
    Вьюха для удаления одиночной рубрики
@endsection

@section('content')
    <div class="w-full block">
        <div role="alert"
             class="alert alert-error w-full my-2 py-4 shadow-md overflow-hidden sm:rounded-lg rounded-box text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span><b>Внимание! Ахтунг!!!</b><br><br><i><b>Экспериментальная функция</b></i><br>Рубрика <b>{{ $rubric->name }}</b> будет <b>удалена!</b>!<br>Дерево рубрик потребуется пересобрать!</span>
        </div>
    </div>
    <div class="flex items-start gap-4 flex rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512">
                <linearGradient id="a" x1="0" x2="512" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#e24263"/>
                    <stop offset="1" stop-color="#dd1e47"/>
                </linearGradient>
                <circle cx="256" cy="256" r="256" fill="url(#a)"/>
                <linearGradient id="b" x1="42.7" x2="469.3" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#dd1e47"/>
                    <stop offset="1" stop-color="#e24263"/>
                </linearGradient>
                <path fill="url(#b)"
                      d="M256 469.3A213.6 213.6 0 0 1 42.7 256 213.6 213.6 0 0 1 256 42.7 213.6 213.6 0 0 1 469.3 256 213.6 213.6 0 0 1 256 469.3z"/>
                <path d="M384 259h-18.4c-2.5-52.2-44.4-94-96.6-96.6V144h-10v18.4c-52.2 2.5-94 44.4-96.6 96.6H144v10h18.4c2.5 52.2 44.4 94 96.6 96.6V384h10v-18.4c52.2-2.5 94-44.4 96.6-96.6H384v-10zm-115 96.6v-44.5h-10v44.5c-46.7-2.5-84-40-86.6-86.6h44.5v-10h-44.5c2.5-46.7 40-84 86.6-86.6v44.5h10v-44.5c46.7 2.5 84 40 86.6 86.6h-44.5v10h44.5c-2.5 46.7-40 84-86.6 86.6z"
                      opacity=".3"/>
                <path fill="#FFF"
                      d="M376 251h-18.4c-2.5-52.2-44.4-94-96.6-96.6V136h-10v18.4c-52.2 2.5-94 44.4-96.6 96.6H136v10h18.4c2.5 52.2 44.4 94 96.6 96.6V376h10v-18.4c52.2-2.5 94-44.4 96.6-96.6H376v-10zm-115 96.6v-44.5h-10v44.5c-46.7-2.5-84-40-86.6-86.6h44.5v-10h-44.5c2.5-46.7 40-84 86.6-86.6v44.5h10v-44.5c46.7 2.5 84 40 86.6 86.6h-44.5v10h44.5c-2.5 46.7-40 84-86.6 86.6z"/>
            </svg>
        </div>
        <div class="pt-3 sm:pt-5 w-full">
            <h2 class="text-xl font-semibold text-black dark:text-white">
                Одиночное удаление рубрики <b>{{ $rubric->name }}</b>
            </h2>
            <table class="table table-xs my-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th class="text-center">Кол-во потомков</th>
                    <th class="text-center">parent_id</th>
                    <th class="text-center">_lft</th>
                    <th class="text-center">_rgt</th>
                    <th>alias</th>
                    <th class="text-center">is_used</th>
                </tr>
                </thead>
                <tbody>
                <tr class="hover">
                    <th>{{ $rubric->id }}</th>
                    <td>{{ $rubric->name }}</td>
                    <th class="text-center text-{{ $descendants == 0 ? 'black' : 'red-600' }}">{{ $descendants }}</th>
                    <th class="text-center">{{ $rubric->parent_id }}</th>
                    <th class="text-center">{{ $rubric->_lft }}</th>
                    <th class="text-center">{{ $rubric->_rgt }}</th>
                    <td>{{ $rubric->alias }}</td>
                    <td class="text-center">{{ $rubric->is_used ? 'Да' : 'Нет' }}</td>
                </tr>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th class="text-center">descendants</th>
                    <th class="text-center">parent_id</th>
                    <th class="text-center">_lft</th>
                    <th class="text-center">_rgt</th>
                    <th>alias</th>
                    <th class="text-center">is_used</th>
                </tr>
                </tfoot>
            </table>
            <div class="mt-4 text-sm/relaxed w-full lg:w-1/2 mx-auto">
                <form method="POST" action="{{ route('admin.rubrics.deleting-single') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $rubric->id }}">
                    <div class="flex">
                        <a href="{{route('admin.rubrics.index')}}" class="w-1/2">
                            <button class="btn btn-success btn-outline block mt-4 text-white"
                                    type="button">
                                Подумать иесчо!
                            </button>
                        </a>
                        <button class="btn btn-error block w-1/2 mt-4 text-white" type="submit">
                            Удалить!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection