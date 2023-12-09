@extends('layouts.app')

@section('userpage')
    <!-- component -->
    <div
        class="min-h-screen bg-gradient-to-tr from-sky-200 to-sky-50 flex flex-col items-center justify-center sm:h-full sm:p-5">

        <div class="relative max-w-xl w-full h-36 bg-white rounded-lg shadow-lg overflow-hidde mb-32">
            <div class="absolute inset-0 rounded-lg overflow-hidden bg-red-200"
                style="background-image: url({{ isset($user->profil) ? '/storage/profiles/' . $user->profil : '' }})
            ;background-size: cover;
            background-position: center">

                <div class="absolute inset-0 backdrop backdrop-blur-10 bg-gradient-to-b from-transparent to-black">

                </div>
            </div>
            <div class="absolute flex space-x-6 transform translate-x-6 translate-y-8">
                <div class='w-36 h-36 rounded-lg  overflow-hidden shadow-lg '>

                    <img src="{{ isset($user->profil) ? '/storage/profiles/' . $user->profil : '/images/profil.jpg' }}"
                        alt="profil" style="object-fit: cover;"  />

                </div>
                <div class="text-white pt-12">
                    <h3 class="font-bold">singer</h3>
                    <div class="text-sm opacity-60">{{ $user->name }}</div>
                    <div class="mt-8 text-gray-400">
                        <div class="flex items-center space-x-2 text-xs">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                                <path
                                    d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z">
                                </path>
                            </svg>
                            <span>Easy listening</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="mr-4 p-3 text-center">
                <span
                    class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $user->soungs->sum('views') }}</span>
                <span class="text-sm text-blueGray-400">Views</span>
            </div>
            <div class="mr-4 p-3 text-center">
                <span
                    class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $user->soungs->count() }}</span>
                <span class="text-sm text-blueGray-400">Soungs</span>
            </div>



        </div>
        @if ($user->soungs->count() > 0)
            <div class="max-w-xl bg-white rounded-lg shadow-lg overflow-hidden">

                <div id="cover" class="relative w-screen h-48"
                    style="background-image: url('/storage/covers/{{ $user->soungs[0]->cover }}');background-size: cover;background-position: center">

                    <div
                        class="absolute p-4 inset-0 flex flex-col justify-end bg-gradient-to-b from-transparent to-gray-900 backdrop backdrop-blur-5 text-white">
                        <h3 id="title" class="font-bold">{{ $user->soungs[0]->title }}</h3>

                    </div>


                </div>
                <div class="max-w-xl bg-white shadow-lg overflow-hidden">
                    <div>
                        <input class="w-full" type="range" id="progressRange" min="0" max="100" step="1"
                            value="0">
                    </div>

                    <div class=" mt-5 flex justify-between text-xs font-semibold text-gray-500 px-4 py-2">
                        <div>
                            <span id="current-time">0:00</span>
                        </div>
                        <div class="flex space-x-3 p-2">
                            <button id="prevButton" class="focus:outline-none">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="19 20 9 12 19 4 19 20"></polygon>
                                    <line x1="5" y1="19" x2="5" y2="5"></line>
                                </svg>
                            </button>
                            <button id="playPauseButton"
                                class="rounded-full w-8 h-8 flex items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor"
                                    class="bi bi-play" viewBox="0 0 16 16">
                                    <path
                                        d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z" />
                                </svg>
                            </button>
                            <button id="nextButton" class="focus:outline-none">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="5 4 15 12 5 20 5 4"></polygon>
                                    <line x1="19" y1="5" x2="19" y2="19"></line>
                                </svg>
                            </button>
                        </div>
                        <div>
                            <span id="duration">0:00</span>
                        </div>


                    </div>






                    <div class="mb-2 flex  me-5 items-center">
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
                        <input type="range" id="volumeControl" class="w-32" min="0" max="1"
                            step="0.01" value="1">



                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


                <script>
                    let nb = 0
                    const songs = []
                    @foreach ($user->soungs as $song)
                        songs.push({
                            'song': '{{ $song->song }}',
                            'cover': '{{ $song->cover }}',
                            'title': '{{ $song->title }}',
                            'id': '{{ $song->id }}'
                        })
                    @endforeach

                    const audio = new Audio;
                    addView(songs[nb])

                    function addView(song) {
                        audio.src = '/storage/songs/' + song.song;
                        axios({
                            method: 'post',
                            url: '/song/' + song.id + '/addview',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            }
                        });

                    }

                    const playPauseButton = document.getElementById('playPauseButton');
                    const currentTimeSpan = document.getElementById('current-time');
                    const durationSpan = document.getElementById('duration');
                    const prevButton = document.getElementById('prevButton');
                    const nextButton = document.getElementById('nextButton');

                    let isPlaying = false;

                    playPauseButton.addEventListener('click', togglePlayPause);
                    prevButton.addEventListener('click', playPrevious);
                    nextButton.addEventListener('click', playNext);
                    audio.addEventListener('timeupdate', updateCurrentTime);
                    audio.addEventListener('durationchange', updateDuration);

                    function togglePlayPause() {
                        if (isPlaying) {
                            audio.pause();

                            document.getElementById('playPauseButton').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                            <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
                          </svg>`
                        } else {
                            audio.play();
                            document.getElementById('playPauseButton').innerHTML = `<svg class="me-0.5" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
                            <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5"/>
                          </svg>`

                        }
                        isPlaying = !isPlaying;
                    }

                    function playPrevious() {
                        if (nb > 0) {
                            nb -= 1
                            audio.src = '/storage/songs/' + songs[nb].song

                            document.getElementById('title').innerText = songs[nb].title
                            document.getElementById('cover').style.backgroundImage = "url('/storage/covers/" + songs[nb].cover + "')"
                            audio.play()
                            document.getElementById('playPauseButton').innerHTML = `<svg class="me-0.5" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
                            <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5"/>
                          </svg>`
                        }
                        listSongsUpdate(songs)
                    }

                    function playNext() {
                        if (nb + 1 >= songs.length) {
                            nb = 0
                            addView(songs[nb])
                            document.getElementById('title').innerText = songs[nb].title
                            document.getElementById('cover').style.backgroundImage = "url('/storage/covers/" + songs[nb].cover + "')"
                            audio.play()
                            document.getElementById('playPauseButton').innerHTML = `<svg class="me-0.5" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
                            <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5"/>
                          </svg>`
                        } else {
                            nb += 1
                            addView(songs[nb])
                            document.getElementById('title').innerText = songs[nb].title
                            document.getElementById('cover').style.backgroundImage = "url('/storage/covers/" + songs[nb].cover + "')"
                            audio.play()
                            document.getElementById('playPauseButton').innerHTML = `<svg class="me-0.5" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
                            <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5"/>
                          </svg>`
                        }
                        listSongsUpdate(songs)
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
                            playNext()
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


                <ul id="songs" class="text-xs sm:text-base divide-y border-t cursor-default">

                    <script>
                        listSongsUpdate(songs)

                        function listSongsUpdate(songs) {
                            const songsList = document.getElementById('songs')
                            songsList.innerHTML = ''

                            songs.map((song, index) => {
                                var islisten = index == nb ? 'bg-indigo-600 text-white' : null
                                songsList.innerHTML += `<li   class="flex items-center space-x-3 hover:bg-gray-100">
                                                        <button  onclick="listenthis(${index})" class="p-3 hover:bg-indigo-600 group focus:outline-none ${islisten} ">
                                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                                            </svg>
                                                        </button>
                                                        <a href='/songs/listen/${song.id}' class="flex-1">
                                                            ${song.title}
                                                        </a>


                                                    </li>`
                            })
                        }


                        function listenthis(index) {
                            addView(songs[index])
                            document.getElementById('title').innerText = songs[index].title
                            document.getElementById('cover').style.backgroundImage = "url('/storage/covers/" + songs[index].cover + "')"
                            nb = index;
                            audio.play()
                            document.getElementById('playPauseButton').innerHTML = `<svg class="me-0.5" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
                            <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5"/>
                          </svg>`
                            listSongsUpdate(songs)
                        }
                    </script>

                </ul>


            </div>
        @endif
    </div>
@endsection

{{--  </div>
    <div>
        <div class="relative h-1 bg-gray-200">
            <div class="absolute h-full w-1/2 bg-indigo-600 flex items-center justify-end">
                <div class="rounded-full w-3 h-3 bg-white shadow"></div>
            </div>
        </div>
    </div>
    <div class="flex justify-between text-xs font-semibold text-gray-500 px-4 py-2">
        <div>
            1:50
        </div>
        <div class="flex space-x-3 p-2">
            <button class="focus:outline-none">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="19 20 9 12 19 4 19 20"></polygon>
                    <line x1="5" y1="19" x2="5" y2="5"></line>
                </svg>
            </button>
            <button
                class="rounded-full w-8 h-8 flex items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
            </button>
            <button class="focus:outline-none">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="5 4 15 12 5 20 5 4"></polygon>
                    <line x1="19" y1="5" x2="19" y2="19"></line>
                </svg>
            </button>
        </div>
        <div>
            3:00
        </div>  --}}
