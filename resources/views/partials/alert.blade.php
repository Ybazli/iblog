@if($errors->any())
    @foreach($errors->all() as $error)

        <alert message="{{ $error }}"
               type="error">
        </alert>

    @endforeach
@endif

@if(Session::has('message'))
    <alert message="{{ Session::get('message') }}" type="success">
    </alert>
@endif