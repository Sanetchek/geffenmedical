<?php

/**
 *  Template name: DoctorQR 
 *   Template post type: post, page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');

    .doctor-qr {
        background: #f5f5f5;
        height: 100vh;
        padding-top: 50px;
    }

    .medical-qr {
        width: 312px;
        height: 398px;
        margin: 0 auto;
        border-radius: 15px;
        padding: 20px 20px 24px 20px;
        background: #fff;
    }

    .medical-qr-logo {
        display: flex;
        align-items: center;
    }

    .medical-qr-logo p {
        font-family: Assistant;
        font-size: 12px;
        font-weight: 600;
        line-height: 15.7px;
        text-align: left;
        color: #0A3B64;

    }

    .medical-qr-prive,
    .medical-qr-content-contact {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .medical-qr-doctor-name {
        font-family: Assistant;
        font-size: 21px;
        font-weight: 600;
        line-height: 21px;
        text-align: left;
        margin: 0;
        color: #0A3B64;

    }

    p.medical-qr-doctor-jobtitle {
        font-family: Assistant;
        font-size: 14px;
        font-weight: 400;
        line-height: 16px;
        text-align: left;
        margin: 0;
        color: #0A3B64;

    }

    p.medical-qr-content-department,
    a.medical-qr-content-contact-mail,
    a.medical-qr-content-contact-tel {
        font-family: Assistant;
        font-size: 12px;
        font-weight: 600;
        line-height: 16px;
        text-align: left;
        margin: 0;
        color: #0A3B64;

    }

    .medical-qr-content-qr {
        display: flex;
        justify-content: center;
        border-top: 1px solid #0A3B64;
        padding-top: 40px;
        margin-top: 25px;
    }
</style>
<div class="doctor-qr">
    <main class="medical-qr">
        <div class="medical-qr-content">
            <div class="medical-qr-logo">
                <img src="/wp-content/uploads/2024/09/Frame-19259.svg" alt="">

            </div>
            <div class="medical-qr-contents">
                <div class="medical-qr-prive">
                    <div class="medical-qr-content-img">
                        <?php
                            $image = get_field('image', $id);
                            $size = [97, 108];
                            if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                            }
                        ?>
                        <!--<img src="/wp-content/uploads/2024/09/Frame-19126.png" alt="">-->
                    </div>
                    <div class="medical-qr-content-title">
                        <h2 class="medical-qr-doctor-name">Rachel Zach-Cohen</h2>
                        <p class="medical-qr-doctor-jobtitle">Director of Diabetes Division</p>
                        <p class="medical-qr-content-department">Field Department</p>
                    </div>
                </div>
                <div class="medical-qr-content-contact">
                    <a class="medical-qr-content-contact-mail" href="#">Email.Email@Email.com</a>
                    <a class="medical-qr-content-contact-tel" href="#">+942545555555</a>
                </div>
                <div class="medical-qr-content-qr">
                    <img src="/wp-content/uploads/2024/09/clarity_qr-code-line.svg" alt="">
                </div>
            </div>
        </div>
    </main>
</div>