<?php include 'config.php'; ?>
<a href="javascript:void(0)" class="closebtn" >&times;</a >
<div style="padding: 10px;" >
	<div class="fullDate" ></div >
	<?php $i = 0;
		foreach ( $hours as $data ) : $i++; ?>
			<?php
			if ( isset( $_POST[ 'getDay' ] ) ) {
				$day = $_POST[ 'getDay' ];
			}
			
			$stmt = $conn->prepare( "SELECT * FROM aug2018 WHERE dayNumber = :day and time = :time");
			$data = $data . ':00';
			$stmt->bindValue( ':time', $data );
			$stmt->bindValue( ':day',  $day);
			$stmt->execute();
			$row = $stmt->fetch();
			?>
			<div class="ec-dt" >
				<div class="timeAgo" ><?php echo $data; ?></div >
				<div class="makeEvent" data-hour="<?php echo $data ?>" >
					<?php if ( $row ): ?>
							<div style=" width:100%; background-color:#00ADEF; color:#fff; padding:5px;" ><?php echo $row[ 'Event' ]; ?></div >
					<?php endif; ?>
				</div >
			</div >
		<?php endforeach; ?>
</div >
