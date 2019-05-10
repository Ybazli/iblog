<header class="bg-white py-6 shadow mb-8">

    <div class="container mx-auto flex justify-between">

        <div class="flex items-center">

            <a href="{{ route('home') }}" class="text-xl text-grey-darker no-underline">
                {{ config('app.name') }}
            </a>

            <ul class="list-reset inline-flex ml-5">
                <li class="mr-5">
                    <a href="#" class="link">Blog</a>
                </li>
                <li class="mr-5">
                    <a href="#" class="link">Blog</a>
                </li>
                <li class="mr-5">
                    <a href="#" class="link">Blog</a>
                </li>
            </ul>
        </div>

        @if(auth()->guest())
            <div class="">
                <ul class="list-reset inline-flex">
                    <li class="mr-5"
                    ><a href="/login" class="link">Login</a>
                    </li>
                    <li class="mr-5">
                        <a href="/register" class="link">Register</a>
                    </li>
                </ul>
            </div>
        @else
            <div>
                <ul class="list-reset inline-flex">

                    <div class="flex items-center link cursor-pointer text-sm text-blue border border-white border-b-0
                    group-hover:border-grey-light rounded-t-lg py-1 px-2"
                            >
                        <img src="{{ auth()->user()->avatar() }}"
                             class="rounded-full mr-2"
                             style="max-width: 35px" alt="{{ auth()->user()->fullname() }}">
                        {{ auth()->user()->fullname() }}
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>

                </ul>

            </div>

        @endif


    </div>

</header>