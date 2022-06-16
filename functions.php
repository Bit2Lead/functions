<?php 

function monthly_payment_dates($start_date, $months){
	/*
    	This function takes two input as $start_date and number of $months.
        Outputs: []
        expiry_date => The date when contract should ends.
        dates_array => like monthly payment dates in every months, 
        date_diff => like how many days in between start_date and expiry_date,
        dates_count => like how my payment dates are in dates_array
    */
    $date_diff = 0;
    $dates_array =  [];
    $str_start_date = strtotime($start_date);
    $str_months = "+".$months." months";
    $expiry_date = date('Y-m-d', strtotime($str_months, $str_start_date));
    $date_difference = date_diff(date_create($start_date),date_create($expiry_date));

    for($month=1; $month <= $months; $month++ ){
        $var_days_in_month = "+1 month";
        if($month == $months){
            $next_date = $expiry_date;
            $date_differece_obj = date_diff(date_create($start_date),date_create($next_date));
            $date_diff = $date_differece_obj->format("%a");
        }else{
            $next_date = date('Y-m-d', strtotime($var_days_in_month, $str_start_date));
        }
        $next_date = date('Y-m-d', strtotime($var_days_in_month, $str_start_date));
        $str_start_date = strtotime($next_date);
        $dates_array[] = $next_date;
        
        
		

    }
    return ['dates_array' => $dates_array, 'date_diff' => $date_diff, 'dates_count' => count($dates_array), 'expiry_date' => $next_date];
}


function local_conflict(){
	echo "local conflict";
}

