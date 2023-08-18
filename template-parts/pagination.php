<?php

$currentPage = get_query_var('paged');

?>

<div class="pagination animated">
	<?php if($url = get_previous_posts_page_link() && $currentPage > 1): ?>
		<a href="<?php echo previous_posts(); ?>">
			<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="14px" width="14px" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"></path></g></svg>
			Previous
		</a>
	<?php else: ?>
		<a></a>
	<?php endif; ?>
	<?php if($url = get_next_posts_page_link() && $currentPage < $wp_query->max_num_pages && $wp_query->max_num_pages > 1): ?>
		<a href="<?php echo next_posts(); ?>">
			Next
			<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="14px" width="14px" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></g></svg>
		</a>
	<?php else: ?>
		<a></a>
	<?php endif; ?>
</div>