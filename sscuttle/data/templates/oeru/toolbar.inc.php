<?php
if ($userservice->isLoggedOn() && is_object($currentUser)) {
    $cUserId = $userservice->getCurrentUserId();
    $cUsername = $currentUser->getUsername();
?>

    <ul id="navigation">
    	<li><a title="<?php echo T_('All bookmarks on the site'); ?>" href="<?php echo createURL(''); ?>"><?php echo T_('All'); ?></a></li>    
        <li><a title="<?php echo T_('All of my bookmarks'); ?>" href="<?php echo createURL('bookmarks', $cUsername); ?>"><?php echo T_('Mine'); ?></a></li>
        <li><a title="<?php echo T_('Add a new bookmark'); ?>" href="<?php echo createURL('bookmarks', $cUsername . '?action=add'); ?>"><?php echo T_('Add'); ?></a></li>
        <li class="label">&nbsp;</li>
	      <li><a href="<?php echo createURL('alltags', $cUsername); ?>"><?php echo T_('Tags'); ?></a></li>
        <li><a href="<?php echo createURL('watchlist', $cUsername); ?>"><?php echo T_('Watchlist'); ?></a></li>
	<li><a href="<?php echo $userservice->getProfileUrl($cUserId, $cUsername); ?>"><?php echo T_('Profile'); ?></a></li>
        <li><a href="<?php echo createURL('about'); ?>"><?php echo T_('About'); ?></a></li>
	<?php if($currentUser->isAdmin()): ?>
        <li class="admin"><a href="<?php echo createURL('admin', ''); ?>"><?php echo T_('Admin'); ?></a></li>
	<?php endif; ?>

        <li class="access logout"><?php echo $cUsername?><a href="<?php echo ROOT ?>?action=logout">(<?php echo T_('Log Out'); ?>)</a></li>
    </ul>

<?php
} else {
?>
    <ul id="navigation">
    	  <li><a title="<?php echo T_('All bookmarks on the site'); ?>" href="<?php echo createURL(''); ?>"><?php echo T_('All Bookmarks'); ?></a></li>    
	      <li><a href="<?php echo createURL('populartags'); ?>"><?php echo T_('Popular Tags'); ?></a></li>
        <li><a href="<?php echo createURL('about'); ?>"><?php echo T_('About'); ?></a></li>
        <li class="access login"><a href="<?php echo createURL('login'); ?>"><?php echo T_('Log In'); ?></a></li>
        <?php if ($GLOBALS['enableRegistration']) { ?>
        <li class="access register"><a href="<?php echo createURL('register'); ?>"><?php echo T_('Register'); ?></a></li>
        <?php } ?>
    </ul>
<?php
}
?>
