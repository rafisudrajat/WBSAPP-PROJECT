@extends('Layouts.home')

@section('content')
  <div class="relative flex items-center">
    <h1 class="text-red-800 text-3xl">My Project </h1> 
    <a href="/addNewProject" class="text-red-800 absolute underline bottom-0 right-0 z-0" >+Create New Project</a>
  </div>
    
  <div class="grid gap-x-8 gap-y-4 grid-cols-3 mt-5">

    @for ($i = 0; $i < sizeof($project_name) ; $i++)
      <div class="flex flex-col bg-gray-300 rounded-3xl h-36">
        <h1>
          {{$project_name[$i]}}
        </h1>
        <div>
          {{$project_desc[$i]}}
        </div>
      </div>
    @endfor
    
  </div>
 
@endsection