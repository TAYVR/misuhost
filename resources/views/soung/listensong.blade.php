@extends('layouts.app')

@section('listensong')
    <div class="background-radial-gradient p-4 flex justify-center items-center xl:h-full sm:h-screen">
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
        <div class="bg-white p-8 rounded-lg mt-5 shadow-md w-80">

            <img src="/storage/covers/{{ $song->cover }}" alt="idk - Highvyn, Taylor Shin"
                class="w-64 h-64 mx-auto rounded-lg mb-4 shadow-lg shadow-teal-50">
            <h2 class="text-xl font-semibold text-center">{{ $song->title }}</h2>
            <a href="{{route('userpage',$song->user->id)}}" ><p class="text-gray-600 text-sm text-center">{{ $song->user->name }}</p></a>





            @auth
                <div class="flex justify-between">

                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        var idsong = {{ $song->id }}
                        $(document).ready(function() {
                            $('#like').on('click', function() {
                                $.ajax({
                                    url: "{{ route('like', $song->id) }}",
                                    type: 'POST',

                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    success: function(response) {
                                        if (response.likes > document.getElementById('likesnb').innerHTML) {
                                            document.getElementById('like').style.color = '#1d4ed8'
                                            document.getElementById('likeicon').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                          </svg>`;
                                        } else {

                                            document.getElementById('like').style.color = 'black'
                                            document.getElementById('likeicon').innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                            <path
                                                d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                        </svg>`
                                        }
                                        document.getElementById('likesnb').innerHTML = response.likes;






                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            });



                            $('#favorite').on('click', function() {
                                $.ajax({
                                    url: "{{ route('addToFavorite', $song->id) }}",
                                    type: 'POST',

                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    success: function(response) {



                                        if (response.addfaverite) {
                                            document.getElementById('favorite').style.color = '#e3242b'
                                            document.getElementById('favorite').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                              </svg>`;
                                        } else {

                                            document.getElementById('favorite').style.color = 'black'
                                            document.getElementById('favorite').innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>`
                                        }



                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            });


                        });
                    </script>


                    <button id="favorite" class="hover:scale-110 text-black">
                        @if ($song->favorites->contains(Auth::user()->id))
                            <svg style="color: #e3242b" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                            </svg>
                        @else
                            <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                            </svg>
                        @endif

                    </button>


                    <button id="like" class="hover:scale-110">
                        <span id="likeicon">


                            @if ($song->likes()->where('user_id', Auth::user()->id)->first() != null)
                                <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                </svg>
                            @endif



                        </span>
                        <span id="likesnb">{{ $song->likes->count('*') }}</span>
                    </button>
                </div>



            @endauth

            @guest

                <div class="flex justify-between">
                    <a href="{{ route('login') }}" class="hover:scale-110 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>

                    </a>


                    <a href="{{ route('login') }}" id="like" class="hover:scale-110">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                <path
                                    d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                            </svg>
                        </span>
                        <span class="ms-1">{{ $song->likes->count('*') }}</span>
                    </a>
                </div>
            @endguest


            <div class="mt-6 flex justify-center items-center">
                <button class="p-3 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none" id="prevButton">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" class="w-4 h-4 text-gray-600" fill="none"
                        xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M16.6598 14.6474C18.4467 13.4935 18.4467 10.5065 16.6598 9.35258L5.87083 2.38548C4.13419 1.26402 2 2.72368 2 5.0329V18.9671C2 21.2763 4.13419 22.736 5.87083 21.6145L16.6598 14.6474Z"
                                fill="#000000"></path>
                            <path
                                d="M22.75 5C22.75 4.58579 22.4142 4.25 22 4.25C21.5858 4.25 21.25 4.58579 21.25 5V19C21.25 19.4142 21.5858 19.75 22 19.75C22.4142 19.75 22.75 19.4142 22.75 19V5Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                </button>
                <button class="p-4 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none mx-4" id="playPauseButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                      </svg>
                </button>
                <button class="p-3 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none" id="nextButton">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" class="w-4 h-4 text-gray-600" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M16.6598 14.6474C18.4467 13.4935 18.4467 10.5065 16.6598 9.35258L5.87083 2.38548C4.13419 1.26402 2 2.72368 2 5.0329V18.9671C2 21.2763 4.13419 22.736 5.87083 21.6145L16.6598 14.6474Z"
                                fill="#000000"></path>
                            <path
                                d="M22.75 5C22.75 4.58579 22.4142 4.25 22 4.25C21.5858 4.25 21.25 4.58579 21.25 5V19C21.25 19.4142 21.5858 19.75 22 19.75C22.4142 19.75 22.75 19.4142 22.75 19V5Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                </button>
            </div>



                <div>
                    <input class="w-full" type="range" id="progressRange" min="0" max="100" step="1"
                        value="0">
                </div>



            <div class="flex justify-between mt-2 text-sm text-gray-600">
                <span id="currentTime">0:00</span>
                <span id="duration">0:00</span>
            </div>


            <div class="mt-2 flex justify-center me-5 items-center">
                <label id="volumeicon" onclick="mute()" class="text-xs text-gray-600 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-volume-up" viewBox="0 0 16 16">
                        <path
                            d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z" />
                        <path
                            d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89z" />
                        <path
                            d="M10.025 8a4.486 4.486 0 0 1-1.318 3.182L8 10.475A3.489 3.489 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.486 4.486 0 0 1 10.025 8M7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11" />
                    </svg>
                </label>
                <input type="range" id="volumeControl" class="w-32" min="0" max="1" step="0.01"
                    value="1">



            </div>




        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>


        const audio = new Audio('/storage/songs/{{$song->song}}')



            axios({
                method: 'post',
                url: '/song/{{$song->id}}/addview',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            })

        const playPauseButton = document.getElementById('playPauseButton');
        const currentTimeSpan = document.getElementById('currentTime');
        const durationSpan = document.getElementById('duration');



        playPauseButton.addEventListener('click', togglePlayPause);

        audio.addEventListener('timeupdate', updateCurrentTime);
        audio.addEventListener('durationchange', updateDuration);

        function togglePlayPause() {
            if (audio.paused) {
                audio.play();
                document.getElementById('playPauseButton').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">
        <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5m5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5"/>
      </svg>`
            } else {
                audio.pause();
                document.getElementById('playPauseButton').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
      </svg>`
            }
        }




        function updateCurrentTime() {
            const currentTime = formatTime(audio.currentTime);
            currentTimeSpan.textContent = currentTime;
        }

        function updateDuration() {
            const duration = formatTime(audio.duration);
            durationSpan.textContent = duration;
        }

        function formatTime(time) {
            const minutes = Math.floor(time / 60);
            const seconds = Math.floor(time % 60);
            return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        const progressRange = document.getElementById('progressRange');








        progressRange.addEventListener('change', updateProgressran);

        function updateProgressran() {
            const progress = progressRange.value / 100;
            const currentTime = progress * audio.duration;
            audio.currentTime = currentTime;
            updateCurrentTime();
        }

        audio.addEventListener('timeupdate', () => {
            const progress = (audio.currentTime / audio.duration) * 100;
            progressRange.value = progress;
            if (audio.ended) {
                nextSong()
            }
            updateCurrentTime();

        });



        //volume


        const volumeControl = document.getElementById('volumeControl');
        volumeControl.addEventListener('input', adjustVolume);

        function adjustVolume() {
            audio.volume = volumeControl.value;
            if (volumeControl.value > 0) {
                document.getElementById('volumeicon').innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-volume-up" viewBox="0 0 16 16">
        <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z"/>
        <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89z"/>
        <path d="M10.025 8a4.486 4.486 0 0 1-1.318 3.182L8 10.475A3.489 3.489 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.486 4.486 0 0 1 10.025 8M7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11"/>
      </svg>`
            } else {
                document.getElementById('volumeicon').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-volume-mute" viewBox="0 0 16 16">
        <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06zM6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0z"/>
      </svg>`
            }

        }

        var vol;

        function mute() {
            if (audio.volume != 0) {
                audio.volume = 0
                vol = volumeControl.value
                volumeControl.value = 0

                document.getElementById('volumeicon').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  fill="currentColor" class="bi bi-volume-mute" viewBox="0 0 16 16">
        <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06zM6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0z"/>
      </svg>`

            } else {
                audio.volume = vol
                volumeControl.value = vol
                document.getElementById('volumeicon').innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-volume-up" viewBox="0 0 16 16">
        <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z"/>
        <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89z"/>
        <path d="M10.025 8a4.486 4.486 0 0 1-1.318 3.182L8 10.475A3.489 3.489 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.486 4.486 0 0 1 10.025 8M7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11"/>
      </svg>`
            }
        }
    </script>

    <script>
        const nextButton=document.getElementById('nextButton');
        const prevButton=document.getElementById('prevButton');
        nextButton.addEventListener('click', nextSong);
        prevButton.addEventListener('click', prevSong);

        function nextSong(){
            axios({
                method: 'post',
                url: '{{route("getPrevOrNext",$song->id)}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                  type: 'next'
                }
              }).then((res)=>window.location.href="/songs/listen/"+res.data.song.id)
              .catch((err)=>console.log(err.message));
        }

        function prevSong(){
            axios({
                method: 'post',
                url: '{{route("getPrevOrNext",$song->id)}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                  type: 'prev'
                }
              }).then((res)=>window.location.href="/songs/listen/"+res.data.song.id)
              .catch((err)=>console.log(err.message));
        }





    </script>



@endsection
