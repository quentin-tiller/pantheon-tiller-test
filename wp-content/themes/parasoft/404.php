<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */
get_header();
?>
<?php
$page_heading      = get_field( '404_page_heading', 'options' );
$page_sub_heading  = get_field( '404_page_sub_heading', 'options' );
$page_content      = get_field( '404_page_content', 'options' );
$page_banner_image = get_field( '404_page_banner_image', 'options' );
?>
<section class="error-page-block" style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/solution-bg.jpg');">
	<div class="error-page-block-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="error-page-wrap text-center">
						<span>404</span>
						<h1>We Lost This Page.</h1>
						<p>But We’ll Find You a Better Place to Go</p>
						<a class="button" href="<?php echo home_url(); ?>" title="Visit our home page">Visit our home page</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="products-block-sec alt-not-found">
	<div class="products-block-top-shape"></div>
	<div class="products-block-bottom-shape"></div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="heading">
					<h2>Parasoft Continuous Quality Suite</h2>
				</div>
			</div>
		</div>
		<div class="row animation-box onView">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/ctest/" title="Parasoft C/C++test">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							     id="Layer_1" x="0px" y="0px" viewBox="0 0 60.55 60.55" xml:space="preserve"
							     class="svg replaced-svg">
								<polygon class="st0" points="39.76,24.09 36.27,24.09 36.27,28.54 31.82,28.54 31.82,32.02 36.27,32.02 36.27,36.47 39.76,36.47   39.76,32.02 44.2,32.02 44.2,28.54 39.76,28.54 "></polygon>
								<polygon class="st0" points="20.8,36.47 24.28,36.47 24.28,32.02 28.73,32.02 28.73,28.54 24.28,28.54 24.28,24.09 20.8,24.09   20.8,28.54 16.35,28.54 16.35,32.02 20.8,32.02 "></polygon>
								<polyline class="st0" points="0,30.28 9.69,39.97 12.95,36.71 6.51,30.28 12.95,23.84 9.69,20.58 0,30.28 "></polyline>
								<polygon class="st0" points="50.86,20.58 47.6,23.84 54.04,30.28 47.6,36.71 50.86,39.97 60.55,30.28 "></polygon>
								<polyline class="st0" points="30.28,0 20.58,9.69 23.84,12.95 30.28,6.51 "></polyline>
								<polyline class="st0" points="30.28,6.51 36.72,12.95 39.97,9.69 30.28,0 "></polyline>
								<polyline class="st0" points="30.28,60.55 39.97,50.86 36.72,47.6 30.28,54.04 23.84,47.6 20.58,50.86 30.28,60.55 "></polyline>
							</svg>
						</div>
						<h3>Parasoft C/C++test</h3>
						<p>Develop high-quality C and C++ code that is robust, safe, secure, and compliant with industry
							standards.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-jtest/" title="Parasoft Jtest">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							     id="Layer_1" x="0px" y="0px" viewBox="0 0 60.55 60.55" xml:space="preserve"
							     class="svg replaced-svg">
								<polygon class="st0" points="9.7,20.58 0,30.28 9.7,39.97 12.95,36.72 6.51,30.28 12.95,23.84 "></polygon>
								<polygon class="st0" points="50.86,20.58 47.6,23.84 54.04,30.28 47.6,36.72 50.86,39.97 60.55,30.28 "></polygon>
								<polygon class="st0" points="20.58,9.69 23.84,12.95 30.28,6.51 36.72,12.95 39.97,9.69 30.28,0 "></polygon>
								<polygon class="st0" points="30.28,54.04 23.84,47.6 20.58,50.86 30.28,60.55 39.97,50.86 36.72,47.6 "></polygon>
								<path class="st0" d="M25.5,25.43c-2.41,2.19-3.63,4.37-3.61,6.48c0.02,2.12,1.3,3.31,1.45,3.44c0.31,0.27,0.7,0.41,1.08,0.41  c0.45,0,0.91-0.19,1.23-0.56c0.6-0.68,0.53-1.71-0.15-2.31c0,0-0.33-0.38-0.34-1.01c-0.01-1.1,0.89-2.53,2.54-4.03  c3.63-3.3,5.24-5.95,4.95-8.11c-0.22-1.59-1.35-2.23-1.58-2.35c-0.81-0.4-1.79-0.08-2.19,0.73c-0.37,0.74-0.13,1.62,0.53,2.08  C29.42,20.36,29.41,21.88,25.5,25.43"></path>
								<path class="st0" d="M31.42,34.15c-2.41,2.19-3.63,4.37-3.61,6.48c0.02,2.12,1.3,3.31,1.45,3.44c0.31,0.27,0.7,0.41,1.08,0.41  c0.46,0,0.91-0.19,1.23-0.56c0.6-0.68,0.53-1.71-0.15-2.31c0,0-0.33-0.38-0.34-1.01c-0.01-1.1,0.89-2.53,2.54-4.03  c3.63-3.3,5.24-5.95,4.95-8.11c-0.22-1.59-1.35-2.23-1.58-2.35c-0.81-0.4-1.79-0.08-2.19,0.73c-0.37,0.74-0.13,1.62,0.53,2.07  C35.34,29.17,35.23,30.69,31.42,34.15"></path>
							</svg>
						</div>
						<h3>Parasoft Jtest</h3>
						<p>Achieve high code coverage with JUnit and accelerate the delivery of secure and reliable Java
							applications with deep code analysis.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-dottest/" title="Parasoft dotTEST">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							     id="Layer_1" x="0px" y="0px" viewBox="0 0 60.55 60.55" xml:space="preserve"
							     class="svg replaced-svg">
								<path class="st0" d="M34.8,29.69c0-2.33-1.89-4.21-4.21-4.21c-2.33,0-4.21,1.89-4.21,4.21c0,2.33,1.89,4.21,4.21,4.21  C32.91,33.9,34.8,32.01,34.8,29.69"></path>
								<polygon class="st0" points="9.7,20.58 0,30.28 9.7,39.97 12.95,36.71 6.51,30.28 12.95,23.84 "></polygon>
								<polygon class="st0" points="50.86,20.58 47.6,23.84 54.04,30.28 47.6,36.71 50.86,39.97 60.55,30.28 "></polygon>
								<polygon class="st0" points="20.58,9.69 23.84,12.95 30.28,6.51 36.72,12.95 39.97,9.69 30.28,0 "></polygon>
								<polygon class="st0" points="30.28,54.04 23.84,47.6 20.58,50.86 30.28,60.55 39.97,50.86 36.72,47.6 "></polygon>
							</svg>
						</div>
						<h3>Parasoft dotTEST</h3>
						<p>Reduce the risk of C# or .NET development in the Microsoft framework with deep static
							analysis, security, and coverage for enterprise and embedded applications.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-insure/" title="Parasoft Insure++">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							     id="Layer_1" x="0px" y="0px" viewBox="0 0 43.72 19.33" xml:space="preserve"
							     class="svg replaced-svg">
								<path class="st0" d="M0,10.08c0-2.32,1.88-4.2,4.2-4.2c2.32,0,4.2,1.88,4.2,4.2c0,2.32-1.88,4.2-4.2,4.2C1.88,14.28,0,12.4,0,10.08"></path>
								<path class="st0" d="M35.33,10.08c0-2.32,1.88-4.2,4.2-4.2s4.2,1.88,4.2,4.2c0,2.32-1.88,4.2-4.2,4.2S35.33,12.4,35.33,10.08"></path>
								<polyline class="st0" points="24.93,19.33 15.26,9.67 24.93,0 28.19,3.26 21.78,9.67 28.19,16.08 24.93,19.33 "></polyline>
							</svg>
						</div>
						<h3>Parasoft Insure++</h3>
						<p>Automatically detect runtime memory-related defects such as heap corruption, rogue threads,
							memory leaks, and invalid pointers in C/C++ applications.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-dtp/" title="Parasoft DTP">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
							     viewBox="0 0 51.03 33.3" class="svg replaced-svg">
								<path class="cls-1" d="M49.53,30.3H25V1.5a1.5,1.5,0,0,0-3,0V30.3H14V14.51a1.5,1.5,0,0,0-3,0V30.3H4V21.51a1.5,1.5,0,0,0-3,0v8.88a1.5,1.5,0,0,0,.5,2.91h48a1.5,1.5,0,0,0,0-3"></path>
								<polygon class="cls-1" points="45.15 21.88 38.96 15.69 45.15 9.49 41.9 6.24 32.44 15.69 41.9 25.14 45.15 21.88"></polygon>
							</svg>
						</div>
						<h3>Parasoft DTP</h3>
						<p>Get a complete view of quality and compliance with aggregated reports and advanced analytics
							across Parasoft testing solutions.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-ctp/" title="Parasoft CTP">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
							     viewBox="0 0 58.44 58.44" class="svg replaced-svg">
								<path class="cls-1" d="M27.77,42.17h0a1.82,1.82,0,0,1,2.57,2.58,1.82,1.82,0,0,1-2.57-2.58"></path>
								<path class="cls-1" d="M35.1,41l-5.88-5.88L23.34,41l-1.61-1.6,6.69-6.68a1.12,1.12,0,0,1,1.6,0l6.68,6.68Z"></path>
								<path class="cls-1" d="M16.28,27.67h0a1.82,1.82,0,1,1-2.57,0,1.83,1.83,0,0,1,2.57,0"></path>
								<path class="cls-1" d="M19,36.61,17.41,35l5.88-5.88-5.88-5.88L19,21.64l6.68,6.68a1.13,1.13,0,0,1,0,1.6Z"></path>
								<path class="cls-1" d="M30.67,16.11h0a1.82,1.82,0,1,1,0-2.57,1.82,1.82,0,0,1,0,2.57"></path>
								<path class="cls-1" d="M29.22,25.86a1.13,1.13,0,0,1-.8-.33l-6.69-6.68,1.61-1.61,5.88,5.88,5.88-5.88,1.61,1.61L30,25.53a1.13,1.13,0,0,1-.8.33"></path>
								<path class="cls-1" d="M29.22,0,0,29.22,29.22,58.44,58.44,29.22Zm0,3.56L54.88,29.22,29.22,54.88,3.56,29.22Z"></path>
								<polygon class="cls-1" points="39.94 37.37 32.05 29.48 39.94 21.6 42.59 24.25 37.35 29.48 42.59 34.72 39.94 37.37"></polygon>
							</svg>
						</div>
						<h3>Parasoft CTP</h3>
						<p>Manage your test environments and dependencies by orchestrating test execution, virtual
							services, and test data within the CI/CD pipeline.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-selenic/" title="Parasoft Selenic">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							     id="Layer_1" x="0px" y="0px" viewBox="0 0 60.32 56.93"
							     style="enable-background:new 0 0 60.32 56.93;" xml:space="preserve"
							     class="svg replaced-svg">
								<polyline class="st0" points="49,20.4 57.06,28.47 49,36.53 "></polyline>
								<path class="st1" d="M15.27,33.37l2.07-3.05c1.1,1.09,2.78,2.01,4.88,2.01c1.32,0,2.14-0.46,2.14-1.21c0-2.01-8.59-0.34-8.59-6.2  c0-2.55,2.14-4.83,6.04-4.83c2.44,0,4.56,0.73,6.18,2.12l-2.14,2.94c-1.28-1.07-2.94-1.6-4.44-1.6c-1.14,0-1.64,0.39-1.64,1.05  c0,1.87,8.59,0.46,8.59,6.11c0,3.05-2.26,5.08-6.34,5.08C18.94,35.79,16.8,34.81,15.27,33.37"></path>
								<path class="st1 selenic-st1" d="M35.22,27.06c-1.53,0-2.12,0.91-2.26,1.71h4.54C37.41,27.99,36.84,27.06,35.22,27.06 M29.38,30  c0-3.19,2.39-5.77,5.84-5.77c3.26,0,5.63,2.39,5.63,6.13v0.8h-7.84c0.25,0.98,1.16,1.8,2.76,1.8c0.78,0,2.05-0.34,2.69-0.94  l1.53,2.3c-1.09,0.98-2.92,1.46-4.61,1.46C31.98,35.79,29.38,33.58,29.38,30"></path>
								<path class="st2 selenic-st2" d="M45.89,41.07L34.72,52.23c-3.59,3.59-9.47,3.59-13.07,0l-9.25-9.25 M12.41,13.95l9.24-9.24  c3.59-3.59,9.47-3.59,13.07,0l11.11,11.3"></path>
								<path class="st1" d="M4.08,28.68c0,1.13-0.91,2.04-2.04,2.04C0.91,30.72,0,29.81,0,28.68c0-1.13,0.91-2.04,2.04-2.04  C3.17,26.64,4.08,27.56,4.08,28.68"></path>
								<path class="st1" d="M7.88,36.41c0,1.13-0.91,2.04-2.04,2.04c-1.13,0-2.04-0.91-2.04-2.04c0-1.13,0.91-2.04,2.04-2.04  C6.96,34.37,7.88,35.28,7.88,36.41"></path>
								<path class="st1" d="M7.53,20.96c0,1.13-0.91,2.04-2.04,2.04c-1.13,0-2.04-0.91-2.04-2.04c0-1.13,0.91-2.04,2.04-2.04  C6.61,18.92,7.53,19.83,7.53,20.96"></path>
							</svg>
						</div>
						<h3>Parasoft Selenic</h3>
						<p>Correct instabilities during execution of your Selenium tests with self-healing and reduce
							test maintenance with AI-generated recommendations.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-soatest/" title="Parasoft SOAtest">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							     id="Layer_1" x="0px" y="0px" viewBox="0 0 47.51 46.61" xml:space="preserve"
							     class="svg replaced-svg">
								<path class="st0" d="M18.52,4.2c0-2.32,1.88-4.2,4.2-4.2c2.32,0,4.2,1.88,4.2,4.2c0,2.32-1.88,4.2-4.2,4.2  C20.41,8.41,18.52,6.52,18.52,4.2"></path>
								<path class="st0" d="M18.52,42.41c0-2.32,1.88-4.2,4.2-4.2c2.32,0,4.2,1.88,4.2,4.2c0,2.32-1.88,4.2-4.2,4.2  C20.41,46.61,18.52,44.73,18.52,42.41"></path>
								<path class="st0" d="M0,23.3c0-2.32,1.88-4.2,4.2-4.2c2.32,0,4.2,1.88,4.2,4.2c0,2.32-1.88,4.2-4.2,4.2C1.88,27.51,0,25.63,0,23.3"></path>
								<polygon class="st0" points="44.25,34 34.58,24.33 44.25,14.65 47.51,17.91 41.09,24.33 47.51,30.75 "></polygon>
							</svg>
						</div>
						<h3>Parasoft SOAtest</h3>
						<p>Simplify functional API testing and improve software quality using test automation enhanced
							with AI and ML to create and maintain API tests within your CI/CD pipeline.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 products-block-list animation bottom-up onView">
				<a href="/products/parasoft-virtualize/"
				   title="Parasoft Virtualize">
					<div class="products-block-wrap">
						<div class="products-block-logo">
							<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
							     viewBox="0 0 58.44 58.44" class="svg replaced-svg">
								<path class="cls-1" d="M35.1,41l-5.88-5.88L23.34,41l-1.61-1.6,6.69-6.68a1.12,1.12,0,0,1,1.6,0l6.68,6.68Z"></path>
								<path class="cls-1" d="M19,36.61,17.41,35l5.88-5.88-5.88-5.88L19,21.64l6.68,6.68a1.13,1.13,0,0,1,0,1.6Z"></path>
								<path class="cls-1" d="M29.22,25.86a1.13,1.13,0,0,1-.8-.33l-6.69-6.68,1.61-1.61,5.88,5.88,5.88-5.88,1.61,1.61L30,25.53a1.13,1.13,0,0,1-.8.33"></path>
								<path class="cls-1" d="M29.22,0,0,29.22,29.22,58.44,58.44,29.22Zm0,3.56L54.88,29.22,29.22,54.88,3.56,29.22Z"></path>
								<polygon class="cls-1" points="39.94 37.37 32.05 29.48 39.94 21.6 42.59 24.25 37.35 29.48 42.59 34.72 39.94 37.37"></polygon>
							</svg>
						</div>
						<h3>Parasoft Virtualize</h3>
						<p>When access to real data and services is limited, test anything anytime with realistic virtual services that behave just like the real thing.</p>
						<div class="products-block-btn">
							<span title="Product details">Product details</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
