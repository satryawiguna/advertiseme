import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function Guest({ children, version }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 relative">
            <div className="w-full max-w-md lg:max-w-screen-lg mt-6 px-10 lg:px-52 py-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div className="flex flex-row justify-center items-center mb-5">
                    <div className="flex flex-col justify-center items-center">
                        <Link href="/">
                            <ApplicationLogo className="w-20 h-20 mb-5 fill-current text-gray-500" />
                        </Link>
                        Advertise Me TV
                    </div>

                </div>

                {children}
            </div>
            <footer className="h-10 bg-black text-white bottom-0 absolute w-full text-center">
                Advertise Me TV - V {version}
            </footer>
        </div>
    );
}
