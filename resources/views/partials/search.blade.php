<div class="w-full bg-white p-5 my-5">
    <form action="{{ route('search' , 'posts') }}" method="post">
        @csrf
        <input type="text" name="q" class="w-full py-5 outline-none italic" placeholder="Start searching from here...">
    </form>
</div>