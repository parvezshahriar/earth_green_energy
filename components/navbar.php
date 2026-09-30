<?php
/**
 * Navbar Component - Renders DRY navigation links for desktop or mobile layout
 */
$current_page = isset($active_page) ? $active_page : 'home';
$is_mobile = isset($is_mobile_menu) && $is_mobile_menu;
?>
<?php if (!$is_mobile): ?>
  <!-- Desktop Navigation Links -->
  <nav class="hidden lg:flex items-center gap-1 xl:gap-space-lg">
    <?php foreach ($nav_menu as $key => $item): ?>
      <a class="<?php echo get_nav_link_class($item['page_key'], $current_page); ?>" 
         data-page="<?php echo htmlspecialchars($item['page_key']); ?>" 
         href="<?php echo htmlspecialchars($item['url']); ?>"
         <?php echo is_active_page($item['page_key'], $current_page) ? 'aria-current="page"' : ''; ?>>
        <?php echo htmlspecialchars($item['title']); ?>
      </a>
    <?php endforeach; ?>
  </nav>
<?php else: ?>
  <!-- Mobile Drawer Links -->
  <?php foreach ($nav_menu as $key => $item): ?>
    <a class="<?php echo get_mobile_nav_link_class($item['page_key'], $current_page); ?>" 
       data-page="<?php echo htmlspecialchars($item['page_key']); ?>" 
       href="<?php echo htmlspecialchars($item['url']); ?>"
       <?php echo is_active_page($item['page_key'], $current_page) ? 'aria-current="page"' : ''; ?>>
      <?php echo htmlspecialchars($item['title']); ?>
    </a>
  <?php endforeach; ?>
<?php endif; ?>
