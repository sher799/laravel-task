<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-20 border-6">
            <div class="bg-white bg-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (auth()->user()->role->name == 'manager')
                        <span class="text-blue-500 font-bold text-xl"> You're manager! </span>
                        @foreach ($applications as $application)
                            <div
                                class="relative flex w-600 p-4 flex-col rounded-xl text-gray-700 shadow-none border-2 mt-4">
                                <div
                                    class="relative mx-0 flex items-center gap-4 overflow-hidden rounded-xl pt-0 pb-8 text-gray-700 shadow-none">
                                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.
                                                1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=50&amp;q=80"
                                        alt="tania andrew"
                                        class="relative inline-block h-[58px] w-[58px] !rounded-full object-cover object-center" />
                                    <div class="flex p-2 w-full flex-col gap-0.5">
                                        <div class="flex justify-between">
                                            <div>
                                                <h5
                                                    class="block font-sans text-xl ml-3 font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                                    {{ $application->user->name }}
                                                </h5>
                                            </div>
                                            <div>
                                                <div
                                                    class="block font-sans text-xl ml-3 font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                                    <span>#{{ $application->id }}</span>
                                                </div>
                                                <div
                                                    class="block font-sans text-xl ml-3 font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                                    <span>{{ $application->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <div class="mb-3 p-0 mt-2">
                                            <p
                                                class="block font-sans text-xl ml-3 font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                                {{ $application->subject }}
                                            </p>
                                        </div>
                                        <div class="mb-3 p-0">
                                            <p
                                                class="block font-sans mb-2 text-xl ml-3 font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                                {{ $application->message }}
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                    @if (isset($application->file_url))
                                        <div
                                            class="border m-6 mb-3 p-6 rounded hover:bg-gray-50 transition cursor-pointer">
                                            <a href="{{ asset('storage/' . $application->file_url) }}" target="_blank">
                                                <svg data-slot="icon" fill="none" stroke-width="2" width="30"
                                                    height="30" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <p
                                    class="block font-sans ml-3 text-base font-light leading-relaxed text-blue-gray-900 antialiased">
                                    {{ $application->user->email }}
                                </p>
                                <div class="flex justify-end">
                                    <a href="{{ route('answer.create', ['application' => $application->id]) }}"
                                        class="bg-info hover:bg-secondary Active text-black text-sm py-2 px-4 mr-2 mb-2 rounded-xl transition duration-300">
                                        Answer
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        {{ $applications->links() }}
                </div>

                <div class="w-full pt-5 px-4 mb-8 mx-auto mt-3">
                    <div class="text-sm text-gray-700 py-1">
                        Made with <a class="text-gray-700 font-semibold"
                            href="https://www.material-tailwind.com/docs/html/card?ref=tailwindcomponents"
                            target="_blank">Material Tailwind</a> by <a
                            href="https://www.creative-tim.com?ref=tailwindcomponents"
                            class="text-gray-700 font-semibold" target="_blank"> Creative Tim</a>.
                    </div>
                </div>
            @else
                <div class="text-2xl font-bold mb-6">
                    <span>You're client</span>
                </div>
                @if (session()->has('error'))
                    <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">Warning alert!</span> {{ session()->get('error') }}
                        </div>
                    </div>
                @endif
                <script src="https://cdn.tailwindcss.com"></script>

                <body class="bg-gray-100">
                    <div class="container mx-auto py-8">
                        <h1 class="text-2xl font-bold mb-6 text-center">Submit your application</h1>

                        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data"
                            class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">SUBJECT</label>
                                <input
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                                    type="text" id="name" name="subject" placeholder="" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">MESSAGE</label>
                                <textarea rows="5"
                                    class="w-full px-3 py-2 row-auto border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                                    type="text" id="email" name="message" placeholder="" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">FILE</label>
                                <input
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                                    type="file" id="password" name="file" placeholder="">
                            </div>

                            <button
                                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                                type="submit">SEND
                            </button>
                        </form>

                    </div>
                </body>
                @endif

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
