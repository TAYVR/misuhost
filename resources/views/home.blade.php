@extends ('layouts.app')


@section('content')
    <section class="background-radial-gradient ">
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

        <div class="mb-12 px-6 py-12 text-center md:px-12 lg:text-left">
            <div class="container mx-auto">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="mt-12 lg:mt-0">
                        <h1 class="mb-8 text-5xl font-bold tracking-tight text-[hsl(218,81%,95%)] md:text-6xl xl:text-7xl">
                            The Music <br /><span class="text-[hsl(218,81%,75%)]">is our refuge</span>
                        </h1>
                        <p class="text-lg text-[hsl(218,81%,95%)]">
                            are you ready to go into a world full of music?
                            <br>you can listen and share your music with others
                        </p>



                        <a href="{{route('allsong')}}" type="button"
                            class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 mt-5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            All Songs</a>



                    </div>
                    <div class="">
                        <div class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden rounded-lg shadow-lg"
                            style="padding-top: 56.25%">
                            <img class="embed-responsive-item absolute top-0 right-0 bottom-0 left-0 h-full w-full"
                                src="images\dj.jpg" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto mt-12">
            <div class="mx-2 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[510px] text-center">
                        <h1
                            class="mt-10 mb-8 text-3xl font-bold tracking-tight text-[hsl(0,0%,100%)] md:text-4xl xl:text-5xl uppercase">
                            The most viewed singer
                        </h1>


                    </div>
                </div>
            </div>
            <div class="-mx-4 flex flex-wrap justify-center">
                @foreach ($users as $user)
                <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                    <div class="mx-auto mb-10 w-full max-w-[370px]">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="{{ isset($user->profil) ? '/storage/profiles/' . $user->profil : 'images/profil.jpg' }}" alt="image"
                                class="w-full" />
                            <div class="absolute bottom-5 left-0 w-full text-center">
                                <a href="{{route('userpage',$user->id)}}">
                                    <div class="relative mx-5 overflow-hidden rounded-lg bg-white -2 py-5 px-3">
                                        <h3 class="text-dark  text-base font-semibold">
                                            {{isset($user->total_views)?$user->total_views:'0'}} views
                                        </h3>
                                        <p class="text-body-color dark:text-dark-6 text-xs">{{$user->name}}</p>
                                        <div>
                                            <span class="absolute left-0 bottom-0">
                                                <svg width="61" height="30" viewBox="0 0 61 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16" cy="45" r="45" fill="#13C296"
                                                        fill-opacity="0.11" />
                                                </svg>
                                            </span>
                                            <span class="absolute top-0 right-0">
                                                <svg width="20" height="25" viewBox="0 0 20 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="0.706257" cy="24.3533" r="0.646687"
                                                        transform="rotate(-90 0.706257 24.3533)" fill="#3056D3" />
                                                    <circle cx="6.39669" cy="24.3533" r="0.646687"
                                                        transform="rotate(-90 6.39669 24.3533)" fill="#3056D3" />
                                                    <circle cx="12.0881" cy="24.3533" r="0.646687"
                                                        transform="rotate(-90 12.0881 24.3533)" fill="#3056D3" />
                                                    <circle cx="17.7785" cy="24.3533" r="0.646687"
                                                        transform="rotate(-90 17.7785 24.3533)" fill="#3056D3" />
                                                    <circle cx="0.706257" cy="18.6624" r="0.646687"
                                                        transform="rotate(-90 0.706257 18.6624)" fill="#3056D3" />
                                                    <circle cx="6.39669" cy="18.6624" r="0.646687"
                                                        transform="rotate(-90 6.39669 18.6624)" fill="#3056D3" />
                                                    <circle cx="12.0881" cy="18.6624" r="0.646687"
                                                        transform="rotate(-90 12.0881 18.6624)" fill="#3056D3" />
                                                    <circle cx="17.7785" cy="18.6624" r="0.646687"
                                                        transform="rotate(-90 17.7785 18.6624)" fill="#3056D3" />
                                                    <circle cx="0.706257" cy="12.9717" r="0.646687"
                                                        transform="rotate(-90 0.706257 12.9717)" fill="#3056D3" />
                                                    <circle cx="6.39669" cy="12.9717" r="0.646687"
                                                        transform="rotate(-90 6.39669 12.9717)" fill="#3056D3" />
                                                    <circle cx="12.0881" cy="12.9717" r="0.646687"
                                                        transform="rotate(-90 12.0881 12.9717)" fill="#3056D3" />
                                                    <circle cx="17.7785" cy="12.9717" r="0.646687"
                                                        transform="rotate(-90 17.7785 12.9717)" fill="#3056D3" />
                                                    <circle cx="0.706257" cy="7.28077" r="0.646687"
                                                        transform="rotate(-90 0.706257 7.28077)" fill="#3056D3" />
                                                    <circle cx="6.39669" cy="7.28077" r="0.646687"
                                                        transform="rotate(-90 6.39669 7.28077)" fill="#3056D3" />
                                                    <circle cx="12.0881" cy="7.28077" r="0.646687"
                                                        transform="rotate(-90 12.0881 7.28077)" fill="#3056D3" />
                                                    <circle cx="17.7785" cy="7.28077" r="0.646687"
                                                        transform="rotate(-90 17.7785 7.28077)" fill="#3056D3" />
                                                    <circle cx="0.706257" cy="1.58989" r="0.646687"
                                                        transform="rotate(-90 0.706257 1.58989)" fill="#3056D3" />
                                                    <circle cx="6.39669" cy="1.58989" r="0.646687"
                                                        transform="rotate(-90 6.39669 1.58989)" fill="#3056D3" />
                                                    <circle cx="12.0881" cy="1.58989" r="0.646687"
                                                        transform="rotate(-90 12.0881 1.58989)" fill="#3056D3" />
                                                    <circle cx="17.7785" cy="1.58989" r="0.646687"
                                                        transform="rotate(-90 17.7785 1.58989)" fill="#3056D3" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection


