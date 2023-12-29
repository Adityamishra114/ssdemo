<?php

require RomeTheme::plugin_dir() . 'view/header.php';

$options = get_option('rkit-widget-options');

$headeroptions = array_filter($options, function ($value) {
    return $value['category'] === 'header';
});
$rkitoptions = array_filter($options, function ($value) {
    return $value['category'] === 'rkit';
});
?>

<div class="container mt-5 m-0 font-montserrat">
    <form id="widgets_option">
        <input type="text" name="action" value="save_options" hidden>
        <div class="d-flex flex-row justify-content-between mb-3">
            <div class="d-flex gap-2">
                <button class="btn btn-secondary rounded-0 px-5 py-3" id="disable-all">Disable All</button>
                <button class="btn btn-accent rounded-0 px-5 py-3" id="enable-all">Enable All</button>
            </div>
            <div>
                <button class="btn btn-accent rounded-0 px-5 py-3" id="save-widget-options">Save Changes</button>
            </div>
        </div>
        <div class="mt-4">
            <div class="d-flex w-100 border-bottom py-3 mb-4">
                <h5>Header & Footer</h5>
            </div>
            <div class="row row-cols-4 ms-3">
                <?php foreach ($headeroptions as $h_opt => $value) : ?>
                    <div class="col p-0">
                        <div class="d-flex justify-content-between py-2 w-100 ">
                            <div class="w-100">
                                <span><?php echo esc_html($value['name']) ?></span>
                            </div>
                            <div class="w-100">
                                <input name="<?php echo esc_attr($h_opt) ?>" value="false" hidden>
                                <label class="switch">
                                    <input name="<?php echo esc_attr($h_opt) ?>" id="switch" type="checkbox" value="true" <?php echo ($value['status']) ? 'checked' : ''  ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mt-4">
            <div class="d-flex w-100 border-bottom py-3 mb-4">
                <h5>General</h5>
            </div>
            <div class="row row-cols-4 ms-3">
                <?php foreach ($rkitoptions as $h_opt => $value) : ?>
                    <div class="col p-0 m-0">
                        <div class="d-flex justify-content-between py-2 w-100 ">
                            <div class="w-100">
                                <span><?php echo esc_html($value['name']) ?></span>
                            </div>
                            <div class="w-100">
                                <input name="<?php echo esc_attr($h_opt) ?>" value="false" hidden>
                                <label class="switch">
                                    <input name="<?php echo esc_attr($h_opt) ?>" id="switch" type="checkbox" value="true" <?php echo ($value['status']) ? 'checked' : ''  ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</div>