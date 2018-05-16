<?php
/**
 * BuddyPress email template.
 *
 * Magic numbers:
 *  1.618 = golden mean.
 *  1.35  = default body_text_size multipler. Gives default heading of 20px.
 *
 * @since 2.5.0
 *
 * @package BuddyPress
 * @subpackage Core
 */

/*
Based on the Cerberus "Fluid" template by Ted Goas (http://tedgoas.github.io/Cerberus/).
License for the original template:


The MIT License (MIT)

Copyright (c) 2013 Ted Goas

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$settings = bp_email_get_appearance_settings();

$max_width = "800px";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->

	<!-- CSS Reset -->
	<style type="text/css">
		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			Margin: 0 !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Forces Outlook.com to display emails full width. */
		.ExternalClass {
			width: 100%;
		}

		/* What is does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			Margin: 0 auto !important;
		}
		table table table {
			table-layout: auto;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		/* & manages img max widths to ensure content body images don't exceed template width. */
		img {
			-ms-interpolation-mode:bicubic;
			height: auto;
			max-width: 100%;
		}

		/* What it does: Overrides styles added when Yahoo's auto-senses a link. */
		.yshortcuts a {
			border-bottom: none !important;
		}

		/* What it does: A work-around for iOS meddling in triggered links. */
		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: underline !important;
		}


		.body_text_size {
			box-shadow: 0px 10px 9px -7px rgba(0,0,0,0.05);

		}
		#header-logo {

			width: 50%;

		}
		.footer_text_color a {
			color: #888;
		}


	</style>

