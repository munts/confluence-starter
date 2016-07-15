<ul>
	<li>
		<h2>Posts</h2>
			<ul>
				<?php
				$myposts = get_posts('numberposts=-1');
				foreach($myposts as $post) :
					?>
					<li class="sitemap"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php //endwhile; ?>
	</li>

	<li>
		<h2>Pages</h2>
			<ul>
				<?php
				$myposts = get_posts('numberposts=-1&post_type=page');
				foreach($myposts as $post) :
					?>
					<li class="sitemap"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>
			</ul>
	</li>

	<li>
		<h2>Rooms</h2>
			<ul>
				<?php
				$myposts = get_posts('numberposts=-1&post_type=rooms');
				foreach($myposts as $post) :
					?>
					<li class="sitemap"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>
			</ul>
	</li>
</ul>