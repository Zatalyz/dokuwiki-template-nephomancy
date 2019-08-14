<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<div id="dokuwiki__header"><div class="pad group">

    <?php tpl_includeFile('header.html') ?>

    <div class="headings group">
        <ul class="a11y skip">
            <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content']; ?></a></li>
        </ul>

        <h1><?php
            // get logo either out of the template images folder or data/media folder
            $logoSize = array();
            $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

            // display logo and wiki title in a link to the home page
            tpl_link(
                wl(),
                '<img src="'.$logo.'" '.$logoSize[3].' alt="'.$conf['title'].'" /> ',
                'accesskey="h" title="[H]"'
            );
        ?></h1>
        <?php if ($conf['tagline']): ?>
            <p class="claim"><?php echo $conf['tagline']; ?></p>
        <?php endif ?>
        
    </div>

	
    <hr class="a11y" />
    
</div>


</div><!-- /header -->
