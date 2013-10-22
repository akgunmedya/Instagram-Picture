<?php
function instagram_picture_alle_bilder() {

	########################################################################################################################
	/* 
	*	variable definition
   */
	global $instagram_picture_variable;
	global $wpdb;
	########################################################################################################################

	########################################################################################################################
	/*
	*	All Pictures
	*/
		// Picture count
		$num_bilder = $wpdb->get_var("SELECT COUNT(*) FROM $instagram_picture_variable[101]");

		// Check whether any pictures exist	
		if($num_bilder != "0")
		{	
			echo '<div class="instagram-picture-box"><h2>All Pictures</h2>';
	
			$i=1;		
			// Spend existing images
			foreach( $wpdb->get_results("SELECT * FROM $instagram_picture_variable[101] ORDER BY id DESC") as $key => $row) 
			{
				$url = $row->thumbnail;
				$title = $row->text;  
				$id = $row->id;  				
		
				$class = ($i % 2) ? "FFFFFF" : "E0E0E0";
		
				// output
				echo '
				<table style="float:left;border: 1px solid; margin:5px;background-color:#'.$class.';">
					<tr>
						<td><img src="'.$url.'" title="'.$title.'" width="80px" /></td>
						<td>'.$id.'</td>
					</tr>
				</table>';
		
				$i++;
			}
	
			// clear
			echo '
				<div class="instagram_clear_admin"></div>
			</div>';
	
		}	
		else 
		{
			echo '
			<div class="instagram-picture-box">
				<h2>All Pictures</h2>
				<div class="instagram-picture-alert">
					<p>You need to upgrade your images first.</p><p>Just click on <b>"<a href="?page=instagram_picture_aktualisieren">Update</a>"</b></p>
				</div>
			</div>
			';
		}	
		
	########################################################################################################################		
		
}
?>