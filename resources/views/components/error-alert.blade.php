@props(['errors'])

@if ($errors->any())
    <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif