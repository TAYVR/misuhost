@extends('layouts.app')

@section('allsong')

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
    <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-gray-200 mb-5">All songs</h1>
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
              <p class="text-center"><span>{{$song->views}}</span>
                <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
            </p>
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
  {{--  <div class="mt-5">
    <div class="flex items-center justify-between">
        <span class="text-gray-400">Page {{ $songs->currentPage() }} of {{ $songs->lastPage() }}</span>
        <div>
            @foreach(range(1, $songs->lastPage()) as $page)
                <a href="{{ $songs->url($page) }}" class="btn btn-sm {{ $page == $songs->currentPage() ? 'btn-primary' : 'btn-secondary' }}">{{ $page }}</a>
            @endforeach
        </div>
    </div>
</div>  --}}

<nav class="mt-5" aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-sm">
      <li>
        <a href="{{$songs->previousPageUrl()}}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight  rounded-s-lg hover:bg-gray-100 hover:text-gray-700 bg-gray-800 border-gray-700 text-gray-400 hover:c hover:text-white">Previous</a>
      </li>

      @foreach(range(1, $songs->lastPage()) as $page)

      <li>
        <a href="{{ $songs->url($page) }}" class=" flex items-center justify-center px-3 h-8 leading-tight  border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white {{ $page == $songs->currentPage() ? 'bg-sky-500 text-white' : 'bg-gray-800 text-gray-400' }}">{{ $page }}</a>
      </li>

      @endforeach


      <li>
        <a href="{{$songs->nextPageUrl()}}" class="flex items-center justify-center px-3 h-8 leading-tight  bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">Next</a>
      </li>
    </ul>
</nav>

</main>

@endsection

