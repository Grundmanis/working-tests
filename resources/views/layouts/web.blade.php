<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="flex items-center lg:justify-center min-h-screen flex-col">
    {{-- <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col"> --}}
    {{-- <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header> --}}

    <header class="w-full">
        <!-- Top Line -->
        <div class="flex items-center justify-between px-6 py-4 bg-white shadow-md">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAA4CAYAAACPKLr2AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAhGVYSWZNTQAqAAAACAAFARIAAwAAAAEAAQAAARoABQAAAAEAAABKARsABQAAAAEAAABSASgAAwAAAAEAAgAAh2kABAAAAAEAAABaAAAAAAAAASwAAAABAAABLAAAAAEAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAKKADAAQAAAABAAAAOAAAAACP3+wGAAAACXBIWXMAAC4jAAAuIwF4pT92AAABWWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNi4wLjAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyI+CiAgICAgICAgIDx0aWZmOk9yaWVudGF0aW9uPjE8L3RpZmY6T3JpZW50YXRpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgoZXuEHAAAQKUlEQVRoBcVZC3RW1ZX+7v0fef55AnmQhCQ8TSCooDBYO+i0FDoF11LqA6E+ZoozKm1H21VnQBup4KLVETtqlTUdhkHDaG1dqyqIoASHEXAGxPJqgZAEAgl5QEKS/8//3//eO98+9948SCJUu9bslXv+e889Z+/v7L3P3vueaP675zXFNTvHb8MO6dBs/P+SRvGdFuy4Bs1va+eIC9AsG/GogQuWvP6C5E1VDF0eX3S1ug0tIQBb0+DX/TrM1ovI2/XfyC1Jgm2aRHzlIMkDlgX0xJyLa4X0JQV5JTj39hUDJTDdj6baCBq/cgP0ERnw5/uA+lYb994JLP9+FGac0q4AoAj1BOs64Ccfv78PUDwOxLlWAS+A5boS8vlMrHoeePqAjfwc8iRvctKQlAikpPHJdDkOx42vFREM5BKi9ro7gbrTQHMbMDIbGJ0LpGXyXYAXwapLNKkE8vdSUlpm49OJhUJMTQ11RHCSrBSmDYvMtCG2Sq+2aDrRcISATp0FDv4B+Hg/8E41cLymT+r4scDt84DZM4CpZQQ9yplnRZ0xQ2nUwU8MgsXF4ADkG2UB1xSXTpYJugDjuPp64MPdwG+2AO9+6AiTdsRIYPIkx9Ri2qbzwKoXnCudGn3yIWDB14CSUg4mP8sgz0u1KQgFgzB0yTOS9zzoV5xep7M3UVuvVAGVa/uGlE8EgjRhD7US4dXRpdagBKTSZXL4PoELa7kA/GClc73I3yW3AqF0F2R/NH2sHUZ8/lyASnMEd5paK7rBmV1xFVfIlYcjjFdh12X5ytO6J09c2QMcpJQKmlks8NATwOubgTdfdMxuU5PeXEfCwPZSJQ94q0xABs/9m9M981qgtYNXO7XGfvFLnYiGEyD98l4Cw3mZx2vWdOCjPcALG8iT/ZejYQGqTcGVt9CXntsITKDTN5zjJvM5QkUbV0wcK2AlFJ1uojZphZW/4CZrYD9dQNxoELmrdgEOHqEAkmk3zShhRLSp5gweOoj3cB3CU6Z7m2PvAT5QxpCLVQA41mEmo4YgdsuOFPKYOk9foiVCQ+Ii6fdH2aiwph6HbIY1sRpNZoybzq0s/c9ErvUQpHkvR58PkLMlfQmp4MnfL4NTmVgWTV8Uyh3BhveuNVVfb+OuwhXf29174/mbB1DMEuBoiWud3a4/9o6+/I1shPRUx+U8h8plcPecbDAHRxWX1aCECSFZdZjB+OgxIHG4necMHdRKTExJAo78ETjMK5GxVUhy9rBkO4IvC1A0WDIGaGfuLWA+/ccHgRO1Ukp5ehhWhHohrpGdruHYCaDqeeA1ZqI9zN1C6SE2jqLU81DN5wPkZNGg+EpLM/Czx4AVyxw23T0+ZfKhmPbvS2bKO1jjx1/O1HHrXGDRbcCPHnBGJFOrwwN0kA8LUDku30Z6gN37nJXfNAtITtXw5stj0Hg2B1kZ2ZD6duhUoqmNlZVJtccy8MT3ipCQWajCyoqHnXzsRYgB1UH/1fH+sptENsuOTRpm38gyKJoKPS2EEaF6xeYIA21uSQai0fZL4qSAs5GYlIG9+6h60o6dLZhYzDqxuARp/mb8ak03rUPmcVtZSQ0aonE1ONgR1C5mvs3LYU1HcDCyWXJFsP3dRtQZ63H69Cl8/7FHcbK2HWlpeQNChYDLpLZqatrx7LNr0NzchG/9zad4afPjeP31WthGNwKJI7go8nU3w2BsBE9yAToPgwax26aT2zQR/OexYZMJvWQv7rnnXhQUFOKuRUvUlGBC8gArS7VjucFt4cI7MHJkDmZcdzVW/XQlsqZ+jMp/ptXDrfxsy+LCBiunPw4XYP+uS++ToCUm4T822Si9YT9u/ur19DsGRVJqqmxD0MRhaqPPWwL+JLS2NmD8uFSEQs4Yk84qYL5+019g/v2HsYrFAuweLoy7aEhygA9rYgmpEiK05AK8R7NmlH+AG2ddQ3AmmTrTLDe9eM+eHMuOM9b5UV/bhbh8PZF0JnONfiPzp19Thqu/sQ1bt7MSScrvzVLe/P6/w2pQ/EhPHo8jnx5HY+BVLPjmzdSAxYDt5ilyEWFCugJsw+dPZH4NsaxKYopMQoyvvTGyGNGg7m7dW771NRxtfgjR9pPQ/QN9WDF1GxfgQB8Ut9ADoxE+fxzbDv4I31lytzt84LhgQD7ZWPbTB4MJmYiEe1BX14nOzouIGTGUFDBruGlDFiYatLlwASvxtWjiHNTVk0EgheCdNKgYqsaR1ec4fW8YOwN04Cje2gp8fcHfq4rGVEwpQLTg5r+CwkKsWP5jPLVqjZo9YXwIkyZNQEfHedQcqUWnkYUnnlyDnJHpyMgejfnz/gpFRQU0OzcbVTNiVB7O1gITZTcPIqdvEEClPb+F7gtBPM7M8fYcVgYkQuv1PWfn2TRjAD+pfArfXfp3CASC1FYiXcCPBB5bbP/wI/zuV3PxyK0/g4/KqKGm/pZZZPUrBzD92qmKZ5D1Vhu/bbhb1LO0jt7kcRgNqvhnBZGSchY//kkOgonOLtR1HxrONNK/bOTm5itNClA/k3VRUbFwHEBnG1vw8P1A8eQKluUXUDgxDTOmHcbyZ65G4dOt1Go2DMNQ1ZEHpg+csHJAD71JbC7LV4L6k+fQcLoO59vD2PLWc/jpsnw0yzekTCc48SkhbwN4O7alpQ37P1iCcn572O01DMwNiHccRlJmGb7H0LlzxwdqXjePI0Zk8naoYO2iHRKgBRZuqMXceXNxsSeIve8swLS8R3DD3OWomFIuHFXYUFLYSAiRXS/aFFr97DrcR3PqScVcSDcXIu/oJOF2FI/hnojsVONi4RbkMlXLiYa7VtWvGkeBXibp65c7XY/BoBL//a0eJDTfhnnzPsDhWh5hzLpXDRQwHokmRYM+ho8Iv+BXrl6Lm0v+CdfPHAM7UkdenuFkDply42en7MeFzjiCVgOyRIOMlQKwj6vHnVj6bp07NYgAwz2JePD2asyd04ho22g8969SnUfVoP6mlXvR4GeHjuGHy27DLRX/gPm3lMKO1rsu0CfWtukeeghGbA8efX4d/Mb/IphMYBaLzUvJXVffLtbVAhxNM8Cmp/Vg+jSmoaiUv82q7ElOTullY7JMFq3F+bvxtTfQffwurPkB09+ICbC6jxG0DO0DpyaqJN2J2qYSrH/8KSypamSOT6aPnh9gYrokJzpQGIH4SB9RSaE/P96bPSwGg5morTfw7e9WobRUfMrJCALubFMrnlzxICan3oWHHxqD1LQcF5xn1t71cB6Vx8O+Lipx0+404LopkCMRfkjwGjieTxJw2W/zGFg+y4O6OgDqwy0TyVC0QH979TcMqpMdM4j/SVY4eKQGv1t/NR65uwuZ+WWwuo5yzV4QF+YDSeRpPgs1p3g61szqKEg/V2laCVGDlc6Y/3kQZROTZtua4TcsuwMp/oK2C3L6K8I5tj9/miWb/K6bxoMZkoD79LOjOLStDMt5pIbAOJidR9jvaaH/ZDWlr+ECLvIETLwZjKdKSZ4wmUasgoHHLTZS/WD906GHTbQgPYBDDFeRiJQvjnbViv2F6GyrRUrhSsyayVMf0qEjx9ByoAxLFgnDAlbZJ1xwIkFAup9svOtPSjumD+PG0L+TidLU3Q93Z560Ml0w0Dg20gKImHaL3m7bJ/JDjHWfZtutEoOpCQGnVhcw8MlnwPZPWFxy8vGTZ/DZ1omYM4fvYwVUeYMbRhR7RwK4LYcgmW8bFvLygcemc3N8EudG5EA11dUm/ZqWxO79WXZeWpD/dbBPcBva+1KCYtds7fhJ/vTGLZGSApNl/7ybp+P8hQ5s/MXNuHM+u41CMm4gaNGYB07G0wKQVQ5NKodzY8wobyePduRLkOa/PhQbmULZx2vlZgTSiIkFyj491bZ3RaL01msz/Ts+pjQCcjDSIawaBPlpWD5lGtY+8ziWLT4GH2tEK356CHDCWEhAD0dcDP8K87rw4HcOISuL4/jRJKRAUvaHguGaTH8XMQU1/y7FLWHx3AMh2FNbX/3IPP1xxFdQRDPHJAYY+OGaGdj8P4l4+5mdGDepBGa4tp/PKd5/WkOJLBXVZsnOJl7GXHEnnQcBDadsFM5KMrMWf9XXo+m/D2/cMlX2OKKmXZUuh8oYa72j8jiLS5+Bjs4E7NqzF5vXElxZHszIlwQnwgiGlRmyeRgg4HrNq/nwrpI91soglrBpVclwpcHc++aNbDPsk+lxI7X1P6utul2mPqZUQ89FWtwIIJSZyN3aecmGkOlfnFSUoHSmceiJGr9fbBR/xWePvHO21uYPdCVr1tiuje8361g6LdC0fksLU9e/JMjxU/nU+DMvc3U9fn548zQ+zYAVE3ACxvGXLw6rb6ZoTpmW+1Pc6VnKRHmFoTCYeEHACTYf9jUqqXmzynaf7YreN6EklLFlQ9QcV3RBr5gagBlzvh96TdEn40vdCTilxcQAqt408NjPC80JC0oDtd3xxrxQYGHnvmOGYBO92IL07Lq3w8nU5zHLh7GLJthLHg3Z27Yb3LVOPSHM/lzk8dLJW2QsfiTVLqVMkZ2s6UsFi2ASbBIAQaSWdBjr/+sP+lUlyd2pyTfmjs2KvbTqrH/mZAPjJ/IjikWCnPMNCJNq8p/WKB6UqvE/QO+9H8fce4Io+PaMWGNaWtDuMX4ee23Li6icTZvvVpnaAeiAFB1p9qGabeakknIjLaUib1xO9KXV7b7R2WGt4qqAVEb8T7OXQ/vtwMtg9Mwpw/QkHQb9e32VgTuWZdgFt18fa81IT4h1Rd+0q95bKhhQXddrrz6AMruyUkd1tY2DJ35tTiqeEk5NmVJaNtLcsJZfZSfbtKtKbYwa5Vf/22CpoXZgf+HCwiOvXyTJBtMS5GTBhyNHTDz6pIXVL5daYxeXm2dTQ8FYd89vsWnrQjXXw+AyGghQwHkDDta8oU8szmhNSJw1flq2trM+M/bS0126Fo9o2Wk8vUrXqVHGywBTFfO31KIa7a8ueWbtp7GM01j9xFhWHv2jhV9usHD7w+n2wewKY/w3ivwn9ASfHok+b1Vtvb8XXGWl5MteUnGw98m7EZCVlbJ4O+nueQsjlvVKTigxKyEcxqm952M43uC/dc457ZuzoZVN4Bkhc2qIxbZ70KDqvE4WLE0tzrn05mrYv30/x8b4ArNoRlYgmpyMc109F3gs9UCk6r1fU45GeXINACdwhgYob+Td7Nk+mjyevuivMztt4ylb1x8oTE3w+WIx1J7psrCj04TRSR4XNWRH9PIcQ/E73Byw0ZpEYSEeUlDdN4V8JaNTdZP/IjjdGeW/qvFKKM23ouOX716gDD9lMKeg1++UdLf5PIDOENnu6/YxjbOOWzK/pMOMPUDsd4xK9BensuLwcXeHmdjP9HDTyWmREPvzE/1IYU1v0gG72N/cE69j4Hsj3R98uWPj27VqXD/e6nmI5vIAZVKl1LqzafZqtfWnLV0aOByun8kYPptqmkbAJUk+bTSZMf0rVbSx2DzDu1pO3EdXrC5PHrNn37p1aqEqjKDaIt9BJpX5/en/AEX4N7YsgCQUAAAAAElFTkSuQmCC"
                        alt="Logo" class="h-10 w-auto" /></a>
            </div>

            <!-- Navigation -->
            <div class="flex items-center space-x-4">
                <!-- Language Picker -->
                <div class="relative inline-block">
                    <select onchange="window.location.href = this.value"
                        class="appearance-none px-4 py-2 border border-gray-300 rounded-lg pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach (config('app.available_locales') as $locale)
                            <option @if (app()->getLocale() == $locale) selected @endif
                                value="{{ route(\Route::currentRouteName(), array_merge(\Route::current()->parameters(), ['locale' => $locale])) }}"
                                value="{{ $locale }}">
                                {{ strtoupper($locale) }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Dropdown Icon -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        {{ __('dashboard') }}
                    </a>


                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('events.index')">
                                    {{ __('MyEvents') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('dogs.index')">
                                    {{ __('MyDogs') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <!-- Example: place this inside your Blade view -->
                    <div x-data="{ loginModal: false }" @open-login-modal.window="loginModal = true">

                        <!-- Trigger Button -->
                        <button @click="loginModal = true"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            {{ __('login') }}
                        </button>

                        <!-- Modal Overlay -->
                        <div x-show="loginModal" x-cloak
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                            <!-- Modal Content -->
                            <div @click.away="loginModal = false"
                                class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 relative" x-transition>
                                <!-- Close Button -->
                                <button @click="loginModal = false"
                                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl leading-none">&times;</button>

                                <!-- Header -->
                                <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">{{ __('loginToAccount') }}
                                </h2>

                                <!-- Google Auth Button -->
                                <a {{-- href="{{ route('auth.google') }}"  --}}
                                    class="flex items-center justify-center gap-2 w-full py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                                        class="w-5 h-5">
                                    <span class="text-gray-700 font-medium">{{ __('googleLogin') }}</span>
                                </a>

                                <div class="flex items-center my-4">
                                    <div class="flex-1 h-px bg-gray-200"></div>
                                    <span class="px-3 text-sm text-gray-500">{{ __('or') }}</span>
                                    <div class="flex-1 h-px bg-gray-200"></div>
                                </div>

                                <!-- Login Form -->
                                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                                    @csrf

                                    <div class="flex flex-col">
                                        <label for="email"
                                            class="text-gray-700 font-medium mb-1">{{ __('email') }}</label>
                                        <input type="email" name="email" id="email"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                            placeholder="you@example.com" required>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="password"
                                            class="text-gray-700 font-medium mb-1">{{ __('password') }}</label>
                                        <input type="password" name="password" id="password"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                            placeholder="••••••••" required>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <label class="flex items-center space-x-2">
                                            <input type="checkbox" name="remember"
                                                class="rounded text-blue-600 focus:ring-blue-400">
                                            <span class="text-sm text-gray-700">{{ __('rememberMe') }}</span>
                                        </label>
                                        <a href="{{ route('password.request') }}"
                                            class="text-sm text-blue-600 hover:underline">{{ __('forgotPassword') }}</a>
                                    </div>

                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        {{ __('login') }}
                                    </button>
                                </form>

                                <p class="mt-4 text-sm text-gray-600 text-center">
                                    {{ __('dontHaveAccount') }}
                                    <button @click="loginModal = false; $dispatch('open-register-modal')"
                                        class="text-green-600 hover:underline">
                                        {{ __('register') }}
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ registerModal: false }" @open-register-modal.window="registerModal = true">
                        <!-- Trigger Button -->
                        <button @click="registerModal = true"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            {{ __('register') }}
                        </button>

                        <!-- Modal Overlay -->
                        <div x-show="registerModal" x-cloak
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                            <!-- Modal Content -->
                            <div @click.away="registerModal = false"
                                class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 relative" x-transition>
                                <!-- Close Button -->
                                <button @click="registerModal = false"
                                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl leading-none">&times;</button>

                                <!-- Header -->
                                <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">{{ __('createAccount') }}
                                </h2>

                                <!-- Google Auth Button -->
                                <a {{-- href="{{ route('auth.google') }}"  --}}
                                    class="flex items-center justify-center gap-2 w-full py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                                        class="w-5 h-5">
                                    <span class="text-gray-700 font-medium">{{ __('googleLogin') }}</span>
                                </a>

                                <div class="flex items-center my-4">
                                    <div class="flex-1 h-px bg-gray-200"></div>
                                    <span class="px-3 text-sm text-gray-500">or</span>
                                    <div class="flex-1 h-px bg-gray-200"></div>
                                </div>

                                <!-- Registration Form -->
                                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                                    @csrf

                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="text-gray-700 font-medium mb-1">{{ __('fullName') }}</label>
                                        <input type="text" name="name" id="name"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                                            placeholder="Your Name" required>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="email"
                                            class="text-gray-700 font-medium mb-1">{{ __('email') }}</label>
                                        <input type="email" name="email" id="email"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                                            placeholder="you@example.com" required>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="password"
                                            class="text-gray-700 font-medium mb-1">{{ __('password') }}</label>
                                        <input type="password" name="password" id="password"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                                            placeholder="••••••••" required>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="password_confirmation"
                                            class="text-gray-700 font-medium mb-1">{{ __('confirmPassword') }}</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                                            placeholder="••••••••" required>
                                    </div>

                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                        {{ __('register') }}
                                    </button>
                                </form>

                                <p class="mt-4 text-sm text-gray-600 text-center">
                                    {{ __('haveAccount') }}
                                    <button @click="registerModal = false; $dispatch('open-login-modal')"
                                        class="text-blue-600 hover:underline">
                                        {{ __('login') }}
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                @endauth

            </div>
        </div>

        <!-- Second Line: Header Image -->
        <div class="w-full">
            <img src="https://koekalenteri.snj.fi/static/media/banner_w1504.ba5aaa55c2379f6501fc.webp"
                alt="Header Image" class="w-full h-64 object-cover" />
        </div>
    </header>


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    <!-- Page Content -->
    <div class="bg-gray-100 min-h-screen w-full px-8">
        {{ $slot }}
    </div>
</body>

</html>
