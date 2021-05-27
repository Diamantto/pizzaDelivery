function setCookie(cname, cvalue, minutes) {
    let d = new Date();
    d.setTime(d.getTime() + (minutes * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let cookieArr = document.cookie.split(";");

    for (let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split("=");

        if (cname === cookiePair[0].trim()) {
            return cookiePair[1];
        }
    }

    // Return null if not found
    return null;

    // let name = cname + "=";
    // let decodedCookie = decodeURIComponent(document.cookie);
    // let ca = decodedCookie.split(';');
    // for (let i = 0; i < ca.length; i++) {
    //     let c = ca[i];
    //     while (c.charAt(0) === ' ') {
    //         c = c.substring(1);
    //     }
    //     if (c.indexOf(name) === 0) {
    //         return c.substring(name.length, c.length);
    //     }
    // }
    // return "";
}
