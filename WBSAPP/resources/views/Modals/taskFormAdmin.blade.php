<div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
    <div class="w-5/6 lg:w-3/6 rounded-xl bg-gray-300 mr-3">
        <div class="flex flex-col">
            <div id="header" class="flex flex-row relative justify-center text-white py-4 bg-gray-800">
                <div class="text-center uppercase text-2xl ">
                    Add New Task
                </div>
                <div>
                    <svg class="h-6 w-6 justify-self-end cursor-pointer p-1 hover:bg-gray-300 rounded-full absolute right-0 mr-3" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>

                </div>
               
            </div>

            <div id="converters-area" class="px-4 py-5">
                <div class="flex flex-col text-gray-500">
                    <form action="/addTask" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="project_id" value="{{$project_id}}">
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col text-center w-1/6 px-2">
                                <label class="mb-1" for="gitlab-ID">Gitlab ID</label>
                                <input type="number" id="gitlab-ID" name="gitlab-ID" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                            <div class="flex flex-col text-center w-4/6 px-2">
                                <label class="mb-1" for="task_category">Task Category</label>
                                <input list="task_categories" id="task_category" name="task_category" class="pl-3 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                                <datalist id="task_categories">
                                    {{-- TASK CATEGORY OPTIONS --}}
                                    @foreach ($task_cat_lists as $task_cat)
                                        <option value="{{$task_cat}}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="flex flex-col text-center w-1/6 px-2">
                                <label class="mb-1" for="progress">Progress</label>
                                <input type="number" id="progress" name="progress" max="100" min="0" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="task-name">Task Name</label>
                                <input type="text" id="task-name" name="task-name" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="pic-id">PIC</label>
                                <input list="pic_ids" id="pic-id" name="pic-id" class="pl-3 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                                <datalist id="pic_ids">
                                    {{-- PIC OPTIONS --}}
                                    @foreach ($name_lists as $name)
                                        <option value="{{$name}}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="task_exec_id">Task Executor</label>
                                <input list="executors" id="task_exec_id" name="task_exec_id" class="pl-3 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                                <datalist id="executors">
                                    {{-- TASK Executor OPTIONS --}}
                                    @foreach ($name_lists as $name)
                                        <option value="{{$name}}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="prev-task">Previous Task</label>
                                <input type="text" id="prev-task" name="prev-task" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="start-date">Start Date</label>
                                <input type="date" id="start-date" name="start-date" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="due-date">Due Date</label>
                                <input type="date" id="due-date" name="due-date" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="start-time">Start Time</label>
                                <input type="time" id="start-time" name="start-time" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                            <div class="flex flex-col text-center w-1/2 px-2">
                                <label class="mb-1" for="stop-time">Stop Time</label>
                                <input type="time" id="stop-time" name="stop-time" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col text-center w-full px-2">
                                <label class="mb-1" for="notes">Notes</label>
                                <textarea name="notes" id="notes"  rows="5" class="px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600"></textarea>
                                {{-- <input type="textarea" id="notes" name="notes" class="resize h-20 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600" /> --}}
                            </div>
                        </div>  
                    
                        <button type="submit" class=" text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                            Save Task
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>