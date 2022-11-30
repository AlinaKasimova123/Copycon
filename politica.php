<?php include("templates/header.php"); 
include("event.php"); 
$event = new Event();
$eventPrivacyPolicy = $event->getPrivacyPolicy();
?>
		<div class="container">
<div class="row mb-3" style="font-size: 19px">
	<div class="col" style="padding: 20px">
		<div id="inputResult">
			<div class="row mb-4">
				<div class="col">
					<h4 style="text-align: center; font-size: 23px"><strong>Политика в отношении обработки персональных данных</strong></h4>
				</div>
			</div>
			<div class="politica">
			<?php if(!empty($eventPrivacyPolicy) && count($eventPrivacyPolicy)>0) { ?>
            <?php foreach($eventPrivacyPolicy as $key=>$element) { ?>
				<?php print($element['description']); ?>
				<?php } ?>
        <?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("templates/footer.php"); ?>