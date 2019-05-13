@if(isset($post))

    <form action="{{ route('posts.delete' , $post) }}" method="post" class="inline-block">
        @csrf
        {{ method_field('DELETE') }}
        <button title="Delete this article"
                type="submit"
                class="text-red-light mr-2">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>

@endif

<button @click="$modal.show('categoryModal')"
        class="text-grey-dark mr-2"
        title="Select Category">
    <i class="fas fa-tag"></i>
</button>

<button title="Select Tags"
        @click="$modal.show('tagsModal')"
        class="text-grey-dark mr-2">
    <i class="fas fa-tags"></i>
</button>

<button title="Select Featured Image"
        @click="$modal.show('featuredImage')"
        class="text-grey-dark mr-2">
    <i class="fas fa-image"></i>
</button>

<button title="Meta Tags"
        @click="$modal.show('metaTagsModal')"
        class="text-grey-dark mr-2">
    <i class="fas fa-code"></i>
</button>

