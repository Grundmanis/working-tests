<x-web-layout>
    <style>
        .body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .flipped-icon {
            transform: rotate(180deg);
        }
    </style>

    @include('pages.home.partials.filters')

    @include('pages.home.partials.events-table')
</x-web-layout>
