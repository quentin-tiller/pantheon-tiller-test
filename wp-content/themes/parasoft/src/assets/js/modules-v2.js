jQuery(document).ready(function($) {

	//HOME HERO BANNER CAROUSEL

	$('.inner-banner.alt-home.alt-v2 .carousel').flickity({
        // options
        wrapAround: true,
        cellAlign: 'center',
        pageDots: false,
        prevNextButtons: false,
        draggable: false,
        fade: true,
        autoPlay: 5000
    });



	//SUBPAGES BLOCK

	$('.subpages-block-v2 .parent-col li:nth-child(1) span').addClass('clicked');

	$('.subpages-block-v2 .parent-col li:nth-child(1) span').click(function(){
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(1)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(1)').css('transform', 'translateX(0)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(1)').css('height', '100%');
	});

	$('.subpages-block-v2 .parent-col li:nth-child(2) span').click(function(){
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(2)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(2)').css('transform', 'translateX(0)');
	});

	$('.subpages-block-v2 .parent-col li:nth-child(3) span').click(function(){
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(3)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(3)').css('transform', 'translateX(0)');
	});

	$('.subpages-block-v2 .parent-col li:nth-child(4) span').click(function(){
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(4)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(4)').css('transform', 'translateX(0)');
	});



	//INDUSTRIES BLOCK

	$('.industries-slider .category-0').addClass('clicked');

    $('.industries-slider .category-0').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(1)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(1)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-1').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(2)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(2)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-2').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(3)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(3)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-3').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(4)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(4)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-4').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(5)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(5)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-5').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(6)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(6)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-6').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(7)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(7)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-7').click(function(){
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(8)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(8)').css('transform', 'translateX(0)');
	});



	//PRODUCTS HOME BLOCK

	$('.products-home .product-nav:first-child .product-nav-container').addClass('clicked');

	$('.products-home .product-nav:nth-child(1)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(1)').css('opacity', '1');
		$('.products-home .product-container:nth-child(1)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(2)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(2)').css('opacity', '1');
		$('.products-home .product-container:nth-child(2)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(3)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(3)').css('opacity', '1');
		$('.products-home .product-container:nth-child(3)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(4)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(4)').css('opacity', '1');
		$('.products-home .product-container:nth-child(4)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(5)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(5)').css('opacity', '1');
		$('.products-home .product-container:nth-child(5)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(6)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(6)').css('opacity', '1');
		$('.products-home .product-container:nth-child(6)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(7)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(7)').css('opacity', '1');
		$('.products-home .product-container:nth-child(7)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(8)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(8)').css('opacity', '1');
		$('.products-home .product-container:nth-child(8)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(9)').click(function(){
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(9)').css('opacity', '1');
		$('.products-home .product-container:nth-child(9)').css('transform', 'translateX(0)');
	});



});