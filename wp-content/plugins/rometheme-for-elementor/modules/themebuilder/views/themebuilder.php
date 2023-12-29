<?php
require RomeTheme::plugin_dir() . 'view/header.php';

?>

<div class="mt-5 font-montserrat container m-0">
    <div class="d-flex flex-row justify-content-between">
        <div class="d-flex flex-column">
            <h4>Theme Builder</h4>
            <span class="">Transforming Experiences with Our Dynamic and Versatile Theme Builder Solution.</span>
        </div>
        <div>
            <a href="" class="btn btn-accent rounded-0 px-5 py-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Template +</a>
        </div>
    </div>
    <div class="mt-5">
        <ul class="nav sub-nav border-0 mb-3 justify-content-between" id="pills-tab" role="tablist">
            <ul class="d-flex flex-row m-0 p-0">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-all-tab" data-bs-toggle="pill" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tab-all" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-header-tab" data-bs-toggle="pill" data-bs-target="#tab-header" type="button" role="tab" aria-controls="tab-header" aria-selected="true">Header</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-footer-tab" data-bs-toggle="pill" data-bs-target="#tab-footer" type="button" role="tab" aria-controls="tab-footer" aria-selected="false">Footer</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-singlepost-tab" data-bs-toggle="pill" data-bs-target="#tab-singlepost" type="button" role="tab" aria-controls="tab-singlepost" aria-selected="false">Single Post</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-errorpage-tab" data-bs-toggle="pill" data-bs-target="#tab-errorpage" type="button" role="tab" aria-controls="tab-errorpage" aria-selected="false">404 Page</button>
                </li>
            </ul>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-trash-tab" data-bs-toggle="pill" data-bs-target="#tab-trash" type="button" role="tab" aria-controls="tab-trash" aria-selected="false">Trash</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="tab-all-tab" tabindex="0">
                <?php
                require RomeTheme::module_dir() . 'themebuilder/views/all.php';
                ?>
            </div>
            <div class="tab-pane fade" id="tab-header" role="tabpanel" aria-labelledby="tab-header-tab" tabindex="0">
                <?php
                require RomeTheme::module_dir() . 'HeaderFooter/views/header.php';
                ?>
            </div>
            <div class="tab-pane fade" id="tab-footer" role="tabpanel" aria-labelledby="tab-footer-tab" tabindex="0">
                <?php
                require RomeTheme::module_dir() . 'HeaderFooter/views/footer.php';
                ?>
            </div>
            <div class="tab-pane fade" id="tab-singlepost" role="tabpanel" aria-labelledby="tab-singlepost-tab" tabindex="0">
                <?php
                require RomeTheme::module_dir() . 'themebuilder/views/comingsoon.php';
                ?>
            </div>
            <div class="tab-pane fade" id="tab-errorpage" role="tabpanel" aria-labelledby="tab-errorpage-tab" tabindex="0">
                <?php
                require RomeTheme::module_dir() . 'themebuilder/views/comingsoon.php';
                ?>
            </div>
            <div class="tab-pane fade" id="tab-trash" role="tabpanel" aria-labelledby="tab-trash-tab" tabindex="0">
                <?php
                require RomeTheme::module_dir() . 'themebuilder/views/trash.php';
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0">
            <form id="add-new-post" method="POST">
                <input id="action" name="action" type="text" value="addNewPost" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="AddModalLabel"><?php esc_html_e('Create New Template', 'rometheme-for-elementor') ?></h5>
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
                                <option value="single_post" disabled><?php esc_html_e('Single Post (Coming Soon)', 'rometheme-for-elementor') ?></option>
                                <option value="404" disabled><?php esc_html_e('404 Page (Coming Soon)', 'rometheme-for-elementor') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end align-items-center gap-3">
                        <span>Active</span>
                        <label class="switch">
                            <input name="active" id="switch" type="checkbox" value="true" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button id="close-btn" type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                        <button id="add-submit-btn" class="btn btn-accent rounded-0">Save
                            changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .sub-nav .nav-item .nav-link {
        border: none;
        color: #727272;
    }

    .sub-nav .nav-item .nav-link.active {
        font-weight: 600;
        color: #1f2227;
    }
</style>