<div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
    <form action="/" method="post" name="type_cat_form">
        @csrf
        <div class="bg-gray-200 max-w-sm py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <label for="general_input" class=" text-lg font-medium text-gray-700" id="formTitle">
                    Project Type/Category
                </label>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            {{-- Input --}}
            <div class="mt-2 text-sm">
                <input type="hidden" name="identifier" id="identifier" value="">
                <input type="hidden" name="project_id" id="project_id" value="{{$project_id}}">
                {{-- Input to Change --}}
                <input type="text" name="general_input" id="general_input" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border border-gray-400 change-input" placeholder="" value="{{ old('general_input') }}">          
            </div>
            <div class="mt-3 flex justify-end space-x-3">
                <input type="submit" value="Confirm" class="px-3 py-1 bg-blue-800 text-gray-200 hover:bg-green-600 rounded">
                {{-- <button type="submit" class="px-3 py-1 bg-blue-800 text-gray-200 hover:bg-green-600 rounded">Confirm</button> --}}
            </div>
        </div>
    </form>
</div>