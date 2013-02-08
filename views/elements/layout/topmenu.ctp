<?php /* SVN FILE: $Id$ */ 
	$admin = Configure::read('Routing.admin');
//	debug($this->name);
?>
<div id="topmenu_container">
	<div id="topmenu">
	<?php if ($this->name !== 'Home') :?>
	<span class="topmenu"><?php echo $html->link('Home','/');?></span>
	<?php elseif ($this->name !== 'Partners') : ?>
	<span class="topmenu"><?php echo $html->link('Partners', '/partners');?></span>
	<?php endif; ?>
	</div>
</div>

<?php if(isset($auser['User'])) : ?>
<div id="usermenu_container">
	<div id="usermenu">
	<?php if($auser['User']['admin']) : ?>
	<span class="topmenu"><?php echo $html->link('Slides Admin',array('controller' => 'presentations', 'prefix' => $admin, $admin => true, 'action' => 'index', 'plugin' => null)); ?></span>
	<span class="topmenu"><?php echo $html->link('Retro Admin',array('controller' => 'retro', 'prefix' => $admin, $admin => true, 'action' => 'index', 'plugin' => null)); ?></span>
	<?php endif ?>
	<span class="topmenu"><?php echo $html->link('Manage OpenID', array($admin => false, 'plugin' => 'openid', 'controller' => 'openid_users', 'action' => 'view')); ?></span>
<?php if ($auser['User']['account_type'] == 'local') :?>
	<span class="topmenu"><?php echo $html->link('OpenID Identity', array($admin => false, 'plugin' => 'openid', 'controller' => 'servers', 'action' => 'identity', $auser['User']['slug'])); ?></span>
<?php endif; ?>
	<?php //echo '<span class="topmenu">' . $html->link('Blogs', array($admin => false, 'plugin' => 'blogs', 'controller' => 'entries', 'action' => 'index')) . '</span>' . "\n"; ?>
	<span class="topmenu"><?php echo $html->link('Logout', array($admin => false, 'plugin' => null, 'controller' => 'users', 'action' => 'logout')) ;?></span>
	</div>
</div>
<?php endif; ?>
