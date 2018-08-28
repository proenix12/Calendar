<?php
$servername = "localhost";
$username = "root";
$password = "486asd486";
$database = "Calendar";

try{
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOExtension $e){
  echo "Connection failed". $e->getMessage();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="javascript.js" ></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>
  <div class="header">
    <div id="demo"></div>
    <div id="i4ciew" class="countdown">
            <span data-js="countdown" class="countdown-cont">
            <div class="countdown-block">
              <div data-js="countdown-day" id="countdown-day" class="countdown-digit"></div>
              <div class="countdown-label">days</div>
            </div>
            <div class="countdown-block">
              <div data-js="countdown-hour" id="countdown-hour" class="countdown-digit"></div>
              <div class="countdown-label">hours</div>
            </div>
            <div class="countdown-block">
              <div data-js="countdown-minute" id="countdown-minute" class="countdown-digit"></div>
              <div class="countdown-label">minutes</div>
            </div>
            <div class="countdown-block">
              <div data-js="countdown-second" id="countdown-second" class="countdown-digit"></div>
              <div class="countdown-label">seconds</div>
              </div>
            </span>
        <span data-js="countdown-endtext" class="countdown-endtext"></span>
        <?php
        $colDate = date('d, M, Y');
        $explodeCd  = explode(',', $colDate);

        $month = date('m');
        $year = date('Y');

        $date = date("d, m, Y");
        $explode = explode(',', $date);
        $days = cal_days_in_month(CAL_GREGORIAN, $explode[1], $explode[2]);

        ?>

        <div style="margin: 0 auto;" class="calendar">
            <?php
            $dowMap = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
            foreach($dowMap as $dayss){
              echo '<div class="days" style="background-color:blue;color: white;width: 100px; border: 1px solid blue">'.$dayss.'</div>';
            }
            ?>
            <div class="dsfsddfs"></div>
            <?php
            $running_day = date('w',mktime(0,0,0,$month,1,$year));
            $days_in_month = date('t',mktime(0,0,0,$month,1,$year));

            for($x = 0; $x < $running_day; $x++):
                echo '<div class="last-mouth" style="background-color:blue;color: white;width: 100px; height: 100px; border: 1px solid blue"></div>';
            endfor;
            ?>
            <?php $count = 0;
            for($i = 1; $i <= $days; $i++){
              $stmt = $conn->query("SELECT * FROM aug2018 WHERE dayNumber = '".$i."'");
              $row = $stmt->fetch();

                if($explode[0] == $i){
                    echo '<div id="'.$i.'" class="dates" style="position: relative;" >
                    <div style="background-color:blue;color: white;width: 100px; height: 100px; border: 1px solid blue">'. $i . '</div>
                    <div class="event">
                    <div class="m-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                        <div class="modal-body">
                          <p>Some text in the Modal Body</p>
                          <div>
                          <h2>Make new event</h2>
                          <form>
                          <input type="text">
                          </form>
                          </div>
                          <p>Date: '.$row['day'].'</p>
                          <p>'.$row["Event"].'</p>
                        </div>
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                    </div>
                    </div>
                    </div>';
                }elseif ($i < $explode[0] ){
                    echo '<div id="'.$i.'" class="dates" style="position: relative;" >
                        <div style="background-color:silver;color: white;width: 100px; height: 100px; border: 1px solid blue">'. $i . '</div>
                        <div class="event">
                        <div class="m-content">
                        <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                        <div class="modal-body">
                          <p>Some text in the Modal Body</p>
                          '.$row["Event"].'
                        </div>
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                    </div>
                        </div>
                        </div>';
                }elseif ($i > $explode[0] ){
                    echo '<div id="'.$i.'" class="dates" style="position: relative;" >
                        <div style="background-color:red;color: white;width: 100px; height: 100px; border: 1px solid blue">'. $i . '</div>
                        <div class="event">
                        <div class="m-content">
                        <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                        <div class="modal-body">
                          <p>Some text in the Modal Body</p>
                          '.$row["Event"].'
                        </div>
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                    </div>
                        </div>
                        </div>';
                }else{
                    echo '<div id="'.$i.'" class="dates" style="width: 100px; height: 100px; border: 1px solid blue">'. $i . '</div>';
                }
            }
            ?>
        </div>
        <div class="dsfsddfs"></div>
    </div>
</div>

<script>
    let countDownDate = new Date("<?php echo $explodeCd[1]; ?> <?php echo $explode[0]; ?>, <?php echo $explode[2]; ?> 18:00:00").getTime();
    console.log(countDownDate);
    let x = setInterval(function(){
        let now  = new Date().getTime();

        let distance = countDownDate - now;

        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        let showDays = document.getElementById("countdown-day");
        let showHours = document.getElementById("countdown-hour");
        let showMinutes = document.getElementById("countdown-minute");
        let showSeconds = document.getElementById("countdown-second");
        let select = document.getElementById("i4ciew");
        showDays.innerHTML = days;
        showHours.innerHTML = hours;
        showMinutes.innerHTML = minutes;
        showSeconds.innerHTML = seconds;

        if(distance < 0){
            clearInterval(x);
            select.innerHTML = "GO HOMEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE";
        }
    }, 1000);
</script>
</body>
</html>