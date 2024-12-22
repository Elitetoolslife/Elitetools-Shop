<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="files/bootstrap/3/css/bootstrap.css?1" />
    <link rel="stylesheet" type="text/css" href="files/css/flags.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <script type="text/javascript" src="files/js/jquery.js?1"></script>
    <script type="text/javascript" src="files/bootstrap/3/js/bootstrap.js?1"></script>
    <script type="text/javascript" src="files/js/sorttable.js"></script>
    <script type="text/javascript" src="files/js/table-head.js?3334"></script>
    <script type="text/javascript" src="files/js/bootbox.min.js"></script>
    <script type="text/javascript" src="files/js/clipboard.min.js"></script>

    <link rel="shortcut icon" href="files/img/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" /> 
    <meta name="referrer" content="no-referrer" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>JeruxShop</title>
</head>
<style>
    #table {
        .sortable
    }
    table th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { 
        content: " \25BE" 
    }

    .label-as-badge {
        border-radius: 0.5em;
    }

    body {
        padding-top:50px;
    }
    table.floatThead-table {
        border-top: none;
        border-bottom: none;
        background-color: #fff;
    }
    @media (min-width: 768px) {
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    }

    #mydiv {
        height: 400px;
        position: relative;
    }
    .ajax-loader {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        margin: auto; /* presto! */
    }
</style>
<script type="text/javascript">
    function ajaxinfo() {
        $.ajax({
            type: 'GET',
            url: 'ajaxinfo',
            timeout: 10000,
            success: function(data) {
                if (data != '01') {
                    var data = JSON.parse(data);
                    for (var prop in data) {
                        $("#" + prop)(data[prop]).show();
                    }
                } else {
                    window.location = "logout";
                }
            }
        });
    }
    setInterval(function() {
        ajaxinfo()
    }, 3000);

    ajaxinfo();

    $(document).keydown(function(event){
        if(event.which=="17")
            cntrlIsPressed = true;
    });

    $(document).keyup(function(){
        cntrlIsPressed = false;
    });

    var cntrlIsPressed = false;

    function pageDiv(n,t,u,x){
        if(cntrlIsPressed){
            window.open(u, '_blank');
            return false;
        }
        var obj = { Title: t, Url: u };
        if ( ("/"+obj.Url) != location.pathname) {
            if (x != 1) {history.pushState(obj, obj.Title, obj.Url);}
            else{history.replaceState(obj, obj.Title, obj.Url);}
        }
        document.title = obj.Title;
        $("#mainDiv")('<div id="mydiv"><img src="files/img/load2.gif" class="ajax-loader"></div>').show();
        $.ajax({
            type:       'GET',
            url:        'divPage'+n+'',
            success:    function(data)
            {
                $("#mainDiv")(data).show();
                newTableObject = document.getElementById('table');
                sorttable.makeSortable(newTableObject);
                $(".sticky-header").floatThead({top:60});
                if(x==0){ajaxinfo();}
            }
        });
        if (typeof stopCheckBTC === 'function') { 
            var a = stopCheckBTC();
        }
    }

    $(window).on("popstate", function(e) {
        location.replace(document.location);
    });

    $(window).on('load', function() {
        $('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
        pageDiv(6,'Leads - JeruxShop','leads',1);
        var clipboard = new Clipboard('.copyit');
        clipboard.on('success', function(e) {
            setTooltip(e.trigger, 'Copied!');
            hideTooltip(e.trigger);
            e.clearSelection();
        });
    });

    function setTooltip(btn, message) {
        console.log("hide-1");
        $(btn).tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
        console.log("show");
    }

    function hideTooltip(btn) {
        setTimeout(function() {$(btn).tooltip('hide'); console.log("hide-2");}, 1000);
    }
</script>
<style>
    .navbar {
        background-color: #001f3f;
    }
</style>
<body style="padding-top: 70px; padding-bottom: 70px;">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <div class="navbar-brand" onClick="location.href='index'" onMouseOver="this.style.cursor='pointer'">
                <b><span class="glyphicon glyphicon-fire"></span> Jerux SHOP <small><span class="glyphicon glyphicon-refresh"></span></small></b>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="topFixedNavbar1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hosts <span class="glyphicon glyphicon-chevron-down" id="alhosts"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="rdp" onclick="pageDiv(1,'RDP - JeruxShop','rdp',0); return false;">RDPs</a></li>
                        <li><a href="cPanel" onclick="pageDiv(2,'cPanel - JeruxShop','cPanel',0); return false;">cPanels</a></li>
                        <li><a href="shell" onclick="pageDiv(3,'Shell - JeruxShop','shell',0); return false;">Shells</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Send <span class="glyphicon glyphicon-chevron-down" id="mail"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="mailer" onclick="pageDiv(4,'PHP Mailer - JeruxShop','mailer',0); return false;">Mailers</a></li>
                        <li><a href="smtp" onclick="pageDiv(5,'SMTP - JeruxShop','smtp',0); return false;">SMTPs</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Leads <span class="glyphicon glyphicon-chevron-down" id="all_leads"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="leads" onclick="pageDiv(6,'Leads - JeruxShop','leads',0); return false;">Leads</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounts <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="premium" onclick="pageDiv(7,'Premium/Dating/Shop - JeruxShop','premium',0); return false;">Premium/Dating/Shop</a></li>
                        <li><a href="banks" onclick="pageDiv(8,'Banks - JeruxShop','banks',0); return false;">Banks</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Others <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="scampage" onclick="pageDiv(9,'Scampages - JeruxShop','scampage',0); return false;">Scampage</a></li>
                        <li><a href="tutorial" onclick="pageDiv(10,'Tutorials - JeruxShop','tutorial',0); return false;">Tutorial</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="addBalance" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance',0); return false;">
                    <span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span>
                </a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account  <span class="glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="setting" onclick="pageDiv(14,'Setting - JeruxShop','setting',0); return false;">Setting</a></li>
                        <li><a href="orders" onclick="pageDiv(15,'Orders - JeruxShop','orders',0); return false;">My Orders</a></li>
                        <li><a href="addBalance" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance',0); return false;">Add Balance</a></li>
                        <li class="divider"></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="mainDiv">
</div>
</body>
</html>