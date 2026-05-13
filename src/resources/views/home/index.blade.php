@extends('layouts.app')

@section('content')

<!-- Title -->
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-800">
        テーブル一覧
    </h2>

    <p class="mt-2 text-gray-500">
        データベース内のテーブルを表示しています
    </p>
</div>

<!-- Table List -->
<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

    @foreach ($tables as $table)

        <a
            href="{{ route('home.table', compact('table')) }}"
            class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg"
        >
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">
                        TABLE
                    </p>

                    <h3 class="mt-1 text-lg font-semibold text-gray-800 group-hover:text-blue-600">
                        {{ $table }}
                    </h3>
                </div>

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white"
                >
                    →
                </div>

            </div>
        </a>

    @endforeach

</div>

@endsection