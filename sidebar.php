<div class="sidebar-content">
					<div class="sidebar-search">
						<h4>Search</h4>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Search") ) : ?>
						<div class="search-box">
		            	<input type="text" name="search" class="search-left" value="Enter search keyword..." onblur="if (this.value == '') {this.value = 'Enter search keyword...';}" onfocus="if (this.value == 'Enter search keyword...') {this.value = '';}" />
		            	<input type="submit" title="Search" class="search-submit" value="Search" />
		        		</div>
		        		<?php endif; ?>
					</div><!--end .sidebar-search-->
					
					<div class="sidebar-cats">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Categories") ) : ?>
						<h4>Categories</h4>
						<ul>
							<li><a href="#">Lorem ipsum dolor sit</a></li>
							<li><a href="#">Suspendisse</a></li>
							<li><a href="#">Phasellus</a></li>
							<li><a href="#">Aenean diam</a></li>
							<li><a href="#">Nullam eleifend</a></li>
							<li><a href="#">Vivamus</a></li>
							<li><a href="#">Curabitur volutpat</a></li>
							<li><a href="#">Vestibulum</a></li>
							<li><a href="#">Aenean</a></li>
							<li><a href="#">Duis lorem sem</a></li>
						</ul>
						<?php endif; ?>
					</div><!--end .sidebar-cats-->
					
					<div class="tag-cloud">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Tags') ) : ?>
						<h4>Tag Cloud</h4>
						<a href="#" title="3 topics" class="tag-size-11">Advertising</a>
						<a href="#" title="10 topics" class="tag-size-16">Affiliate</a>
						<a href="#" title="8 topics" class="tag-size-20">AJAX</a>
						<a href="#" title="5 topics" class="tag-size-12">API</a>
						<a href="#" title="1 topics" class="tag-size-11">Backlinks</a>
						<a href="#" title="4 topics" class="tag-size-20">Blog</a>
						<a href="#" title="14 topics" class="tag-size-20">Business</a>
						<a href="#" title="2 topics" class="tag-size-11">CMS Systems</a>
						<a href="#" title="3 topics" class="tag-size-14">Competition</a>
						<a href="#" title="1 topics" class="tag-size-11">Contextual Advertising</a>
						<a href="#" title="6 topics" class="tag-size-19">CSS</a>
						<a href="#" title="10 topics" class="tag-size-13">Design</a>
						<a href="#" title="4 topics" class="tag-size-20">Facebook</a>
						<a href="#" title="12 topics" class="tag-size-18">Firefox</a>
						<a href="#" title="8 topics" class="tag-size-16">Flickr</a>
						<a href="#" title="7 topics" class="tag-size-15">Galleries</a>
						<a href="#" title="2 topics" class="tag-size-11">Google</a>
						<a href="#" title="4 topics" class="tag-size-20">Javascript</a>
						<a href="#" title="4 topics" class="tag-size-13">Jobs</a>
						<a href="#" title="1 topics" class="tag-size-11">Location Based Services</a>
						<a href="#" title="3 topics" class="tag-size-11">Link Popularity</a>
						<a href="#" title="5 topics" class="tag-size-13">Marketing</a>
						<a href="#" title="2 topics" class="tag-size-11">Multimedia</a>
						<a href="#" title="7 topics" class="tag-size-16">Offers</a>
						<a href="#" title="4 topics" class="tag-size-13">Permalinks</a>
						<a href="#" title="1 topics" class="tag-size-20">PHP</a>
						<a href="#" title="5 topics" class="tag-size-14">Podcasting</a>
						<a href="#" title="4 topics" class="tag-size-13">Portfolio</a>
						<a href="#" title="2 topics" class="tag-size-11">RSS Feeds</a>
						<a href="#" title="6 topics" class="tag-size-18">Ruby on Rails</a>
						<a href="#" title="12 topics" class="tag-size-19">Search</a>
						<a href="#" title="4 topics" class="tag-size-19">SEO</a>
						<a href="#" title="5 topics" class="tag-size-12">Showcase</a>
						<a href="#" title="4 topics" class="tag-size-14">Social Bookmarking</a>
						<a href="#" title="4 topics" class="tag-size-12">Social Networking</a>
						<a href="#" title="2 topics" class="tag-size-11">Tagging</a>
						<a href="#" title="3 topics" class="tag-size-20">Templates</a>
						<a href="#" title="4 topics" class="tag-size-12">Themeforest</a>
						<a href="#" title="10 topics" class="tag-size-16">Tumblr</a>
						<a href="#" title="4 topics" class="tag-size-12">Twitter</a>
						<a href="#" title="7 topics" class="tag-size-15">Upgrades</a>
						<a href="#" title="9 topics" class="tag-size-16">Vimeo</a>
						<a href="#" title="4 topics" class="tag-size-11">Viral Marketing</a>
						<a href="#" title="4 topics" class="tag-size-14">Web 2.0</a>
						<a href="#" title="2 topics" class="tag-size-11">Web Standards</a>
						<a href="#" title="12 topics" class="tag-size-19">Websites</a>
						<a href="#" title="4 topics" class="tag-size-11">Wiki</a>
						<a href="#" title="11 topics" class="tag-size-17">Wordpress</a>
						<a href="#" title="3 topics" class="tag-size-11">XML</a>
						<a href="#" title="1 topics" class="tag-size-18">Youtube</a>
						<?php endif; ?>
					</div><!--end .tag-cloud-->
				</div><!--end .sidebar-content-->