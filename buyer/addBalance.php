
<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "../includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);

$method = mysqli_real_escape_string($dbcon, $_POST['methodpay']);
$amount = mysqli_real_escape_string($dbcon, htmlspecialchars($_POST['amount']));
if($_POST['methodpay']=="BitcoinPayment"){
	if ($amount < 5) {
		echo "01";
	} else {
$url_btc =    'https://blockchain.info/ticker';
$response_btc = file_get_contents($url_btc);
$object_btc = json_decode($response_btc);
//print_r($object_btc);
$usdprice = $object_btc->{"USD"}->{"last"};
$rate['rate'] =  $object_btc->{"USD"}->{"last"};
$rate = $rate['rate'];
$btcamount = number_format($amount/$rate, 8, '.', '');
$btcamm = $btcamount;
$guid = 'martindinos8@outlook.com';  // Block.io account
$main_password = '121212aa'; // Block.io Password
$pin = '121212aa'; // Block.io PIN
$apikey = "1c84-7e22-51e0-0a64"; // block.io API KEY
$uidz = "".$uid."-".time()."";
$ao = file_get_contents("https://block.io/api/v2/get_new_address/?api_key=$apikey&label=$uidz");
$zz = json_decode($ao);
$btcadrs = $zz->data->address;
$random = substr(md5(mt_rand()), 0, 60);
$date = date('Y-m-d H:i:s');
$sql2 = "INSERT INTO payment(user,method,amount,amountusd,address,p_data,state,date) VALUES('$uid','Bitcoin','$btcamm','$amount','$btcadrs','$random','pending','$date')";
mysqli_query($dbcon, $sql2);
	echo $random; }

} else {
if($_POST['methodpay']=="PerfectMoneyPayment"){
		if ($amount < 10) {
		echo "01";
	} else {
$url_btc =    'https://blockchain.info/ticker';
$response_btc = file_get_contents($url_btc);
$object_btc = json_decode($response_btc);
//print_r($object_btc);
$usdprice = $object_btc->{"USD"}->{"last"};
$rate['rate'] =  $object_btc->{"USD"}->{"last"};
$rate = $rate['rate'];
$btcamount = number_format($amount/$rate, 8, '.', '');
$btcamm = $btcamount;
$guid = 'martindinos8@outlook.com';  // Block.io account
$main_password = '121212aa'; // Block.io Password
$pin = '121212aa'; // Block.io PIN
$apikey = "1c84-7e22-51e0-0a64"; // block.io API KEY
$uidz = "".$uid."-".time()."";
$ao = file_get_contents("https://block.io/api/v2/get_new_address/?api_key=$apikey&label=$uidz");
$zz = json_decode($ao);
$btcadrs = $zz->data->address;
$random = substr(md5(mt_rand()), 0, 60);
$date = date('Y-m-d H:i:s');
$sql2 = "INSERT INTO payment(user,method,amount,amountusd,address,p_data,state,date) VALUES('$uid','PerfectMoney','$btcamm','$amount','$btcadrs','$random','pending','$date')";
mysqli_query($dbcon, $sql2);
echo $random;
}  }
else { header("location: index.html"); }}

