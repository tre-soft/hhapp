<?php
# As per http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5305686

$price_starter='400.00';	# price of starter pack
$hash_rate_starter_pack= '40.00 Gh/s';	# rate of  Mining Power for starter pack
    
$price_advance='4,475.00';	# price of advance pack
$hash_rate_advance_pack= '500.00 Gh/s';	# rate of  Mining Power for advance pack

$price_array = array (
              "starter"  => array
                            ( 
                                'price'=>$price_starter,
                                'hash_rate'=>$hash_rate_starter_pack
                            ),
              "advance"  => array
                            (
                               'price'=>$price_advance,
                               'hash_rate'=>$hash_rate_advance_pack
                            ),
              );
#function to calculate price for custom miner
function get_price_custom($hashrate){
    $price=number_format(round($hashrate*8.95),2);
    return $price;
}
function get_price_hardware($unit){
    return round((1600 * 8 * $unit),2);
    
}
?>