@extends('Layouts.home')

@section('content')
  <div class="relative flex items-center">
    <h1 class="text-red-800 text-3xl">My Project </h1>
    <a href="/addNewProject" class="text-red-800 absolute underline bottom-0 right-0 z-0" >+Create New Project</a>
  </div>
    
  <div class="grid gap-x-8 gap-y-4 grid-cols-3 mt-5">

    @for ($i = 0; $i < sizeof($project_name) ; $i++)
      <div class="flex flex-col gap-y-1 relative bg-gray-300 rounded-3xl h-36">
        <div class="flex flex-row">
          <h1 class="ml-2.5 text-xl pb-5">
            {{$project_name[$i]}}
          </h1>
           
          <div>
            <svg class="absolute right-1 h-6 w-6 cursor-pointer p-1 hover:bg-red-300 rounded-full delProject" id="delBtn-{{$project_id[$i]}}"  fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
             </svg>
          </div>
        </div>
        <div class="font-light ml-2.5">
          <p>
            Project category: {{$project_category[$i]}}
          </p>
        </div>
        <div class="font-light ml-2.5">
          <p>
            Project type: {{$project_type[$i]}}
          </p>
        </div>
        <div class="self-end pr-2 ">
          <form action="/projectDetails" method="GET">
            <input type="hidden" name="project_id" value="{{$project_id[$i]}}" >
            <button type="submit" class="underline"> See project details </button>
          </form>
        </div>
      </div>
    @endfor
    
  </div>
  @include('Modals.ensure')

  <script type="text/javascript">   
    window.addEventListener('DOMContentLoaded', () =>{
      const overlay = document.querySelector('#overlay')
      const cancelBtn = document.querySelector('#cancel-Btn')
      const delBtn = document.getElementsByClassName("delProject")
      
      const toggleModal = (idx=0) => {
        overlay.classList.toggle('hidden')
        overlay.classList.toggle('flex')
        document.getElementById('id2Delete').value=idx
      }

      for (let i = 0; i < delBtn.length; i++) {
        let id=delBtn[i].id
        id=parseInt(id.replace("delBtn-",''))
        delBtn[i].addEventListener('click', ()=>{
          toggleModal(id)
        })
      }
      cancelBtn.addEventListener('click',()=>{
        toggleModal()
      })

    })

  </script>
@endsection