$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$p_data = $_GET['p_data'];
$url_btc =    'https://blockchain.info/ticker';
$response_btc = file_get_contents($url_btc);
$object_btc = json_decode($response_btc);
//print_r($object_btc);
$usdprice = $object_btc->{"USD"}->{"last"};
$rate['rate'] =  $object_btc->{"USD"}->{"last"};
$rate = $rate['rate'];
 $q = mysqli_query($dbcon, "SELECT * FROM payment WHERE user='$uid' and p_data='$p_data'")or die(mysqli_error());
 while($row = mysqli_fetch_assoc($q))
	 if ($row['method'] == "Bitcoin") {
	$real_data = date("Y-m-d H:i:s");
	$date_purchased = $row['date'];
    $endTime        = strtotime("+60 minutes", strtotime($date_purchased));
    $data_plus      = date('Y-m-d H:i:s', $endTime);
    if (($real_data > $data_plus)) {
		$del_transaction = mysqli_query($dbcon, "DELETE FROM payment WHERE p_data='$p_data'");
	} else {
?>
<div id="bitcoin">
  <div class="container col-lg-6">
          <h3>Pay using Bitcoin</h3>
          <div class="form-group col-lg-4 ">

            <center><a id="bitcoinbutton" href="bitcoin:<?php echo $row['address']; ?>?amount=<?php echo $row['amount']+0.00002730; ?>&amp;message=JeruxShop-15" target="_blank" title="Pay with Bitcoin"><img alt="Pay with Bitcoin" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=bitcoin:<?php echo $row['address']; ?>?amount=<?php echo $row['amount']+0.00002730; ?>&amp;message=JeruxShop-15&amp;choe=UTF-8&amp;chs=200x200" style="" height="150" width="150"></a><br>
           </center>
          </div>
          <div class="form-group col-lg-6">
            <br><br>
            Send exactly <span id="selectable" onclick="selectText('selectable')"><b><?php echo $row['amount']+0.00002730; ?></b></span> BTC to: <span class="label label-default" id="selectable2" onclick="selectText('selectable2')"><?php echo $row['address']; ?></span><br><br>

         <div class="module-main-content ">
                <table border="0" width="100%" style="margin:0px;">

                <tbody><tr style="display: table-row;">
                    <td align="left"><span class="text">State</span></td>
                    <td align="center"><span class="text">:</span></td>
                    <td align="left"><span class="label label-primary" id="state"></span></td>
                </tr>
                <tr style="display: table-row;">
                    <td align="left"><span class="text">Loaded BTC</span></td>
                    <td align="center"><span class="text">:</span></td>
                    <td align="left"><span class="label label-primary" id="amount"></span> </td>
                </tr>
                <tr style="display: table-row;">
                    <td align="left"><span class="text">Last Checked</span></td>
                    <td align="center"><span class="text">:</span></td>
                    <td align="left"><span class="label label-primary" id="time"></span> <span id="Img"></td>
                </tr>
  

              </tbody></table>
          </div>
        </div>
  </div>
            <div class="col-lg-5">
            <div class="bs-component">
              <br><br>
              <div class="well well">
                        <ul>
          <li><b>DO NOT CLOSE THIS PAGE</b></li>
          <li>Please wait for at least <b>1</b> confirmation </li>
          <li>For high amounts please include high fees </li>
          <li>Bitcoin to USD rate is  <b><?php echo $rate; ?> </b> (according to Blockchain) </li>
          <li>Our bitcoin addresses are SegWit-enabled</li>
          <li>This page will be only valid for <b>1 hour</b></li>
          <li>Make sure that you send exactly <b><?php echo $row['amount']+0.00002730; ?> BTC</b></li>
          <li>After payment an amount of <b><?php echo $row['amountusd']; ?>$</b> will be added to your account</li> 
          <li>If any error happened or money didn't show please <a class="label label-default " onclick="pageDiv(9,'Tickets - JeruxShop','tickets.html#open',0); return false;" href="tickets.html#open"><span class="glyphicon glyphicon-pencil"></span> Open a Ticket</a> Fast </li> 

        </ul>
              </div>
          </div>    


  </div>
</div>
<div id="error" class="form-group col-lg-5 "></div>
<script type="text/javascript">
var Check_BTC_x = true;
function check_address(){
      $("#Img").html('<img src="files/img/load.gif" height="15" width="15">').show();
      $.ajax({
      type:       'GET',
      url:        'Check.html?p_data=<?php echo $p_data; ?>',
           success: function(data)
           {         
              var data = JSON.parse(data);
              $("#time").html(data['time'] ).show();
              $("#amount").html(data['btc'] ).show();
              $("#state").html(data['state'] ).show();
              $("#Img").html('').show();
              if (data['error'] == 1) {$("#error").html(data['errorTXT'] ).show();}
              if (data['stop'] == 1) {stopCheckBTC();}

           }
         });

  }
var x23 = 10000;
var Check_BTC = setInterval(function(){check_address()}, x23);

function stopCheckBTC(){
  if (Check_BTC){
  clearInterval(Check_BTC);
  }
  return true;
}

    function selectText(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
        }
    }
</script>
	 } } elseif ($row['method'] == "PerfectMoney") {
	$real_data = date("Y-m-d H:i:s");
	$date_purchased = $row['date'];
    $endTime        = strtotime("+60 minutes", strtotime($date_purchased));
    $data_plus      = date('Y-m-d H:i:s', $endTime);
    if (($real_data > $data_plus)) {
		$del_transaction = mysqli_query($dbcon, "DELETE FROM payment WHERE p_data='$p_data'");
        header('Location: ./index.html');
	} else {
$addressbtc = $row['address'];
$amountbtc = $row['amount'];
?>
<div class="container col-lg-6">
    <h3>Pay using Perfectmoney</h3>
    <div class="form-group col-lg-4 ">
      <center>
        <form action="https://exchanger.ws/payment.php?direct" method="post" target="_blank">
          <input type="image" src="files/img/pmlogo.png" alt="Pay with Perfectmoney"><br><input type="submit" class="btn btn-danger" value="Pay Now">
<input type="hidden" value="<?php echo $addressbtc; ?>" name="btc_address" />
<input type="hidden" value="<?php echo $amountbtc; ?>" name="btc-amount"  />      
	  </form>
      </center>
    </div>
    <div class="form-group col-lg-6"> <br><br>
        Click on <b>Pay Now</b> to proceed      <br><br>
               <div class="module-main-content ">
                <table border="0" width="100%" style="margin:0px;">

                <tbody><tr style="display: table-row;">
                    <td align="left"><span class="text">State</span></td>
                    <td align="center"><span class="text">:</span></td>
                    <td align="left"><span class="label label-primary" id="state"></span></td>
                </tr>
                <tr style="display: table-row;">
                    <td align="left"><span class="text">Last Checked</span></td>
                    <td align="center"><span class="text">:</span></td>
                    <td align="left"><span class="label label-primary" id="time"></span><span id="Img"></span></td>
                </tr>
  

              </tbody></table>
          </div>
    </div>
  </div>
            <div class="col-lg-5">
            <div class="bs-component">
              <br><br>
              <div class="well well">
                        <ul>
          <li><b>DO NOT CLOSE THIS PAGE</b></li>
          <li>After payment an amount of <b><?php echo $row['amountusd']; ?>$</b> will be added to your account</li> 
                  </ul>
              </div>
          </div>    


  </div>  



<br><br><br>
<div id="error" class="form-group col-lg-5 "></div>
<script type="text/javascript">
var Check_BTC_x = true;
function check_address(){
      $("#Img").html('<img src="files/img/load.gif" height="15" width="15">').show();
      $.ajax({
      type:       'GET',
      url:        'PMCheck.html?p_data=<?php echo $p_data ?>',
           success: function(data)
           {         
              var data = JSON.parse(data);
              $("#time").html(data['time'] ).show();
              $("#amount").html(data['btc'] ).show();
              $("#state").html(data['state'] ).show();
              $("#Img").html('').show();
              if (data['error'] == 1) {$("#error").html(data['errorTXT'] ).show();}
              if (data['stop'] == 1) {stopCheckBTC();}

           }
         });

  }
var x23 = 5000;
var Check_BTC = setInterval(function(){check_address()}, x23);

function stopCheckBTC(){
  if (Check_BTC){
  clearInterval(Check_BTC);
  }
  return true;
}

    function selectText(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
        }
    }
</script>
<?php
	} } 
