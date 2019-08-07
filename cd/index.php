<?php include 'config.php'; ?>
<html lang="en" >
<head >
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge" >
    <link rel="stylesheet" type="text/css" href="styles.css" >
    <link href="assets/jquery-ui.min.css" rel="stylesheet" >
    <script src="assets/jquery-3.4.1.min.js" ></script >
    <script src="assets/jquery-ui.min.js" ></script >
    <script src="javascript.js" ></script >
    <title >Document</title >
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet" >
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js" ></script >
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" ></script >
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" ></script >
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head >
<body >
<!-- The Modal -->
<div id="myModal" class="modal hide" >

    <!-- Modal content -->
    <div class="modal-content" >
        <span class="close" >&times;</span >
        <div class="setEvent" >
            <form action="" method="post" class="set-event-form" >
                <div ><input type="text" class="event-title" placeholder="Add title" ></div >
                <div >
                    <select class="getHour" name="getHour" id="" >
						<?php foreach ( halfHourTimes1() as $data ) : ?>

                            <option value="<?php echo $data; ?>" ><?php echo $data; ?></option >
						
						<?php endforeach; ?>
                    </select >
                </div >
                <input class="dat-post" type="hidden" name="dat-post" value="" >
                <div ><input type="submit" ></div >
            </form >
        </div >
    </div >

</div >


<div id="mySidenav" class="sidenav" >
</div >

<div class="header" >
    <div id="demo" ></div >
    <div id="i4ciew" class="countdown" >
            <span data-js="countdown" class="countdown-cont" >
            <div class="countdown-block" >
              <div data-js="countdown-day" id="countdown-day" class="countdown-digit" ></div >
              <div class="countdown-label" >days</div >
            </div >
            <div class="countdown-block" >
              <div data-js="countdown-hour" id="countdown-hour" class="countdown-digit" ></div >
              <div class="countdown-label" >hours</div >
            </div >
            <div class="countdown-block" >
              <div data-js="countdown-minute" id="countdown-minute" class="countdown-digit" ></div >
              <div class="countdown-label" >minutes</div >
            </div >
            <div class="countdown-block" >
              <div data-js="countdown-second" id="countdown-second" class="countdown-digit" ></div >
              <div class="countdown-label" >seconds</div >
              </div >
            </span > <span data-js="countdown-endtext" class="countdown-endtext" ></span >

        <!--        <div class="wrap" >-->
        <!--            <div class="cvc" >-->
        <!--                <form >-->
        <!--                    <div >-->
        <!--                        <input type="text" id="from" name="daterange" value="01/01/2018 - 01/15/2018" >-->
        <!--                    </div >-->
        <!--                    <div >-->
        <!--                        <input type="text" id="to" >-->
        <!--                    </div >-->
        <!--                    <div >-->
        <!--                    <textarea placeholder="Details" >-->
        <!--                    -->
        <!--                    </textarea >-->
        <!--                    </div >-->
        <!--                    <div >-->
        <!--                        <input type="submit" >-->
        <!--                    </div >-->
        <!--                </form >-->
        <!--            </div >-->
        <!--        </div >-->

        <div class="calendar" >
			<?php
				$dowMap = [
					'Mon',
					'Tue',
					'Wed',
					'Thu',
					'Fri',
					'Sat',
					'Sun'
				]; ?>
			<?php foreach ( $dowMap as $dayss ) : ?>
                <div class="days" ><?php echo $dayss ?></div >
			<?php endforeach; ?>

            <div class="dsfsddfs" ></div >
			<?php
				$running_day = date( 'w', mktime( 0, 0, 0, $month, 1, $year ) );
				$days_in_month = date( 't', mktime( 0, 0, 0, $month, 1, $year ) );
				
				for ( $x = 1; $x < $running_day; $x++ ):
					echo '<div class="last-mouth"></div>';
				endfor;
			?>
			<?php $count = 0;
				for ( $i = 1; $i <= $days; $i++ ) :
					$stmt = $conn->query( "SELECT * FROM aug2018 WHERE dayNumber = '" . $i . "'" );
					$row = $stmt->fetch();
					
					$isEvent = ( $row[ 'dayNumber' ] == $i ) ? 'onEvent' : 'noEvent';
					$isToday = ( $day == $i ) ? ' today' : ''; ?>
					
					<?php if ( $explode[ 0 ] == $i ) : ?>
                    <div id="<?php echo $i ?>" class="dates" style="position: relative;" >
                        <div class="df d-box-blue <?php echo $isToday ?>" >
                            <span class="<?php echo $isEvent ?>-blue" data-full-day="<?php echo date( "$i-m-Y" ) ?>" data-day="<?php echo $i ?>" ><?php echo $i ?></span >
                        </div >
                    </div >
				<?Php elseif ( $i < $explode[ 0 ] ) : ?>
                    <div id="<?php echo $i ?>" class="dates" style="position: relative;" >
                        <div class="df d-box-silver <?php echo $isToday ?>" >
                            <span class="<?php echo $isEvent ?>-silver" data-full-day="<?php echo date( "$i-m-Y" ) ?>" data-day="<?php echo $i ?>" ><?php echo $i ?></span >
                        </div >
                    </div >
				<?php elseif ( $i > $explode[ 0 ] ) : ?>
                    <div id="<?php echo $i ?>" class="dates" style="position: relative;" >
                        <div class="df d-box-red <?php echo $isToday ?>" >
                            <span class="<?php echo $isEvent ?>-red" data-full-day="<?php echo date( "$i-m-Y" ) ?>" data-day="<?php echo $i ?>" ><?php echo $i ?></span >
                        </div >
                    </div >
				<?php else : ?>
                    <div class="df" id="<?php echo $i ?>" class="dates" style="width: 100px; height: 100px; border: 1px solid blue" ><?php echo $i ?></div >
				<?php endif; ?>
				<?php endfor; ?>
            <div class="clearfix" ></div >
        </div >
    </div >
</div >

<script >
    let countDownDate = new Date( " Aug, 09, 2019, 18:00:00" ).getTime();
    let x = setInterval( function() {
        let now = new Date().getTime();

        let distance = countDownDate - now;

        let days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) );
        let hours = Math.floor( ( distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) );
        let minutes = Math.floor( ( distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) );
        let seconds = Math.floor( ( distance % ( 1000 * 60 ) ) / 1000 );

        let showDays = document.getElementById( "countdown-day" );
        let showHours = document.getElementById( "countdown-hour" );
        let showMinutes = document.getElementById( "countdown-minute" );
        let showSeconds = document.getElementById( "countdown-second" );
        let select = document.getElementById( "i4ciew" );
        showDays.innerHTML = days;
        showHours.innerHTML = hours;
        showMinutes.innerHTML = minutes;
        showSeconds.innerHTML = seconds;

        if( distance < 0 ) {
            clearInterval( x );
            select.innerHTML = "Почивкааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааа";
        }
    }, 1000 );
</script >
<script src="javascript.js" ></script >
</body >
</html >