<div class="wrap">
    
    <h2>
        <?php echo $SW_CONFIG_PAGE_TITLE; ?>
    </h2>
        
    <form name="smartwaiver_config_form" method="post" action="options.php">
        <?php settings_fields($SW_SETTINGS); ?>
        <?php $sw_settings = get_option($SW_SETTINGS_FIELD); ?>
        
        <h3 class="title">Paste Smartwaiver Javascript</h3>
        
        <p>
            Use the form at
            <a href="<?php echo $SW_BUILD_SNIPPET_LINK; ?>">this link</a>
            to create and update your customized Smartwaiver widget, then
            paste the resulting javascript snippet into this form.
        </p>
        
        <textarea name="<?php echo $SW_SETTINGS."[".$SW_SNIPPET."]"; ?>" rows="4" class="large-text code"><?php echo esc_textarea($sw_settings[$SW_SNIPPET]); ?></textarea>
        
        <p class="submit">
            <input type="submit" name="submit" value="Update Waiver" class="button button-primary" />
        </p>
    </form>  
</div>  