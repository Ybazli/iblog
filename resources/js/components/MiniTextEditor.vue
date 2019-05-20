<template>
    <div>
        <input type="hidden" name="body" :value="this.body">
        <div class="w-full rounded p-5 bg-white editor text-grey-darker"
             style="min-height: 300px;">
        </div>
    </div>
</template>

<script>
    import { ImageResize } from 'quill-image-resize-module';
    import { ImageDrop } from 'quill-image-drop-module';
    Quill.register('modules/imageDrop', ImageDrop);

    export default {
        name: "MiniTextEditor.vue",
        data() {
            return {
                editor: null,
                body: String,
                imageUplaodUrl:'/blog/posts/create/image-upload',
                imageUrl:'',

            }
        },
        props:[
            'data'
        ],
        mounted() {

            const icons = Quill.import('ui/icons');
            this.editor = new Quill('.editor', {
                modules: {
                    imageDrop: true,
                    syntax: true,
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike', 'code'],
                        [{'header': '2'}, {'header': '3'}],
                        [{'list': 'ordered'}, {'list': 'bullet'}, 'link'],
                        ['blockquote', 'code-block', 'image'],
                    ],
                    imageResize: {
                        displayStyles: {
                            backgroundColor: 'black',
                            border: 'none',
                            color: 'white'
                        },
                        modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
                    }
                },
                theme: 'bubble',
                scrollingContainer: 'html, body',
                placeholder: "Starting writing now..."
            });
            this.editor.on('text-change', () => this.updateBody());
            this.editor.getModule('toolbar').addHandler('image', () => {
                this.selectLocalImage();
            });

            if(this.data && this.data.length) {
                this.body = this.data;
                this.editor.root.innerHTML = this.data;
            }


        },
        methods: {
            updateBody() {
                this.body = this.editor.root.innerHTML;
            },
            selectLocalImage() {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.click();

                // Listen upload local image and save to server
                input.onchange = () => {
                    const file = input.files[0];

                    // file type is only image.
                    if (/^image\//.test(file.type)) {
                        this.saveToServer(file);
                    } else {
                        console.warn('You could only upload images.');
                    }
                }

            },
            saveToServer(file){
                const fd = new FormData();
                fd.append('image', file);
                axios.post(this.imageUplaodUrl , fd).then((e) =>{
                    this.insertToEditor(e.data);
                })
            },
            insertToEditor(url){
                const range = this.editor.getSelection();
                this.editor.insertEmbed(range.index, 'image', `/${url}`);
            }
        }

    }
</script>

<style scoped>

</style>