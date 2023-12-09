@extends('layouts.app')

@section('favorites')

<!-- component -->
<main class="grid place-items-center min-h-screen background-radial-gradient p-5">
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
  <div>
    <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-gray-200 mb-5">My favorites</h1>
    <section class="grid grid-cols-1 sm:grid-cols-3 gap-4">



      @foreach ( $songs as $song)
      <div class="bg-gray-900 shadow-lg rounded p-3 overflow-hidden">
        <div class="group relative">
          <img class="w-full md:w-72 block rounded" src="/storage/covers/{{ $song->cover }}" alt="" />
          <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">


            <a href="{{route('listensong',$song->id)}}" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
              </svg>
            </a>


          </div>
        </div>
        <div class="p-5">
          <h3 class="text-white text-lg w-60">{{$song->title}}</h3>
          <p class="text-gray-400 w-60">{{$song->user->name}}</p>
        </div>
      </div>

      @endforeach


    </section>
  </div>
</main>

@endsection

