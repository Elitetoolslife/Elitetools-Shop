<!doctype html>
<html>
<head>
    <!-- Linking stylesheets for the page -->
    <link rel="stylesheet" type="text/css" href="files/bootstrap/3/css/bootstrap.css?1" />
    <link rel="stylesheet" type="text/css" href="files/css/flags.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    
    <!-- Linking scripts -->
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
    /* Styling for sortable table headers */
    #table {
        .sortable
    }
    table th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { 
        content: " \25BE" 
    }

    /* Style for badges with rounded corners */
    .label-as-badge {
        border-radius: 0.5em;
    }

    /* General styling for body padding */
    body {
        padding-top:50px;
    }

    /* Ensures tables with sticky headers work properly */
    table.floatThead-table {
        border-top: none;
        border-bottom: none;
        background-color: #fff;
    }

    /* Media query for dropdowns to display correctly on larger screens */
    @media (min-width: 768px) {
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    }

    /* Styling for the loader */
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
    /* Function to refresh information on the page */
    function ajaxinfo() {
        $.ajax({
            type: 'GET',
            url: 'ajaxinfo.html',
            timeout: 10000,
            success: function(data) {
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

    /* Periodically updates page information every 3 seconds */
    setInterval(function() {
        ajaxinfo()
    }, 3000);
    ajaxinfo();

    /* Event handlers to manage keyboard interactions */
    $(document).keydown(function(event){
        if(event.which=="17")
            cntrlIsPressed = true;
    });

    $(document).keyup(function(){
        cntrlIsPressed = false;
    });

    var cntrlIsPressed = false;

    /* Function to change page contents dynamically */
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
        $("#mainDiv").html('<div id="mydiv"><img src="files/img/load2.gif" class="ajax-loader"></div>').show();
        $.ajax({
            type:       'GET',
            url:        'divPage'+n+'.html',
            success:    function(data)
            {
                $("#mainDiv").html(data).show();
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

    /* Prevents page reload on back button press */
    $(window).on("popstate", function(e) {
        location.replace(document.location);
    });

    /* Event triggered when page loads, handles dropdown hover and clipboard interactions */
    $(window).on('load', function() {
        $('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
        pageDiv(6,'Leads - JeruxShop','leads.html',1);
        var clipboard = new Clipboard('.copyit');
        clipboard.on('success', function(e) {
            setTooltip(e.trigger, 'Copied!');
            hideTooltip(e.trigger);
            e.clearSelection();
        });
    });

    /* Functions to manage tooltips for the "copy" button */
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
    /* Navbar styling */
    .navbar {
        background-color: #001f3f;
    }
</style>

<body style="padding-top: 70px; padding-bottom: 70px;">
<!-- Fixed top navigation bar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- Navbar toggle button for mobile view -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <!-- Brand name with click functionality to navigate to homepage -->
            <div class="navbar-brand" onClick="location.href='index.html'" onMouseOver="this.style.cursor='pointer'">
                <b><span class="glyphicon glyphicon-fire"></span> Jerux SHOP <small><span class="glyphicon glyphicon-refresh"></span></small></b>
            </div>
        </div>

        <!-- Main navigation links -->
        <div class="collapse navbar-collapse" id="topFixedNavbar1">
            <ul class="nav navbar-nav">
                <!-- Hosts Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Hosts <span class="glyphicon glyphicon-chevron-down" id="alhosts"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="rdp.html" onclick="pageDiv(1,'RDP - JeruxShop','rdp.html',0); return false;">RDPs</a></li>
                        <li><a href="cPanel.html" onclick="pageDiv(2,'cPanel - JeruxShop','cPanel.html',0); return false;">cPanels</a></li>
                        <li><a href="shell.html" onclick="pageDiv(3,'Shell - JeruxShop','shell.html',0); return false;">Shells</a></li>
                    </ul>
                </li>

                <!-- Send Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Send <span class="glyphicon glyphicon-chevron-down" id="mail"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="mailer.html" onclick="pageDiv(4,'PHP Mailer - JeruxShop','mailer.html',0); return false;">Mailers</a></li>
                        <li><a href="smtp.html" onclick="pageDiv(5,'SMTP - JeruxShop','smtp.html',0); return false;">SMTPs</a></li>
                    </ul>
                </li>

                <!-- Leads Dropdown Menu -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Leads <span class="glyphicon glyphicon-chevron-down" id="all_leads"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="leads.html" onclick="pageDiv(6,'Leads - JeruxShop','leads.html',0); return false;">Leads</a></li>
                    </ul>
                </li>

                <!-- Accounts Dropdown Menu -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Accounts <span class="glyphicon glyphicon-chevron-down" id="accounts"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="premium.html" onclick="pageDiv(7,'Premium/Dating/Shop - JeruxShop','premium.html',0); return false;">Premium/Dating/Shop</a></li>
                        <li><a href="banks.html" onclick="pageDiv(8,'Banks - JeruxShop','banks.html',0); return false;">Banks</a></li>
                    </ul>
                </li>

                <!-- Others Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Others <span class="glyphicon glyphicon-chevron-down" id="accounts"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="scampage.html" onclick="pageDiv(9,'Scampages - JeruxShop','scampage.html',0); return false;">Scampage</a></li>
                        <li><a href="tutorial.html" onclick="pageDiv(10,'Tutorials - JeruxShop','tutorial.html',0); return false;">Tutorial</a></li>
                    </ul>
                </li>
            </ul>

            <!-- User-specific options in the navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">
                    <span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span>
                </a></li>

                <!-- User dropdown with settings, orders, and logout options -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Account  <span class="glyphicon glyphicon-user"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="setting.html" onclick="pageDiv(14,'Setting - JeruxShop','setting.html',0); return false;">Setting</a></li>
                        <li><a href="orders.html" onclick="pageDiv(15,'Orders - JeruxShop','orders.html',0); return false;">My Orders</a></li>
                        <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">Add Balance</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!doctype html>
<html>
<head>
    <!-- Linking stylesheets for the page -->
    <link rel="stylesheet" type="text/css" href="files/bootstrap/3/css/bootstrap.css?1" />
    <link rel="stylesheet" type="text/css" href="files/css/flags.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    
    <!-- Linking scripts -->
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
    /* Styling for sortable table headers */
    #table {
        .sortable
    }
    table th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { 
        content: " \25BE" 
    }

    /* Style for badges with rounded corners */
    .label-as-badge {
        border-radius: 0.5em;
    }

    /* General styling for body padding */
    body {
        padding-top:50px;
    }

    /* Ensures tables with sticky headers work properly */
    table.floatThead-table {
        border-top: none;
        border-bottom: none;
        background-color: #fff;
    }

    /* Media query for dropdowns to display correctly on larger screens */
    @media (min-width: 768px) {
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    }

    /* Styling for the loader */
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
        margin: auto; /* Presto! */
    }
</style>

<script type="text/javascript">
    /* Function to refresh information on the page */
    function ajaxinfo() {
        $.ajax({
            type: 'GET',
            url: 'ajaxinfo.html',
            timeout: 10000,
            success: function(data) {
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

    /* Periodically updates page information every 3 seconds */
    setInterval(function() {
        ajaxinfo()
    }, 3000);
    ajaxinfo();

    /* Event handlers to manage keyboard interactions */
    $(document).keydown(function(event){
        if(event.which=="17")
            cntrlIsPressed = true;
    });

    $(document).keyup(function(){
        cntrlIsPressed = false;
    });

    var cntrlIsPressed = false;

    /* Function to change page contents dynamically */
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
        $("#mainDiv").html('<div id="mydiv"><img src="files/img/load2.gif" class="ajax-loader"></div>').show();
        $.ajax({
            type:       'GET',
            url:        'divPage'+n+'.html',
            success:    function(data)
            {
                $("#mainDiv").html(data).show();
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

    /* Prevents page reload on back button press */
    $(window).on("popstate", function(e) {
        location.replace(document.location);
    });

    /* Event triggered when page loads, handles dropdown hover and clipboard interactions */
    $(window).on('load', function() {
        $('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
        pageDiv(6,'Leads - JeruxShop','leads.html',1);
        var clipboard = new Clipboard('.copyit');
        clipboard.on('success', function(e) {
            setTooltip(e.trigger, 'Copied!');
            hideTooltip(e.trigger);
            e.clearSelection();
        });
    });

    /* Functions to manage tooltips for the "copy" button */
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
    /* Navbar styling */
    .navbar {
        background-color: #001f3f;
    }
</style>

<body style="padding-top: 70px; padding-bottom: 70px;">
<!-- Fixed top navigation bar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- Navbar toggle button for mobile view -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <!-- Brand name with click functionality to navigate to homepage -->
            <div class="navbar-brand" onClick="location.href='index.html'" onMouseOver="this.style.cursor='pointer'">
                <b><span class="glyphicon glyphicon-fire"></span> Jerux SHOP <small><span class="glyphicon glyphicon-refresh"></span></small></b>
            </div>
        </div>

        <!-- Main navigation links -->
        <div class="collapse navbar-collapse" id="topFixedNavbar1">
            <ul class="nav navbar-nav">
                <!-- Hosts Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Hosts <span class="glyphicon glyphicon-chevron-down" id="alhosts"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="rdp.html" onclick="pageDiv(1,'RDP - JeruxShop','rdp.html',0); return false;">RDPs</a></li>
                        <li><a href="cPanel.html" onclick="pageDiv(2,'cPanel - JeruxShop','cPanel.html',0); return false;">cPanels</a></li>
                        <li><a href="shell.html" onclick="pageDiv(3,'Shell - JeruxShop','shell.html',0); return false;">Shells</a></li>
                    </ul>
                </li>

                <!-- Send Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Send <span class="glyphicon glyphicon-chevron-down" id="mail"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="mailer.html" onclick="pageDiv(4,'PHP Mailer - JeruxShop','mailer.html',0); return false;">Mailers</a></li>
                        <li><a href="smtp.html" onclick="pageDiv(5,'SMTP - JeruxShop','smtp.html',0); return false;">SMTPs</a></li>
                    </ul>
                </li>

                <!-- Leads Dropdown Menu -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Leads <span class="glyphicon glyphicon-chevron-down" id="all_leads"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="leads.html" onclick="pageDiv(6,'Leads - JeruxShop','leads.html',0); return false;">Leads</a></li>
                    </ul>
                </li>

                <!-- Accounts Dropdown Menu -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Accounts <span class="glyphicon glyphicon-chevron-down" id="accounts"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="premium.html" onclick="pageDiv(7,'Premium/Dating/Shop - JeruxShop','premium.html',0); return false;">Premium/Dating/Shop</a></li>
                        <li><a href="banks.html" onclick="pageDiv(8,'Banks - JeruxShop','banks.html',0); return false;">Banks</a></li>
                    </ul>
                </li>

                <!-- Others Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Others <span class="glyphicon glyphicon-chevron-down" id="accounts"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="scampage.html" onclick="pageDiv(9,'Scampages - JeruxShop','scampage.html',0); return false;">Scampage</a></li>
                        <li><a href="tutorial.html" onclick="pageDiv(10,'Tutorials - JeruxShop','tutorial.html',0); return false;">Tutorial</a></li>
                    </ul>
                </li>
            </ul>

            <!-- User-specific options in the navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">
                    <span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span>
                </a></li>

                <!-- User dropdown with settings, orders, and logout options -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Account  <span class="glyphicon glyphicon-user"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="setting.html" onclick="pageDiv(14,'Setting - JeruxShop','setting.html',0); return false;">Setting</a></li>
                        <li><a href="orders.html" onclick="pageDiv(15,'Orders - JeruxShop','orders.html',0); return false;">My Orders</a></li>
                        <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">Add Balance</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav><!-- Main content area -->
<div id="mainDiv">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#filter" data-toggle="tab">Filter</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active in" id="filter">
            <table class="table">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Seller</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class='filterselect form-control input-sm' name="leads_country">
                                <option value="">ALL</option>
                                <!-- Country options dynamically inserted -->
                            </select>
                        </td>
                        <td><input class='filterinput form-control input-sm' name="leads_about" size='3'></td>
                        <td>
                            <select class='filterselect form-control input-sm' name="leads_seller">
                                <option value="">ALL</option>
                                <!-- Seller options dynamically inserted -->
                            </select>
                        </td>
                        <td>
                            <button id='filterbutton' class="btn btn-primary btn-sm" disabled>Filter <span class="glyphicon glyphicon-filter"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Leads Table -->
    <table width="100%" class="table table-striped table-bordered table-condensed sticky-header" id="table">
        <thead>
            <tr>
                <th scope="col">Country</th>
                <th scope="col">Description</th>
                <th scope="col">Email N</th>
                <th scope="col">Seller</th>
                <th scope="col">Price</th>
                <th scope="col">Added on</th>
                <th scope="col">Buy</th>
            </tr>
        </thead>
        <tbody>
            <!-- Leads data dynamically inserted -->
            

      <td>john_doe</td>
      <td>password123</td>
      <td>US</td>
      <td>Vendor1</td>
      <td>Some description</td>
      <td><button class="btn btn-info btn-sm">Copy</button></td>
    </tr>
    <!-- Other rows will be inserted dynamically -->
  </tbody>
</table>
  

    <script type="text/javascript">
        // Filter button click event
        $('#filterbutton').click(function () {
            $("#table tbody tr").each(function () {
                var ck1 = $.trim($(this).find("#leads_country").text().toLowerCase());
                var ck2 = $.trim($(this).find("#leads_about").text().toLowerCase());
                var ck3 = $.trim($(this).find("#leads_seller").text().toLowerCase());
                var val1 = $.trim($('select[name="leads_country"]').val().toLowerCase());
                var val2 = $.trim($('input[name="leads_about"]').val().toLowerCase());
                var val3 = $.trim($('select[name="leads_seller"]').val().toLowerCase());

                // Hide or show rows based on filter conditions
                if ((ck1 != val1 && val1 != '') || ck2.indexOf(val2) == -1 || (ck3 != val3 && val3 != '')) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
            $('#filterbutton').prop('disabled', true);  // Disable button after filtering
        });

        // Enable filter button if any filter changes
        $('.filterselect').change(function () {
            $('#filterbutton').prop('disabled', false);
        });
        
        // Enable filter button if any input changes
        $('.filterinput').keyup(function () {
            $('#filterbutton').prop('disabled', false);
        });

        // Function to initiate purchase of a tool
        function buythistool(id) {
            bootbox.confirm("Are you sure?", function (result) {
                if (result == true) {
                    $.ajax({
                        method: "GET",
                        url: "buytool.php?id=" + id + "&t=leads",
                        dataType: "text",
                        success: function (data) {
                            if (data.match(/<button/)) {
                                $("#leads" + id).html(data).show();
                            } else {
                                bootbox.alert('<center><img src="files/img/balance.png"><h2><b>No enough balance !</b></h2><h4>Please refill your balance <a class="btn btn-primary btn-xs" href="addBalance.html" onclick="window.open(this.href);return false;" >Add Balance <span class="glyphicon glyphicon-plus"></span></a></h4></center>')
                            }
                        },
                    });
                }
            });
        }

        // Function to open order details in modal
        function openitem(order) {
            $("#myModalLabel").text('Order #' + order);  // Set modal title
            $('#myModal').modal('show');  // Show modal
            $.ajax({
                type: 'GET',
                url: 'showOrder' + order + '.html',  // Fetch order data
                success: function (data) {
                    $("#modelbody").html(data).show();  // Display order data in modal
                }
            });
        }
    </script>

    <!-- Modal for displaying order details -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" id="modelbody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>