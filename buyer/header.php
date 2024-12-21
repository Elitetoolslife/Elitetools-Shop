<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
    <title>Elitetools</title>

    <link rel="stylesheet" href="resources/files/css/flags.css" />
    <link rel="icon" href="resources/img/favicon.ico" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 50px;
        }

        table th:not(.sort_sorted):not(.sort_sorted_reverse):not(.sort-table_nosort):after {
            content: " \25BE"
        }

        .badge-as-badge {
            border-radius: 0.5em;
        }

        .navbar {
            background-color: #001f3f;
        }

        .navbar-nav .nav-item a {
            color: white !important;
        }

        #container-div {
            height: 400px;
            position: relative;
        }

        .ajax-amination {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Elitetools</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="https://elitetools.life/elitetools/seller/index.html" class="nav-link">
                            <span class="badge" title="Seller Panel"><span class="bi bi-cloud"></span><span
                                    id="seller"></span></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Tickets <span id="alltickets">
                                <span class="badge bg-danger">1</span>
                            </span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tickets.html"
                                    onclick="pageDiv(11,'Tickets - JeruxShop','tickets.html',0); return false;">Tickets
                                    <span class="badge bg-info"><span id="tickets"></span></span>
                                    <span class="badge bg-success">1 New</span></a></li>
                            <li><a class="dropdown-item" href="reports.html"
                                    onclick="pageDiv(12,'Reports - JeruxShop','reports.html',0); return false;">Reports
                                    <span class="badge bg-info"><span id="reports"></span></span>
                                    <span class="badge bg-success">1 New</span></a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="addBalance.html" class="nav-link"
                            onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">
                            <span class="badge"><b><span id="balance"></span></b> <span
                                    class="bi bi-plus-circle"></span></span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Account <span class="bi bi-person"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="setting.html"
                                    onclick="pageDiv(14,'Setting - JeruxShop','setting.html',0); return false;">Setting
                                    <span class="bi bi-gear-fill float-end"></span></a></li>
                            <li><a class="dropdown-item" href="orders.html"
                                    onclick="pageDiv(15,'Orders - JeruxShop','orders.html',0); return false;">My Orders
                                    <span class="bi bi-cart-fill float-end"></span></a></li>
                            <li><a class="dropdown-item" href="addBalance.html"
                                    onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">Add
                                    Balance <span class="bi bi-currency-dollar float-end"></span></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.html">Logout <span
                                        class="bi bi-box-arrow-right float-end"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="mainDiv">
        <!-- Dynamic Content will be loaded here -->
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function ajax() {
            $.ajax({
                type: 'GET',
                url: 'ajax',
                timeout: 10000,
                success: function (data) {
                    if (data != '01') {
                        var data = JSON.parse(data);
                        for (var prop in data) {
                            $("#" + prop).html(data[prop]).show();
                        }
                    } else {
                        window.location = "logout.html";
                    }
                }
            });
        }

        setInterval(function () {
            ajaxinfo()
        }, 3000);

        ajaxinfo();

        $(document).keydown(function (event) {
            if (event.which == "17")
                cntrlIsPressed = true;
        });

        $(document).keyup(function () {
            cntrlIsPressed = false;
        });

        var cntrlIsPressed = false;

        function pageDiv(n, t, u, x) {
            if (cntrlIsPressed) {
                window.open(u, '_blank');
                return false;
            }
            var obj = { Title: t, Url: u };
            if (("/" + obj.Url) != location.pathname) {
                if (x != 1) { history.pushState(obj, obj.Title, obj.Url); }
                else { history.replaceState(obj, obj.Title, obj.Url); }
            }
            document.title = obj.Title;
            $("#mainDiv").html('<div id="mydiv"><img src="files/img/load2.gif" class="ajax-loader"></div>').show();
            $.ajax({
                type: 'GET',
                url: 'divPage' + n + '.html',
                success: function (data) {
                    $("#mainDiv").html(data).show();
                    newTableObject = document.getElementById('table');
                    sorttable.makeSortable(newTableObject);
                    $(".sticky-header").floatThead({ top: 60 });
                    if (x == 0) { ajaxinfo(); }
                }
            });
            if (typeof stopCheckBTC === 'function') {
                var a = stopCheckBTC();
            }
        }

        $(window).on("popstate", function (e) {
            location.replace(document.location);
        });

        function setTooltip(btn, message) {
            console.log("hide-1");
            $(btn).tooltip('hide')
                .attr('data-original-title', message)
                .tooltip('show');
            console.log("show");
        }

        function hideTooltip(btn) {
            setTimeout(function () {
                $(btn).tooltip('hide');
                console.log("hide-2");
            }, 1000);
        }
    </script>
</body>

</html>