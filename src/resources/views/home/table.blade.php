@extends('layouts.app')

@section('content')

<!-- Title -->
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-800">
        テーブル {{ $table }}
    </h2>
</div>

<div class="overflow-x-auto rounded-2xl border border-gray-200 bg-white shadow-sm">

    <table class="min-w-full divide-y divide-gray-200">

        <!-- Header -->
        <thead class="bg-gray-50">
            <tr>
                @foreach ($columns as $column)
                    <th
                        class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-gray-600"
                    >
                        {{ $column }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <!-- Body -->
        <tbody class="divide-y divide-gray-100 bg-white">

            @foreach ($list as $row)

                <tr class="transition hover:bg-blue-50">

                    @foreach ($columns as $column)

                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">

                            @php
                                $value = $row->$column;
                            @endphp

                            @if (is_null($value))
                                <span class="text-gray-400 italic">
                                    NULL
                                </span>
                            @else
                                {{ Str::limit($value, 80) }}
                            @endif

                        </td>

                    @endforeach

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection