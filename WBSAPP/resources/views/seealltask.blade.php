@extends('Layouts.home')
@section('content')
    <div class="md:px-8 py-3 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Gitlab ID</th>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Task Category</th>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Task Name</th>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">PIC</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Task Executor</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Start Date</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Due Date</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Start Time</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Stop Time</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Progress</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Previous Task</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">QC Tester</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">QC Test Date</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">QC Properness</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">notes</td>
                        <th class="text-center py-3 px-2 overflow-auto uppercase font-semibold text-sm">Action</td>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    {{-- {{dd($title)}} --}}
                    @for ($i = 0; $i < count($gitlab_id) ; $i++)
                        <tr class="">
                            <td class="text-center py-3 px-2">{{$gitlab_id[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$task_cat_id[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$task_name[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$pic_id[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$exec_id[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$start_date[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$due_date[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$start_time[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$stop_time[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$progress[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$prev_task[$i]}}</td>
                            <td class="text-center py-3 px-2">NANANA</td>
                            <td class="text-center py-3 px-2">05/08/2021</td>
                            <td class="text-center py-3 px-2">GOOD</td>
                            <td class="text-center py-3 px-2 ">
                                <div class="h-24 overflow-y-scroll">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

                                </div>
                            </td>
                            <td >
                                <div class='flex flex-col place-content-center gap-y-1'>
                                    <form action="/editTask" method="post">
                                        <button type="button" id="Edit-Task" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="/deleteTask" method="post">
                                        <button type="button" id="Delete-Task" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endfor
                    
                </tbody>
            </table>
        </div>
        <div >
            <div class="flex flex-row justify-end">
                <form action="" method="post">
                    <button type="button" id="Add-Task" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        Add New Task
                    </button>
                </form>
            </div>
        </div>
    </div>
@include('Modals.taskFormAdmin')
@include('Modals.editTask')
@include('Modals.ensureDeleteTask')

<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', () =>{
        const overlay = document.querySelector('#overlay')
        const overlayEditTask = document.querySelector('#overlayEditTask')
        const overlayDeleteTask = document.querySelector('#overlayDeleteTask')
        
        const AddTask = document.querySelector('#Add-Task')
        const EditTask = document.querySelector('#Edit-Task')
        const DeleteTask = document.querySelector('#Delete-Task')
        const closeBtn = document.querySelector('#close-modal')
        const closeBtn2 = document.querySelector('#close-modal')
        const closeBtn3 = document.querySelector('#cancel-Btn')

        const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
        }

        const toggleModal2 = () => {
                overlayEditTask.classList.toggle('hidden')
                overlayEditTask.classList.toggle('flex')
        }
        
        const toggleModal3 = () => {
                overlayDeleteTask.classList.toggle('hidden')
                overlayDeleteTask.classList.toggle('flex')
        }

        AddTask.addEventListener('click', toggleModal)
        EditTask.addEventListener('click', toggleModal2)
        DeleteTask.addEventListener('click', toggleModal3)
        closeBtn.addEventListener('click', toggleModal)
        closeBtn2.addEventListener('click', toggleModal2)
        closeBtn3.addEventListener('click', toggleModal3)
    })
</script>

@endsection