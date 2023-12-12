@extends('admin.layout.adminlayout')
@section('content')

    @if(session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">
                {{session()->get('message')}}
            </span>
        </div>
    @endif


<div class="my-5">

<div class="flex justify-end mb-2">
    <a href="{{route('admin.tasks.create')}}" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white bg-blue-800 cursor-pointer px-3 py-2.5 font-normal text-xs leading-3 shadow-md rounded py-1">Add Task</a>
</div>
<br>

<div class="flex flex-col mb-7 pl-20 ml-10">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 w-1/3 mx-auto">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Task Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Intern
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Description
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Assign Date
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Deadline
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($tasks as $key =>$task )

            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                {{$key}}
              </td>
              <td class="px-4 py-4 whitespace-nowrap">
                {{$task->name}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @foreach ($users as $keys =>$user)
                    @if($task->user_id === $user->id)
                        {{$user->name}}
                    @endif
                @endforeach
              </td>
              <td class="px-6 py-4 whitespace-wrap">
              {{$task->description}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              {{$task->assignment_date}}

              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              {{$task->deadline}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if($task->status == 'pending')
                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-1 rounded  dark:text-red-400 border border-red-400"> {{$task->status}}</span>
                @elseif( $task->status == 'in_progress')
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-1 rounded  dark:text-yellow-300 border border-yellow-300">{{$task->status}}</span>
                @elseif( $task->status == 'completed')
                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded  dark:text-green-400 border border-green-400">{{$task->status}}</span>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{route('admin.tasks.edit', $task->id)}}" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white bg-green-700 cursor-pointer px-3 py-2.5 font-normal text-xs leading-3 shadow-md rounded py-1">Edit</a>
                <br><br>
                <form action="{{route('admin.tasks.destroy', $task->id)}}" method="POST">
                @method('DELETE')
                 @csrf
                <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white bg-red-800 cursor-pointer px-3 py-2.5 font-normal text-xs leading-3 shadow-md rounded py-1">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>


      </div>
      <div class="my-4 p-1">
      {{$tasks->links()}}

      </div>

    </div>
  </div>
</div>
</div>

@endsection
