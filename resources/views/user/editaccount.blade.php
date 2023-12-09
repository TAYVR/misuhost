@extends('layouts.app')

@section('editAcc')

<section class="background-radial-gradient py-10 lg:py-[120px]">
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
    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-gray-200 py-16 px-10 text-center sm:px-12 md:px-[60px]">

                    <form action="{{route('update',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @error('profil')
                        <p class="block text-red-600" >{{$message}}</p>
                        @enderror

                        <div class="flex items-center justify-center w-full">



                            <label for="fileInput" id="lablefile"

                                class="flex flex-col items-center justify-center h-40 w-40 mb-5 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <script>
                                        var profil="{{ isset($user->profil) ? '/storage/profiles/' . $user->profil : '/images/profil.jpg'}}"


                                        document.getElementById('lablefile').style.backgroundImage = 'url('+profil+')';
                                        document.getElementById('lablefile').style.backgroundSize = 'cover';
                                        document.getElementById('lablefile').style.backgroundPosition = 'cover';


                                    </script>

                                    <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 "><span
                                            class="font-semibold">Profil Photo</span></p>
                                    <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="fileInput" type="file" name="profil" class="hidden" onchange="displayImage()" accept="image/png, image/gif, image/jpeg"/>

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
                                                lablefile.children[0].innerHTML=''

                                            };

                                            reader.readAsDataURL(file);

                                        }
                                    }
                                </script>


                            </label>

                        </div>



                        <div class="mb-6">
                            @error('name')
                                <p class="text-start text-red-600">{{ $message }}</p>
                            @enderror
                            <input value="{{$user->name}}" type="text" placeholder="Name" name="name"
                                class="w-full px-5 py-3 text-base bg-transparent border border-gray-400 rounded-md outline-none border-stroke text-body-colordark:border-dark-3 focus:border-primary focus-visible:shadow-none" />
                        </div>

                        <div class="mb-6">
                            @error('password')
                                <p class="text-start text-red-600">{{ $message }}</p>
                            @enderror
                            <input type="password" name="password" placeholder="New password"
                                class="w-full px-5 py-3 text-base bg-transparent border border-gray-400 rounded-md outline-none border-stroke text-body-colordark:border-dark-3 focus:border-primary focus-visible:shadow-none" />
                        </div>
                        <div class="mb-6">

                            <input type="password" name="password_confirmation" placeholder="confirm Password"
                                class="w-full px-5 py-3 text-base bg-transparent border border-gray-400 rounded-md outline-none border-stroke text-body-colordark:border-dark-3 focus:border-primary focus-visible:shadow-none" />
                        </div>
                        <div class="mb-10">
                            <input type="submit" value="Save"
                                class="w-full px-5 py-3 text-base font-medium text-white transition border rounded-md cursor-pointer border-primary bg-blue-600 hover:bg-opacity-90" />
                        </div>
                    </form>


















                    <circle cx="1.39737" cy="38.6026" r="1.39737" transform="rotate(-90 1.39737 38.6026)"
                        fill="#3056D3" />
                    <circle cx="1.39737" cy="1.99122" r="1.39737" transform="rotate(-90 1.39737 1.99122)"
                        fill="#3056D3" />
                    <circle cx="13.6943" cy="38.6026" r="1.39737" transform="rotate(-90 13.6943 38.6026)"
                        fill="#3056D3" />
                    <circle cx="13.6943" cy="1.99122" r="1.39737" transform="rotate(-90 13.6943 1.99122)"
                        fill="#3056D3" />
                    <circle cx="25.9911" cy="38.6026" r="1.39737" transform="rotate(-90 25.9911 38.6026)"
                        fill="#3056D3" />
                    <circle cx="25.9911" cy="1.99122" r="1.39737" transform="rotate(-90 25.9911 1.99122)"
                        fill="#3056D3" />
                    <circle cx="38.288" cy="38.6026" r="1.39737" transform="rotate(-90 38.288 38.6026)"
                        fill="#3056D3" />
                    <circle cx="38.288" cy="1.99122" r="1.39737" transform="rotate(-90 38.288 1.99122)"
                        fill="#3056D3" />
                    <circle cx="1.39737" cy="26.3057" r="1.39737" transform="rotate(-90 1.39737 26.3057)"
                        fill="#3056D3" />
                    <circle cx="13.6943" cy="26.3057" r="1.39737" transform="rotate(-90 13.6943 26.3057)"
                        fill="#3056D3" />
                    <circle cx="25.9911" cy="26.3057" r="1.39737" transform="rotate(-90 25.9911 26.3057)"
                        fill="#3056D3" />
                    <circle cx="38.288" cy="26.3057" r="1.39737" transform="rotate(-90 38.288 26.3057)"
                        fill="#3056D3" />
                    <circle cx="1.39737" cy="14.0086" r="1.39737" transform="rotate(-90 1.39737 14.0086)"
                        fill="#3056D3" />
                    <circle cx="13.6943" cy="14.0086" r="1.39737" transform="rotate(-90 13.6943 14.0086)"
                        fill="#3056D3" />
                    <circle cx="25.9911" cy="14.0086" r="1.39737" transform="rotate(-90 25.9911 14.0086)"
                        fill="#3056D3" />
                    <circle cx="38.288" cy="14.0086" r="1.39737" transform="rotate(-90 38.288 14.0086)"
                        fill="#3056D3" />
                    </svg>
                    </span>
                    <span class="absolute left-1 bottom-1">
                        <svg width="29" height="40" viewBox="0 0 29 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2.288" cy="25.9912" r="1.39737" transform="rotate(-90 2.288 25.9912)"
                                fill="#3056D3" />
                            <circle cx="14.5849" cy="25.9911" r="1.39737" transform="rotate(-90 14.5849 25.9911)"
                                fill="#3056D3" />
                            <circle cx="26.7216" cy="25.9911" r="1.39737" transform="rotate(-90 26.7216 25.9911)"
                                fill="#3056D3" />
                            <circle cx="2.288" cy="13.6944" r="1.39737" transform="rotate(-90 2.288 13.6944)"
                                fill="#3056D3" />
                            <circle cx="14.5849" cy="13.6943" r="1.39737" transform="rotate(-90 14.5849 13.6943)"
                                fill="#3056D3" />
                            <circle cx="26.7216" cy="13.6943" r="1.39737" transform="rotate(-90 26.7216 13.6943)"
                                fill="#3056D3" />
                            <circle cx="2.288" cy="38.0087" r="1.39737" transform="rotate(-90 2.288 38.0087)"
                                fill="#3056D3" />
                            <circle cx="2.288" cy="1.39739" r="1.39737" transform="rotate(-90 2.288 1.39739)"
                                fill="#3056D3" />
                            <circle cx="14.5849" cy="38.0089" r="1.39737" transform="rotate(-90 14.5849 38.0089)"
                                fill="#3056D3" />
                            <circle cx="26.7216" cy="38.0089" r="1.39737" transform="rotate(-90 26.7216 38.0089)"
                                fill="#3056D3" />
                            <circle cx="14.5849" cy="1.39761" r="1.39737" transform="rotate(-90 14.5849 1.39761)"
                                fill="#3056D3" />
                            <circle cx="26.7216" cy="1.39761" r="1.39737" transform="rotate(-90 26.7216 1.39761)"
                                fill="#3056D3" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



@endsection
