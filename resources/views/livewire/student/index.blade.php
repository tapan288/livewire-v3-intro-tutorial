<div class="mt-8 flex flex-col">
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                ID
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Email
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Image
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Class
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Section
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6" />
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($students as $student)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ $student->id }}
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ $student->name }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $student->email }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <img src="{{ $student?->getMedia()?->last()?->getUrl() }}" alt=""
                                        width="200px" />
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $student->class->name }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $student->section->name }}
                                </td>

                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                    <button class="ml-2 text-indigo-600 hover:text-indigo-900">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
