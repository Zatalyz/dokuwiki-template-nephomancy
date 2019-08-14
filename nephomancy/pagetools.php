<div class="dokuwiki__pagetoolsnephomancy">
	<!-- If small screen (tablet, smartphone -->
		<div class="mobileTools">
		<?php tpl_actiondropdown($lang['tools']); ?>
		</div>	
<!-- Tools group : connexion, various tools -->
    <div class="tools group">
    <div class="toolsnephomancy">
        <!-- USER TOOLS -->
        <?php if ($conf['useacl']): ?>
            <div id="dokuwiki__usertools">
                <h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
                <ul>
                    <?php
                        
                        tpl_toolsevent('usertools', array(
                            tpl_action('admin', true, 'li', true),
                            tpl_action('profile', true, 'li', true),
                            tpl_action('register', true, 'li', true),
                            tpl_action('login', true, 'li', true)
                        ));
			if (!empty($_SERVER['REMOTE_USER'])) {
                            echo '<li class="user">';
                            tpl_userinfo(); /* 'Logged in as ...' */
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- SITE TOOLS -->
        <div id="dokuwiki__sitetools">
            <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>
            <ul>
                <?php
                    tpl_toolsevent('sitetools', array(
                        tpl_action('recent', true, 'li', true),
                        tpl_action('media', true, 'li', true),
                        tpl_action('index', true, 'li', true)
                    ));
                ?>
            </ul>
        </div>
    </div>
    </div>
</div>
