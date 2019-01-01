
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

function getPos(element) {
    var rect = element.getBoundingClientRect();
    var x = rect.left;
    var y = rect.top;
    return {x: x, y: y};
}


function blockPage() {
    mApp.blockPage({
        overlayColor: "#4CAF50",
        type: "loader",
        state: "success",
        message: "Carregando..."
    });
}

function unblockPage() {
    mApp.unblockPage();
}

function loadingBar(boolean) {
    if (boolean) {
        $("#my-page").addClass("animate_bar");
    } else {
        $("#my-page").removeClass("animate_bar");
    }
}

{
    var timeOut;
    function notify(msg, typeClass) {
        var alert = $("#system_alert");
        alert.addClass(typeClass);
        alert.html(msg);
        alert.show();
        timeOut = setTimeout(function () {
            alert.hide();
            alert.removeClass(typeClass);
        }, 4000);
    }

    function hideNotify() {
        clearTimeout(timeOut);
        var alert = $("#system_alert");
        alert.hide();
    }
}
