<?php
function instagram_picture_support() 
{
	########################################################################################################################
	/* 
	*	variable definition
   */
	global $instagram_picture_variable;
	global $wpdb;
	global $wp_version;
	global $current_user;
	########################################################################################################################

	$home = home_url();	
	
	get_currentuserinfo();
	$user_email = $current_user->user_email;
	
	$version = $instagram_picture_variable["0"];
	
		echo '<div class="instagram-picture-box">';
		echo '<div class="row-instagram-admin">';
		echo '<div class="col-instagram-4_admin instagram-picture-box-in">';
			
			if(!isset($_POST['message']))
			{

				echo '<form action="" id="instagram" method="post">';
				echo '<h2>Form</h2>';
				
				echo '<h3>E-Mail</h3>';
				echo '<input type="text" name="user_email" value="'.$user_email.'" style="width:100%;" />';		
				
				echo '<h3>Domain transmit</h3>';
				echo '<input type="radio" name="url_transmit" value="1" checked="checked">';
				echo ' Yes ('.$home.')';
				echo '<br />';
				echo '<input type="radio" name="url_transmit" value="2">';
				echo ' No';
				
				echo '<h3>Wordpress Version transmit</h3>';
				echo '<input type="radio" name="wp_transmit" value="1" checked="checked">';
				echo ' Yes (V '.$wp_version.')';
				echo '<br />';
				echo '<input type="radio" name="wp_transmit" value="2">';
				echo ' No';
				
				echo '<h3>Plugin Version transmit</h3>';
				echo '<input type="radio" name="plugin_transmit" value="1" checked="checked">';
				echo ' Yes (V '.$version.')';
				echo '<br />';
				echo '<input type="radio" name="plugin_transmit" value="2">';
				echo ' No';
				
				echo '<h3>Message</h3>';
				echo '<textarea name="message" style="width:100%; height:100px;"></textarea>';

				echo '<br><br>';
				echo '<button type="submit" class="instagram-picture-success-button">Send</button>';
				echo '</form>';
			}
			else {
				
				$user_email = $_POST['user_email'];
				$url_transmit = $_POST['url_transmit'];
				$wp_transmit = $_POST['wp_transmit'];
				$plugin_transmit = $_POST['plugin_transmit'];
				$message = $_POST['message'];
				
				
				$message = htmlentities($message, ENT_QUOTES);
				$user_email = htmlentities($user_email, ENT_QUOTES);
				
				if($url_transmit == "1")
				{
					$url_text = "Website: $home";
				}
				else {
					$url_text = "Website: none";	
				}
				
				if($wp_transmit == "1")
				{
					$wp_text = "WP-Version: $wp_version";
				}
				else {
					$wp_text = "WP-Version: none";	
				}
				
				if($plugin_transmit == "1")
				{
					$plugin_text = "Plugin-Version: $version";
				}
				else {
					$plugin_text = "Plugin-Version: none";	
				}
				
				$email = "$url_text\n$wp_text\n$plugin_text\n\n$message";
				
				$headers = 'From: '.$user_email. "\r\n";
				
				wp_mail('support@tb-webtec.de', 'INSTAGRAM-PICTURE SUPPORT', $email, $headers);
				
				echo '<p>Your email has been sent.</p>
				<p>We\'ll get back to you quickly possible.</p>';
			}
			
		echo '</div>';
		echo '<div class="col-instagram-4_admin instagram-picture-box-in">';
		
		echo '<h2>Other options</h2>
			<p>Mail: support@tb-webtec.de</p>
			<p>Website: <a href="http://tb-webtec.de/instagram_picture/contact.php" target="_blank">http://tb-webtec.de/instagram_picture/contact.php</a></p>
			<p>Wordpress: <a href="http://wordpress.org/support/plugin/instagram-picture" target="_blank">http://wordpress.org/support/plugin/instagram-picture</a></p>
			';
		
		echo '</div>';
		echo '</div>';
		echo '<div class="instagram_clear_admin"></div>';
		echo '</div>';

}
?>