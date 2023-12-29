<?php
if (file_exists(WP_PLUGIN_DIR . '/romethemeform/rometheme-form.php')) {
    $btn['text'] = 'Activate Now';
    $btn['url'] = wp_nonce_url('plugins.php?action=activate&plugin=romethemeform/rometheme-form.php&plugin_status=all&paged=1', 'activate-plugin_romethemeform/rometheme-form.php');
} else {
    $btn['text'] = 'Install Now';
    $btn['url'] = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=romethemeform'), 'install-plugin_romethemeform');
}
?>

<div class="container">
    <div class="rform-container">
        <div class="rform-body">
            <svg width=60" height="60" id="eohpCl3PVjW1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
                <g transform="matrix(.11326 0 0-.113381-20.251951 319.628716)">
                    <path d="M372,2749c-46-14-109-80-122-128-7-27-10-384-8-1148l3-1108l24-38c13-21,42-50,64-65l41-27h1131h1131l41,27c22,15,51,44,64,65l24,38v812v813l-383,382-382,383-798,2c-485,1-810-2-830-8Zm1500-932c211-120,337-197,335-206-2-14-262-170-285-170-7-1-102,50-212,113l-200,115-200-115c-110-63-204-114-209-114-21,0-292,163-288,174c6,19,691,407,707,400c8-3,167-92,352-197Zm-151-319c82-46,148-86,149-89c0-3-12-11-27-18-26-12-20-16,183-131c115-66,210-123,212-128c3-9-277-172-296-172-7,0-107,54-222,120l-210,120-208-120c-115-66-215-120-223-120-24,1-284,155-286,170-2,10,125,88,380,232c210,120,386,218,391,218s76-37,157-82Z" transform="matrix(1.00378 0 0 1.013853-5.68208-20.7254)" fill="#3d3d3d" />
                </g>
                <path d="M199.680417,24.709473v75.9h76.5l-76.5-75.9Z" transform="matrix(1.075983 0 0 1.177621-4.45472-23.399398)" fill="#6a6a6a" stroke="#3f5787" stroke-width="0.6" />
            </svg>
            <h1>Rometheme Form</h1>
            <h2>Create Your Elementor Forms Quickly And Easily.</h2>
            <span>Customization options for Form design on the Elementor plugin, including layout, color, typography, and button style to match the website,s style and branding.</span>
            <a class="css-button-sliding-to-top--grey" type="button" href="<?php echo esc_url($btn['url']) ?>"><?php echo esc_html($btn['text']) ?></a>
        </div>
    </div>
</div>

<style>
    .container {
        position: relative;
        padding: 40px 20px;
    }

    .rform-container {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(238, 238, 238);
        background: linear-gradient(95deg, rgba(238, 238, 238, 1) 0%, rgba(255, 255, 255, 1) 50%, rgba(238, 238, 238, 1) 100%);
        padding-block: 30px;
        font-family: 'Space Grotesk', sans-serif;
        flex-direction: column;
        box-shadow:
            3px 7.7px 6.3px -36px rgba(0, 0, 0, 0.036),
            5.8px 15.2px 16.7px -36px rgba(0, 0, 0, 0.051),
            9.5px 24.8px 39.2px -36px rgba(0, 0, 0, 0.066),
            26px 68px 130px -36px rgba(0, 0, 0, 0.11);
    }
    
    .rform-body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        max-width: 600px;
        flex-direction: column;
        gap: 1rem;
    }

    .rform-container h2 {
        font-weight: 500;
        font-size: 1.5em;
        margin-bottom: 0px;
    }

    .rform-container h1 {
        margin-bottom: 0px;
    }

    .rform-container span {
        font-size: 15px;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .css-button-sliding-to-top--grey {
        min-width: 130px;
        color: #fff;
        padding: 15px 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        border-radius: 5px;
        z-index: 0;
        background: #fff;
        overflow: hidden;
        border: 2px solid #495057;
        color: #495057;
        text-decoration: none;
        text-align: center;
        font-size: 15px;
    }

    .css-button-sliding-to-top--grey:hover {
        color: #fff;
    }

    .css-button-sliding-to-top--grey:hover:after {
        height: 100%;
    }

    .css-button-sliding-to-top--grey:after {
        content: "";
        position: absolute;
        z-index: -1;
        transition: all 0.3s ease;
        left: 0;
        bottom: 0;
        height: 0;
        width: 100%;
        background: #495057;
    }
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500&display=swap');
</style>