<div class="w-full bg-white p-5 my-5 border-b-2">

    <form action="{{ route('search' , 'posts') }}" method="get">

        <input type="hidden" name="type" value="{{ $type }}">

        <div class="">
            <input type="text" name="q"
                   class="w-full py-5 outline-none italic"
                   placeholder="Start searching from here...">
        </div>

    </form>

</div>