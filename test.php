<form action="test2.php" target="Map" method="post" id="form">
    <input type="hidden" name="data" id="data" value='asdasd'>
    <!-- <input type="submit" value="asda"> -->
</form>
<script>
    document.querySelector('#form').submit()
</script>
<?php
    include 'connect.php';

    $sss = array(
        [
            'from' => 1000,
            'to' => 3249.99,
            'ER' => 265,
            'EE' => 135,
            'total' => 400
        ]
    );
    $from = 1000;
    $to = 3249.99;
    $ER = 265;
    $EE = 135;
    while(true){
        $sub_array = array();
        $sub_array['from'] = $to += 0.01;
        $sub_array['to'] = $to += 499.99;
        if($sub_array['from'] == 14750){
            $ER += 20;
        }
        $sub_array['ER'] = $ER = $ER + 42.50;
        $sub_array['EE'] = $EE = $EE + 22.50;

        $sub_array['total'] = $sub_array['ER']  + $sub_array['EE'];
        array_push($sss, $sub_array);
        if($to >= 24750){
            break;
        }
        // break;
        // $sss[] = $sub_array;
        // $from += .01;
        // if()
    }
    // echo json_encode($sss);

    // foreach ($sss as $bracket) {
    //     // foreach ($bracket as $key => $value) {
    //     //     # code...
            
    //     // }
    //     $sql = "INSERT INTO `chart_sss`(`id`, `from`, `to`, `ER`, `EE`, `total`) VALUES ('[value-1]','".$bracket['from']."','".$bracket['to']."','".$bracket['ER']."','".$bracket['EE']."','".$bracket['total']."')";
    //     $con->query($sql);
    // }
    // $sql = "SELECT id, description FROM positions";
    // $query = $con->query($sql);
    // $result = $query->fetch_all(MYSQLI_ASSOC);
    // var_dump($result);

    // foreach ($result as $role) {
    //     foreach ($role as $key => $value) {
    //         if($key == "id"){
    //             $sql = "SELECT * FROM employeelist WHERE employee_Role = '$value'";
    //             if($query = $con->query($sql)){
    //                 echo $role['description'].'=>'.$query->num_rows;
    //             }
    //         }
    //     }
    // }

    // $sql = "SELECT * FROM accounts";
    // $result = $con->query($sql);
    // echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    // echo dirname(__FILE__);

    // $time_in = '07:00:00';
    // $time_start = '07:00:00';

    // $time_out = '16:45:00';
    // $time_end = '17:00:00';


    // // checks if time out is too early
    // if( strtotime($time_out) < strtotime($time_end) ){
    //     $timeLate = ceil(((strtotime($time_end) - strtotime($time_out)) / 3600));
    //     echo $timeLate." - ";
        
    //     // $totalWorkingHr = 
    // }else{
        // $time_out = 
    // }

    // checks if late 


    // 

    // $totalWorkingHrs = (strtotime($time_end) - strtotime($time_start)) / 3600;
    // $totalWorkingHrs -= $timeLate;
    // echo $totalWorkingHrs;

    // echo date('h:i A', strtotime('00:00:00'));
    // echo 
    // $monthNum = '03';
    // $dateObj = DateTime::createFromFormat('!m', $monthNum);
    // $monthName = $dateObj->format('F');

    // echo $monthName;

    // $time_in = '09:15:00';
    // $time_out = '17:00:00';
    // $totalworkinghr = '09:00:00';
    
    // // $timeIn = new DateTime($time_in);
    // // $timeOut = new DateTime($time_out);

    // $a = new DateTime($time_in);
    // $b = new DateTime($time_out);
    // $interval = $a->diff($b);
    // // $interval = $interval->diff(2);

    
    // echo $interval->format("%H:%I:%S");

    // echo $timeOut->diff($timeIn);
    // echo (strtotime($time_out) - strtotime($time_in))  / 3600;



    // $x = [
    //     [
    //         'id'=>'3',
    //         'amout'=>1000
    //     ],
    //     [
    //         'id'=>'89',
    //         'amout'=>2000
    //     ]
    // ];
    // $time_in = '09:15:00';
    // $time_out = '16:00:00';
    // $time_start = '08:00:00';
    // $time_end = '17:00:00';
    // $eligibleHrs = 9;
    // $time_in_counted = '';
    // $grace_period = 15;
    // $totalhrminus = 0;


    // // long method
    // // if( strtotime($time_in) > strtotime($time_start) ){
    // //     $grace_period = (strtotime($time_in) - strtotime($time_start)) / 60;
    // //     if($grace_period/15 >= 1){
    // //         $hr_minus = ($grace_period / 15) / 4;         
    // //         if($hr_minus < 1){
    // //             $totalhrminus = 1;
    // //         }else{
    // //             $hr_minuss = floor($hr_minus);
    // //             $remainder = fmod($hr_minus, 1);
    // //             if($remainder >= .25){
    // //                 $totalhrminus = $hr_minuss + 1;
    // //             }else{
    // //                 $totalhrminus = $hr_minuss;
    // //             }
    // //         }
    // //     }
    // // }
    
    // // shortmethod
    // // if(strtotime($time_in) > strtotime($time_start)){
    // //     $latemin = (strtotime($time_in) - strtotime($time_start)) / 60;
    // //     if($latemin/$grace_period >= 1){
    // //         $late_hr = $latemin / 60;
    // //         if($late_hr < 1){
    // //             $totalhrminus = 1;
    // //         }else{
    // //             $totalhrminus = floor($late_hr);
    // //             $remainder = fmod($late_hr, 1);
    // //             if( $remainder >= ($grace_period/60) * 1){
    // //                 $totalhrminus += 1;
    // //             }
    // //         }
            
    // //         $totalworkinghr = (strtotime($time_out) - strtotime($time_in) )/ 3600;
    // //         echo 'Total Working hr: '.$totalworkinghr;
    // //         $totalworkinghr2 = ((strtotime($time_out) - strtotime($time_start)) / 3600) - $totalhrminus;
    // //         echo 'total Working hr: '.$totalworkinghr2;
    // //     }else{
    // //         // 
    // //     }
    // // }
    
    //     // echo date('M', '2022-09-10');

    //     // echo substr("2022-09-13", 5, 2 );
    //     // echo substr("2022-09-13", 8, 2 );
        
    //     // echo date('Y').'-';

    //     $from = '09-18';
    //     $to = '10-02';

    //     $holidays = [
    //         [
    //             'desc'=>'chataue days',
    //             'date'=>'10-01'
    //         ],
    //         [
    //             'desc'=>'chrismas day',
    //             'date'=>'10-12'
    //         ],
    //         [
    //             'desc'=>'valentine day',
    //             'date'=>'12-25'
    //         ]
    //     ];

    //     $filtered = [];

    //     foreach ($holidays as $holiday) {
    //         foreach ($holiday as $key => $value) {
    //              if($key == 'date'){
    //                 if($value >= $from && $value <= $to){
    //                     $filtered[] = $holiday;
    //                 }
    //              }
            
    //         }
    //     }

    //     var_dump($filtered);
    // echo $totalhrminus;
    // echo floor(1.7);
    // echo $time_in_counted;

    // $date = '2022-09-01';
    // $year = explode('-', $date);
    // $year = $year[0];
    // // var_dump($year);
    // echo $year;
    // echo $date;

    // $time = '13:01:45';
    // echo date('h:i A', strtotime($time));

    // var_dump($x);
    // $sum = 0;
    // foreach($x as $y){
    //     // var_dump($y);
    //     foreach ($y as $key => $amount) {          // echo $key.'=>'. $value;
            
    //     }
    // }
    // echo $sum;
    //substract hours 
    // $timeOut = '01:00:05';
    // $timeIn = '22:59:50';
    // if(strtotime($timeOut) < strtotime($timeIn)){
    //     $start = (strtotime('23:59:59') - strtotime($timeIn)) / 3600;
    //     echo $start;
    //     echo ' ';
    //     $end =  (strtotime($timeOut) - strtotime('00:00:01')) / 3600;
    //     echo $end + $start;

    //     // $workingHours = $start + $end;
    //     // echo $workingHours;
    // }
    // $workingHours = (strtotime($timeOut) - strtotime($timeIn)) / 3600;
    // echo abs($workingHours);

    // $date = date('Y-m-d');
    // $year = $date->format('Y');

    // $datetime = DateTime::createFromFormat('Y-m-d', $date);
    // echo $datetime->format('Y');
    // echo $datetime;
    // echo $date;


        // $timeOut = '01:00:00';
        // $timeIn = '17:00:00';

        // $timedIn = '07:58:00';
        // $timedOut = '17:00:00';
        
        // $workingHours = (strtotime($timedOut) - strtotime($timedIn)) / 3600;
        // // echo 'total working hr: '.$workingHours;
        // // echo '  ';
        // if(strtotime($timeIn) > strtotime($timeOut)){
        //     $start = (strtotime('24:00:00') - strtotime($timeIn)) / 3600;
        //     $end = (strtotime($timeOut) - strtotime('00:00:00')) / 3600;
        //     $eligibleHrs = $start + $end;
        // }else{
        //     $eligibleHrs = (strtotime($timeOut) - strtotime($timeIn)) / 3600;
        // }
        
        // echo 'eligible hr: '.$eligibleHrs;

        // if($workingHours > $eligibleHrs){
        //     $ot_hr = $workingHours - $eligibleHrs;
        //     $workingHours = $eligibleHrs;
        // }

        // echo 'Ot hrs :'.$ot_hr;
        
        


?>

<!-- <input type="date" name="" id="asd" max = "" value = ''>
<button></button> -->

<script>
    // datee = document.querySelector('#asd').value

    // document.querySelector('button').addEventListener('click', ()=>{
    //     console.log(document.querySelector('#asd').value)
    // })
  
</script>

