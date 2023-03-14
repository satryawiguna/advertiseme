import {Head} from '@inertiajs/react';
import {useEffect, useState} from "react";

export default function ShowContent(props) {
    const [content, setContent] = useState('');

    useEffect(() => {
        setContent(props.content.content)
    }, [])

    return (
        <>
            <Head title="Content" />

            <div className="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white text-white">
                {document.write(content)}
            </div>
        </>
    );
}
