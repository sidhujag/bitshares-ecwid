<?php

require 'bts_lib.php';
require 'config.php';
require 'functions.php';
if ($_POST['x_login'] != $login) {
	debuglog('ecwid login does not match that found in config.php');
	print 'invalid ecwid login';
	die;
}


$total = 	$_POST['x_amount'];
$order_id = $_POST['x_invoice_num'];

$asset = btsCurrencyToAsset($_POST['x_currency_code']);
$hash = btsCreateEHASH($accountName, $order_id, $total,$asset, $hashSalt);
$memo = btsCreateMemo($hash);
$openOrder = array(
    'order_id'     => $order_id,
    'total'     => $total,
    'memo'     => $memo,
    'asset'     => $asset
);
saveToOpenOrders($openOrder, '.');
$post = array(
    'accountName'     => $accountName ,
    'order_id'     => $order_id ,
    'total'     => $total
    
);

$rbimg = 'checkout/img/robohash.png';
if(!file_exists($img))
{
  $rbUrl = 'http://robohash.org/'.$accountName.'?size=100x100';
  file_put_contents($rbimg, file_get_contents($rbUrl));
}    

$form = '<form name="bitsharesredirect" id="bitsharesredirect" action="checkout/index.php" method="POST">';

foreach ($post as $key => $value) {
    $form.= '<input type="hidden" name="'.$key.'" value = "'.$value.'" />';
}
$form.='</form>';
$form.='<script type="text/javascript">setTimeout(function(){ document.getElementById("bitsharesredirect").submit(); }, 3000);</script>';

echo $form;
echo 'Redirecting to Bitshares payment gateway...';
$post = array(
    'responseCode'     => '1',
    'reasonCode'     => '1',
    'order_id'     => $order_id,
    'amount'     => 0,
    'total'     => $total,
    'trx_id'     => 0,
    'url'     => $relayUrl
);
postToEcwid($post);
die;
?>
