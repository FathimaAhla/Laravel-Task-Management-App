@extends('intern.layout.internlayout')
<div class="mb-5">

    @section('content')
    </div>

    <div class="mb-5">
    <h3 class="text-3xl text-center font-bold py-2"> Update Task</h3>
    </div>

<div class="w-full md:w-96 md:max-w-full mx-auto">
    <div class="mx-auto w-full max-w-[550px] bg-white">
  <div class="p-6 border border-gray-300 sm:rounded-md">
    <form method="POST" action="{{route('intern.tasks.update', $task->id)}}">
        @method('PUT')
        @csrf
        <!-- task title -->
      <label class="mb-5 block text-base font-medium text-[#07074D]">
        <span class="text-gray-700">Task Name</span>
        <input
          type="text"  name="name"  class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"  value="{{$task->name}}" readonly/>
      </label>



      <!-- task title -->

      <label class="mb-5 block text-base font-medium text-[#07074D]">
        <span class="text-gray-700">Deadline</span>
        <input type="date" name="deadline"   class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"  value="{{$task->deadline}}" readonly/>
      </label>

      <label class="mb-5 block text-base font-medium text-[#07074D]">
        <span class="text-gray-700">Status</span>
        <select
          name="status"  class="mb-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"  >
          <option value="pending">pending</option>
          <option value="in_progress">in_progress</option>
          <option value="completed">completed</option>
        </select>
      </label>


      <div class="mb-6">
        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white bg-indigo-600 cursor-pointer px-3 py-2.5 font-normal text-xs leading-3 shadow-md rounded"> Update Task </button>
      </div>
      <div>

        </div>
      </div>
    </form>
  </div>
</div>
</div>

@endsection
