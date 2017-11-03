// refreshes the rates on index page every 4 seconds
function refresh() {
    $('#content').load("content_rates.php", function () {
        // refresh again in 4 seconds
        setTimeout(refresh, 4000);
    });
}

// load on startup, also initiates the refresh chain
refresh();