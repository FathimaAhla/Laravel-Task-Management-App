@extends('admin.layout.adminlayout')

@section('content')

    <div class="mb-5">
    <h5 class="text-3xl text-center font-bold py-2"> Update Task</h5>
    </div>
    <div class="w-full md:w-96 md:max-w-full mx-auto">

        <div class="mx-auto w-full max-w-[550px] bg-white">
            <div class="p-6 sm:rounded-md">
    <form method="POST" action="{{route('admin.tasks.update', $task->id)}}">
        @method('PUT')
        @csrf
        <!-- task title -->
      <label class="mb-5 block text-base font-medium text-[#07074D]">
        <span class="text-gray-700">Task Name</span>
        <input
          type="text"  name="name"  class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"  value="{{$task->name}}"/>
      </label>



      <!-- task title -->

      <label class="mb-5 block text-base font-medium text-[#07074D]">
        <span class="text-gray-700">Deadline</span>
        <input type="date" name="deadline"   class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"  value="{{$task->deadline}}" />
      </label>
        <!-- task title -->

        <label class="block mb-6">
            <span class="text-gray-700">Assign To</span>
            <select name="user_id" class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">

                    @forelse ($users as $user)
                        @if($user->role =='intern')
                            <option value="{{$user->id}}" class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{$user->name}}</option>
                        @endif
                        @empty
                            <option value="">Employee list not found</option>
                    @endforelse

            </select>
        </label>


      <label class="mb-5 block text-base font-medium text-[#07074D]">
        <span class="text-gray-700">Description</span>
        <textarea name="description"  class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" rows="3"  value="{{$task->description}}" >{{$task->description}}</textarea>
      </label>

      <div class="mb-6">
        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white bg-indigo-600 cursor-pointer px-3 py-2.5 font-normal text-xs leading-3 shadow-md rounded"> Update Task </button>
      </div>
      <div>

        </div>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection
