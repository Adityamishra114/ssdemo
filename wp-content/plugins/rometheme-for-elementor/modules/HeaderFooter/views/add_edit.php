<?php

$paged = isset($_GET['paged']) ? sanitize_text_field(intval($_GET['paged'])) : 1;

$tabs = (!isset($_GET['tabs'])) ? 'all' : $_GET['tabs'];

$args  = [
    'post_type' => 'rometheme_template',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
];

if ($tabs != 'all') {
    if ($_GET['tabs'] == 'trash') {
        $args['post_status'] = 'trash';
    } else {
        $args['meta_query'] = ['meta_value' => [
            'key' => 'rometheme_template_type',
            'value' => sanitize_text_field($_GET['tabs']),
            'compare' => '='
        ]];
    }
}

$post_type = new WP_Query($args);

?>


<div class="w-100 p-3">
    <div class="mb-4" align="center">
        <h2>Create Header & Footer Template</h2>
        <div class="mb-4" style="max-width: 35rem ;">
            <span class="text-wrap">Add header & footer template to use them across your website.</span>
        </div>
        <button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#ModalAddNew"><?php esc_html_e('Add New', 'rometheme-for-elementor') ?></button>
    </div>
    <div class="w-100">
        <div class="d-flex flex-row justify-content-between">
            <div class="nav nav-tabs">
                <a type="button" href="<?php echo esc_url(admin_url('admin.php?page=header-footer&tabs=all')) ?>" class="nav-link <?php echo ($tabs === 'all') ? 'active' : '' ?>">All</a>
                <a type="button" href="<?php echo esc_url(admin_url('admin.php?page=header-footer&tabs=header')) ?>" class="nav-link <?php echo ($tabs === 'header') ? 'active' : '' ?>">Header</a>
                <a type="button" href="<?php echo esc_url(admin_url('admin.php?page=header-footer&tabs=footer')) ?>" class="nav-link <?php echo ($tabs === 'footer') ? 'active' : '' ?>">Footer</a>
                <a type="button" href="<?php echo esc_url(admin_url('admin.php?page=header-footer&tabs=trash')) ?>" class="nav-link <?php echo ($tabs === 'trash') ? 'active' : '' ?>">Trash</a>
            </div>
            <div class="d-flex justify-content-end">
                <?php
                $total_pages = $post_type->max_num_pages;
                $current_url = add_query_arg(array()); // get the current URL
                $base_url = remove_query_arg('paged', $current_url);
                if ($total_pages > 1) {
                    $current_page = max(1, intval(sanitize_text_field($_GET['paged'])));
                    echo '<div class="posts-pagination">';
                    echo paginate_links(array(
                        'base' => $base_url . '&paged=%#%',
                        'format' => '&paged=%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                 <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
               </svg> Previous',
                        'next_text' => 'Next <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                 <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
               </svg>',
                    ));
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <table class="table shadow table-sm">
            <thead class="bg-white">
                <tr>
                    <td class="text-center" scope="col">No</td>
                    <td scope="col">Title</td>
                    <td scope="col">Author</td>
                    <td scope="col">Type</td>
                    <td scope="col">Date</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                if ($post_type->have_posts()) {
                    while ($post_type->have_posts()) {
                        $index = $index + 1;
                        $post_type->the_post();
                        $id_post =  intval(get_the_ID());
                        $type = get_post_meta($id_post, 'rometheme_template_type', true);
                        $active = get_post_meta($id_post, 'rometheme_template_active', true);
                        $delete = get_delete_post_link($id_post, '', false);
                        $edit_link = get_edit_post_link($id_post, 'display');
                        $edit_elementor = str_replace('action=edit', 'action=elementor', $edit_link);
                        $status = (get_post_status($id_post) == 'publish') ? 'Published' : 'Draft';
                        echo '<tr>';
                        echo '<td class="text-center">' . esc_html__($index) . '</td>';
                        echo '<td><div>' . esc_html(get_the_title());
                        if ($tabs == 'trash') {
                            echo '<span class="badge rounded-pill mx-3 text-bg-secondary">Trash</span>';
                        } else {
                            echo ($active == 'true') ? '<span class="badge rounded-pill text-bg-success mx-3">Active</span>' : '<span class="badge rounded-pill mx-3 text-bg-secondary">Inactive</span>';
                        }
                        echo '</div>';
                        if ($tabs == 'trash') {
                            require_once(RomeTheme::module_dir() . 'HeaderFooter/HeaderFooter.php');
                            $restore_url = \Rometheme\HeaderFooter\HeaderFooter::get_restore_post_link($id_post);
                            $delete_url = \RomeTheme\HeaderFooter\HeaderFooter::get_delete_permanent_link($id_post);

                            echo '<a href="' . esc_url($restore_url) . '">Restore</a>
                            &nbsp;|&nbsp;<a class="link-danger" href="' . esc_url($delete_url) . '">Delete Permanently</a>
                            </small></td>';
                        } else {
                            echo '<smal style="font-size: 13px;">
                            <a type="button" class="link" 
                            data-bs-toggle="modal"
                            data-bs-target="#ModalEdit" 
                            data-post-id="' . esc_attr($id_post) . '"
                            data-post-name="' . esc_attr(get_the_title()) . '"
                            data-type="' . esc_attr($type) . '"
                            data-active="' . esc_attr($active) . '"
                            >Edit</a>&nbsp;|&nbsp; <a class="link" href="' . esc_url($edit_elementor) . '">Edit with Elementor</a> &nbsp;|&nbsp;<a class="link link-danger" href="' . esc_url($delete) . '">Trash</a></small>';
                        }
                        echo '</td>';
                        echo '<td>' . get_the_author() . '</td>';
                        echo '<td>' . esc_html__(ucwords($type), 'rometheme-for-elementor') . '</td>';
                        echo '<td><small>' . esc_html($status) . '</small><br><small>' . esc_html(get_the_date('Y/m/h') . ' at ' . get_the_date('H:i a')) . '</small></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td class="text-center" colspan="5">' . esc_html('No Data') . '</td></tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="bg-white">
                    <td scope="col"></td>
                    <td scope="col">Title</td>
                    <td scope="col">Author</td>
                    <td scope="col">Type</td>
                    <td scope="col">Date</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalAddNew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="add-new-post" method="POST">
                <input id="action" name="action" type="text" value="addNewPost" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="AddModalLabel"><?php esc_html_e('Add New Header or Footer', 'rometheme-for-elementor') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column gap-3">
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" type="text" class="form-control" id="inputTitle">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-select" id="inputType">
                                <option value="header"><?php esc_html_e('Header', 'rometheme-for-elementor') ?></option>
                                <option value="footer"><?php esc_html_e('Footer', 'rometheme-for-elementor') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end gap-3">
                        <span>Active</span>
                        <label class="switch">
                            <input name="active" id="switch" type="checkbox" value="true" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button id="close-btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="add-submit-btn" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="edit_form" method="POST">
                <span id='errfrmMsg' style='margin:0 auto;'></span>
                <input name="id" id="id" type="text" hidden>
                <input id="action" type="text" name="action" value="updatepost" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel"><?php esc_html_e('Edit Header or Footer', 'rometheme-for-elementor') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column gap-3">
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" type="text" class="form-control" id="inputTitle">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-select" id="inputType">
                                <option value="header"><?php esc_html_e('Header', 'rometheme-for-elementor') ?></option>
                                <option value="footer"><?php esc_html_e('Footer', 'rometheme-for-elementor') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end gap-3">
                        <span>Active</span>
                        <label class="switch">
                            <input name="active" id="switch" type="checkbox" value="true">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button id="close-btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="edit-submit-btn" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    body {
        background-color: #f0f0f1;
    }
</style>