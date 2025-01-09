@extends('layouts.base')

@section('page.title')
    Вьюха для перемещения рубрики
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
            <span><b>Внимание! Ахтунг!!!</b><br><br><i><b>Экспериментальная функция</b></i><br>Рубрика <b>{{ $rubric->name }}</b> будет <b>перемещена</b> под рубрику с указанным <b><code>ID</code></b>!<br>Возможно потребуется пересобрать Дерево рубрик!</span>
        </div>
    </div>
    <div class="flex items-start gap-4 flex rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512">
                <linearGradient id="a" x1="0" x2="512" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#a364ab"/>
                    <stop offset="1" stop-color="#8c3d96"/>
                </linearGradient>
                <circle cx="256" cy="256" r="256" fill="url(#a)"/>
                <linearGradient id="b" x1="42.7" x2="469.3" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#8c3d96"/>
                    <stop offset="1" stop-color="#a364ab"/>
                </linearGradient>
                <path fill="url(#b)"
                      d="M256 469.3A213.6 213.6 0 0 1 42.7 256 213.6 213.6 0 0 1 256 42.7 213.6 213.6 0 0 1 469.3 256 213.6 213.6 0 0 1 256 469.3z"/>
                <path d="M369.3 144H293v29.5h40.6L282 225.2l.5.5a87.4 87.4 0 1 0 19.9 19.9l.4.4 51.7-51.7v40.6H384V144h-14.7zM231.4 354.5a58 58 0 1 1 .2-116 58 58 0 0 1-.2 116z"
                      opacity=".3"/>
                <path fill="#FFF"
                      d="M361.3 136H285v29.5h40.6L274 217.2l.5.5a87.4 87.4 0 1 0 19.9 19.9l.4.4 51.7-51.7v40.6H376V136h-14.7zM223.4 346.5a58 58 0 1 1 .2-116 58 58 0 0 1-.2 116z"/>
            </svg>
        </div>
        <div class="pt-3 sm:pt-5 w-full">
            <h2 class="text-xl font-semibold text-black dark:text-white">
                Перемещение рубрики <b>{{ $rubric->name }}</b>
            </h2>
            <div class="mt-4 text-sm/relaxed w-full lg:w-1/2 mx-auto">
                <form method="POST" action="{{ route('admin.rubrics.move-single-save') }}">
                    @csrf
                    @method("PATCH")
                    <div class="form-control mt-4">
                        <label class="input input-bordered flex items-center gap-2 mt-4">
                            <svg class="h-5 w-5 opacity-70" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 9c1.29 0 2.5.41 3.47 1.11L17.58 5H13V3h8v8h-2V6.41l-5.11 5.09c.7 1 1.11 2.2 1.11 3.5a6 6 0 0 1-6 6 6 6 0 0 1-6-6 6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"></path>
                            </svg>
                            <input type="number" class="grow w-full" name="id" placeholder="ID перемещаемой рубрики" maxlength="50" value="{{ old('id') ? old('id') : $rubric->id }}"/>
                        </label>
                        <x-input-error :messages="$errors->get('id')" class="mt-2"/>
                        <label class="input input-bordered flex items-center gap-2 mt-4">
                            <svg class="h-6 w-6 opacity-70" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 4a6 6 0 0 1 6 6 6 6 0 0 1-5 5.92V18h2v2h-2v2h-2v-2H9v-2h2v-2.08A6 6 0 0 1 6 10a6 6 0 0 1 6-6m0 2a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4Z"></path>
                            </svg>
                            <input type="number" class="grow w-full" name="id-new" placeholder="ID рубрики назначения" maxlength="50" value="{{ old('id-new') }}"/>
                        </label>
                        <x-input-error :messages="$errors->get('id-new')" class="mt-2"/>
                        <div class="flex">
                            <a href="{{route('admin.rubrics.index')}}" class="w-1/2">
                                <button class="btn btn-success btn-outline block mt-4 text-white"
                                        type="button">
                                    Подумать иесчо!
                                </button>
                            </a>
                            <button class="btn btn-success block w-1/2 mt-4 text-white" type="submit">
                                Переместить!
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection