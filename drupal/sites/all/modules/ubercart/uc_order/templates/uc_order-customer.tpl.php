<?php
// $Id: customer.itpl.php,v 1.5.2.5 2009/04/18 07:29:18 islandusurper Exp $

/**
 * This file is the default customer invoice template for Ubercart.
 */

$eua=cr_calc_eua_latest('all');
$totalCarbon=$order->line_items[0]['amount']/$eua->field_total_price_per_tonne[0]['value'];
$orderTotal=$order->line_items[0]['amount'];
$costExludingVAT=$totalCarbon*($eua->field_total_price_per_tonne[0]['value']-$eua->field_vat_gbp[0]['value']);

?>


<table width="95%" border="0" cellspacing="0" cellpadding="1" align="center" style="font-family: verdana, arial, helvetica; font-size: small;">
<tr>
<td>
	
<?php echo t('Dear [order-first-name],'); ?><br /><br />
Thank you for using Carbon Retirement. With your money, we will retire carbon allowances from the EU Emission Trading Scheme, which will reduce carbon dioxide emissions in Europe and incentivise investment in low carbon technology. If you have any questions, email us at info@carbonretirement.com (or hit reply).<br />
<br />
Best wishes, The Carbon Retirement team<br />
<br />
<br />
Details of your order and VAT receipt:<br />
<br />
Date: <?php echo date("d/m/Y") ?><br />
Number of tonnes: <?php echo number_format($totalCarbon,2); ?> <br />
<br />
<b>Items offset:</b><br />

  <?php if (is_array($order->products)) {
    $context = array(
      'location' => 'order-invoice-product',
      'subject' => array(
        'order' => $order,
      ),
    );
    foreach ($order->products as $product) {
      $price_info = array(
        'price' => $product->price,
        'qty' => $product->qty,
      );
      $context['subject']['order_product'] = $product;
      ?>
      <?php echo ' * '.$product->title .' - '. uc_price($price_info, $context, array(), 'formatted'); ?><br />
      <?php } ?>
      <br />
  <?php 
      } ?>

Cost excluding VAT: <?php echo uc_currency_format($costExludingVAT,2) ?><br />
VAT: <?php echo uc_currency_format($orderTotal-$costExludingVAT,2) ?><br />
<b>Cost including VAT: <?php echo uc_currency_format($orderTotal,2) ?></b><br />
<b>Payment has been received</b><br />
<br />
Your address is:<br />
[order-billing-address]<br />
<br />
Our address can be found at http://www.carbonretirement.com/content/contact-us <br />
Our VAT number is: 932 4717 24<br />
<br />
An identifying reference for this receipt is: [order-id]<br />



</td>
</tr>
</table>
