<div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay1">
    <!-- component -->
    {{-- {{dd($members)}} --}}
    <div class="w-full max-w-screen-xl mx-auto px-6">
        <div class="flex justify-center p-4 px-3 py-10">
            <div class="w-full max-w-2xl max-h-lg">
                <div class="bg-white shadow-md rounded-lg px-3 py-2 mb-4">
                    <div class="block text-gray-700 text-lg font-semibold py-2 px-2">
                        User List
                    </div>
                    <div class="flex items-center bg-gray-200 rounded-md">
                        <div class="pl-2">
                            <svg class="fill-current text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path class="heroicon-ui"
                                    d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                            </svg>
                        </div>
                        <input
                            class="w-full rounded-md bg-gray-200 text-gray-700 leading-tight focus:outline-none py-2 px-2"
                            id="search" type="text" placeholder="Search teams or members">
                    </div>
                    <div id='searchRes' class="flex flex-col font-light text-sm overflow-auto max-h-40 max">
                        {{-- Search Content --}}
                        
                    
                    </div>
                    <div class="py-3 text-sm">
                        {{-- Member List --}}
                        @for($i=0;$i<count($members);$i++)
                            <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2 space-x-1">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">{{$members[$i]['name']}}</div>
                                <form action="/delMember" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$members[$i]['id']}}" >
                                    <input type="hidden" name="project_id" value="{{$project_id}}">
                                    @if($i!==0)
                                        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-1 px-2 rounded text-xs">
                                            Delete
                                        </button>
                                    @endif
                                </form>
                                <form action="" method="post">
                                    @if($i!==0)
                                        <button type="button" id="editRole-{{$members[$i]['id']}}" class="bg-red-500 hover:bg-red-800 text-white font-bold py-1 px-2 rounded text-xs Role-Edit">
                                            Edit Role
                                        </button>
                                    @endif
                                </form>
                            </div>
                        @endfor
                    </div>
                    <div class="block bg-gray-200 text-sm text-right py-2 px-3 -mx-3 -mb-2 rounded-b-lg">
                        <button id="close-Btn" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $searchVal=$(this).val()
        $.ajax(
            {
                type : 'GET',
                url : '{{URL::to('searchMember')}}',
                data:{
                    'search':$searchVal,
                    'project_id':{{$project_id }}
                },
                success: (data)=>{ 
                    $('#searchRes').fadeIn()
                    $('#searchRes').html(data)
                    // console.log(data)
                }
            }
        )
    })
</script>