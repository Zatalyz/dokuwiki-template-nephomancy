<?php
/**
 * North DokuWiki Template 2017
 *
 * @link     http://dokuwiki.org/template
 * @author   Zatalyz <zatalyz@liev.re>
 * @author   Anika Henke <anika@selfthinker.org>
 * @author   Clarence Lee <clarencedglee@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
header('X-UA-Compatible: IE=edge,chrome=1');

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');
?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>

<body>
    <div id="dokuwiki__site"><div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?> <?php
        echo ($showSidebar) ? 'showSidebar' : ''; ?> <?php echo ($hasSidebar) ? 'hasSidebar' : ''; ?>">

        <?php include('tpl_header.php') ?>

        <div class="wrapper group">

			<!-- ********** ASIDE ********** -->
			<div class="sidenephomancy aside">
            <?php if($showSidebar): ?>
                
                <div id="dokuwiki__aside"><div class="pad include group">
                    <h3 class="toggle"><?php echo $lang['sidebar'] ?></h3>
                    <div class="content"><div class="group">
                        <?php tpl_flush() ?>
                        <?php tpl_includeFile('sidebarheader.html') ?>
                        <?php tpl_include_page($conf['sidebar'], true, true) ?>
                        <?php tpl_includeFile('sidebarfooter.html') ?>
                    </div></div>
                </div></div>
            <?php endif; ?>
            
                <!-- ********** Breadcrumb, search ********** -->
			<div class="dokuwiki__sidetools">
				<div class="breadsearch">
					<?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
					<div class="bread_here">
						<?php if($conf['youarehere']): ?>
						<div ><?php tpl_youarehere() ?></div>
						<?php endif ?>
						<?php if($conf['breadcrumbs']): ?>
						<div ><?php tpl_breadcrumbs() ?></div>
						<?php endif ?>
					</div>
					<?php endif ?>
				<!-- Search&Language -->
					<div class="">
						<?php tpl_searchform(); ?> 
						<!-- Lang (only with Translation Plugin  -->
						<?php
						$translation = plugin_load('helper','translation');
						if ($translation) echo $translation->showTranslations();
						?>
					</div>
					
				</div>
			</div>
			<!-- Fin breadcrumb etc -->
            
            <!-- /aside -->
			
			</div>
            <!-- ********** CONTENT ********** -->
            
				<div class="pad group">
                <?php html_msgarea() ?>

					<div class="page group">
                    <?php tpl_flush() ?>                   
                    <?php tpl_includeFile('pageheader.html') ?>
                    <!-- wikipage start -->
                    <div class="textarticle">
                    <?php tpl_content() ?>
                    </div>
                    <!-- wikipage stop -->
                    <?php tpl_includeFile('pagefooter.html') ?>
					</div>

					<div class="docInfo"><?php tpl_pageinfo() ?></div>
                <?php tpl_flush() ?>
				</div>
			<!-- /content -->

            <hr class="a11y" />

            <!-- PAGE ACTIONS -->
            <div id="dokuwiki__pagetools">
                <h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>
                <div class="tools">
                    <ul>
                        <?php
                            $data = array(
                                'view'  => 'main',
                                'items' => array(
                                    'edit'      => tpl_action('edit',      true, 'li', true, '<span>', '</span>'),
                                    'revert'    => tpl_action('revert',    true, 'li', true, '<span>', '</span>'),
                                    'revisions' => tpl_action('revisions', true, 'li', true, '<span>', '</span>'),
                                    'backlink'  => tpl_action('backlink',  true, 'li', true, '<span>', '</span>'),
                                    'subscribe' => tpl_action('subscribe', true, 'li', true, '<span>', '</span>'),
                                    'top'       => tpl_action('top',       true, 'li', true, '<span>', '</span>')
                                )
                            );

                            // the page tools can be amended through a custom plugin hook
                            $evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
                            if($evt->advise_before()){
                                foreach($evt->data['items'] as $k => $html) echo $html;
                            }
                            $evt->advise_after();
                            unset($data);
                            unset($evt);
                        ?>
                    </ul>
                </div>
            </div>
            
        
        </div><!-- /wrapper -->
		<div class="nephomancyfooter">
		<?php include('pagetools.php') ?>
        <?php include('tpl_footer.php') ?>
        </div>
    </div></div><!-- /site -->

    <div class="no" style="display:none;"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
    

</body>
</html>
