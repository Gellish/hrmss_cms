<?php $system = $this->Xin_model->read_setting_info(1);?>
<footer class="footer">
    <div class="container-fluid">
        <?php if($system[0]->enable_current_year=='yes'):?><?php echo date('Y');?><?php endif;?> © <?php echo $system[0]->footer_text;?>
        <?php if($system[0]->enable_page_rendered=='yes'):?> - 
        Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        <?php endif; ?>
    </div>
</footer>