</head>
<body class="email_bg" width="100%" height="100%" bgcolor="<?php echo esc_attr( $settings['email_bg'] ); ?>" style="Margin: 0;">
<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="<?php echo esc_attr( $settings['email_bg'] ); ?>" style="border-collapse:collapse;" class="email_bg"><tr><td valign="top">
	<center style="width: 100%;">

		<!-- Visually Hidden Preheader Text : BEGIN -->
		<div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
			{{email.preheader}}
		</div>
		<!-- Visually Hidden Preheader Text : END -->

		<div style="max-width: <?php echo $max_width; ?>">
			<!--[if (gte mso 9)|(IE)]>
			<table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
			<tr>
			<td>
			<![endif]-->

			<!-- Email Header : BEGIN -->
			<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: <?php echo $max_width; ?>; border-bottom: 2px solid <?php echo esc_attr( $settings['highlight_color'] ); ?>" bgcolor="<?php echo esc_attr( $settings['header_bg'] ); ?>" class="header_bg">
				<tr>
					<td style="text-align: center; padding: 15px 0; font-family: sans-serif; mso-height-rule: exactly; font-weight: bold; color: <?php echo esc_attr( $settings['header_text_color'] ); ?>; font-size: <?php echo esc_attr( $settings['header_text_size'] . 'px' ); ?>" class="header_text_color header_text_size">
						<?php
						/**
						 * Fires before the display of the email template header.
						 *
						 * @since 2.5.0
						 */
						do_action( 'bp_before_email_header' );

						?>

						<svg id="header-logo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 450 133.2" style="enable-background:new 0 0 450 133.2;" xml:space="preserve">
							<style type="text/css">
								.st0{display:none;}
								.st1{display:inline;fill:#111017;}
								.st2{display:inline;fill:#B20004;}
								.st3{display:inline;}
								.st4{fill:#B20004;}
							</style>
							<g id="Camada_1" class="st0">
								<rect x="0" y="106.7" width="450" height="238.5"/>
								<rect x="-16.1" y="127.6" class="st1" width="460.5" height="169"/>
								<g id="D_icon">
									<path class="st2" d="M88.5,178c-0.7-31.6-29.3-47.7-43.9-48.4c-0.4,0-0.8,0-1.2,0c-0.7,0-1.6,0-2.7,0c-14.8,0.5-18.1,4.6-14.6,6.1
										c3.1,1.4,3.9,4.2,4.1,5.6c0,0.3,0.1,0.5,0.1,0.8l0,0l0,0c0.4,4,0.8,10.4,1.1,15.9c-0.1,0.2-0.1,0.3-0.1,0.3c0.3,4.3-1.6,11,0.7,11
										c2.7,0,0.4-6.7,0.5-11c0-0.1,0-0.1,0-0.2c0.3-9.2,0.6-20.7,2.4-21.2c5.8-1.4,26.1,7.7,26.6,40c0.3,18.6-6.9,28.7-13.6,34.7
										c-6.1,4.8-12.3,8.2-15-2.6c-0.7,11.2-4.2,11.1-3.7,13.9c0.4,2.4,7,4,9,18.1c0.8,8.2,1.7,18.9,2.4,27.5c0,0,0,0,0,0
										c0.5,3.7-1.5,17.9,1.1,17.9c3.3,0,0-13.4,0.1-17.6c0,0,0-0.1,0-0.1c0-0.1,0-0.1,0-0.2c0.3-15.5,1.6-37.5,6.8-40.4
										c1.2,0,3,31.2,4.3,57.5c0.7,25.8-2.1,36.6,1.3,36.6c3.8,0-0.2-8.7-0.1-36.2c0.1-22.1,0.7-46.8,2.7-53.5
										c3.3-11.4,12.3-8.7,12.9-8.4c3.1,0.7,4.7,11.7,5.4,22.8l0,0c0.7,11.2-1.2,22.5,0.7,23.9c0,0,0,0,0,0s0,0,0,0
										c0.1,0.1,0.3,0.2,0.5,0.2c3.3,0,0-9.6-0.2-24c0.4-11.8,1.2-24.6,2.9-29.3C81.2,208.5,89,207.4,88.5,178z"/>
								</g>
								<g id="D_original">
									<path class="st2" d="M88.7,178.2c-0.7-31.8-29.5-48-44.2-48.7c-0.4,0-0.8,0-1.2,0c-0.7,0-1.6,0-2.8,0c-14.9,0.5-18.2,4.6-14.7,6.1
										c3.1,1.4,3.9,4.3,4.1,5.7c0,0.3,0.1,0.5,0.1,0.8l0,0l0,0c0.8,8.3,1.6,26.9,1.6,26.9c0.8-5,0.3-31.4,3-32.1
										c5.8-1.4,26.3,7.8,26.8,40.3c0.3,18.7-7,28.9-13.7,35c-6.2,4.9-12.4,8.2-15.1-2.7c-0.7,11.3-4.3,11.2-3.7,14c0.4,2.4,7,4,9.1,18.2
										c1.7,16.6,3.7,43.1,3.7,43.1s-1.3-51.5,6.9-56.1c1.9,0,5.2,75.8,5.8,91c-0.5-18.4-0.8-75.8,2.4-86.6c3.3-11.4,12.4-8.7,13-8.5
										c5.2,1.2,6,30.3,6.1,42.2c0-11.7,0.3-40.9,3.2-48.5C81.4,208.9,89.3,207.8,88.7,178.2z"/>
								</g>
							</g>
							<g id="final">
							</g>
							<g id="final_spread">
								<path class="st4" d="M81.1,45.8c-1.5,4.8-4.6,7.7-9.4,7.7h-6.3V40h6.4c2.3,0.1,4,1.8,4,4.1v0.4l0.5,0V33.5l-0.5,0v0.4
									c0,2.3-1.7,4.1-4.1,4.1h-6.4V24h8.1c2.9,0.1,4.7,2,4.7,4.9v0.6l0.5,0v-8.4C77.8,21.5,75,22,73,22H54.6l0,0.5h0.6
									c1.6,0,3,1.3,3.1,2.9v26.8c0,1.7-1.4,3-3.1,3h-0.6l0,0.5h16.1c0.1,0,5.8,0.4,7.1,1.4c1.4,1,1.9,3.6,1.9,3.6s-0.6-3.6,0.5-8.4l0,0
									l1.4-6.3H81.1z"/>
								<path class="st4" d="M187.6,21.3c-11.5,0-18.9,6.7-18.9,17.5c0,10.8,7.4,17.5,18.9,17.5s18.9-6.7,18.9-17.5
									C206.5,28,199.2,21.3,187.6,21.3z M187.6,54.2c-6.8,0-11-5.9-11-15.5c0-9.5,4.2-15.5,11-15.5s11,5.9,11,15.5
									C198.6,48.3,194.4,54.2,187.6,54.2z"/>
								<path class="st4" d="M251.6,50.1V25.3c0.1-1.6,1.4-2.9,3-2.9h0.9l0-0.5l-14.6,0l0,0.5h0.9c1.6,0,2.9,1.3,3,2.9v19l-24.2-23.1H220
									c0,0,0.6,2.4,0.6,6v24.9c0,1.6-1.3,2.9-3,2.9h-0.9l0,0.5h14.6l0-0.5h-0.9c-1.6,0-2.9-1.3-3-2.9V33.2l20.8,19.8
									c2.5,2.6,3.2,5,3.4,8.7"/>
								<path class="st4" d="M298.6,49.8l0-0.4c-0.1-2.8-0.2-5.3-0.4-7.1l0-0.8l-0.4,0c-1.5,9.4-5.2,12.7-12.6,12.7
									c-7.1-0.2-11.6-6.1-11.6-15.6c0-9.4,4.7-15.3,12.3-15.3c5.3,0,9.4,2.5,11.1,8.8h0.4l-0.1-8.2c-2.7-1.4-6.8-2.6-11.9-2.6
									c-12.2,0-19.6,6.7-19.6,17.4c0,11,7.7,17.5,19.5,17.5c4.4,0,7.6-1.1,10-2.7c0,0,0.1,0,0.2-0.1c3.3-2.6,3.6,4.3,3.6,4.3
									S298.9,56.9,298.6,49.8C298.6,49.8,298.6,49.8,298.6,49.8z"/>
								<path class="st4" d="M336.2,45.8h-0.5c-1.5,4.8-4.6,7.7-9.4,7.7h-6.3V40h6.4c2.3,0.1,4,1.8,4,4.1v0.4l0.5,0V33.5l-0.5,0v0.4
									c0,2.3-1.7,4.1-4.1,4.1h-6.4V24h8.1c2.9,0.1,4.7,2,4.7,4.9v0.6l0.5,0v-8.4c-0.9,0.4-3.7,0.9-5.7,0.9h-18.4l0,0.5h0.6
									c1.6,0,3,1.3,3.1,2.9v26.8c0,1.7-1.4,3-3.1,3h-0.6l0,0.5h16.1c0.1,0,5.8,0.4,7.1,1.4c1.4,1,1.9,3.9,1.9,3.9s-0.5-3.8,0.5-8.5
									L336.2,45.8z"/>
								<path class="st4" d="M360.4,55.1c-1.7,0-3-1.3-3.1-3V25.4c0-1.7,1.4-3,3.1-3h0.6l0-0.5h-14.6l0,0.5h0.6c1.7,0,3,1.3,3.1,3v26.6
									c0,1.7-1.4,3-3.1,3h-0.6l0,0.5h14.6l0-0.5H360.4z"/>
								<path class="st4" d="M402,21.1c-0.9,0.4-3.6,0.8-5.7,0.9H377c-2.1,0-4.8-0.5-5.7-0.9v8.4l0.5,0v-0.6c0-2.9,1.9-4.8,4.8-4.9h6.5
									v28.2c-0.1,1.6-1.4,2.9-3.1,2.9h-0.6l0,0.5h14.6l0-0.5h-0.6c-1.7,0-3-1.3-3.1-3V24h6.4c1.7,0,3,0.7,3.8,1.8c1,1.5,1.4,8.4,1.4,8.4
									v-4.7l0,0L402,21.1z"/>
								<path class="st4" d="M431.1,21.3c-11.5,0-18.9,6.7-18.9,17.5c0,10.8,7.4,17.5,18.9,17.5S450,49.6,450,38.8
									C450,28,442.6,21.3,431.1,21.3z M431.1,54.2c-6.8,0-11-5.9-11-15.5c0-9.5,4.2-15.5,11-15.5s11,5.9,11,15.5
									C442.1,48.3,437.9,54.2,431.1,54.2z"/>
								<path class="st4" d="M157.7,41.7l0-0.2l-0.4,0c-1.5,9.4-5.2,12.7-12.6,12.7C137.5,54,133,48.1,133,38.6c0-9.4,4.7-15.3,12.3-15.3
									c5.3,0,9.4,2.5,11.2,8.8h0.4l-0.1-8.2c-2.7-1.4-6.8-2.6-11.9-2.6c-12.2,0-19.6,6.7-19.6,17.4c0,11,7.7,17.5,19.5,17.5
									c4.4,0,7.7-1.1,10-2.7c0,0,0.1,0,0.2,0c3.3-2.6,3.6,4.3,3.6,4.3S158.4,47.6,157.7,41.7C157.7,41.7,157.7,41.7,157.7,41.7z"/>
								<path class="st4" d="M92,52.5c0.8,4.5,1.3,13.1,1.3,13.1s-0.4-11.5,0.9-11c0,0,0,0,0,0c2.1,1,5,1.6,8.1,1.6
									c7.7,0,12.4-3.7,12.7-9.9c0.2-3.6-1.5-6.1-4.3-8l-9.2-5.9c-2-1.3-3.5-2.6-3.3-4.5c0.1-2.6,2.5-4.6,6.3-4.6c4.1,0,6.8,2.2,6.8,5.5
									h0.5l0.6-7.1h-3c-2.2-0.3-5-0.5-6.5-0.5c-6.1,0-9.7,3.4-10.1,8.4c-0.3,3.5,1.3,6.4,4.6,8.6l8.4,5.5c2.6,1.7,3.8,3,3.8,5
									c0,3-2.5,5.3-6.6,5.4c-5.8,0.1-9.4-4-9.1-9h-0.4c-1,1.7-1.7,4.8-1.4,6.9"/>
								<g id="D_2_">
									<path class="st4" d="M44.3,33.7C43.8,11.7,24,0.6,13.8,0.1c-0.3,0-0.6,0-0.9,0c-0.5,0-1.1,0-1.9,0C0.7,0.3-1.5,3.2,0.9,4.3
										C3,5.2,3.6,7.2,3.7,8.2c0,0.2,0,0.4,0.1,0.6l0,0l0,0c0.5,5.8,1.1,18.6,1.1,18.6C5.5,23.9,5.1,5.7,7,5.2c4-0.9,18.1,5.4,18.5,27.8
										c0.2,12.9-4.8,19.9-9.5,24.1c-4.3,3.4-8.6,5.7-10.4-1.8C5.1,63,2.7,62.9,3,64.9c0.3,1.7,4.9,2.8,6.3,12.6
										c1.2,11.5,2.5,29.7,2.5,29.7S11,71.7,16.6,68.6c1.3,0,3.6,52.3,4,62.8c-0.4-12.7-0.5-52.3,1.7-59.7c2.3-7.9,8.5-6,9-5.9
										c3.6,0.8,4.2,20.9,4.2,29.1c0-8.1,0.2-28.2,2.2-33.5C39.2,54.9,44.7,54.1,44.3,33.7z"/>
									<path class="st4" d="M35.5,98.3c0,0,0-1.3,0-3.4C35.5,97,35.5,98.3,35.5,98.3z"/>
									<path class="st4" d="M20.6,131.3c0,0.7,0,1.3,0.1,1.8C20.7,133.2,20.6,132.5,20.6,131.3z"/>
								</g>
							</g>
						</svg>

						<?php

						/**
						 * Fires after the display of the email template header.
						 *
						 * @since 2.5.0
						 */
						do_action( 'bp_after_email_header' );
						?>

					</td>
				</tr>
			</table>
			<!-- Email Header : END -->

			<!-- Email Body : BEGIN -->
			<table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="<?php echo esc_attr( $settings['body_bg'] ); ?>" width="100%" style="max-width: <?php echo $max_width; ?>; border-radius: 5px;" class="body_bg">

				<!-- 1 Column Text : BEGIN -->
				<tr>
					<td>
						<table cellspacing="0" cellpadding="0" border="0" width="100%">
						  <tr>
								<td style="padding: 20px; font-family: sans-serif; mso-height-rule: exactly; line-height: <?php echo esc_attr( floor( $settings['body_text_size'] * 1.618 ) . 'px' ) ?>; color: <?php echo esc_attr( $settings['body_text_color'] ); ?>; font-size: <?php echo esc_attr( $settings['body_text_size'] . 'px' ); ?>" class="body_text_color body_text_size">
									<span style="font-weight: bold; font-size: <?php echo esc_attr( floor( $settings['body_text_size'] * 1.35 ) . 'px' ); ?>" class="welcome"><?php bp_email_the_salutation( $settings ); ?></span>
									<hr color="<?php echo esc_attr( $settings['email_bg'] ); ?>"><br>
									{{{content}}}
								</td>
						  </tr>
						</table>
					</td>
				</tr>
				<!-- 1 Column Text : BEGIN -->

			</table>
			<!-- Email Body : END -->

			<!-- Email Footer : BEGIN -->
			<br>
			<table cellspacing="0" cellpadding="0" border="0" align="left" width="100%" style="max-width: <?php echo $max_width; ?>; border-radius: 5px;" bgcolor="<?php echo esc_attr( $settings['footer_bg'] ); ?>" class="footer_bg">
				<tr>
					<td style="padding: 20px; width: 100%; font-size: <?php echo esc_attr( $settings['footer_text_size'] . 'px' ); ?>; font-family: sans-serif; mso-height-rule: exactly; line-height: <?php echo esc_attr( floor( $settings['footer_text_size'] * 1.618 ) . 'px' ) ?>; text-align: left; color: <?php echo esc_attr( $settings['footer_text_color'] ); ?>;" class="footer_text_color footer_text_size">
						<?php
						/**
						 * Fires before the display of the email template footer.
						 *
						 * @since 2.5.0
						 */
						do_action( 'bp_before_email_footer' );
						?>

						<span class="footer_text"><?php echo nl2br( stripslashes( $settings['footer_text'] ) ); ?></span>
						<br><br>
						<a href="{{{unsubscribe}}}" style="text-decoration: underline;"><?php _ex( 'unsubscribe', 'email', 'buddypress' ); ?></a>

						<?php
						/**
						 * Fires after the display of the email template footer.
						 *
						 * @since 2.5.0
						 */
						do_action( 'bp_after_email_footer' );
						?>
					</td>
				</tr>
			</table>
			<!-- Email Footer : END -->

			<!--[if (gte mso 9)|(IE)]>
			</td>
			</tr>
			</table>
			<![endif]-->
		</div>
	</center>
</td></tr></table>
<?php if ( function_exists( 'is_customize_preview' ) && is_customize_preview() ) wp_footer(); ?>
</body>
</html>