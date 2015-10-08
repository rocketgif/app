backend default {
    .host = "app";
    .port = "80";
}

sub vcl_recv {
    // Remove all cookies except the session ID.
    if (req.http.Cookie) {
        set req.http.Cookie = ";" + req.http.Cookie;
        set req.http.Cookie = regsuball(req.http.Cookie, "; +", ";");
        set req.http.Cookie = regsuball(req.http.Cookie, ";(PHPSESSID)=", "; \1=");
        set req.http.Cookie = regsuball(req.http.Cookie, ";[^ ][^;]*", "");
        set req.http.Cookie = regsuball(req.http.Cookie, "^[; ]+|[; ]+$", "");

        if (req.http.Cookie == "") {
            // If there are no more cookies, remove the header to get page cached.
            unset req.http.Cookie;
        }
    }
}

acl purge {
    "172.17.0.0"/16;
}

sub vcl_recv {
    if (req.request == "PURGE") {
        if (!client.ip ~ purge) {
            error 405 "Not allowed.";
        }
        return(lookup);
    } else {
        return(lookup);
    }
}

sub vcl_hit {
    if (req.request == "PURGE") {
        purge;
        error 200 "Purged.";
    }
}

sub vcl_miss {
    if (req.request == "PURGE") {
        purge;
        error 200 "Not in cache.";
    }
}

sub vcl_pass {
    if (req.request == "PURGE") {
        error 502 "PURGE on a passed object";
    }
}
