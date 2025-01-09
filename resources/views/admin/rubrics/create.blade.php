@extends('layouts.base')

@section('page.title')
    Создание рубрики
@endsection

@section('content')
    <div class="flex items-start gap-4 flex rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512">
                <linearGradient id="a" x1="0" x2="512" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#33b49d"/>
                    <stop offset="1" stop-color="#00a185"/>
                </linearGradient>
                <circle cx="256" cy="256" r="256" fill="url(#a)"/>
                <linearGradient id="b" x1="42.7" x2="469.3" y1="256" y2="256" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#00a185"/>
                    <stop offset="1" stop-color="#33b49d"/>
                </linearGradient>
                <path fill="url(#b)"
                      d="M256 469.3A213.6 213.6 0 0 1 42.7 256 213.6 213.6 0 0 1 256 42.7 213.6 213.6 0 0 1 469.3 256 213.6 213.6 0 0 1 256 469.3z"/>
                <path d="M384 242.5h-98.5V144h-43v98.5H144v43h98.5V384h43v-98.5H384z" opacity=".3"/>
                <path fill="#FFF" d="M376 234.5h-98.5V136h-43v98.5H136v43h98.5V376h43v-98.5H376z"/>
            </svg>
        </div>
        <div class="pt-3 sm:pt-5 w-full">
            <h2 class="text-xl font-semibold text-black dark:text-white">Создание рубрики</h2>

            <div class="mt-4 text-sm/relaxed w-full lg:w-1/3 mx-auto">
                <form method="POST" action="{{ route('admin.rubrics.store') }}">
                    @csrf
                    <div class="form-control mt-4">
                        <label class="input input-bordered flex items-center gap-2 mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M5 7h8v2H5V7Z"/>
                                <path fill-rule="evenodd" d="M5 11h14v6H5v-6Zm2 2v2h10v-2H7Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M1 3h22v18H1V3Zm2 2v14h18V5H3Z" clip-rule="evenodd"/>
                            </svg>
                            <input type="text" class="grow w-full" name="name" placeholder="Название рубрики" maxlength="50" value="{{ old('name') }}"/>
                        </label>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        <label class="input input-bordered flex items-center gap-2 mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="h-4 w-4 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 9h11v6H4V9Zm2 2v2h7v-2H6Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M14 2h6v2h-2v2h5v12h-5v2h2v2h-6v-2h2v-2H1V6h15V4h-2V2Zm2 6H3v8h13V8Zm2 8h3V8h-3v8Z" clip-rule="evenodd"/>
                            </svg>
                            <input type="text" class="grow w-full" name="alias" placeholder="Алиас рубрики"  maxlength="50" value="{{ old('alias') }}"/>
                        </label>
                        <x-input-error :messages="$errors->get('alias')" class="mt-2"/>
                        <label class="label cursor-pointer mt-4">
                            <span class="label-text">Разделитель</span>
                            <input type="checkbox" name="is_used" class="toggle" value="1" {{ old('is_used') == 1 ? 'checked' : '' }}/>
                            <span class="label-text">Используемая</span>
                        </label>
                        <x-input-error :messages="$errors->get('is_used')" class="mt-2"/>
                        <label class="input input-bordered flex items-center gap-2 mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M1 12c0-3 3-6 6-6h3v2H7a4 4 0 1 0 0 8h3v2H7c-3 0-6-3-6-6Zm13-6h3c3 0 5 2 6 5v1c0 3-3 6-6 6h-3v-2h3a4 4 0 0 0 0-8h-3V6Z"/>
                                <path d="M7 11h10v2H7v-2Z"/>
                            </svg>
                            <input type="text" class="grow" name="link" placeholder="Ссылка рубрики" maxlength="150" value="{{ old('link') }}"/>
                        </label>
                        <x-input-error :messages="$errors->get('link')" class="mt-2"/>
                        {{--
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Иконка рубрики:</span>
                            </div>
                        </label>
                        <input type="file" name="icon" class="file-input file-input-bordered w-full" />
                        --}}
                        <button class="btn btn-success block w-1/2 mx-auto mt-4 text-white" type="submit">
                            Создать!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection