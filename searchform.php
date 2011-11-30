<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<input type="text" name="s" id="s" class="search-left" value="Enter search keyword..." 
	onblur="if (this.value == '') {this.value = 'Enter search keyword...';}" 
	onfocus="if (this.value == 'Enter search keyword...') {this.value = '';}" />
	<input type="submit" title="Search" class="search-submit" value="Search" />
</form>