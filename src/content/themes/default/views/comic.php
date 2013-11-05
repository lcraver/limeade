<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed'); ?>

	<div class="comic info">
		<?php if ($comic->get_thumb()): ?>
			<div class="thumbnail">
				<img src="<?php echo $comic->get_thumb(); ?>" />
			</div>
		<?php endif; ?>

        <div class="large comic">
            <h1 class="title">
                <?php echo $comic->name; ?>
            </h1>
            <div class="info">
                    <?php if ($comic->author) : ?><?php echo '<b>'._('Author').'</b>: '.$comic->author; ?><br><?php endif; ?>
                    <?php if ($comic->artist) : ?><?php echo '<b>'._('Artist').'</b>: '.$comic->artist; ?><br><?php endif; ?>
                    <?php echo '<b>'._('Synopsis').'</b>: '.$comic->description; ?>
            </div>
        </div>
	</div>

	<div class="list">
		<div class="title"></div>
		<?php
		$current_volume = "";
		$opendiv = false;

		foreach ($chapters as $key => $chapter)
		{
			if ($current_volume != $chapter->volume)
			{
				if ($opendiv === true)
				{
					echo '</div>';
				}

                $current_volume = $chapter->volume;
			    $opendiv = true;

				echo '<div class="group">';
				if ($current_volume > 0) {
					echo $chapter->download_volume_url(NULL, 'fright small').'<div class="title">'._('Volume').' '.str_pad($current_volume, 2, '0', STR_PAD_LEFT).'</div>';
				} else {
					echo '<div class="title">'._('Chapters').'</div>';
				}
			}

			echo '<div class="element">'.$chapter->download_url(NULL, 'fleft small').'
					<div class="title">' . $chapter->url($chapter->title(false)) . '</div>
					<div class="meta_r">' . _('by') . ' ' . $chapter->team_url() . ', ' . $chapter->date() . ' ' . $chapter->edit_url() . '</div>
				</div>';
		}

		echo '</div>';
		?>
	</div>