@section('footer')
    <!-- ====== Footer Section Start -->
    <footer class="relative z-10 bg-white  pt-20 pb-10 lg:pt-[120px] lg:pb-20">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                    <div class="w-full mb-10">
                        <a href="javascript:void(0)" class="mb-6 inline-block max-w-[160px]">
                            <h1
                                class="mb-8 text-5xl font-bold tracking-tight text-[hsl(218,81%,95%)] md:text-6xl xl:text-7xl">
                                MUSI <br>HOST</span>
                            </h1>
                        </a>
                        <p class="text-base text-body-color dark:text-dark-6 mb-7">
                            Thanks for listening. <br>
                            Save tracks, follow artists and build playlists. All for free.
                        <p class="flex items-center text-sm font-medium text-dark ">
                            <span class="mr-3 text-primary">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_941_15626)">
                                        <path
                                            d="M15.1875 19.4688C14.3438 19.4688 13.375 19.25 12.3125 18.8438C10.1875 18 7.84377 16.375 5.75002 14.2813C3.65627 12.1875 2.03127 9.84377 1.18752 7.68752C0.250019 5.37502 0.343769 3.46877 1.43752 2.40627C1.46877 2.37502 1.53127 2.34377 1.56252 2.31252L4.18752 0.750025C4.84377 0.375025 5.68752 0.562525 6.12502 1.18752L7.96877 3.93753C8.40627 4.59378 8.21877 5.46877 7.59377 5.90627L6.46877 6.68752C7.28127 8.00002 9.59377 11.2188 13.2813 13.5313L13.9688 12.5313C14.5 11.7813 15.3438 11.5625 16.0313 12.0313L18.7813 13.875C19.4063 14.3125 19.5938 15.1563 19.2188 15.8125L17.6563 18.4375C17.625 18.5 17.5938 18.5313 17.5625 18.5625C17 19.1563 16.1875 19.4688 15.1875 19.4688ZM2.37502 3.46878C1.78127 4.12503 1.81252 5.46877 2.50002 7.18752C3.28127 9.15627 4.78127 11.3125 6.75002 13.2813C8.68752 15.2188 10.875 16.7188 12.8125 17.5C14.5 18.1875 15.8438 18.2188 16.5313 17.625L18.0313 15.0625C18.0313 15.0313 18.0313 15.0313 18.0313 15L15.2813 13.1563C15.2813 13.1563 15.2188 13.1875 15.1563 13.2813L14.4688 14.2813C14.0313 14.9063 13.1875 15.0938 12.5625 14.6875C8.62502 12.25 6.18752 8.84377 5.31252 7.46877C4.90627 6.81252 5.06252 5.96878 5.68752 5.53128L6.81252 4.75002V4.71878L4.96877 1.96877C4.96877 1.93752 4.93752 1.93752 4.90627 1.96877L2.37502 3.46878Z"
                                            fill="currentColor" />
                                        <path
                                            d="M18.3125 8.90633C17.9375 8.90633 17.6563 8.62508 17.625 8.25008C17.375 5.09383 14.7813 2.56258 11.5938 2.34383C11.2188 2.31258 10.9063 2.00008 10.9375 1.59383C10.9688 1.21883 11.2813 0.906333 11.6875 0.937583C15.5625 1.18758 18.7188 4.25008 19.0313 8.12508C19.0625 8.50008 18.7813 8.84383 18.375 8.87508C18.375 8.90633 18.3438 8.90633 18.3125 8.90633Z"
                                            fill="currentColor" />
                                        <path
                                            d="M15.2187 9.18755C14.875 9.18755 14.5625 8.93755 14.5312 8.56255C14.3437 6.87505 13.0312 5.56255 11.3437 5.3438C10.9687 5.31255 10.6875 4.93755 10.7187 4.56255C10.75 4.18755 11.125 3.9063 11.5 3.93755C13.8437 4.2188 15.6562 6.0313 15.9375 8.37505C15.9687 8.75005 15.7187 9.0938 15.3125 9.1563C15.25 9.18755 15.2187 9.18755 15.2187 9.18755Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_941_15626">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <span>+212 717-383956</span>
                        </p>
                    </div>
                </div>

                <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                    <div class="w-full mb-10">
                        <h4 class="text-lg font-semibold text-dark  mb-9">
                            Follow Us On
                        </h4>
                        <div class="flex items-center mb-6">
                            <a href="https://www.facebook.com/mahdiXtayar" target="_blank"
                                class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary  hover:text-blue-600 sm:mr-4 lg:mr-3 xl:mr-4">
                                <svg width="8" height="16" viewBox="0 0 8 16" class="fill-current">
                                    <path
                                        d="M7.43902 6.4H6.19918H5.75639V5.88387V4.28387V3.76774H6.19918H7.12906C7.3726 3.76774 7.57186 3.56129 7.57186 3.25161V0.516129C7.57186 0.232258 7.39474 0 7.12906 0H5.51285C3.76379 0 2.54609 1.44516 2.54609 3.5871V5.83226V6.34839H2.10329H0.597778C0.287819 6.34839 0 6.63226 0 7.04516V8.90323C0 9.26452 0.243539 9.6 0.597778 9.6H2.05902H2.50181V10.1161V15.3032C2.50181 15.6645 2.74535 16 3.09959 16H5.18075C5.31359 16 5.42429 15.9226 5.51285 15.8194C5.60141 15.7161 5.66783 15.5355 5.66783 15.3806V10.1419V9.62581H6.13276H7.12906C7.41688 9.62581 7.63828 9.41935 7.68256 9.10968V9.08387V9.05806L7.99252 7.27742C8.01466 7.09677 7.99252 6.89032 7.85968 6.68387C7.8154 6.55484 7.61614 6.42581 7.43902 6.4Z" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)"
                                class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary  hover:text-blue-600 sm:mr-4 lg:mr-3 xl:mr-4">
                                <svg width="16" height="12" viewBox="0 0 16 12" class="fill-current">
                                    <path
                                        d="M14.2194 2.06654L15.2 0.939335C15.4839 0.634051 15.5613 0.399217 15.5871 0.2818C14.8129 0.704501 14.0903 0.845401 13.6258 0.845401H13.4452L13.3419 0.751468C12.7226 0.258317 11.9484 0 11.1226 0C9.31613 0 7.89677 1.36204 7.89677 2.93542C7.89677 3.02935 7.89677 3.17025 7.92258 3.26419L8 3.73386L7.45806 3.71037C4.15484 3.61644 1.44516 1.03327 1.00645 0.587084C0.283871 1.76125 0.696774 2.88845 1.13548 3.59296L2.0129 4.90802L0.619355 4.20352C0.645161 5.18982 1.05806 5.96477 1.85806 6.52838L2.55484 6.99804L1.85806 7.25636C2.29677 8.45401 3.27742 8.94716 4 9.13503L4.95484 9.36986L4.05161 9.93346C2.60645 10.8728 0.8 10.8024 0 10.7319C1.62581 11.7652 3.56129 12 4.90323 12C5.90968 12 6.65806 11.9061 6.83871 11.8356C14.0645 10.2857 14.4 4.41487 14.4 3.2407V3.07632L14.5548 2.98239C15.4323 2.23092 15.7935 1.8317 16 1.59687C15.9226 1.62035 15.8194 1.66732 15.7161 1.6908L14.2194 2.06654Z" />
                                </svg>
                            </a>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=mahditayar.25@gmail.com" target="_blank"
                                class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary  hover:text-blue-600 sm:mr-4 lg:mr-3 xl:mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                  </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/mahdi-tayar-2a289a164" target="_blank"
                                class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary  hover:text-blue-600 sm:mr-4 lg:mr-3 xl:mr-4">
                                <svg width="14" height="14" viewBox="0 0 14 14" class="fill-current">
                                    <path
                                        d="M13.0214 0H1.02084C0.453707 0 0 0.451613 0 1.01613V12.9839C0 13.5258 0.453707 14 1.02084 14H12.976C13.5432 14 13.9969 13.5484 13.9969 12.9839V0.993548C14.0422 0.451613 13.5885 0 13.0214 0ZM4.15142 11.9H2.08705V5.23871H4.15142V11.9ZM3.10789 4.3129C2.42733 4.3129 1.90557 3.77097 1.90557 3.11613C1.90557 2.46129 2.45002 1.91935 3.10789 1.91935C3.76577 1.91935 4.31022 2.46129 4.31022 3.11613C4.31022 3.77097 3.81114 4.3129 3.10789 4.3129ZM11.9779 11.9H9.9135V8.67097C9.9135 7.90323 9.89082 6.8871 8.82461 6.8871C7.73571 6.8871 7.57691 7.74516 7.57691 8.60323V11.9H5.51254V5.23871H7.53154V6.16452H7.55423C7.84914 5.62258 8.50701 5.08065 9.52785 5.08065C11.6376 5.08065 12.0232 6.43548 12.0232 8.2871V11.9H11.9779Z" />
                                </svg>
                            </a>
                        </div>
                        <p class="text-base text-gray-400 text-xs">
                            Created by Elmahdi-Tayar on 30. 11. 2023. <br>Copyright © 2023 MusiHost
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </footer>
@endsection
