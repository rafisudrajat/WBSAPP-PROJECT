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
                                    {{$notes[$i]}}
                                </div>
                            </td>
                            <td >
                                <div class='flex flex-col place-content-center gap-y-1'>
                                    @if ($gen_role=='Admin' || $task_maker[$i]==session('UserLogged') || in_array(1,$spec_role, TRUE) )
                                        <form action="/editTask" method="post">
                                            <button type="button" id="Edit-Task{{$task_id[$i]}}"  class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline editTask">
                                                Edit
                                            </button>
                                        </form>
                                        <form action="/deleteTask" method="post">
                                            <button type="button" id="Delete-Task{{$task_id[$i]}}" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline deleteTask">
                                                Delete
                                            </button>
                                        </form>
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
@include('Modals.editTask')
@include('Modals.ensureDeleteTask')

{{-- INCLUDE JQUERY AJAX --}}
<script src="{{ asset('js/app.js') }}">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', () =>{
        const overlay = document.querySelector('#overlay')
        const overlayEditTask = document.querySelector('#overlayEditTask')
        const overlayDeleteTask = document.querySelector('#overlayDeleteTask')
        
        const AddTask = document.querySelector('#Add-Task')
        const EditTask = document.getElementsByClassName("editTask")
        const DeleteTask = document.getElementsByClassName("deleteTask")
        

        const closeBtn = document.querySelector('#close-modal')
        const closeBtn2 = document.querySelector('#close-editTask')
        const closeBtn3 = document.querySelector('#cancel-Btn')

        const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
        }

        const toggleModal2 = (idx=0) => {
                overlayEditTask.classList.toggle('hidden')
                overlayEditTask.classList.toggle('flex')
                console.log(idx)
                document.getElementById('task_id').value=idx
        }
        
        const toggleModal3 = (idx=0) => {
                overlayDeleteTask.classList.toggle('hidden')
                overlayDeleteTask.classList.toggle('flex')
                document.getElementById('id2Delete').value=idx
        }
        const getTask =(input)=>{
            $.ajax(
                {
                    type : 'GET',
                    url : '/queryTask',
                    data:{'key':input},
                    success: (data)=>{ 
                        $('#gitlab-ID-Edit').val(data.gitlab_id)
                        $('#task_category-Edit').val(data.task_cat_name)
                        $('#progress-Edit').val(data.progress)
                        $('#gitlab-ID-Edit').val(data.gitlab_id)
                        $('#task-name-Edit').val(data.task_name)
                        $('#pic-id-Edit').val(data.pic_name)
                        $('#task_exec_id-Edit').val(data.exec_name)
                        $('#prev-task-Edit').val(data.prev_task)
                        $('#start-date-Edit').val(data.start_date)
                        $('#due-date-Edit').val(data.due_date)
                        $('#start-time-Edit').val(data.start_time)
                        $('#stop-time-Edit').val(data.stop_time)
                        $('#qc_test_date').val(data.qc_testdate)
                        $('#qc_tester_name-Edit').val(data.qc_name)
                        $('#qc_properness-Edit').val(data.qc_properness)
                        $('#notes-Edit').val(data.notes)
                        // console.log(data)
                    }
                })
        }
        for (let i = 0; i < EditTask.length; i++) {
            let id=EditTask[i].id
            id=parseInt(id.replace("Edit-Task",''))
            EditTask[i].addEventListener('click', ()=>{
               getTask(id)
               toggleModal2(id)
            })
        }

        for (let i = 0; i < DeleteTask.length; i++) {
            let id=DeleteTask[i].id
            id=parseInt(id.replace("Delete-Task",''))
            DeleteTask[i].addEventListener('click', ()=>{
                // console.log(id)
                toggleModal3(id)
            })
        }
        
        closeBtn2.addEventListener('click',()=>{
            toggleModal2()
        })
        closeBtn3.addEventListener('click',()=>{
            toggleModal3()
        })

        AddTask.addEventListener('click', toggleModal)
        closeBtn.addEventListener('click', toggleModal)
    })
</script>

@endsection