@extends('Layouts.home')
@section('content')
    <div class="md:px-8 py-3 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Gitlab ID</th>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Task Category</th>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Task Name</th>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">PIC</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Task Executor</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Start Date</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Due Date</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Start Time</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Stop Time</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Progress</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">Previous Task</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">QC Tester</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">QC Test Date</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">QC Properness</td>
                        <th class="text-left py-3 px-2 overflow-auto uppercase font-semibold text-sm">notes</td>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="">
                    <td class="w-1/3 text-left py-3 px-4">Lian</td>
                    <td class="w-1/3 text-left py-3 px-4">Smith</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    <td class="w-1/3 text-left py-3 px-4">Smith</td>
                    <td class="w-1/3 text-left py-3 px-4">02/08/2021</td>
                    <td class="w-1/3 text-left py-3 px-4">02/08/2021</td>
                    <td class="w-1/3 text-left py-3 px-4">08:00</td>
                    <td class="w-1/3 text-left py-3 px-4">18:00</td>
                    <td class="w-1/3 text-left py-3 px-4">90</td>
                    <td class="w-1/3 text-left py-3 px-4">WBSAPP</td>
                    <td class="w-1/3 text-left py-3 px-4">NANANA</td>
                    <td class="w-1/3 text-left py-3 px-4">05/08/2021</td>
                    <td class="w-1/3 text-left py-3 px-4">GOOD</td>
                    <td class="w-1/3 text-left py-3 px-4 ">
                        <div class="h-24 overflow-y-scroll">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

                        </div>
                    </td>
                </tr>
                    
                </tbody>
            </table>
        </div>
        <div >
            <div class="flex flex-row justify-end">
                <form action="" method="post">
                    <button type="button" class=" text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        Add New Task
                    </button>
                </form>

            </div>
        </div>
    </div>
@include('Modals.taskForm')
@endsection