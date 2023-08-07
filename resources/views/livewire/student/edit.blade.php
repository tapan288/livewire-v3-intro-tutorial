<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12">
            <form wire:submit="update">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Student Information
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Use this form to update student's data.
                            </p>
                        </div>

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input wire:model="form.name" type="text" id="name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                <div class="text-red-500">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email
                                    Address</label>
                                <input wire:model="form.email" type="text" id="email" autocomplete="email"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                <div class="text-red-500">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            @if (
                                $student
                                    ?->getMedia()
                                    ?->last()
                                    ?->getUrl())
                                <div class="col-span-6 sm:col-span-4">
                                    <img src="{{ $student?->getMedia()?->last()?->getUrl() }}"
                                        alt="{{ $student->name }}" width="200px" />
                                </div>
                            @endif

                            <div class="col-span-6 sm:col-span-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <input wire:model="form.image" type="file" id="image"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                <div class="text-red-500">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="class_id" class="block text-sm font-medium text-gray-700">Class</label>
                                <select wire:model.live="class_id" id="class_id"
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select a Class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="text-red-500">
                                    @error('class_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="section_id" class="block text-sm font-medium text-gray-700">Section</label>
                                <select wire:model="form.section_id" id="section_id"
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select a Section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">
                                            {{ $section->name }} - {{ $section->class->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="text-red-500">
                                    @error('section_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ route('students.index') }}" as="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
