<?php
function social_share_buttons( $echo = true ) {

	$social = '
		<ul class="social-share">
			<li class="twitter">
				<span class="count">' ."0" . '</span><a class="twitter" href="https://twitter.com/intent/tweet?url=' . urlencode( get_permalink() ) . '&text=' . urlencode( get_the_title() ) . '" target="_blank">Twitter</a>
			</li>
			<li class="facebook">
				<span class="count">' . "0" . '</span><a class="facebook" href="http://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" target="_blank">Facebook</a>
			</li>
			<li class="linkedin">
				<span class="count">' . "0" . '</span><a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_permalink() ) . '&title=' . urlencode( get_the_title() ) . '" target="_blank">Linkedin</a>
			</li>
		</ul>
		<script>
			jQuery(document).ready(function($){
				$.getJSON("http://cdn.api.twitter.com/1/urls/count.json?url=' . get_permalink() .'&callback=?").done( function(data) {
					$(".social-share .twitter .count").html(data.count);
				});
				$.getJSON("http://graph.facebook.com/' . get_permalink() .'").done( function(data) {
					$(".social-share .facebook .count").html(data.shares);
				});
				$.getJSON("http://www.linkedin.com/countserv/count/share?url=' . get_permalink() .'&callback=?").done( function(data) {
					$(".social-share .linkedin .count").html(data.count);
				});
			});
		</script>
	';

	if ( $echo == true )
		echo $social;
	else
		return $social;
}
