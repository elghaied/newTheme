</div> <!-- /#content -->
<footer>


<div class="third">
<?php if(is_active_sidebar('footer-sidebar-1')):?>
   <?php dynamic_sidebar('footer-sidebar-1');?>
<?php endif;?>
</div>

<div class="third">
<?php if(is_active_sidebar('footer-sidebar-2')):?>
   <?php dynamic_sidebar('footer-sidebar-2');?>
<?php endif;?>
</div>

<div class="third">
<?php if(is_active_sidebar('footer-sidebar-3')):?>
   <?php dynamic_sidebar('footer-sidebar-3');?>
<?php endif;?>
</div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>
