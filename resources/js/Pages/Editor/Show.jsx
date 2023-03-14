import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, useForm} from '@inertiajs/react';
import {put, post} from "axios";
import PrimaryButton from "@/Components/PrimaryButton";
import {Editor} from '@tinymce/tinymce-react';
import {useRef} from "react";
import TextInput from "@/Components/TextInput";
import InputError from "@/Components/InputError";

export default function Show({ auth, id, content }) {
    const editorRef = useRef(null);

    const { data, setData, post, patch, processing, errors } = useForm({
        id: 0,
        content: ''
    });

    if (id) {
        data.id = id;
        data.content = content;
    }

    const handleOnChange = (e) => {
        data.content = e;
        setData(data);
    };

    const onDragStart = (e, type) => {
        if (type === 'text') {
            e.dataTransfer.setData('text/html', '<span contenteditable="true">Text Here</span>');
        }

        if (type === 'image') {
            e.dataTransfer.setData('image/jpg', '<img />');
        }
    }

    const submit = (e) => {
        e.preventDefault();

        post(route('editor.storeOrUpdate'));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Editor Content</h2>}
        >
            <Head title="Editor Content" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <form onSubmit={submit}>
                            <div className="flex flex-col">
                                <div className="mb-3">
                                    <TextInput
                                        id="id"
                                        name="id"
                                        value={data.id}
                                        className="mt-1 block w-full"
                                        onChange={handleOnChange}
                                        placeholder="Id"
                                        readOnly
                                    />
                                </div>
                                <div className="flex flex-row mb-3">
                                    <span className="border border-gray-300 inline-flex justify-center items-center px-4 py-2 mb-5 mr-3"
                                          draggable="true"
                                          onDragStart={(e) => onDragStart(e, 'image')}>
                                        IMAGE
                                    </span>
                                    <span className="border border-gray-300 inline-flex justify-center items-center px-4 py-2 mb-5 mr-3"
                                            draggable="true"
                                            onDragStart={(e) => onDragStart(e, 'text')}>
                                        TEXT
                                    </span>
                                    <PrimaryButton disabled={processing}>
                                        {data.id !== 0 ? 'Update' : 'Save'}
                                    </PrimaryButton>
                                </div>
                                <Editor
                                    id="editor"
                                    name="editor"
                                    tinymceScriptSrc={`http://localhost/tinymce/tinymce.min.js`}
                                    onInit={(evt, editor) => editorRef.current = editor}
                                    initialValue={data.content}
                                    onEditorChange={handleOnChange}
                                    init={{
                                        height: 500,
                                        menubar: false,
                                        plugins: [
                                            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
                                            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                                            'insertdatetime', 'media', 'table', 'preview', 'help', 'wordcount'
                                        ],
                                        toolbar: 'undo redo | blocks | ' +
                                            'bold italic forecolor | alignleft aligncenter ' +
                                            'alignright alignjustify | bullist numlist outdent indent | ' +
                                            'removeformat | help',
                                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                                        images_file_types: "jpg,jpeg",
                                        setup: function(editor) {
                                            editor.on('drop', function(e) {
                                                if (e.dataTransfer) {
                                                    let content;

                                                    const text = e.dataTransfer.getData('text/html')

                                                    if (text) {
                                                        content = text.replace(/<meta.*?>/,'');

                                                        editor.selection.placeCaretAt(e.clientX, e.clientY);
                                                        editor.insertContent(content)
                                                    }

                                                    const image = e.dataTransfer.getData('image/jpg')

                                                    if (image) {
                                                        tinymce.activeEditor.execCommand('mceImage');
                                                    }

                                                    e.preventDefault();
                                                }
                                            });
                                        }
                                    }}
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
