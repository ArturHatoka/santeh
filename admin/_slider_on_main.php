
<section class="main__slider">
    <?
			$slides = mysql_query("SELECT * FROM ".MySQLprefix."_slides ORDER BY id");
			if($slides && mysql_num_rows($slides)>0)
				while($slide = mysql_fetch_assoc($slides)){
					?>
                        <div class="main__slide">
                            <img src="<?=$slide['logo']?>" alt="">
                        </div>
					<?php
				}
			?>
</section>


