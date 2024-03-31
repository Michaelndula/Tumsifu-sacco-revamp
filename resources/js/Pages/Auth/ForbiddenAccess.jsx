import React from 'react';
import PrimaryButton from '@/Components/PrimaryButton';
import GuestLayout from '@/Layouts/GuestLayout';
import '../../../css/styles.scss'
import { Head} from '@inertiajs/react';

export default function ForbiddenAccess () {

    return (
        <>
            <Head title="Forbidden" />
             <div className="center-container">
            <div className="lock"></div>
            <div className="message">
                <h1>Access to this page is restricted</h1>
                <p>Please check with the site admin if you believe this is a mistake.</p>
            </div>
            
        </div>
        <PrimaryButton>
                        Go Back
                    </PrimaryButton>
        </>
    )
}