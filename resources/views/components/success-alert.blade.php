@props(['success'])

@if ($success)
    <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800">
        {{ $success }}
    </div>
@endif