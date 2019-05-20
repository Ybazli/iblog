@extends('layouts.app')
@section('breadcrumb-pages')
    Settings
@endsection

@section('content')
    <div class="container">

        <div class="mx-auto w-2/3 bg-white">
            <div class="p-4">
                <form action="{{ route('setting.update') }}"
                      method="post"
                      class="mt-5">
                    @csrf

                    {{ method_field('patch') }}

                    <div class="my-5">
                        <label for="app_debug"
                               class="text-grey-dark text-sm">App
                            Debug:</label>
                        <input type="checkbox"
                               name="app_debug"
                               class=""
                               value="{{ $data['app_debug'] ? "true" : "false" }}"
                               {{ $data['app_debug'] ? 'checked' : '' }}
                               id="app_debug">
                    </div>


                    <div class="my-5">
                        <label for="app_name"
                               class="text-grey-dark text-sm">App
                            Name:</label>
                        <input type="text"
                               class="input-default text-sm mt-3"
                               name="app_name"
                               id="app_name"
                               value="{{ $data['app_name'] }}">
                    </div>

                    <div class="my-5">
                        <label for="app_url"
                               class="text-grey-dark text-sm">App
                            URI:</label>
                        <input type="text"
                               class="input-default text-sm mt-3"
                               name="app_url"
                               id="app_url"
                               value="{{ $data['app_url'] }}">
                    </div>


                    <div class="my-5">
                        <label for="admin_prefix"
                               class="text-grey-dark text-sm">
                            Admin Prefix:
                        </label>
                        <input type="text"
                               class="input-default text-sm mt-3"
                               name="admin_prefix"
                               id="admin_prefix"
                               value="{{ $data['admin_prefix'] }}">
                    </div>


                    <div class="my-5">
                        <label for="blog_prefix"
                               class="text-grey-dark text-sm">
                            Blog Prefix:
                        </label>
                        <input type="text"
                               class="input-default text-sm mt-3"
                               name="blog_prefix"
                               id="blog_prefix"
                               value="{{ $data['blog_prefix'] }}">
                    </div>


                    <div class="my-5">
                        <label for="google_tag_id"
                               class="text-grey-dark text-sm">
                            Google Tag ID:
                        </label>
                        <input type="text"
                               class="input-default text-sm mt-3"
                               name="google_tag_id"
                               id="google_tag_id"
                               value="{{ $data['google_tag_id'] }}">
                    </div>


                    <div class="my-5">
                        <button type="submit"
                                class="button">
                            Update
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection