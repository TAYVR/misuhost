@extends('layouts.app')
@section('addsoung')
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
        <div class="w-full sm:w-3/4  mx-auto sm:mt-0  bg-gray-100 w-full mb-5 shadow-xl rounded-lg">
            <form id="formadd" action="{{route('storesoung')}}" method="POST" enctype="multipart/form-data">
            @csrf

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

                            <input id="title" type="text" name="title" placeholder="Title"
                                class=" w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6493f1] focus:shadow-md" />
                        </div>




                        @error('song')
                            <p class="text-center block text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="flex w-full p-18 items-center justify-center bg-grey-lighter">
                            <label for="song"
                                class="w-60 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-blue-500">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span id="selectsoung" class="m-2 text-base leading-normal">Select Soung</span>
                                <input type='file' class="hidden" onchange="uploadsoung()" id="song" name="song"
                                    accept=".mp3,audio/*" />
                            </label>
                        </div>



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
