<!doctype html>
<html lang="en">
<head>    
  <meta charset="utf-8">
  <meta name="referrer" content="no-referrer">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>EliteTools</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="https://elitetools.life/elitetools/resources/files/img/favicon.ico">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABzZ0R2K7pP3P4vT8ttX6bX1t2v1nYfX6lFZbOVD6R2oR9hyb0h1iiC" crossorigin="anonymous">

  <!-- Custom Styles -->
  <link rel="stylesheet" type="text/css" href="{{'https://elitetools.life/elitetools/resources/files/css/flags.css'}}">

  <!-- FontAwesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Optional Custom Styles (if you have any additional custom styles) -->
  <!-- <link rel="stylesheet" type="text/css" href="path_to_your_custom_styles.css"> -->
</head>
<body>
  <!-- Your body content will go here -->

  <!-- jQuery (needed for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEJxCoz4kJ6DcnH19wXPR56c8p3n6OB7d8wQx0RPU4wT0OB+8t6kC2bL1C7Z6" crossorigin="anonymous"></script>

  <!-- Bootstrap 5 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybGzKSAv5Kk8ZyS4w7w45wz1RfDgsZUpTszF6qg21ww3Ubg1E" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Zz61U6lV9qxyh0gdCT37tT9B0biGV4jRxFE6xK7g0S0H2aB" crossorigin="anonymous"></script>

  <!-- Additional Scripts -->
  <script type="text/javascript" src="https://elitetools.life/elitetools/resources/files/js/sorttable.js"></script>
  <script type="text/javascript" src="https://elitetools.life/elitetools/resources/files/js/table-head.js"></script>
  <script type="text/javascript" src="https://elitetools.life/elitetools/resources/files/js/bootbox.min.js"></script>
  <script type="text/javascript" src="https://elitetools.life/elitetools/resources/files/js/clipboard.min.js"></script>
</body>

<style>
    /* Basic DataTable Styling */
    table.dataTable {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px; /* Rounded corners */
    }

    /* DataTable headers */
    table.dataTable th {
        background-color: #007bff; /* Blue background */
        color: #fff;
        padding: 12px;
        text-align: left;
        font-weight: bold;
        border: none;
        font-size: 14px;
    }

    /* DataTable row hover effect */
    table.dataTable tbody tr:hover {
        background-color: #f1f1f1; /* Light grey background on hover */
        cursor: pointer;
    }

    /* Styling for active or selected rows */
    table.dataTable tbody tr.selected {
        background-color: #28a745; /* Green background for selected row */
        color: #fff;
    }

    /* Styling for DataTable cells */
    table.dataTable td {
        padding: 12px;
        font-size: 13px;
        border: 1px solid #ddd;
        vertical-align: middle;
    }

    /* Zebra striping for DataTable rows */
    table.dataTable tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    table.dataTable tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    /* DataTable pagination styling */
    .dataTables_paginate {
        text-align: center;
        padding: 10px 0;
    }

    .dataTables_paginate .paginate_button {
        background-color: #007bff;
        color: #fff;
        padding: 6px 12px;
        border-radius: 4px;
        margin: 0 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dataTables_paginate .paginate_button:hover {
        background-color: #0056b3;
    }

    .dataTables_paginate .paginate_button.disabled {
        background-color: #f0f0f0;
        cursor: not-allowed;
    }

    /* Styling for the DataTable search box */
    .dataTables_filter input {
        border-radius: 4px;
        padding: 5px;
        font-size: 14px;
        border: 1px solid #ddd;
        width: 250px;
    }

    /* Loading spinner for DataTable */
    .dataTables_processing {
        background: rgba(0, 0, 0, 0.2);
        color: #007bff;
        padding: 10px;
        font-size: 18px;
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 10000;
        border-radius: 5px;
    }

    /* DataTable buttons */
    .dt-buttons {
        margin-top: 10px;
        text-align: right;
    }

    .dt-button {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        margin-left: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .dt-button:hover {
        background-color: #0056b3;
    }

    /* Style for badges with rounded corners */
    .label-as-badge {
        border-radius: 12px; /* More rounded corners */
        padding: 5px 12px;
        background-color: #007bff; /* Blue badge */
        color: white;
        font-size: 14px;
        font-weight: bold;
    }

    .label-as-badge.secondary {
        background-color: #6c757d; /* Grey for secondary badges */
    }

    /* General styling for body padding */
    body {
        padding-top: 60px; /* Increased padding for better spacing */
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa; /* Soft background color */
        color: #333; /* Darker text for contrast */
    }

    /* Ensures tables with sticky headers work properly */
    table.floatThead-table {
        border-top: none;
        border-bottom: none;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    /* Media query for dropdowns to display correctly on larger screens */
    @media (min-width: 768px) {
        .dropdown:hover .dropdown-menu {
            display: block;
            animation: fadeIn 0.3s ease-in-out; /* Smooth fade-in for dropdown */
        }
    }

    /* Animation for fade-in dropdown */
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    /* Styling for the loader */
    #mydiv {
        height: 400px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ajax-loader {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3; /* Light grey background */
        border-top: 5px solid #007bff; /* Blue loader */
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    /* Spinning animation for the loader */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<script type="text/javascript">
    /* Refreshes dynamic data on the page */
    function updatePageData() {
        $.ajax({
            type: 'GET',
            url: 'ajaxinfo',
            timeout: 10000,
            success: function(response) {
                if (response !== '01') {
                    const data = JSON.parse(response);
                    Object.keys(data).forEach(key => {
                        $("#" + key).html(data[key]).show();
                    });
                } else {
                    window.location.href = "logout.html";
                }
            }
        });
    }

    /* Sets up periodic data updates every 3 seconds */
    setInterval(updatePageData, 3000);
    updatePageData();

    /* Tracks the state of the Ctrl key */
    let isCtrlPressed = false;
    $(document).on("keydown", function(event) {
        if (event.which === 17) isCtrlPressed = true;
    });

    $(document).on("keyup", function() {
        isCtrlPressed = false;
    });

    /* Dynamically loads page sections */
    function loadContent(sectionId, title, url, replaceState = false) {
        if (isCtrlPressed) {
            window.open(url, '_blank');
            return false;
        }

        const pageData = { Title: title, Url: url };

        if (location.pathname !== "/" + pageData.Url) {
            if (replaceState) {
                history.replaceState(pageData, pageData.Title, pageData.Url);
            } else {
                history.pushState(pageData, pageData.Title, pageData.Url);
            }
        }

        document.title = pageData.Title;
        $("#mainDiv").html('<div id="loading"><img src="https://elitetools.life/elitetools/resources/files/img/load2.gif" class="ajax-loader"></div>').show();

        $.ajax({
            type: 'GET',
            url: `lead_item${sectionId}.html`,
            success: function(response) {
                $("#mainDiv").html(response).show();

                // Initialize DataTable
                const dataTable = $('#table').DataTable({
                    responsive: true,
                    autoWidth: false,
                    order: [], // Disable initial ordering
                    language: {
                        search: "Filter:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries"
                    }
                });

                // Apply Bootstrap sticky header class
                $('thead').addClass('sticky-top bg-light');

                if (!replaceState) updatePageData();
            }
        });

        if (typeof stopCheckBTC === 'function') stopCheckBTC();
    }

    /* Ensures the page reloads correctly when navigating via browser history */
    $(window).on("popstate", function() {
        location.reload();
    });

    /* Initializes page features on load */
    $(window).on('load', function() {
        $('.dropdown').hover(function() {
            $('.dropdown-toggle', this).trigger('click');
        });

        loadContent(6, 'Leads - EliteTools', 'leads', true);

        const clipboard = new ClipboardJS('.copyit');
        clipboard.on('success', function(event) {
            displayTooltip(event.trigger, 'Copied!');
            hideTooltip(event.trigger);
            event.clearSelection();
        });
    });

    /* Manages tooltips for clipboard copy actions */
    function displayTooltip(button, message) {
        $(button).tooltip('dispose')
            .attr('data-bs-original-title', message)
            .tooltip('show');
    }

    function hideTooltip(button) {
        setTimeout(() => {
            $(button).tooltip('hide');
        }, 1000);
    }
</script>

<!---style>
    /* Navbar styling */
    .navbar {
        background: linear-gradient(135deg, #00b4d8, #001f3f); /* Gradient effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        border-radius: 8px; /* Rounded corners for a modern look */
        padding: 10px 20px;
        transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    /* Navbar links */
    .navbar a {
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    /* Hover effect for navbar links */
    .navbar a:hover {
        color: #00b4d8;
        transform: translateY(-5px); /* Slight upward movement for effect */
    }

    /* Navbar item active state */
    .navbar a.active {
        color: #ffdd57;
        border-bottom: 2px solid #ffdd57; /* Underline with a sparkling gold color */
    }

    /* Sparkling effect for navbar */
    @keyframes sparkle {
        0% { text-shadow: 0 0 5px #00b4d8, 0 0 10px #00b4d8, 0 0 15px #00b4d8; }
        50% { text-shadow: 0 0 5px #ffdd57, 0 0 10px #ffdd57, 0 0 15px #ffdd57; }
        100% { text-shadow: 0 0 5px #00b4d8, 0 0 10px #00b4d8, 0 0 15px #00b4d8; }
    }

    /* Apply sparkle animation on navbar links */
    .navbar a.sparkle {
        animation: sparkle 1.5s infinite alternate;
    }

    /* Active navbar state */
    .navbar a.active {
        color: #ffdd57; /* Gold effect */
        text-shadow: 0 0 8px #ffdd57, 0 0 10px #ffdd57;
    }

    /* Navbar hover and active states */
    .navbar a:hover {
        color: #00b4d8;
        text-shadow: 0 0 8px #00b4d8, 0 0 15px #00b4d8;
    }
</style-->

<body style="padding-top: 70px; padding-bottom: 70px;">

<header class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="navbar navbar-expand-lg bg-white px-0">
                    <div class="container px-0">
                        <!--<a href="https://elitetools.life/elitetools/" rel="home" class="navbar-brand">BitRef</a>-->
                        <h1 class="h1 mb-0"><a href="https://elitetools.life/elitetools/" rel="home" title="Go to Homepage"><span>Bit</span>Ref</a></h1>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Menu">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item mt-1 mb-1 me-lg-3"><a class="nav-link" href="https://elitetools.life/elitetools/block/">Blocks</a></li>
                                <li class="nav-item mt-1 mb-1 me-lg-3"><a class="nav-link" href="https://elitetools.life/elitetools/tx/">Transactions</a></li>
                                <li class="nav-item mt-1 mb-1 me-lg-3"><a class="nav-link" href="https://elitetools.life/elitetools/fees/">Fees</a></li>
                                <li class="nav-item mt-1 mb-1 me-lg-3 dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">BitAccelerate</a>
                                    <div class="dropdown-menu" tabindex="0">
                                        <a class="dropdown-item" href="https://bitaccelerate.com/">Bitcoin Transaction Accelerator</a>
                                        <a class="dropdown-item" href="https://bitaccelerate.com/premium/">BitAccelerate Premium</a>
                                        <a class="dropdown-item" href="https://bitaccelerate.com/cpfp-calculator/">CPFP Calculator</a>
                                        <a class="dropdown-item" href="https://bitaccelerate.com/pushtx/">Broadcast Bitcoin Transaction</a>
                                    </div>
                                </li>
                                <li class="nav-item mt-1 mb-1"><a class="nav-link" href="https://elitetools.life/elitetools/price/">Price</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    <!-- Fixed top navigation bar -->

<header class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="navbar navbar-expand-lg bg-white px-0">
                    <div class="container px-0">
                        <!--<a href="https://elitetools.life/elitetools/" rel="home" class="navbar-brand">BitRef</a>-->
                        <h1 class="h1 mb-0"><a href="https://elitetools.life/elitetools/" rel="home" title="Go to Homepage"><span>Bit</span>Ref</a></h1>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Menu">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <nav class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav">
                    <!-- Hosts Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle sparkle" href="#" id="hostsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hosts <span class="bi bi-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="hostsDropdown">
                                  <li class="nav-item mt-1 mb-1"><a class="nav-link" href="rdp" onclick="itemDiv(1,'RDP - EliteTools','rdp',0); return false;">RDPs</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- User-specific options in the navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="addBalance" onclick="itemDiv(13,'Add Balance - EliteTools','addBalance',0); return false;">
                            <span class="badge"><b><span id="balance"></span></b> <span class="bi bi-plus-circle"></span></span>
                        </a>
                    </li>

                    <!-- User dropdown with settings, orders, and logout options -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account  <span class="bi bi-person"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="profile" onclick="itemDiv(14,'profile-settings - EliteTools','profile',0); return false;">Profile</a></li>
                            <li><a class="dropdown-item" href="orders" onclick="itemDiv(15,'Orders - EliteTools','orders',0); return false;">Orders History</a></li>
                            <li><a class="dropdown-item" href="addBalance" onclick="itemDiv(13,'Add Balance - EliteTools','addBalance',0); return false;">Add Balance</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Filter Tab Section -->

                    </div>
                </div>
            </div>
        </div>
<!-- Add your content here -->

<!-- Main content area -->

                    </div>
                </div>
            </div>
        </div>
<div id="mainDiv">

    <!-- Filter Tab Section -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="filter-tab" data-bs-toggle="tab" href="#filter">
                <i class="fas fa-filter"></i> Filter
            </a>
        </li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="filter">
            <table id="filterTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="sorttable_nosort">Country</th>
                        <th class="sorttable_nosort">Description</th>
                        <th class="sorttable_nosort">Domains</th>
                        <th class="sorttable_nosort">Seller</th>
                        <th class="sorttable_nosort"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Country Filter -->
                        <td>
                            <select class="filterselect form-select form-select-sm" name="leads_country">
                                <option value="">ALL</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <!-- Add other options here -->
                            </select>
                        </td>

                        <!-- Description Filter -->
                        <td>
                            <input class="filterinput form-control form-control-sm" name="leads_about" size="3">
                        </td>

                        <!-- Domains Filter -->
                        <td>
                            <input class="filterinput form-control form-control-sm" name="leads_domains" size="3">
                        </td>

                        <!-- Seller Filter -->
                        <td>
                            <select class="filterselect form-select form-select-sm" name="leads_seller">
                                <option value="">ALL</option>
                                <option value="seller18">seller18</option>
                                <option value="seller26">seller26</option>
                                <option value="seller34">seller34</option>
                                <option value="seller37">seller37</option>
                            </select>
                        </td>

                        <!-- Filter Button -->
                        <td>
                            <button id="filterbutton" class="btn btn-primary btn-sm" disabled>
                                Filter <span class="glyphicon glyphicon-filter"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Leads Table -->
<table id="table" class="table table-striped table-bordered table-condensed" style="width: 100%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" style="width: 12%">Country</th>
            <th scope="col">Source</th>
            <th scope="col">Emails Domains</th>
            <th scope="col">Email N</th>
            <th scope="col">Sample</th>
            <th scope="col">Seller</th>
            <th scope="col">Price</th>
            <th scope="col">Added on</th>
            <th scope="col">Buy</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dynamic Content: {items} -->
    </tbody>
</table>

<!-- jQuery, Bootstrap 5, and DataTable JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable for Leads Table
    $('#table').DataTable({
        responsive: true, // Makes the table responsive on small screens
        paging: true, // Enable pagination
        searching: true, // Enable search functionality
        ordering: true, // Enable column sorting
        info: true, // Show info about the table (number of records etc.)
        autoWidth: false, // Disable auto width adjustment to handle columns more precisely
    });

    // Initialize DataTable for Filter Table
    var filterTable = $('#filterTable').DataTable();

    // Enable filter button when changes are made in the filter inputs
    $('.filterinput, .filterselect').on('input change', function() {
        $('#filterbutton').prop('disabled', false);
    });

    // Apply filters when the button is clicked
    $('#filterbutton').click(function() {
        var countryFilter = $("select[name='leads_country']").val();
        var descriptionFilter = $("input[name='leads_about']").val();
        var domainsFilter = $("input[name='leads_domains']").val();
        var sellerFilter = $("select[name='leads_seller']").val();

        // Apply the filter to the DataTable
        filterTable.columns(0).search(countryFilter)
            .columns(1).search(descriptionFilter)
            .columns(2).search(domainsFilter)
            .columns(3).search(sellerFilter)
            .draw();
    });
});
</script>

<script type="text/javascript">
  // Function to handle buying a lead
  function buyit(id, code, price) {
    const myModal = new bootstrap.Modal(document.getElementById('myModal'), {
      keyboard: false
    });

    myModal.hide(); // Close the modal using Bootstrap 5 method

    // Bootstrap 5 confirm alert
    if (confirm("Are you sure?")) {
      var balance = $('#balance').text();
      if (price <= balance) {
        $("#buy_" + id).html('Purchasing...').show();
        $.ajax({
          type: 'GET',
          url: 'leadsbuy' + id + '-' + code + '.html',
          success: function(data) {
            $("#buy_" + id).html(data).show();
            ajaxinfo();
          }
        });
      } else {
        // Bootstrap 5 alert style for insufficient balance
        let alertHtml = `
          <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="balanceModalLabel">Insufficient Balance</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <center>
                    <img src="files/img/balance.png" alt="Balance">
                    <h2><b>No enough balance!</b></h2>
                    <h4>Please refill your balance <a class="btn btn-primary btn-xs" href="addBalance" onclick="window.open(this.href);return false;">Add Balance <span class="glyphicon glyphicon-plus"></span></a></h4>
                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        `;
        $('body').append(alertHtml);
        var balanceModal = new bootstrap.Modal(document.getElementById('balanceModal'));
        balanceModal.show();
      }
    }
  }

  // Function to show lead information
  function leadinfo(id, code) {
    $("#myModalLabel").text('Sample');
    $("#modelbody").html('');
    const myModal = new bootstrap.Modal(document.getElementById('myModal'), {
      keyboard: false
    });
    myModal.show(); // Show the modal using Bootstrap 5 method

    $.ajax({
      type: 'GET',
      url: 'leadsshow' + id + '-' + code + '.html',
      success: function(data) {
        $("#modelbody").html(data);
      }
    });
  }
</script>
