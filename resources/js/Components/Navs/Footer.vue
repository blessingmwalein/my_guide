<template>
	<div>
		<footer id="footer">
		<section class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="widget widget_contact">
						<h3 class="widget_title">Where We Are ?</h3>
						<p>Helping zimbabwean developers to share ideas in slutiosn to questions from other developers</p>
						<ul>
							<li>
								<span>Address :</span>
								Ask Me Network, 7 wingate, rhodesville, Harare, Zimbabwe.
							</li>
							<li>
								<span>Support :</span>Support Telephone No : (+263)772440088
							</li>
							<li>Support Email Account : blessingmwwalein@outlook.com</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<div class="widget">
						<h3 class="widget_title">Quick Links</h3>
						<ul>
							<li><inertia-link :href="route('home')">Home</inertia-link></li>
							<li><inertia-link :href="route('ask-question')">Ask Question</inertia-link></li>
							<li><a href="">Contact Us</a></li>
							<li><a href="#">FAQs</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget_twitter">
						<h3 class="widget_title">Latest Tweets</h3>
						<div class="tweet_1"></div>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</footer><!-- End footer -->
	<footer id="footer-bottom">
		<section class="container">
			<div class="copyrights f_left">Copyright 2021 myguide | <a href="https://blessingmwalein.github.io/">By x.bling</a></div>
			<div class="social_icons f_right">
				<ul>
					<li class="twitter"><a original-title="Twitter" class="tooltip-n" href="#"><i class="social_icon-twitter font17"></i></a></li>
					<li class="facebook"><a original-title="Facebook" class="tooltip-n" href="#"><i class="social_icon-facebook font17"></i></a></li>
					<li class="gplus"><a original-title="Google plus" class="tooltip-n" href="#"><i class="social_icon-gplus font17"></i></a></li>
					<li class="youtube"><a original-title="Youtube" class="tooltip-n" href="#"><i class="social_icon-youtube font17"></i></a></li>
					<li class="skype"><a original-title="Skype" class="tooltip-n" href="skype:#?call"><i class="social_icon-skype font17"></i></a></li>
					<li class="flickr"><a original-title="Flickr" class="tooltip-n" href="#"><i class="social_icon-flickr font17"></i></a></li>
					<li class="rss"><a original-title="Rss" class="tooltip-n" href="#"><i class="social_icon-rss font17"></i></a></li>
				</ul>
			</div><!-- End social_icons -->
		</section><!-- End container -->
	</footer><!-- End footer-bottom -->
	</div>
</template>