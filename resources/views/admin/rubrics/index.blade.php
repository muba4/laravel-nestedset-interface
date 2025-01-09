@extends('layouts.base')

@section('page.title')
    Список Рубрик
@endsection

@section('content')
    {{-- Блок с сообщениями из контроллеров --}}
    @if (session('status'))
        <div class="w-full block">
            <div role="alert"
                 class="alert alert-success w-full my-2 py-4 shadow-md overflow-hidden sm:rounded-lg rounded-box text-white">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0 stroke-current"
                        fill="none"
                        viewBox="0 0 24 24">
                    <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{!! session('status') !!}</span>
            </div>
        </div>
    @endif
    {{-- Блок с Инофрмацией (Start) --}}

    <div class="flex items-start gap-4 flex rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            <svg class="size-16 sm:size-16" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                 viewBox="0 0 512 512">
                <linearGradient id="a" x1="0" x2="512" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#ffca05"/>
                    <stop offset="1" stop-color="#faac18"/>
                </linearGradient>
                <circle cx="256" cy="256" r="256" fill="url(#a)"/>
                <linearGradient id="b" x1="42.7" x2="469.3" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#faac18"/>
                    <stop offset="1" stop-color="#ffca05"/>
                </linearGradient>
                <path fill="url(#b)"
                      d="M256 469.3A213.6 213.6 0 0 1 42.7 256 213.6 213.6 0 0 1 256 42.7 213.6 213.6 0 0 1 469.3 256 213.6 213.6 0 0 1 256 469.3z"/>
                <path d="M315.9 167.5h-28.4a23.5 23.5 0 1 0-47 0h-28.3v40.7h103.7v-40.7z" opacity=".3"/>
                <path d="M325.9 187.5v30.7H202.2v-30.7h-36V384h195.6V187.5h-36zM203 359.5l-15.7-15.8 7-7 8.7 8.6 21-20.9 7 7-28 28zm0-44.5-15.7-15.7 7-7 8.7 8.6 21-20.9 7 7-28 28zm0-44.4-15.7-15.7 7-7.1 8.7 8.7 21-21 7 7.1-28 28zm134 80.3h-92.2v-10H337v10zm0-44.4h-92.2v-10H337v10zm0-44.4h-92.2v-10H337v10z"
                      opacity=".3"/>
                <g fill="#FFF">
                    <path d="M307.9 159.5h-28.4a23.5 23.5 0 1 0-47 0h-28.3v40.7h103.7v-40.7z"/>
                    <path d="M317.9 179.5v30.7H194.2v-30.7h-36V376h195.6V179.5h-36zM195 351.5l-15.7-15.8 7-7 8.7 8.6 21-20.9 7 7-28 28zm0-44.5-15.7-15.7 7-7 8.7 8.6 21-20.9 7 7-28 28zm0-44.4-15.7-15.7 7-7.1 8.7 8.7 21-21 7 7.1-28 28zm134 80.3h-92.2v-10H329v10zm0-44.4h-92.2v-10H329v10zm0-44.4h-92.2v-10H329v10z"/>
                </g>
            </svg>
        </div>
        <div class="pt-3 sm:pt-5">
            <h2 class="text-xl font-semibold text-black dark:text-white">Список рубрик</h2>

            <div class="mt-4 text-sm/relaxed flex">
                @if(count($nodes) == 0)
                    Нет рубрик! <a href="{{ route('admin.rubrics.create') }}">
                        <button class="btn btn-outline btn-success block mt-8">Создать!</button>
                    </a>
                @else
                    <div class="overflow-x-auto">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.rubrics.create') }}">
                                <button class="btn btn-success block text-white mt-4 mb-8">Создать новую корневую
                                    рубрику
                                </button>
                            </a>
                            @if(\App\Models\Rubric::isBroken())
                                <a href="{{ route('admin.rubrics.fix-tree') }}">
                                    <button class="btn btn-error block text-white mt-4 mb-8">Дерево нарушено.
                                        Пересобрать!
                                    </button>
                                </a>
                            @else
                                <button class="btn btn-outline btn-success block text-white mt-4 mb-8">Дерево в порядке!
                                </button>
                            @endif
                        </div>

                        Есть рубрики:<br><br>
                        <table class="table table-xs">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-center">Управление</th>
                                <th>name</th>
                                <th>level</th>
                                <th>_lft</th>
                                <th>_rgt</th>
                                <th>alias</th>
                                <th>is_used</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nodes as $node)
                                <tr class="hover">
                                    <th>{{ $node->id }}</th>
                                    <td>
                                        <a href="{{route('admin.rubrics.move-single',$node->id)}}">
                                            <svg class="size-4 inline-block text-fuchsia-600"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path d="M7 1h16v16H12v-2h9V3H9v9H7V1Z"/>
                                                <path d="M12 5h7v7h-2V8.4l-11 11L4.6 18l11-11H12V5Z"/>
                                                <path d="M1 13h5v2H3v6h6v-3h2v5H1V13Z"/>
                                            </svg>
                                        </a>
                                        |
                                        <a href="{{route('admin.rubrics.move-up',$node->id)}}"
                                           title="Сдвиг узла вверх со своими потомками">
                                            <svg class="size-4 inline-block text-blue-600 -rotate-45"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24">
                                                <path d="M9 9c1.29 0 2.5.41 3.47 1.11L17.58 5H13V3h8v8h-2V6.41l-5.11 5.09c.7 1 1.11 2.2 1.11 3.5a6 6 0 0 1-6 6 6 6 0 0 1-6-6 6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"/>
                                            </svg>
                                        </a>
                                        <a href="{{route('admin.rubrics.move-down',$node->id)}}"
                                           title="Сдвиг узла вниз со своими потомками">
                                            <svg class="size-4 inline-block text-blue-600 rotate-[135deg]"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24">
                                                <path d="M9 9c1.29 0 2.5.41 3.47 1.11L17.58 5H13V3h8v8h-2V6.41l-5.11 5.09c.7 1 1.11 2.2 1.11 3.5a6 6 0 0 1-6 6 6 6 0 0 1-6-6 6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"/>
                                            </svg>
                                        </a>
                                        |
                                        <a href="{{route('admin.rubrics.create-primary-child',$node->id)}}"
                                           title="Вставка ребёнка в начало">
                                            <svg class="size-5 inline-block text-green-600 -rotate-45"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24">
                                                <path d="M12 4a6 6 0 0 1 6 6 6 6 0 0 1-5 5.92V18h2v2h-2v2h-2v-2H9v-2h2v-2.08A6 6 0 0 1 6 10a6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"/>
                                            </svg>
                                        </a>
                                        <a href="{{route('admin.rubrics.create-finalizing-child',$node->id)}}"
                                           title="Вставка ребёнка в конец">
                                            <svg class="size-5 inline-block text-green-600" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M12 4a6 6 0 0 1 6 6 6 6 0 0 1-5 5.92V18h2v2h-2v2h-2v-2H9v-2h2v-2.08A6 6 0 0 1 6 10a6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"/>
                                            </svg>
                                        </a>
                                        |
                                        <a href="{{route('admin.rubrics.create-primary-sibling',$node->id)}}"
                                           title="Вставка собрата в начало">
                                            <svg class="size-5 inline-block text-indigo-600 rotate-180"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24">
                                                <path d="M12 4a6 6 0 0 1 6 6 6 6 0 0 1-5 5.92V18h2v2h-2v2h-2v-2H9v-2h2v-2.08A6 6 0 0 1 6 10a6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"/>
                                            </svg>
                                        </a>
                                        <a href="{{route('admin.rubrics.create-finalizing-sibling',$node->id)}}"
                                           title="Вставка собрата в конец">
                                            <svg class="size-5 inline-block text-indigo-600" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M12 4a6 6 0 0 1 6 6 6 6 0 0 1-5 5.92V18h2v2h-2v2h-2v-2H9v-2h2v-2.08A6 6 0 0 1 6 10a6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"/>
                                            </svg>
                                        </a>
                                        |
                                        <a href="{{route('admin.rubrics.delete-witch-children',$node->id)}}"
                                           title="Удаление рубрики со всеми подрубриками">
                                            <svg class="size-4 inline-block" xmlns="http://www.w3.org/2000/svg"
                                                 xml:space="preserve" viewBox="0 0 66 66">
                                            <path fill="#FF7F00"
                                                  d="M22.63 1c-7 1.5-12.47 10.37-12.47 21.12 0 10.74 5.47 14.39 12.47 14.96V1z"/>
                                                <path fill="#FF4800"
                                                      d="M22.63 1c7 1.5 12.47 10.37 12.47 21.12 0 10.74-5.47 14.39-12.47 14.96V1z"/>
                                                <path fill="#FFBC00"
                                                      d="M22.63 13.76c-4 .97-8.06 6.7-8.06 13.65 0 6.94 4.06 9.3 8.06 9.67V13.76z"/>
                                                <path fill="#FF7F00"
                                                      d="M22.63 13.76c5 .97 8.05 6.7 8.05 13.65 0 6.94-3.05 9.3-8.05 9.67V13.76z"/>
                                                <path fill="#AD4831"
                                                      d="M55.12 60.8a2.45 2.45 0 1 1-3.47 3.47L23.25 35.9a2.45 2.45 0 1 1 3.47-3.47l28.4 28.39z"/>
                                                <path fill="#893210"
                                                      d="M23.26 32.42a2.45 2.45 0 0 1 3.47 0l28.39 28.39c.96.96.96 2.51 0 3.47"/>
                                                <path fill="#3D3D3D"
                                                      d="M17.43 34.53c-2.33-2.33-2.44-6-.25-8.19 2.2-2.19 5.86-2.08 8.19.25 2.32 2.33 4.05 7.6 1.85 9.8-2.19 2.19-7.46.46-9.79-1.86z"/>
                                                <path d="M27.22 36.39c-2.19 2.19-7.46.46-9.79-1.86-2.33-2.33-2.44-6-.25-8.19"/>
                                        </svg>
                                        </a>
                                        <a href="{{route('admin.rubrics.delete-single',$node->id)}}"
                                           title="Удаление одиночной рубрики. Экспериментальная функция">
                                            <svg class="size-4 inline-block" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 56 64">
                                                <g>
                                                    <path fill="#ff2400"
                                                          d="M42.5 64h-29a6 6 0 0 1-6-5.5L4 16h48l-3.5 42.5a6 6 0 0 1-6 5.5Z"/>
                                                    <path fill="#ba1d08"
                                                          d="M52 8H38V6a6 6 0 0 0-6-6h-8a6 6 0 0 0-6 6v2H4a4 4 0 0 0-4 4v4h56v-4a4 4 0 0 0-4-4ZM22 6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2H22Zm6 52a2 2 0 0 1-2-2V24a2 2 0 0 1 4 0v32a2 2 0 0 1-2 2Zm10 0h-.1a2 2 0 0 1-1.9-2.1l2-32a2 2 0 1 1 4 .2l-2 32a2 2 0 0 1-2 1.9Zm-20 0a2 2 0 0 1-2-1.9l-2-32a2 2 0 0 1 4-.2l2 32a2 2 0 0 1-1.9 2.1Z"/>
                                                </g>
                                            </svg>
                                        </a>
                                    </td>
                                    <td><span class="ms-{{ $node->level }}"><b>{{ str_repeat("-", $node->level+1) }}</b> {{ $node->name }}</span>
                                    </td>
                                    <td class="text-center">{{ $node->level }}</td>
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
                                <th class="text-center">Управление</th>
                                <th>name</th>
                                <th>level</th>
                                <th>_lft</th>
                                <th>_rgt</th>
                                <th>alias</th>
                                <th>is_used</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection