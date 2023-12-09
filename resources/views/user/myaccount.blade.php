@extends('layouts.app')

@section('myAcc')
    <!-- component -->
    {{--  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">  --}}

    <section class="py-5 background-radial-gradient">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }
        </style>

        <div class="w-full lg:w-5/12 px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words  bg-gray-200 w-full mb-5 shadow-xl rounded-lg mt-16">
                <div class="px-3">
                    <h3 class="text-center mt-8 mb-4 text-xl font-semibold leading-normal mb-2 text-blueGray-700">
                        {{ $user->name }}
                    </h3>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full px-4 flex justify-center">

                            <div class="relative">

                                <div class="relative overflow-hidden rounded-lg mt-5">
                                    <img src="{{ isset($user->profil) ? '/storage/profiles/' . $user->profil : 'images/profil.jpg' }}"
                                        alt="profil" style="object-fit: cover;"
                                        class="w-full w-32 h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 xl:w-96 xl:h-96" />
                                </div>

                            </div>
                        </div>
                        <div class="w-full px-4 text-center mt-5">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">

                                <div class="mr-4 p-3 text-center">
                                    <span
                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$user->soungs->sum('views')}}</span>
                                    <span class="text-sm text-blueGray-400">Views</span>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <span
                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $user->soungs->count() }}</span>
                                    <span class="text-sm text-blueGray-400">Soungs</span>
                                </div>



                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>







        <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
            <h1 class="mt-10 mb-8 text-3xl font-bold tracking-tight text-gray-200 md:text-4xl xl:text-5xl uppercase">
                Songs list</h1>





            <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">


                <div class=" bg-gray-900 rounded overflow-hidden shadow-lg w-3/4 ">
                    <a href="{{ route('addsoung') }}">

                        <div class="w-full px-4 flex justify-center">

                            <div class="relative">

                                <div class="relative overflow-hidden rounded-lg mt-5">
                                    <img src="images\plus-icon.jpg" alt="profil" style="object-fit: cover;"
                                        class="w-full h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 xl:w-64 xl:h-64" />

                                </div>

                            </div>
                        </div>
                        <div class="px-6 py-4">

                            <p class="text-white text-lg hover:text-indigo-600 transition duration-500 ease-in-out">
                                add song</p>

                        </div>
                    </a>

                </div>







                @foreach ($user->soungs as $song)
                    <a href="{{route('listensong',$song->id)}}">
                        <div class=" bg-gray-900 rounded overflow-hidden shadow-lg w-3/4 ">


                            <div class="w-full px-4 flex justify-center">

                                <div class="relative">

                                    <div class="relative overflow-hidden rounded-lg mt-5">
                                        <img src="/storage/covers/{{ $song->cover }}" alt="profil" style="object-fit: cover;"
                                            class="w-full h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 xl:w-64 xl:h-64" />
                                        <div class="absolute text-center top-2 right-2 flex">
                                            <form action="{{ route('deletesoung', $song->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class=" bg-red-500 hover:bg-red-600 text-white py-2 px-2 font-bold rounded inline-flex items-center me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('editsong', $song->id) }}" method="GET">

                                                <button type="submit"
                                                    class=" bg-blue-500 hover:bg-blue-600 text-white py-2 px-2 font-bold rounded inline-flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-gear w-6 h-6" viewBox="0 0 16 16">
                                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                                      </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="px-6 py-4">

                                <p class="text-white text-lg hover:text-indigo-600 transition duration-500 ease-in-out">
                                    {{ $song->title }}</p>

                            </div>


                        </div>
                    </a>
                @endforeach

            </div>

    </section>
@endsection
