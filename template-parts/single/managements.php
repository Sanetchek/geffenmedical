<?php
/**
 * Single Management Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');

  #page {
    margin-top: 0 !important;
  }

  .doctor-qr {
    background: #F2F6FA;
    min-height: 93vh;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .medical-qr {
    width: 312px;
    height: 398px;
    margin: 0 auto;
    border-radius: 15px;
    padding: 20px 20px 24px 20px;
    background: #fff;
    box-shadow: 0px 4px 20px 0px #A0ABB547;
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
    flex-direction: row-reverse;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;
  }

  .medical-qr-content-img img {
    border-radius: 13.34px;
    width: 80px;
    height: 84px;
  }

  .medical-qr-doctor-name {
    font-family: Assistant;
    font-size: 21px;
    font-weight: 600;
    line-height: 21px;
    text-align: left;
    margin: 0 !important;
    color: #0A3B64;

  }

  p.medical-qr-doctor-jobtitle {
    font-family: Assistant;
    font-size: 14px;
    font-weight: 400;
    line-height: 16px;
    text-align: left;
    margin: 0 !important;
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
    color: #0A3B64 !important;

  }

  .medical-qr-content-title {
    width: 172px;
  }
/* Make only phone number LTR
a.medical-qr-content-contact-tel {
  direction: ltr;
  unicode-bidi: embed; /* Ensures correct LTR rendering even in mixed RTL contexts */
}


  }

  .medical-qr-content-title {
    width: 172px;
  }


  button#save-btn {
    box-shadow: 0px 2px 20px 0px #0D6EFD47;
    background: #0D6EFD;
    color: #fff;
    border: none;
    width: 168px;
    height: 34px;
    top: 301px;
    left: 72px;
    padding: 8px 20px 8px 20px;
    gap: 10px;
    border-radius: 19px;
    display: flex;
    flex-direction: row-reverse;
    font-family: Assistant;
    font-size: 14px;
    font-weight: 600;
    line-height: 18.31px;
    text-align: right;
}

  .medical-qr-contents {
    margin-top: 40px;
  }

  .medical-qr-content-qr {
    display: flex;
    justify-content: center;
    border-top: 1px solid #0A3B64;
    padding-top: 65px;
    margin-top: 25px;
  }
</style>
<div class="doctor-qr">
  <main class="medical-qr">
    <div class="medical-qr-content">
      <div class="medical-qr-logo">
        <img src="/wp-content/uploads/2024/09/Frame-19260.svg" alt="">

      </div>
      <div class="medical-qr-contents">
        <div class="medical-qr-prive">
        <div class="medical-qr-content-img">
            <?php
                $image_id = get_field('image', $id);
                $size = 'medium'; 
                if( $image_id ) {
                    $image_url = wp_get_attachment_image_url( $image_id, $size );
                    $image_data = file_get_contents($image_url);
                    $image_base64 = base64_encode($image_data);
                    echo wp_get_attachment_image( $image_id, $size );
                }
            ?>
      </div>
          <div class="medical-qr-content-title">
            <h2 class="medical-qr-doctor-name"><?= get_the_title($id) ?></h2>
            <p class="medical-qr-doctor-jobtitle"><?= get_field('subtitle', $id) ?></p>
            <p class="medical-qr-content-department"><?= get_field('department', $id) ?></p>
          </div>
        </div>
        <div class="medical-qr-content-contact">
          <a class="medical-qr-content-contact-mail"
            href="mailto:<?= get_field('e-mail', $id) ?>"><?= get_field('e-mail', $id) ?></a>
          <a class="medical-qr-content-contact-tel"
			 href="tel:<?= get_field('phone', $id) ?>"><span dir="ltr"><?= get_field('phone', $id) ?></span></a>
        </div>
 
</div>
        <div class="medical-qr-content-qr">
          <button id="save-btn">Save to Contacts <span><img
                src="/wp-content/uploads/2024/09/material-symbols_download.svg" alt=""></span></button>
          <!--<img src="/wp-content/uploads/2024/09/clarity_qr-code-line.svg" alt="">-->
        </div>
      </div>
    </div>
  </main>
</div>

<script>
  var saveBtn = document.getElementById("save-btn");

  saveBtn.addEventListener("click", function () {
    var contact = {
      name: "<?= addslashes(get_the_title($id)) ?>",
      phone: "<?= addslashes(get_field('phone', $id)) ?>",
      email: "<?= addslashes(get_field('e-mail', $id)) ?>",
      department: "<?= addslashes(get_field('department', $id)) ?>", // Correct field name for department
      site: "<?= addslashes(get_field('site', $id)) ?>",
      image: "<?= isset($image_base64) ? $image_base64 : '' ?>"
    };

    // Format phone number
    var formattedPhone = contact.phone.trim();
    if (!formattedPhone.startsWith('+') && formattedPhone.match(/^\d+$/)) {
      formattedPhone = '+' + formattedPhone; // Add '+' if missing
    }

    // Build vCard with CHARSET=UTF-8 and proper line folding
    var vcard = "BEGIN:VCARD\r\nVERSION:3.0\r\n" +
      "FN;CHARSET=UTF-8:" + contact.name + "\r\n" +
      "N;CHARSET=UTF-8:;" + contact.name + ";;;\r\n" +
      "TEL;TYPE=CELL,VOICE:" + formattedPhone + "\r\n" +
      "EMAIL;TYPE=WORK;CHARSET=UTF-8:" + contact.email + "\r\n";

    // Add department under ORG field
    if (contact.department) {
      vcard += "ORG;CHARSET=UTF-8:" + contact.department + "\r\n";
    }

    // Add site if available
    if (contact.site) {
      vcard += "URL:" + contact.site + "\r\n";
    }

    // Add photo if available
    if (contact.image) {
      vcard += "PHOTO;ENCODING=BASE64;TYPE=PNG:\r\n " + contact.image + "\r\n";
    }

    vcard += "END:VCARD";

    var blob = new Blob([vcard], { type: "text/vcard" });
    var url = URL.createObjectURL(blob);

    // Create a hidden anchor element to trigger download
    var newLink = document.createElement('a');
    newLink.download = contact.name.replace(/[^a-z0-9]/gi, '_') + ".vcf";
    newLink.href = url;

    // Trigger the download by simulating a click
    newLink.click();
  });
</script>