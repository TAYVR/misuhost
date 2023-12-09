@extends('layouts.app')
@section('editsong')
    <section class="sm:h-screen p-3 sm:p-10 w-full background-radial-gradient ">
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
        <div class="w-full sm:w-3/4  mx-auto sm:mt-0  bg-gray-100  mb-5 shadow-xl rounded-lg">
            <form id="formadd" action="{{route('updatesong',$song->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">


                        <div class="flex mt-5 items-center justify-center flex-col w-full">


                            <p for="cover" class="mb-3 block text-base font-medium text-[#07074D]">
                                cover
                            </p>

                            <label for="fileInput" id="lablefile"
                                class="flex flex-col items-center justify-center h-40 w-40 mb-5 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-center text-gray-500 "><span class="font-semibold">Click to
                                            upload</span></p>
                                    <p class="text-xs text-gray-500 text-center">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="fileInput" type="file" name="cover" class="hidden" onchange="displayImage()"
                                    accept="image/png, image/gif, image/jpeg" />

                                <script>
                                    var cover="/storage/covers/{{$song->cover}}"


                                        document.getElementById('lablefile').style.backgroundImage = 'url('+cover+')';
                                        document.getElementById('lablefile').style.backgroundSize = 'cover';
                                        document.getElementById('lablefile').style.backgroundPosition = 'cover';

                                    function displayImage() {
                                        var input = document.getElementById('fileInput');;


                                        if (input.files.length > 0) {
                                            var file = input.files[0];

                                            var reader = new FileReader();
                                            reader.onload = function(e) {



                                                var lablefile = document.getElementById('lablefile');
                                                lablefile.style.backgroundImage = 'url(' + e.target.result + ')';
                                                lablefile.style.backgroundSize = 'cover';
                                                lablefile.children[0].innerHTML = ''

                                            };

                                            reader.readAsDataURL(file);

                                        }
                                    }


                                    function uploadsoung() {
                                        var input = document.getElementById('song');


                                        if (input.files.length > 0) {

                                            let file = input.files[0]

                                            document.getElementById('selectsoung').innerText = file.name
                                            document.getElementById('selectsoung').previousElementSibling.remove()

                                            if (document.getElementById('title').value === '') document.getElementById('title').value = file.name;






                                        }
                                    }
                                </script>


                            </label>

                        </div>

                        @error('cover')
                            <p class="text-center  text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="my-10 mx-5">
                                @error('title')
                                    <p class="block text-red-600">{{ $message }}</p>
                                @enderror


                                <label for="title" class="font-semibold text-gray-700 block pb-1">Title</label>

                                <input value="{{ $song->title }}" id="title" type="text" name="title"
                                    placeholder="Title"
                                    class=" w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6493f1] focus:shadow-md" />
                            </div>



                            {{--  <audio id="myAudio" controls>
                                <source src="/storage/songs/{{ $song->song }}" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>  --}}







                            <div class=" bg-white shadow-lg overflow-hidden w-full">
                                <div>
                                    <input class="w-full" type="range" id="progressRange" min="0" max="100"
                                        step="1" value="0">
                                </div>

                                <div class=" mt-5 flex justify-between text-xs font-semibold text-gray-500 px-4 py-2">
                                    <div>
                                        <span id="current-time">0:00</span>
                                    </div>
                                    <div class="flex space-x-3 p-2">

                                        <button type="button" id="playPauseButton"
                                            class="rounded-full w-8 h-8 flex items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z" />
                                            </svg>
                                        </button>

                                    </div>
                                    <div>
                                        <span id="duration">0:00</span>
                                    </div>






                                </div>
                                <div class="mb-2 flex me-5 items-center">
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

                         <script>
                                    const audio = new Audio("/storage/songs/{{ $song->song }}");



                                    const playPauseButton = document.getElementById('playPauseButton');
                                    const currentTimeSpan = document.getElementById('current-time');
                                    const durationSpan = document.getElementById('duration');


                                    let isPlaying = false;

                                    playPauseButton.addEventListener('click', togglePlayPause);

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



                                    progressRange.addEventListener('input', updateProgressran);

                                    function updateProgressran(e) {
                                        const progress = progressRange.value / 100;
                                        const currentTime = progress * audio.duration;
                                        audio.currentTime = progress * audio.duration;
                                        updateCurrentTime();
                                    }

                                    audio.addEventListener('timeupdate', () => {
                                        const progress = (audio.currentTime / audio.duration) * 100;
                                        progressRange.value = progress;
                                        if (audio.ended) {
                                            //
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




                                {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
                            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
                            crossorigin="anonymous" referrerpolicy="no-referrer"></script>  --}}

                                {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
                            integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
                            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                        <script>
                            $(document).ready(function() {
                                var bar = $('.bar');
                                var percent = $('.percent');

                                $('form').ajaxForm({
                                    beforeSend: function() {
                                        var percentVal = '0%';
                                        bar.width(percentVal);
                                        percent.html(percentVal);
                                    },
                                    uploadProgress: function(event, position, total, percentComplete) {
                                        var percentVal = percentComplete = '%';
                                        bar.width(percentVal);
                                        percent.html(percentVal);
                                    },
                                    complete: function() {
                                        alert('file uploaded successfully!');
                                    }
                                })
                            });
                        </script>  --}}




                                <div class="px-4 py-3 mt-8 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Upload
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
            </form>
        </div>


    </section>
@endsection
