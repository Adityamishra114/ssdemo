<?php
$wp_info = [
    'WordPress_version' => get_bloginfo('version'),
    'WordPress_language' => get_bloginfo('language'),
    'WordPress_theme' => [
        'Name' => wp_get_theme()->Name,
        'Author' => wp_get_theme()->Author,
        'Version' => wp_get_theme()->Version,
    ],
    'Site_url' => get_site_url(), // Menambahkan URL situs
    'Max_upload_size' =>wp_max_upload_size(), // Menambahkan ukuran maksimum unggahan
    'Permalink_structure' => get_option('permalink_structure'), // Menambahkan struktur permalink
    'Time_zone' => get_option('timezone_string'), // Menambahkan zona waktu
    'WP_multisite' => (is_multisite()) ? 'Yes' : 'No', // Menambahkan info apakah WordPress berjalan dalam mode multisite atau tidak
    'Active_plugins' => get_option('active_plugins'),
    // Informasi tambahan yang mungkin Anda perlukan
];

$php_info = [
    'PHP_version' => phpversion(),
    'PHP_OS' => PHP_OS,
    'PHP_memory_limit' => ini_get('memory_limit'),
    'PHP_max_execution_time' => ini_get('max_execution_time'),
    'server_software' => $_SERVER['SERVER_SOFTWARE'],
    'max_input_vars' => ini_get('max_input_vars'),
    'post_max_size' =>  ini_get('post_max_size')
];

global $wpdb;

// Query SQL untuk mendapatkan informasi versi MySQL
$query = "SELECT version() as version, @@version_comment as comment";
$mysql_info = $wpdb->get_results($query, ARRAY_A);

$mysql_version = $wpdb->db_version();

$mysql_comment_v = $mysql_info[0]['comment'];

require_once(RomeTheme::plugin_dir() . 'view/header.php');

?>

<div class="pe-3" style="font-size: 14px;">
    <div class="d-flex flex-column gap-3">
        <table class="table table-borderless bg-white border-1">
            <thead>
                <tr class=" border-bottom">
                    <th>Server Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Operating System</th>
                    <td class="description"><?php echo esc_html($php_info['PHP_OS']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Software</th>
                    <td class="description"><?php echo esc_html($php_info['server_software']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">MySQL Version</th>
                    <td class="description"><?php echo esc_html($mysql_comment_v . ' v.' . $mysql_version) ?></td>
                    <td><i class="<?php 
                    if(strpos(strtolower($mysql_comment_v) , 'mysql') !== false) {
                        echo (version_compare($mysql_version, '5.6.0') != -1) ? 'rtm-checked-icon' : 'rtm-invalid-icon';
                    } else if(strpos(strtolower($mysql_comment_v) , 'mariadb') !== false) {
                        echo (version_compare($mysql_version, '10.0.0') != -1) ? 'rtm-checked-icon' : 'rtm-invalid-icon';

                    }
                    
                    ?>"></i></td>
                </tr>
                <tr>
                    <th scope="row">PHP Version</th>
                    <td class="description"><?php echo esc_html($php_info['PHP_version']) ?></td>
                    <td><i class="<?php echo (version_compare($php_info['PHP_version'], '7.3.0') != -1) ? 'rtm-checked-icon' : 'rtm-invalid-icon' ?>"></i></td>
                </tr>
                <tr>
                    <th scope="row">PHP Memory Limit</th>
                    <td class="description"><?php echo esc_html($php_info['PHP_memory_limit']) ?></td>
                    <td><i class="<?php echo (intval($php_info['PHP_memory_limit']) >= 256) ?  'rtm-checked-icon' : 'rtm-invalid-icon'  ?>"></i></td>
                </tr>
                <tr>
                    <th scope="row">PHP Max Input Vars</th>
                    <td class="description"><?php echo esc_html($php_info['max_input_vars']) ?></td>
                    <td><i class="<?php echo (intval($php_info['max_input_vars']) >= 1000) ?  'rtm-checked-icon' : 'rtm-invalid-icon'  ?>"></i></td>
                </tr>
                <tr>
                    <th scope="row">PHP Max Post Size</th>
                    <td class="description"><?php echo esc_html($php_info['post_max_size']) ?></td>
                    <td><i class="<?php echo (intval($php_info['post_max_size']) >= 40) ?  'rtm-checked-icon' : 'rtm-invalid-icon'  ?>"></i></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless bg-white border-1">
            <thead>
                <tr class=" border-bottom">
                    <th>Wordpress Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">WordPress Version</th>
                    <td class="description"><?php echo esc_html($wp_info['WordPress_version']) ?></td>
                    <td><i class="<?php echo (version_compare($wp_info['WordPress_version'], '6.0.0') != -1) ? 'rtm-checked-icon' : 'rtm-invalid-icon' ?>"></i></td>
                </tr>
                <tr>
                    <th scope="row">Site URL</th>
                    <td class="description"><?php echo esc_html($wp_info['Site_url']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Language</th>
                    <td class="description"><?php echo esc_html($wp_info['WordPress_language']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Max Upload Size</th>
                    <td><?php echo esc_html(size_format($wp_info['Max_upload_size'])) ?></td>
                    <td><i class="<?php echo (($wp_info['Max_upload_size'] / (1024 * 1024) ) >= 40) ?  'rtm-checked-icon' : 'rtm-invalid-icon'  ?>"></i></td>
                </tr>
                <tr>
                    <th scope="row">Permalink Structure</th>
                    <td class="description"><?php echo esc_html($wp_info['Permalink_structure']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Time Zone</th>
                    <td class="description"><?php echo esc_html($wp_info['Time_zone']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">WP Multisite</th>
                    <td class="description"><?php echo esc_html($wp_info['WP_multisite']) ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    .table>tbody th {
        width: 25rem;
        font-weight: 400;
    }

    .table>tbody td.description {
        width: 50rem;
    }
</style>