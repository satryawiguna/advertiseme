import {Head} from '@inertiajs/react';
import {useEffect, useState} from "react";
import parse from 'html-react-parser';

export default function ShowContent(props) {
    const [content, setContent] = useState(props.content.content);

    Echo.channel(`advertiseme.channel.${props.content.id}`)
        .listen('ContentCreatedEvent', (data) => {
            setContent(data.data.content)
        })

    useEffect(() => {
        //
    }, [content])

    return (
        <>
            <Head title="Content" />

            <div id="ContentArea" className="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white text-white">
                {parse(content)}
            </div>
        </>
    );
}