?>
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
      }});
    if (typeof stopCheckBTC === 'function') { 
    var a = stopCheckBTC();
     }

}

$(window).on("popstate", function(e) {
        location.replace(document.location);

});


$(window).on('load', function() {
$('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
   pageDiv(13,'Add Balance - JeruxShop','addBalance',1);
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

<nav class="navbar navbar-default navbar-fixed-top ">
  <div class="container-fluid">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    <div class="navbar-brand" onClick="location.href='index'" onMouseOver="this.style.cursor='pointer'"><b><span class="glyphicon glyphicon-fire"></span> Jerux SHOP <small><span class="glyphicon glyphicon-refresh"></span></small></b></div></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar1">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hosts <span class="glyphicon glyphicon-chevron-down" id="alhosts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="rdp" onclick="pageDiv(1,'RDP - JeruxShop','rdp',0); return false;">RDPs <span class="label label-primary label-as-badge" id="rdp"></span></a></li>
            <li><a href="cPanel" onclick="pageDiv(2,'cPanel - JeruxShop','cPanel',0); return false;">cPanels <span class="label label-primary label-as-badge" id="cpanel"></span></a></li>
            <li><a href="shell" onclick="pageDiv(3,'Shell - JeruxShop','shell',0); return false;">Shells <span class="label label-primary label-as-badge" id="shell"></span></a></li>  
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Send <span class="glyphicon glyphicon-chevron-down" id="mail"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="mailer" onclick="pageDiv(4,'PHP Mailer - JeruxShop','mailer',0); return false;">Mailers <span class="label label-primary label-as-badge" id="mailer"></span></a></li>
            <li><a href="smtp" onclick="pageDiv(5,'SMTP - JeruxShop','smtp',0); return false;">SMTPs <span class="label label-primary label-as-badge" id="smtp"></span></a></li>  
          </ul>
        </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Leads <span class="glyphicon glyphicon-chevron-down" id="all_leads"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="leads" onclick="pageDiv(6,'Leads - JeruxShop','leads',0); return false;">Leads <span class="label label-primary label-as-badge" id="leads"></span></a></li>
          </ul>
        </li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounts <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="premium" onclick="pageDiv(7,'Premium/Dating/Shop - JeruxShop','premium',0); return false;">Premium/Dating/Shop <span class="label label-primary label-as-badge" id="premium"></span></a></li>
            <li><a href="banks" onclick="pageDiv(8,'Banks - JeruxShop','banks',0); return false;">Banks <span class="label label-primary label-as-badge" id="banks"></span></a></li>  
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Others <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="scampage" onclick="pageDiv(9,'Scampages - JeruxShop','scampage',0); return false;">Scampage <span class="label label-primary label-as-badge" id="scams"></span></a></li>
            <li><a href="tutorial" onclick="pageDiv(10,'Tutorials - JeruxShop','tutorial',0); return false;">Tutorial <span class="label label-primary label-as-badge" id="tutorials"></span></a></li>  
          </ul>
        </li>
                      
      </ul>
      <ul class="nav navbar-nav navbar-right">
                        <?php
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon, "SELECT resseller FROM users WHERE username='$uid'") or die(mysqli_error());
$r         = mysqli_fetch_assoc($q);
$reselerif = $r['resseller'];
if ($reselerif == "1") {
    $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
    $q = mysqli_query($dbcon, "SELECT soldb FROM resseller WHERE username='$uid'") or die(mysqli_error());
    $r = mysqli_fetch_assoc($q);

    echo '<li><a href="https://jerux.to/seller/index"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
} else {
} ?>      
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tickets <span id="alltickets">
<?php
$sze112  = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r844941 = mysqli_num_rows($sze112);
if ($r844941 == "1") {
    echo '<span class="label label-danger">1</span>';
}
?>
</span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="tickets" onclick="pageDiv(11,'Tickets - JeruxShop','tickets',0); return false;">Tickets <span class="label label-info"><span id="tickets"></span></span>	<?php
$s1 = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span></a></li>
            <li><a href="reports" onclick="pageDiv(12,'Reports - JeruxShop','reports',0); return false;">Reports <span class="label label-info"><span id="reports"></span></span> <?php
$s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span> </a></li>

           </ul>
        </li>

        <li><a href="addBalance" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance',0); return false;"><span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span><span> </a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account  <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="setting" onclick="pageDiv(14,'Setting - JeruxShop','setting',0); return false;">Setting <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li><a href="orders" onclick="pageDiv(15,'Orders - JeruxShop','orders',0); return false;">My Orders <span class="glyphicon glyphicon-shopping-cart pull-right"></span></a></li>
            <li><a href="addBalance" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance',0); return false;">Add Balance <span class="glyphicon glyphicon-usd pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="logout" >Logout <span class="glyphicon glyphicon-off pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div id="mainDiv">

<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade active in" id="addBalance">
		<div id="balance">
				<div class="container col-lg-6">
					<h3>Add Balance</h3>
			<form id="formAddBalance">

					<div class="row">
						<div class="form-group col-lg-12 ">
							<label for="method">Method</label> 
                <select name="methodpay" class="form-control" size="3" style="height: 100%;">
                  <option value="BitcoinPayment" selected="">Bitcoin</option>
                  <option value="PerfectMoneyPayment">Perfect Money</option>
                </select>


						</div>
					</div>

          					<div class="row">
						<div class="form-group col-lg-6 ">
							<label for="amount">Amount</label> <input placeholder="20" pattern="[0-9]*" type="text" name="amount" class="form-control input-normal" required="">
						</div>
					</div>
<button type="submit" form="formAddBalance" class="btn btn-primary btn-md">Add Balance <span class="glyphicon glyphicon-plus"></span></button>
				</div>

			</form>

		</div>
            <div class="col-lg-6">

            <div class="bs-component">
            	<br><br>
              <div class="well well">
                        <ul>
          <li>If you sent <b>Money</b> but it don't appear in your account please <a class="label label-default " href="tickets"><span class="glyphicon glyphicon-pencil"></span> Write Ticket</a></b></li>
          <li>After payment funds will be added automatically to your account <b>INSTANTLY</b></li>
          <li><b>PerfectMoney</b>/<b>Bitcoin</b> is a secure way to fund your account </li>
		  <li>Min is 5 USD For Bitcoin</li>
		  <li>Min is 10 USD For Perfect Money</li>
          <li><b>Buyer Protection</b>
            - any time you like , you can ask for <b>BALANCE REFUND !</b>       
             </li>

        </ul>
              </div>
          </div>		


</div>
</div>
</div>
<script>
if(window.location.hash != "") {
  $("#method").val(window.location.hash.substring(1));
}

$("#formAddBalance").submit(function() {
$('button').prop('disabled', true);
    $.ajax({
           type: "POST",
           url: 'addBalanceAction',
           data: $("#formAddBalance").serialize(), // serializes the form's elements.
           success: function(data)
           {
            if (data == 01) {
              alert('Please enter a valid amount and Minimum of $5 for bitcoin / $10 for PM');
              $('button').prop('disabled', false);

             }             
             if (data != 01 ) {
              //$("#balance")(data).show();
              pageDiv('payment'+data,'Add Balance - Olux SHOP','Payment?p_data='+data,0);
             }
           }
         });

    return false; // avoid to execute the actual submit of the form.
});

</script>
</div>
</body>
</html>

