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
                            <td class="text-center py-3 px-2">{{$qc_tester[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$qc_testdate[$i]}}</td>
                            <td class="text-center py-3 px-2">{{$qc_properness[$i]}}</td>
                            <td class="text-center py-3 px-2 ">
                                <div class="h-24 overflow-y-scroll">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                </div>
                            </td>
                            <td >
                                <div class='flex flex-col place-content-center gap-y-1'>
                                    @if ($gen_role=='Admin' || $task_maker[$i]==session('UserLogged') || in_array(1,$spec_role, TRUE) )
                                        <button type="button" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                        <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    @endif
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

<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', () =>{
        const overlay = document.querySelector('#overlay')
        const AddTask = document.querySelector('#Add-Task')
        const closeBtn = document.querySelector('#close-modal')

        const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
        }
        AddTask.addEventListener('click', toggleModal)
        closeBtn.addEventListener('click', toggleModal)
    })
</script>
@endsection