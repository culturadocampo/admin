
function is_json(json) {
    try {
        JSON.parse(json);
        return true;
    } catch (e) {
        return false;
    }
}


function get_pathname() {
    var pathname = window.location.pathname;
    pathname = pathname.replace('/', '');
    if (pathname !== "") {
        return pathname;
    } else {
        return "/";
    }
}