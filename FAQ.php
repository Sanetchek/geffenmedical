 <?php

/**
 * Template Name: Freestyle-Libre-FAQ
 * Template Post Type: freestyle_libre
 *
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

get_header();
?>
 <main class="faq">
   <style>
     .faq .accordion .card-header {
       padding: 54px 15px;
     }

     .faq__list {
       margin-top: 0;
     }

     .faq .accordion .card-header .btn-link,
     .faq__list li a {
       font-size: 18px;
     }

     .next__header {
       font-size: 46px;
     }
   </style>
   <div class="next">
     <div class="row justify-content-center align-items-center">
       <div class="col-sm-9 col-12">
         <h1 class="next__header">שאלות נפוצות: למד עוד על מערכת פריסטייל ליברה</h1>
         <div class="next__subHeader">
           <p> יש לך שאלות?</p>
           <p>בחר באחת מהקטגוריות של השאלות נפוצות למטה.</p>
         </div>
       </div>
       <div class="col-lg-9 off-md-2">
         <div class="faq__list fl_jc_sa">

           <ul class="nav nav-tabs fd-col" id="FAQ1" role="tablist">
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="LibreView-tab" data-bs-toggle="tab" data-bs-target="#LibreView"
                 type="button" role="tab" aria-controls="LibreView" aria-selected="true" dir="ltr">LibreView</button>
             </li>
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="LibreLinkUp-tab" data-bs-toggle="tab" data-bs-target="#LibreLinkUp"
                 type="button" role="tab" aria-controls="LibreLinkUp" aria-selected="false"
                 dir="ltr">LibreLinkUp</button>
             </li>
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="FreeStyleLibreLink-tab" data-bs-toggle="tab"
                 data-bs-target="#FreeStyleLibreLink" type="button" role="tab" aria-controls="FreeStyleLibreLink"
                 aria-selected="false" dir="ltr">FreeStyle LibreLink</button>
             </li>
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="Other" data-bs-toggle="tab" data-bs-target="#Other" type="button" role="tab"
                 aria-controls="Other" aria-selected="false">אחר</button>
             </li>
           </ul>
           <ul class="nav nav-tabs fd-col" id="FAQ2" role="tablist">
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="sensor-tab" data-bs-toggle="tab" data-bs-target="#sensor" type="button"
                 role="tab" aria-controls="sensor" aria-selected="true">חיישן</button>
             </li>
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="reader-tab" data-bs-toggle="tab" data-bs-target="#reader" type="button"
                 role="tab" aria-controls="reader" aria-selected="false">קורא</button>
             </li>
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="FL2system-tab" data-bs-toggle="tab" data-bs-target="#FL2system"
                 type="button" role="tab" aria-controls="FL2system" aria-selected="false">מערכת פריסטייל ליברה
                 2</button>
             </li>
           </ul>



         </div>
       </div>
     </div>
   </div>
   <div class="container">
    <section>

     <div class="tab-content" id="FAQContent">
       <div class="tab-pane fade" id="sensor" role="tabpanel" aria-labelledby="sensor-tab">
         <!------BLOCK-6------->
         <div class="accordion accordion-flush" id="sensor1">
           <div class="accordion-item">
             <h2 class="accordion-header" id="flush-heading1">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                 data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                 <p>
                 מה גודלו של החיישן? כמה עמוק הוא מוחדר? </p>
               </button>
             </h2>
             <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
               data-bs-parent="#sensor1">
               <div class="accordion-body">
               <p>
                גובה החיישן הוא 5 מ"מ וקוטרו 35 מ"מ. עובי החלק של החיישן המוחדר מתחת לעור קטן מ-0.4 מ"מ והוא מוחדר לעומק
                של כ-5 מ"מ בלבד מתחת לעור. במחקר שנערך על ידי Abbott Diabetes Care, המשתמשים הסכימו שהחדרת החיישן אינה
                מכאיבה יותר מבדיקת רמת סוכר שגרתית באמצעות דקירת האצבע <sup style="font-size:11px;">*</sup>.
                <br><br>
                <span style="font-size:13px;"><sup style="font-size:11px;">*</sup> Data on file.במחקר שנערך על ידי חטיבת
                  הסוכרת של אבוט, 93.4% מהמטופלים שנסקרו (n=30) לא הרגישו אי נוחות מתחת לעור בזמן ענידת החיישן.</span>
              </p>
               </div>

             </div>
           </div>
         </div>
       </div>

       <!-------BLOCK-6------------->







     </div>
     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
     <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
   </div>




   <section class="section grey-blocks">
     <div class="row justify-content-around">
       <div class="grey-blocks__item col-sm-3 .col-lg-4">
         <h4>לחיות עם הסוכרת</h4>
         <p>סוכרת לא צריכה למנוע מכם לחיות את החיים כפי שתרצו </p>
         <a href="/free-style-libre/static?name=your-data" target="_blank">למד עוד</a>
       </div>
       <div class="grey-blocks__item col-sm-3 .col-lg-4">
         <h4>תמיכה</h4>
         <p>הדרכה, שאלות נפוצות ויצירת קשר עם שירות הלקוחות שלנו</p>
         <a href="/free-style-libre/static?name=help" target="_blank">עבור אל מרכז התמיכה
           שלנו</a>
       </div>
       <div class="grey-blocks__item col-sm-3 .col-lg-4">
         <h4>קנה עכשיו</h4>
         <p>הזמינו את ערכת ההתחלה והחיישנים עכשיו</p>
         <a href="/freestyle-libre-products" target="_blank">התחל לקנות</a>
       </div>
     </div>
   </section>
   </div>
    </main>
 </div>
 </div>
 </div>
 </main>
 </div>