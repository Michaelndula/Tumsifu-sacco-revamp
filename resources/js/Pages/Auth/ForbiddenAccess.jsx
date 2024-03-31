export default function ForbiddenAccess () {
    return (
        <>
            <div className="lock"></div>
            <div className="message">
            <h1>Access to this page is restricted</h1>
            <p>Please check with the site admin if you believe this is a mistake.</p>
            </div>
        </>
    )
}