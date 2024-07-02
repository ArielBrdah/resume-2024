
<?php require_once(__DIR__.'/sections/header.php'); ?>
<div id="fh5co-consult">
		<div class="video fh5co-video" style="background-image: url(images/cover_bg_1.jpg);">
			<div class="overlay"></div>
		</div>
		<div class="choose animate-box">
		<?php if( $posted && !empty($msg) ) : ?>
				<div class='alert alert-success row align-items-center'>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</svg>
					<span class="ml-2">
						<?= $msg; ?>
					</span>
				</div>
				<?php endif; ?>
			<h2>Contact</h2>
			<form action="/interested.php" method='POST'>
				<div class="row form-group">
					<div class="col-md-6">
						<input type="text" name="fname" id="fname" class="form-control" placeholder="Your firstname">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<input type="text" name="lname" id="lname" class="form-control" placeholder="Your lastname">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<input type="text" name="email" id="email" class="form-control" placeholder="Your email address">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject of this message">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Send Message" class="btn btn-primary">
				</div>


			</form>	
		</div>
	</div>
	<?php require_once(__DIR__.'/sections/footer.php'); ?>