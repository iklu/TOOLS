<?php

// Problem
// You want to filter all input prior to use.

// Solution
// Initialize an empty array in which to store filtered data. After you’ve proven that something
// is valid, store it in this array:


$filters = array(   'symbol' => array(
                        'filter' => FILTER_VALIDATE_REGEXP,
                        'options' => array('regexp' => '/^[a-z]+$/i')
                            ),
                    'quantity' => array(
                        'filter' => FILTER_VALIDATE_INT,
                        'options' => array('min_range' => 13)
                    )
                );


$clean = filter_input_array(INPUT_POST, $filters);

print_r($clean);

/*
By using a strict naming convention, you can more easily keep up with what input has
been filtered. Always initializing $clean to an empty array ensures that data cannot be
injected into the array; you must explicitly add it. In the preceding code, the call to
filter_input_array() initializes $clean to contain only the filtered information.
Once you adopt a technique such as the use of $clean, it is important that you only use
data from this array in your business logic.
*/
?>


<form action="" method="POST">
<p>Stock Symbol: <input type="text" name="symbol" /></p>
<p>Quantity: <input type="text" name="quantity" /></p>
<p><input type="submit" value="Buy Stocks" /></p>
</form>