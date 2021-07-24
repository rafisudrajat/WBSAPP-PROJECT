@extends('Layouts.home')
@section('content')
    <div>
        {{-- {{dd($type)}} --}}
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('dashboard.SubmitNewProject')}}" method="POST">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <label for="project_name" class="block text-sm font-medium text-gray-700">
                                    Project Name
                                </label>
                                <input type="text" name="project_name" id="project_name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400" placeholder="" value="{{ old('project_name') }}">          
                                <span class="text-red-600 text-xs">@error('project_name') {{$message}} @enderror</span>
                            </div>
                        </div>
        
                        <div>
                            <label for="project_desc" class="block text-sm font-medium text-gray-700">
                                Project Description
                            </label>
                            <div class="mt-1">
                                {{-- TO DO: Show old input in text area --}}
                                <textarea id="project_desc" name="project_desc" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-400 rounded-md" placeholder=""></textarea>
                                <span class="text-red-600 text-xs">@error('project_desc') {{$message}} @enderror</span>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-1">
                                <label for="project_type" class="block text-sm font-medium text-gray-700">
                                    Project Type
                                </label>
                                <select name="project_type" id="">
                                    <option value="" selected>-Select Type-</option>
                                    @foreach ($type as $rowtype)
                                        <option value="{{$rowtype->id}}">{{$rowtype->project_type_name}}</option>
                                    @endforeach
                                </select>
                               
                                <span class="text-red-600 text-xs">@error('project_type') {{$message}} @enderror</span>
                            </div>
                            <div class="flex justify-end items-center">
                                <button type="button" class="text-sm h-2/4 font-thin underline" id="newProjectType">Add new project type</button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-1">
                                <label for="project_category" class="block text-sm font-medium text-gray-700">
                                    Project Category
                                </label>
                                <select name="project_category" id="">
                                    <option value="" selected>-Select Category-</option>
                                    @foreach ($category as $rowtype)
                                        <option value="{{$rowtype->id}}">{{$rowtype->project_category_name}}</option>
                                    @endforeach
                                </select>
                               
                                <span class="text-red-600 text-xs">@error('project_category') {{$message}} @enderror</span>
                            </div>
                            <div class="flex justify-end items-center">
                                <button type="button" class="text-sm h-2/4 font-thin underline" id="newProjectCategory">Add new project category</button>
                            </div>
                        </div>

                    </div>
                    
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save New Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   @include('Modals.addProjectCT')
   
    
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            const newProjectType = document.querySelector('#newProjectType')
            const newProjectCategory = document.querySelector('#newProjectCategory')
            const closeBtn = document.querySelector('#close-modal')
            const formTitle = document.getElementById("formTitle")
            

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            newProjectType.addEventListener('click', ()=>{
                formTitle.innerHTML ="Add New Project Type"
                document.type_cat_form.action = "{{route('dashboard.add_ProjectType')}}";
                toggleModal()
            })
            
            newProjectCategory.addEventListener('click', ()=>{
                formTitle.innerHTML ="Add New Project Category"
                document.type_cat_form.action = "{{route('dashboard.add_ProjectCategory')}}";
                toggleModal()
            })

            closeBtn.addEventListener('click', toggleModal)
        })

    </script>
  
  
@endsection
