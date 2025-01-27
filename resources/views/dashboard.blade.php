<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(auth()->user()->role->name == 'manager')
                        <span class="text-blue-500 font-bold text-xl"> You're manager! </span>
@dd($applications)
                        <div
                            class="relative flex w-400 max-w-[12rem] flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
                            <div class="relative mx-0 mt-4 flex items-center gap-4 overflow-hidden rounded-xl bg-transparent bg-clip-border
                             pt-0 pb-8 text-gray-700 shadow-none">
                                <img
                                    src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.
                                    1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=50&amp;q=80"
                                    alt="tania andrew"
                                    class="relative inline-block h-[58px] w-[58px] !rounded-full object-cover object-center"
                                />
                                <div class="flex w-full flex-col gap-0.5">
                                    <div class="flex items-center justify-between">
                                        <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                            Tania Andrew
                                        </h5>
                                        <div class="5 flex items-center gap-0">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-700"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="block font-sans text-base font-light leading-relaxed text-blue-gray-900 antialiased">
                                        Frontend Lead @ Google
                                    </p>
                                </div>
                            </div>
                            <div class="mb-6 p-0">
                                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                    "I found solution to all my design needs from Creative Tim. I use them
                                    as a freelancer in my hobby projects for fun! And its really affordable,
                                    very humble guys !!!"
                                </p>
                            </div>
                        </div>

                        <div class="w-full pt-5 px-4 mb-8 mx-auto ">
                            <div class="text-sm text-gray-700 py-1">
                                Made with <a class="text-gray-700 font-semibold"
                                             href="https://www.material-tailwind.com/docs/html/card?ref=tailwindcomponents"
                                             target="_blank">Material Tailwind</a> by <a
                                    href="https://www.creative-tim.com?ref=tailwindcomponents"
                                    class="text-gray-700 font-semibold" target="_blank"> Creative Tim</a>.
                            </div>
                        </div>

                        <!-- stylesheet -->
                        {{--                        <link--}}
                        {{--                            rel="stylesheet"--}}
                        {{--                            href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"--}}
                        {{--                        />--}}
                    @else
                        You're client
                        <script src="https://cdn.tailwindcss.com"></script>
                        <body class="bg-gray-100">
                        <div class="container mx-auto py-8">
                            <h1 class="text-2xl font-bold mb-6 text-center">Submit your application</h1>

                            <form action="{{route('applications.store')}}" method="POST" enctype="multipart/form-data"
                                  class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
                                  @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">SUBJECT</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                                        type="text" id="name" name="subject" placeholder="" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                           for="email">MESSAGE</label>
                                    <textarea rows="5"
                                              class="w-full px-3 py-2 row-auto border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                                              type="text" id="email" name="message" placeholder="" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                           for="password">FILE</label>
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
