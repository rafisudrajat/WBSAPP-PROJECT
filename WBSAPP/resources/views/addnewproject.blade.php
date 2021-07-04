@extends('Layouts.home')
@section('content')
    <div>
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
                                <input type="text" name="project_name" id="project_name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400" placeholder="">          
                            </div>
                        </div>
        
                        <div>
                            <label for="project_desc" class="block text-sm font-medium text-gray-700">
                                Project Description
                            </label>
                            <div class="mt-1">
                                <textarea id="project_desc" name="project_desc" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-400 rounded-md" placeholder=""></textarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <label for="project_type" class="block text-sm font-medium text-gray-700">
                                    Project Type
                                </label>
                                <input type="text" name="project_type" id="project_type" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400" placeholder="">          
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <label for="project_category" class="block text-sm font-medium text-gray-700">
                                    Project Category
                                </label>
                                <input type="text" name="project_category" id="project_category" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400" placeholder="">          
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
  
  
@endsection
