<?php
/**
 * Template Name: MSDN Activation
 *
 * @package WordPress
 *
 */
get_header();
?>
	<section class="inner-banner">
		<div class="inner-banner-wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="inner-banner-cont-wrap">
							<div class="inner-banner-cont">
								<?php while ( have_posts() ) : the_post(); ?>
									<h1><?php the_title(); ?></h1>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="msdn-activate">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-5">
					<?php
					$the_uri = $_SERVER['REQUEST_URI'];

					if ( strpos( $the_uri, 'virtualize-msdn-activate' ) > 0 || strpos( $the_uri, 'virtualize/microsoft/activate/' ) > 0 ):
						$token     = $_REQUEST['token'];
						$res       = check_msdn_code( 'dry_run@parasoft.com', $token );
						$msg       = $_REQUEST['msg'];
						$messages  = [
							'ok'       => 'Thank you for your submission. You will receive an email from Parasoft with download instructions and next steps in the next few minutes. If you do not receive an email, please contact maint@parasoft.com.',
							'no-token' => 'Page has been accessed incorrectly. Please contact support at visualstudiosupport@parasoft.com.',
							'err-code' => 'Your activation code was incorrect. Please contact visualstudiosupport@parasoft.com.',
							'err-rest' => 'Something went wrong. Please try again later or contact visualstudiosupport@parasoft.com.',
						];
						$has_error = false;

						if ( ! $token || ( strlen( $token ) !== 16 ) || ( 'true' != $res ) || ( 'err' === $msg ) ) {
							$has_error = true;
						}
						?>
						<section id="msdn" class="mt-3">
							<?php if ( $has_error ): ?>
								<div class="alert alert-danger error-box" role="alert">
									<?php if ( ! $token ): ?>
										<?php echo $messages['no-token']; ?>
									<?php elseif ( 'error' === $res ): ?>
										<?php echo $messages['err-rest']; ?>
									<?php else: ?>
										<?php echo $messages['err-code']; ?>
									<?php endif; ?>
								</div>
							<?php elseif ( 'ok' === $msg ): ?>
							<?php /* Should not be accessible */ ?>
							<?php get_template_part( 'template-parts/content-activate-msdn', 'table' ); ?>
								<div class="alert alert-success ok-box" role="alert">
									<?php echo $messages['ok']; ?>
								</div>
							<?php else: ?>

							<?php get_template_part( 'template-parts/content-activate-msdn', 'table' ); ?>
								<div id="wrp_form" class="mt-5">
									<form id="parasoft-virtualize-activate" class="needs-validation w-75 m-auto"
									      novalidate>
										<div class="form-row">
											<div class="col-md-6 mb-3">
												<label for="firstname">First name <span class="text-danger">*</span></label>
												<input type="text"
												       class="form-control"
												       id="firstname"
												       name="firstname"
												       value=""
												       maxlength="255"
												       placeholder="First name (required)"
												       required
												       aria-required="true"
												       tabindex="-1"/>
												<div class="feedback"></div>
											</div>
											<div class="col-md-6 mb-3">
												<label for="lastname">Last name <span class="text-danger">*</span></label>
												<input type="text"
												       class="form-control"
												       id="lastname"
												       name="lastname"
												       value=""
												       maxlength="255"
												       placeholder="Last name (required)"
												       required
												       aria-required="true"
												       tabindex="-1"/>
												<div class="feedback"></div>
											</div>
										</div>
										<div class="form-group">
											<label for="email">Email <span class="text-danger">*</span></label>
											<input type="email"
											       class="form-control"
											       id="email"
											       name="email"
											       value=""
											       maxlength="254"
											       placeholder="Email (required)"
											       required
											       aria-required="true"
											       tabindex="-1"/>
											<div class="feedback"></div>
										</div>
										<div class="form-group">
											<label for="phone">Phone</label>
											<input type="text"
											       class="form-control"
											       id="phone"
											       name="phone"
											       value=""
											       maxlength="255"
											       placeholder="Phone"
											       tabindex="-1"/>
											<div class="feedback"></div>
										</div>
										<div class="form-group">
											<label for="company">Company</label>
											<input type="text"
											       class="form-control"
											       id="company"
											       name="company"
											       value=""
											       size="60"
											       maxlength="255"
											       placeholder="Company"
											       tabindex="-1">
											<div class="feedback"></div>
										</div>
										<div class="form-group">
											<label for="token">MSDN Token <span class="text-danger">*</span></label>
											<input type="text"
											       class="form-control"
											       id="token"
											       name="token"
											       value="<?php echo $token; ?>"
											       maxlength="255"
											       placeholder="MSDN Token (required)"
											       required
											       aria-required="true"
											       tabindex="-1">
											<div class="feedback"></div>
										</div>
										<div class="form-group">
											<button class="btn btn-success" type="submit">Submit <i class="fa fa-spinner fa-spin d-none"></i></button>
										</div>
									</form>
								</div>

								<script>
									(function () {
										'use strict';

										var token = '<?php echo $token;?>';

										// JavaScript for disabling form submissions if there are invalid fields
										window.addEventListener('load', function () {
											// Fetch all the forms we want to apply custom Bootstrap validation styles to
											var $form = document.getElementById('parasoft-virtualize-activate'),
												$inputs = document.getElementsByClassName('form-control');

											$form.addEventListener('submit', function (event) {
												event.preventDefault();
												event.stopPropagation();

												$form.classList.remove('was-validated');
												jQuery('.fa-spinner').removeClass('d-none');

												if ($form.checkValidity() === false) {
													Array.prototype.forEach.call($inputs, function ($input) {
														var $feedback = $input.nextElementSibling;
														jQuery('.fa-spinner').addClass('d-none');

														if ($input.validity.valid) {
															// In case there is an error message visible, if the field
															// is valid, we remove the error message.
															$feedback.classList.remove('invalid-feedback');
															$feedback.classList.add('valid-feedback');
															// $input.nextSibling.textContent('Looks good!');
														} else {
															// If there is still an error, show the correct error
															$feedback.classList.remove('valid-feedback');
															$feedback.classList.add('invalid-feedback');
															// $feedback.innerHTML('I am expecting a valid input!');
														}
													});
												} else {
													$form.classList.remove('was-validated');

													var email = $form.querySelector('#email').value,
														fname = $form.querySelector('#firstname').value,
														lname = $form.querySelector('#lastname').value,
														phone = $form.querySelector('#phone').value,
														company = $form.querySelector('#company').value;

													doAjaxReq(email, fname, lname, phone, company);
												}

												$form.classList.add('was-validated');
											}, false);
										}, false);

										function showRes(isOk) {
											var $res = jQuery('#wrp_form');
											$res.empty();

											if (isOk) {
												jQuery('<div class="alert alert-success ok-box"/>').text('<?php echo $messages['ok'];?>').appendTo($res);
											} else {
												jQuery('<div class="alert alert-danger error-box"/>').text('<?php echo $messages['err-code'];?>').appendTo($res);
											}
										}

										function showServerError(m) {
											var $res = jQuery('#wrp_form');
											$res.empty();

											jQuery('<div class="alert alert-danger error-box"/>').text('<?php echo $messages['err-rest'];?>').appendTo($res);
										}

										function doAjaxReq(email, fname, lname, phone, company) {
											jQuery.ajax({
												url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
												data: {
													'action': 'msdn_activate',
													'fn': 'msdn_code_wrapper',
													'email': email,
													'token': token,
													'fname': fname,
													'lname': lname,
													'phone': phone,
													'company': company
												},
												dataType: 'JSON',
												success: function (data) {
													// console.log(data);
													jQuery('.fa-spinner').addClass('d-none');

													if ('true' === data.success) {
														showRes(true);
														return false;
													} else {
														showRes(false);
														return false;
													}
												},
												error: function (jqXHR, status, exception) {
													// console.log(jqXHR.respnse);
													// console.log(status);
													jQuery('.fa-spinner').addClass('d-none');
													//TODO fix it!
													showServerError('doAjaxReq');
												}
											});
										}
									})();
								</script>
							<?php endif; ?>
						</section>
					<?php else: ?>
						<h2>Incorrect page accessed. If you think this is a mistake on our end, please contact visualstudiosupport@parasoft.com.</h2>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
