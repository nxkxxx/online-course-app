<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Courses') }}
            </h2>
            <a href="{{ route('admin.courses.create') }}"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition duration-200">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @if (session('success'))
                    <div class="px-4 py-3 w-full font-bold text-lg rounded-3xl bg-green-500 text-white">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @forelse ($courses as $course)
                    <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($course->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $course->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $course->category->name }}</p>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Student</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $course->students->count() }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Videos</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $course->course_videos->count() }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Teacher</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $course->teacher->user->name }}</h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.courses.show', $course) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 hover:bg-indigo-800 transition duration-200 text-white rounded-full">
                                Manage
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="confirm" value="yes">
                                <button type="submit"
                                    class="font-bold py-4 px-6 bg-red-700 hover:bg-red-800 transition duration-200 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Belum ada kelas yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
