<?php
$six_months = date( 'M d, Y', mktime( 0, 0, 0, date( 'm' ) + 6, date( 'd' ), date( 'Y' ) ) );
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

<h3>Order Summary</h3>
<table class="table table-responsive table-bordered table-dark">
	<tr>
		<td>Parasoft SOAtest/Virtualize Desktop (6-month License)</td>
		<td>x 1</td>
		<td>$0.00</td>
	</tr>
	<tr>
		<td colspan='2'></td>
		<td class='r'>Total: $0.00</td>
	</tr>
	<tr>
		<td colspan='3'>Available on <?php echo $six_months; ?>.</td>
	</tr>
	<tr>
		<td>Parasoft SOAtest/Virtualize Desktop (Annual Subscription)</td>
		<td>x 1</td>
		<td>$1250.00</td>
	</tr>
	<tr>
		<td>Visual Studio Enterprise Subscriber Discount (25%)</td>
		<td>x 1</td>
		<td>-$312.50</td>
	</tr>
	<tr>
		<td colspan='2'></td>
		<td>Total: $937.50</td>
	</tr>
</table>
