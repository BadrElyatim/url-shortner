@extends('base')

@section('content')
    <main>
        <header class=" pb-16">
            <h1 class=" text-8xl text-zinc-800 text-center">Short Url</h1>
        </header>
        <p class=" text-2xl font-normal text-blue-500 text-center mb-9">Paste the URL to be shortened</p>
        <div>
            @csrf
            <div class="flex">
                <input type="text" class=" min-w-[400px] p-3 text-xl w-full border border-solid border-gray-400">
                <button class=" whitespace-nowrap text-white font-medium bg-blue-500 py-2 px-4">Copy URL</button>
            </div>
        </div>
    </main>
@endsection