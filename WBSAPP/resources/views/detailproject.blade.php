@extends('Layouts.home')
@section('content')
<style>
    #style-10::-webkit-scrollbar
    {
        height: 10px; 
        background-color: #F5F5F5;
    }

    #style-10::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(250, 0, 0, 0.3);
        background: rgb(48, 15, 199);

        border: 4px solid transparent;
        background-clip: content-box;   /* THIS IS IMPORTANT */
    }

    #style-10::-webkit-scrollbar-thumb
    {
        /* height: 10px; */
        background: rgb(168, 168, 168);
        border: 5px solid rgb(255, 255, 255);
    }
</style>

    <div class="flex flex-col rounded-2xl p-4 bg-gray-400">
        <div class="flex flex-row justify-between">
            <div class="flex flex-row">
                <h1 class="text-2xl font-normal">{{$project_name}}</h1>
                <button id="edit-Btn-1" type="button" class="flex h-fit-content">
                    <svg width="17" height="18" viewBox="-10.55882 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37.7293 4.6802C37.6094 4.53909 37.4641 4.42547 37.3021 4.34623C37.1401 4.26699 36.9648 4.22376 36.7867 4.21916C36.6087 4.21456 36.4317 4.24868 36.2663 4.31946C36.1009 4.39025 35.9506 4.49622 35.8245 4.63098L34.8098 5.71292C34.6868 5.84476 34.6178 6.02354 34.6178 6.20994C34.6178 6.39634 34.6868 6.57511 34.8098 6.70696L35.74 7.70188C35.801 7.76752 35.8735 7.8196 35.9533 7.85514C36.0331 7.89068 36.1187 7.90898 36.2052 7.90898C36.2916 7.90898 36.3772 7.89068 36.457 7.85514C36.5368 7.8196 36.6093 7.76752 36.6703 7.70188L37.6596 6.64719C38.16 6.11194 38.2067 5.24006 37.7293 4.6802ZM32.7582 7.91018L17.9499 23.7481C17.8602 23.8439 17.7949 23.9628 17.7604 24.0935L17.0755 26.2793C17.0591 26.3386 17.0579 26.4016 17.0721 26.4615C17.0863 26.5215 17.1154 26.5762 17.1562 26.62C17.197 26.6637 17.2481 26.6949 17.3041 26.7101C17.36 26.7253 17.4188 26.7241 17.4742 26.7065L19.5126 25.9726C19.6346 25.9357 19.7456 25.8658 19.835 25.7696L34.617 9.90178C34.7538 9.75369 34.8305 9.55377 34.8305 9.34544C34.8305 9.1371 34.7538 8.93718 34.617 8.78909L33.8008 7.91018C33.6624 7.76232 33.475 7.67929 33.2795 7.67929C33.0841 7.67929 32.8966 7.76232 32.7582 7.91018V7.91018Z" fill="black"/>
                        <path d="M31.692 17.0209L21.6932 27.755C21.3067 28.17 20.8317 28.478 20.3093 28.6523L18.1847 29.4144C17.6805 29.5669 17.1474 29.5727 16.6404 29.431C16.1334 29.2894 15.6709 29.0055 15.3004 28.6085C14.9299 28.2116 14.6649 27.716 14.5327 27.1727C14.4005 26.6295 14.4059 26.0584 14.5482 25.5182L15.2595 23.2418C15.4217 22.6822 15.7086 22.1733 16.0954 21.7591L26.1138 11.0443C26.2057 10.9461 26.2682 10.8208 26.2936 10.6844C26.319 10.548 26.3061 10.4066 26.2565 10.2781C26.2069 10.1496 26.1228 10.0398 26.0149 9.96244C25.907 9.88512 25.7802 9.84381 25.6504 9.84375H8.53125C7.31291 9.84375 6.14447 10.3623 5.28298 11.2853C4.42148 12.2084 3.9375 13.4603 3.9375 14.7656V35.8594C3.9375 37.1647 4.42148 38.4166 5.28298 39.3397C6.14447 40.2627 7.31291 40.7812 8.53125 40.7812H28.2188C29.4371 40.7812 30.6055 40.2627 31.467 39.3397C32.3285 38.4166 32.8125 37.1647 32.8125 35.8594V17.5175C32.8124 17.3784 32.7739 17.2425 32.7017 17.1269C32.6296 17.0113 32.527 16.9212 32.4071 16.8681C32.2871 16.8149 32.1552 16.8011 32.0279 16.8283C31.9006 16.8555 31.7837 16.9225 31.692 17.0209Z" fill="black"/>
                    </svg>        
                </button>
            </div>
            <p>By: {{$project_creator}}</p>
        </div>
        
        <div>
            <div class="flex flex-row pb-5 pt-3">
                <p class="text-lg font-medium">{{$project_desc}}</p>
                <button id="edit-Btn-2" type="button" class="flex h-fit-content">
                    <svg width="17" height="18" viewBox="-10.55882 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37.7293 4.6802C37.6094 4.53909 37.4641 4.42547 37.3021 4.34623C37.1401 4.26699 36.9648 4.22376 36.7867 4.21916C36.6087 4.21456 36.4317 4.24868 36.2663 4.31946C36.1009 4.39025 35.9506 4.49622 35.8245 4.63098L34.8098 5.71292C34.6868 5.84476 34.6178 6.02354 34.6178 6.20994C34.6178 6.39634 34.6868 6.57511 34.8098 6.70696L35.74 7.70188C35.801 7.76752 35.8735 7.8196 35.9533 7.85514C36.0331 7.89068 36.1187 7.90898 36.2052 7.90898C36.2916 7.90898 36.3772 7.89068 36.457 7.85514C36.5368 7.8196 36.6093 7.76752 36.6703 7.70188L37.6596 6.64719C38.16 6.11194 38.2067 5.24006 37.7293 4.6802ZM32.7582 7.91018L17.9499 23.7481C17.8602 23.8439 17.7949 23.9628 17.7604 24.0935L17.0755 26.2793C17.0591 26.3386 17.0579 26.4016 17.0721 26.4615C17.0863 26.5215 17.1154 26.5762 17.1562 26.62C17.197 26.6637 17.2481 26.6949 17.3041 26.7101C17.36 26.7253 17.4188 26.7241 17.4742 26.7065L19.5126 25.9726C19.6346 25.9357 19.7456 25.8658 19.835 25.7696L34.617 9.90178C34.7538 9.75369 34.8305 9.55377 34.8305 9.34544C34.8305 9.1371 34.7538 8.93718 34.617 8.78909L33.8008 7.91018C33.6624 7.76232 33.475 7.67929 33.2795 7.67929C33.0841 7.67929 32.8966 7.76232 32.7582 7.91018V7.91018Z" fill="black"/>
                        <path d="M31.692 17.0209L21.6932 27.755C21.3067 28.17 20.8317 28.478 20.3093 28.6523L18.1847 29.4144C17.6805 29.5669 17.1474 29.5727 16.6404 29.431C16.1334 29.2894 15.6709 29.0055 15.3004 28.6085C14.9299 28.2116 14.6649 27.716 14.5327 27.1727C14.4005 26.6295 14.4059 26.0584 14.5482 25.5182L15.2595 23.2418C15.4217 22.6822 15.7086 22.1733 16.0954 21.7591L26.1138 11.0443C26.2057 10.9461 26.2682 10.8208 26.2936 10.6844C26.319 10.548 26.3061 10.4066 26.2565 10.2781C26.2069 10.1496 26.1228 10.0398 26.0149 9.96244C25.907 9.88512 25.7802 9.84381 25.6504 9.84375H8.53125C7.31291 9.84375 6.14447 10.3623 5.28298 11.2853C4.42148 12.2084 3.9375 13.4603 3.9375 14.7656V35.8594C3.9375 37.1647 4.42148 38.4166 5.28298 39.3397C6.14447 40.2627 7.31291 40.7812 8.53125 40.7812H28.2188C29.4371 40.7812 30.6055 40.2627 31.467 39.3397C32.3285 38.4166 32.8125 37.1647 32.8125 35.8594V17.5175C32.8124 17.3784 32.7739 17.2425 32.7017 17.1269C32.6296 17.0113 32.527 16.9212 32.4071 16.8681C32.2871 16.8149 32.1552 16.8011 32.0279 16.8283C31.9006 16.8555 31.7837 16.9225 31.692 17.0209Z" fill="black"/>
                    </svg>        
                </button>
            </div>
            <div class="flex flex-row pb-1">
                <p class="font-normal text-base">Project category: {{$project_category}}</p>
                <button id="edit-Btn-3" type="button" class="flex h-fit-content">
                    <svg width="17" height="18" viewBox="-10.55882 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37.7293 4.6802C37.6094 4.53909 37.4641 4.42547 37.3021 4.34623C37.1401 4.26699 36.9648 4.22376 36.7867 4.21916C36.6087 4.21456 36.4317 4.24868 36.2663 4.31946C36.1009 4.39025 35.9506 4.49622 35.8245 4.63098L34.8098 5.71292C34.6868 5.84476 34.6178 6.02354 34.6178 6.20994C34.6178 6.39634 34.6868 6.57511 34.8098 6.70696L35.74 7.70188C35.801 7.76752 35.8735 7.8196 35.9533 7.85514C36.0331 7.89068 36.1187 7.90898 36.2052 7.90898C36.2916 7.90898 36.3772 7.89068 36.457 7.85514C36.5368 7.8196 36.6093 7.76752 36.6703 7.70188L37.6596 6.64719C38.16 6.11194 38.2067 5.24006 37.7293 4.6802ZM32.7582 7.91018L17.9499 23.7481C17.8602 23.8439 17.7949 23.9628 17.7604 24.0935L17.0755 26.2793C17.0591 26.3386 17.0579 26.4016 17.0721 26.4615C17.0863 26.5215 17.1154 26.5762 17.1562 26.62C17.197 26.6637 17.2481 26.6949 17.3041 26.7101C17.36 26.7253 17.4188 26.7241 17.4742 26.7065L19.5126 25.9726C19.6346 25.9357 19.7456 25.8658 19.835 25.7696L34.617 9.90178C34.7538 9.75369 34.8305 9.55377 34.8305 9.34544C34.8305 9.1371 34.7538 8.93718 34.617 8.78909L33.8008 7.91018C33.6624 7.76232 33.475 7.67929 33.2795 7.67929C33.0841 7.67929 32.8966 7.76232 32.7582 7.91018V7.91018Z" fill="black"/>
                        <path d="M31.692 17.0209L21.6932 27.755C21.3067 28.17 20.8317 28.478 20.3093 28.6523L18.1847 29.4144C17.6805 29.5669 17.1474 29.5727 16.6404 29.431C16.1334 29.2894 15.6709 29.0055 15.3004 28.6085C14.9299 28.2116 14.6649 27.716 14.5327 27.1727C14.4005 26.6295 14.4059 26.0584 14.5482 25.5182L15.2595 23.2418C15.4217 22.6822 15.7086 22.1733 16.0954 21.7591L26.1138 11.0443C26.2057 10.9461 26.2682 10.8208 26.2936 10.6844C26.319 10.548 26.3061 10.4066 26.2565 10.2781C26.2069 10.1496 26.1228 10.0398 26.0149 9.96244C25.907 9.88512 25.7802 9.84381 25.6504 9.84375H8.53125C7.31291 9.84375 6.14447 10.3623 5.28298 11.2853C4.42148 12.2084 3.9375 13.4603 3.9375 14.7656V35.8594C3.9375 37.1647 4.42148 38.4166 5.28298 39.3397C6.14447 40.2627 7.31291 40.7812 8.53125 40.7812H28.2188C29.4371 40.7812 30.6055 40.2627 31.467 39.3397C32.3285 38.4166 32.8125 37.1647 32.8125 35.8594V17.5175C32.8124 17.3784 32.7739 17.2425 32.7017 17.1269C32.6296 17.0113 32.527 16.9212 32.4071 16.8681C32.2871 16.8149 32.1552 16.8011 32.0279 16.8283C31.9006 16.8555 31.7837 16.9225 31.692 17.0209Z" fill="black"/>
                    </svg>        
                </button>
            </div>
            <div class="flex flex-row pb-1">
                <p class="font-normal text-base">Project type: {{$project_type}}</p>
                <button id="edit-Btn-4" type="button" class="flex h-fit-content">
                    <svg width="17" height="18" viewBox="-10.55882 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37.7293 4.6802C37.6094 4.53909 37.4641 4.42547 37.3021 4.34623C37.1401 4.26699 36.9648 4.22376 36.7867 4.21916C36.6087 4.21456 36.4317 4.24868 36.2663 4.31946C36.1009 4.39025 35.9506 4.49622 35.8245 4.63098L34.8098 5.71292C34.6868 5.84476 34.6178 6.02354 34.6178 6.20994C34.6178 6.39634 34.6868 6.57511 34.8098 6.70696L35.74 7.70188C35.801 7.76752 35.8735 7.8196 35.9533 7.85514C36.0331 7.89068 36.1187 7.90898 36.2052 7.90898C36.2916 7.90898 36.3772 7.89068 36.457 7.85514C36.5368 7.8196 36.6093 7.76752 36.6703 7.70188L37.6596 6.64719C38.16 6.11194 38.2067 5.24006 37.7293 4.6802ZM32.7582 7.91018L17.9499 23.7481C17.8602 23.8439 17.7949 23.9628 17.7604 24.0935L17.0755 26.2793C17.0591 26.3386 17.0579 26.4016 17.0721 26.4615C17.0863 26.5215 17.1154 26.5762 17.1562 26.62C17.197 26.6637 17.2481 26.6949 17.3041 26.7101C17.36 26.7253 17.4188 26.7241 17.4742 26.7065L19.5126 25.9726C19.6346 25.9357 19.7456 25.8658 19.835 25.7696L34.617 9.90178C34.7538 9.75369 34.8305 9.55377 34.8305 9.34544C34.8305 9.1371 34.7538 8.93718 34.617 8.78909L33.8008 7.91018C33.6624 7.76232 33.475 7.67929 33.2795 7.67929C33.0841 7.67929 32.8966 7.76232 32.7582 7.91018V7.91018Z" fill="black"/>
                        <path d="M31.692 17.0209L21.6932 27.755C21.3067 28.17 20.8317 28.478 20.3093 28.6523L18.1847 29.4144C17.6805 29.5669 17.1474 29.5727 16.6404 29.431C16.1334 29.2894 15.6709 29.0055 15.3004 28.6085C14.9299 28.2116 14.6649 27.716 14.5327 27.1727C14.4005 26.6295 14.4059 26.0584 14.5482 25.5182L15.2595 23.2418C15.4217 22.6822 15.7086 22.1733 16.0954 21.7591L26.1138 11.0443C26.2057 10.9461 26.2682 10.8208 26.2936 10.6844C26.319 10.548 26.3061 10.4066 26.2565 10.2781C26.2069 10.1496 26.1228 10.0398 26.0149 9.96244C25.907 9.88512 25.7802 9.84381 25.6504 9.84375H8.53125C7.31291 9.84375 6.14447 10.3623 5.28298 11.2853C4.42148 12.2084 3.9375 13.4603 3.9375 14.7656V35.8594C3.9375 37.1647 4.42148 38.4166 5.28298 39.3397C6.14447 40.2627 7.31291 40.7812 8.53125 40.7812H28.2188C29.4371 40.7812 30.6055 40.2627 31.467 39.3397C32.3285 38.4166 32.8125 37.1647 32.8125 35.8594V17.5175C32.8124 17.3784 32.7739 17.2425 32.7017 17.1269C32.6296 17.0113 32.527 16.9212 32.4071 16.8681C32.2871 16.8149 32.1552 16.8011 32.0279 16.8283C31.9006 16.8555 31.7837 16.9225 31.692 17.0209Z" fill="black"/>
                    </svg>        
                </button>
            </div>
            
           
        </div>
      
        <div class="flex flex-row items-center" >
            @if ($creator_id==session('UserLogged'))
                <div class="flex-grow ">
                    <form action="/seeTask" method="GET">
                        <input type="hidden" name="project_id" value="{{$project_id}}">
                        <button type="submit" class="underline">See All Progress</button>
                    </form>
                </div>
            @else
                <div class="flex-grow"></div>
            @endif
            <div class="flex justify-end mt-4">
                <div class="flex flex-col">
                    <div class="flex items-center justify-between overflow-auto w-56 mt-2" id="style-10">
                        <img class="inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1510520434124-5bc7e642b61d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="">
                        {{-- <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1510520434124-5bc7e642b61d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="">
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt=""> --}}
                        <img class="-ml-2 inline-block h-10 w-10 rounded-full text-white border-2 border-white object-cover object-center" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="">
                    </div>
                    @if ($creator_id==session('UserLogged'))
                        <div class="flex justify-end">
                            <button id="editMember" type="button" class="text-right underline">Edit project member</button>
                        </div>    
                    @endif
                </div>
            </div>
            
        </div>
        
        
    </div>
    @include('Modals.addUser2Project')
    @include('Modals.editProject')

    {{-- INCLUDE JQUERY AJAX --}}
    <script src="{{ asset('js/app.js') }}">
         $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    <script type="text/javascript">    
        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            const overlay1 = document.querySelector('#overlay1')
            const finishBtn = document.getElementById('close-Btn')
            const editMemberBtn = document.getElementById("editMember")
            // List of edit Button
            const editBtn1=document.getElementById("edit-Btn-1")
            const editBtn2=document.getElementById("edit-Btn-2")
            const editBtn3=document.getElementById("edit-Btn-3")
            const editBtn4=document.getElementById("edit-Btn-4")
            const closeBtn = document.querySelector('#close-modal')
            const editRole = document.getElementsByClassName("Role-Edit")
            // const editRole

            function changeInput(className,element){
                let e = document.querySelector('.change-input')
                let d = document.createElement(element)
                d.setAttribute("class",className)
                d.setAttribute('id','general_input')
                d.setAttribute('name','general_input')
                e.parentNode.replaceChild(d, e)
            }

            function change2Dropdown(route,input=''){
                $.ajax(
                {
                    type : 'GET',
                    url : route,
                    data:{'key':input},
                    success: (data)=>{ 
                        $('.change-input').replaceWith(data)
                        toggleModal()
                        // console.log(data)
                    }
                })
            }

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }
            const toggleModal1 = () => {
                overlay1.classList.toggle('hidden')
                overlay1.classList.toggle('flex')
            }

            editBtn1.addEventListener('click', ()=>{
                formTitle.innerHTML ="Edit Project Name"
                changeInput("focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400 change-input",'input')   
                document.type_cat_form.action = "{{route('detailProject.editProject')}}"
                document.getElementById('identifier').value='btn1'
                toggleModal()
            })
            editBtn2.addEventListener('click', ()=>{
                formTitle.innerHTML ="Edit Project Description"
                changeInput("focus:ring-indigo-500 focus:border-indigo-500 flex h-24 w-full rounded-md sm:text-sm border border-gray-400 change-input",'TEXTAREA')   
                document.type_cat_form.action = "{{route('detailProject.editProject')}}"
                document.getElementById('identifier').value='btn2'
                toggleModal()
            })
            // DROPDOWN
            editBtn3.addEventListener('click', ()=>{
                formTitle.innerHTML ="Edit Project Category"
                change2Dropdown('/queryCT','cat')
                document.type_cat_form.action = "{{route('detailProject.editProject')}}"
                document.getElementById('identifier').value='btn3'
            })

            editBtn4.addEventListener('click', ()=>{
                formTitle.innerHTML ="Edit Project Type"
                change2Dropdown('/queryCT','type')
                document.type_cat_form.action = "{{route('detailProject.editProject')}}"
                document.getElementById('identifier').value='btn4'
            })
            // To Edit Role
            for (let i = 0; i < editRole.length; i++) {
                let id=editRole[i].id
                id=parseInt(id.replace("editRole-",''))
                editRole[i].addEventListener('click', ()=>{
                    formTitle.innerHTML ="Edit Member's Role"
                    // changeInput("focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400 change-input",'input') 
                    document.type_cat_form.action = "{{route('detailProject.editRole')}}"
                    document.getElementById('identifier').value=id
                    // Add DropDown
                    change2Dropdown('/queryRole')
                    
                })
            }
          
            editMemberBtn.addEventListener('click', toggleModal1)
            finishBtn.addEventListener('click', toggleModal1)
            closeBtn.addEventListener('click', toggleModal)
        })
    </script>

    
@endsection