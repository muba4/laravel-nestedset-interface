@extends('layouts.base')

@section('page.title')
    Вьюха для удаления рубрики со всеми подрубриками
@endsection

@section('content')
    <div class="w-full block">
        <div role="alert" class="alert alert-error w-full my-2 py-4 shadow-md overflow-hidden sm:rounded-lg rounded-box text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span><b>Внимание! Ахтунг!!!</b><br><br>Рубрика <b>{{ $rubric->name }}</b> будет <b>удалена со всеми её потомками</b>!</span>
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
                <path d="m346.2 263.8-.1-.6c-20.8-65.1-82.7-111.4-85.3-113.3l-8-5.9.5 9.9c0 .4 1.4 38.7-35.6 70.5-40.3 34.6-40.1 63.1-40 78.5v2c0 41.9 30.7 73.1 74.6 78.3-2.4-.4-4.8-.9-7.3-1.6a32 32 0 0 1-24-28.6l-.4-2.8c-1.3-11.1-2.9-24.8 21.3-50.7a184 184 0 0 0 23.3-31l3.3-5.5 4.2 4.7a175 175 0 0 1 29.2 41.8c6 12.2 6.4 31.3 6 35.4a42.4 42.4 0 0 1-43.3 39l.6.1a85.4 85.4 0 0 0 85.1-87.4c0-11.8-4-32-4-32.8z"
                      opacity=".3"/>
                <path fill="#FFF"
                      d="m338.2 255.8-.1-.6c-20.8-65.1-82.7-111.4-85.3-113.3l-8-5.9.5 9.9c0 .4 1.4 38.7-35.6 70.5-40.3 34.6-40.1 63.1-40 78.5v2c0 41.9 30.7 73.1 74.6 78.3-2.4-.4-4.8-.9-7.3-1.6a32 32 0 0 1-24-28.6l-.4-2.8c-1.3-11.1-2.9-24.8 21.3-50.7a184 184 0 0 0 23.3-31l3.3-5.5 4.2 4.7a175 175 0 0 1 29.2 41.8c6 12.2 6.4 31.3 6 35.4a42.4 42.4 0 0 1-43.3 39l.6.1a85.4 85.4 0 0 0 85.1-87.4c0-11.8-4-32-4-32.8z"/>
                </svg>
        </div>
        <div class="pt-3 sm:pt-5 w-full">
            <h2 class="text-xl font-semibold text-black dark:text-white">
                Удаление рубрики <b>{{ $rubric->name }}</b> со всеми подрубриками
            </h2>
            <table class="table table-xs my-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th class="text-center">level</th>
                    <th class="text-center">parent_id</th>
                    <th class="text-center">_lft</th>
                    <th class="text-center">_rgt</th>
                    <th>alias</th>
                    <th class="text-center">is_used</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nodes as $node)
                    <tr class="hover">
                        <th>{{ $node->id }}</th>
                        <td><span class="ms-{{ $node->level }}"><b>{{ str_repeat("-", $node->level+1) }}</b> {{ $node->name }}</span>
                        </td>
                        <td class="text-center">{{ $node->level }}</td>
                        <th class="text-center">{{ $node->parent_id }}</th>
                        <th class="text-center">{{ $node->_lft }}</th>
                        <th class="text-center">{{ $node->_rgt }}</th>
                        <td><span class="ms-{{ $node->level }}"><b>{{ str_repeat("-", $node->level+1) }}</b> {{ $node->alias }}</span>
                        </td>
                        <td class="text-center">{{ $node->is_used ? 'Да' : 'Нет' }}</td>
                    </tr>
                @endforeach
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th class="text-center">level</th>
                    <th class="text-center">parent_id</th>
                    <th class="text-center">_lft</th>
                    <th class="text-center">_rgt</th>
                    <th>alias</th>
                    <th class="text-center">is_used</th>
                </tr>
                </tfoot>
            </table>
            <div class="mt-4 text-sm/relaxed w-full lg:w-1/2 mx-auto">
                <form method="POST" action="{{ route('admin.rubrics.deleting-witch-children') }}">
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