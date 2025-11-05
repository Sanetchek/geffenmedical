 <?php

/**
 * Template Name: Optional Alarms
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
 <div class="free-style-libre">
<main class="alarm">
    <style>
        h4 span{
            line-height: 52.8px;
        }
        .m-b-t {
    margin-top: 50px;
    margin-bottom: 90px!important;
}
        .product__block--blue2 {
            background: #20467f;
        }

        .product__bigImg--alarm {
            background: url(/wp-content/uploads/2023/03/alarms_how-it-works-HEB.jpg) no-repeat center;
            -webkit-background-size: cover;
            background-size: cover;
        }

        .alarm .product__bigImg {
            min-height: 570px;
        }

        .alarm .choose-list__item {
            margin-bottom: 15px;
        }

        .alarm .products__item {
            background: #f7f7f7;
        }

        .alarm .products__item>h3 {
            color: #20467f;
            text-align: center;
            margin-bottom: 50px;
        }

        .m-b-t {
            margin-top: 50px;
            margin-bottom: 90px;
        }

        .my-row-alarm {
            display: flex;
            justify-content: center;
        }

        .my-row-alarm-img {
            max-width: 804px
        }
        .alarms_how-it-works-mob{
            display: none;
        }

        @media only screen and (max-width: 860px) {
            .my-row-alarm-img {
                max-width: 420px
            }

            .mobil-img-alarm {
                max-width: 45%;
            }
            .product__bigImg--alarm {
    background: transparent;
}
.product__bigImg.product__bigImg--alarm{
padding-top: 0;
}
.alarms_how-it-works-mob{
    display: block;
}
        }
    </style>
    <div class="container">
        <div class="next">
            <div class="row align-items-center">
                <div class="col-sm-3 col-6">
                    <a href="" class="next-link left" target="_blank">
                        <img src="/img/icons/btn-right-arrow.png" alt="">
                        <span>
 הכנה לביקור עם הצוות הרפואי
                        </span>
                    </a>
                </div>
                <div class="col-sm-6 col-12 next__header my-order-1">
                    <h1>התראות אופציונליות</h1>
                </div>
                <div class="col-sm-3 col-6 text-left">
                    <a href="" class="next-link" target="_blank">
                        <span>להוריד מהתפריט ומהאתר
                        </span>
                        <img src="/img/icons/btn-left-arrow.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center product__cont">
            <div class="col-lg-5 product__block product__block--blue2 relative">
                <div class="product__text-block product__text-block--blue ">
                    <div class="btns-group">
                        <div id="my-inline-buttons" class="sharethis-inline-share-buttons"></div>
                    </div>
                    <h4>התראות אופציונליות עם מערכת פריסטייל ליברה
                        2
                    </h4>
                    <p>קבלו התראות כאשר רמת הסוכר גבוהה או נמוכה מדי, באמצעות אפליקציית FreeStyle LibreLink
                        <sup style="font-size:75%">2</sup>.
                    </p>
                    <!--<div class="btn-alarm">
                        <p> <a href="#" class="btn btn-transp btn-transp--white" style="    font-size: 16px;margin-left: auto; margin-right: auto; text-transform: none;" target="_blank">מדריך ההתראות עבור אייפון</a></p>
                        <p> <a href="#" class="btn btn-transp btn-transp--white" style="    font-size: 16px;margin-left: auto; margin-right: auto; text-transform: none;" target="_blank">מדריך ההתראות עבור אנדרואיד</a></p>
                    </div>-->
                </div>
            </div>
            <div class="col-lg-7 product__block my-order-1">
                <img src="/wp-content/uploads/2023/03/alarms_boy-sleeping.jpg" alt="">
            </div>
        </div>
        <img class="alarms_how-it-works-mob" src="/wp-content/uploads/2023/03/alarms_how-it-works-mob-HEB.jpg" alt="">
        <div class="product__bigImg product__bigImg--alarm">

            <div class="product__bigImg-text">
                <h3 style="color: #20467f;">איך זה עובד</h3>
                <p>עם מערכת פריסטייל ליברה 2 ,תוכלו לקבל התראות כשאתם בסיכון להיפרגליקמיה או היפוגליקמיה, בכל עת<sup style="font-size:75%">4</sup> ובכל מקום<sup style="font-size:75%">3</sup>.</p>
                <p style="color: #8e8e8e;">בין אם תבחרו לקבל התראות באמצעות קורא פריסטייל ליברה 2 או דרך אפליקציית <sup style="font-size:75%">2</sup>FreeStyle LibreLink, ההתראות יופעלו כשרמת הסוכר תהיה גבוהה או נמוכה מאוד. ההתראות יופעלו כל עוד המכשיר יהיה בטווח של 6 מטרים ללא מכשולים, גם אם אתם ישנים או שמכשיר הטלפון במצב 'נא לא להפריע'.</p>
                <p style="color: #8e8e8e;">לאחר מכן תוכלו להקיש על ההתראה לצורך סריקה מידית של החיישן, בדיקה של רמת הסוכר ונקיטה בפעולות הדרושות.</p>
            </div>
        </div>
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 style="color: #20467f;">איך להגדיר את ההתראות</h3>
                    <p style="color: #8e8e8e;">
                        תחילה, בחרו במכשיר שבו ברצונכם לקבל את ההתראות. זהו שלב ראשון וחשוב, שכן ניתן לקבל התראות אך ורק במכשיר שבאמצעותו אתם מפעילים את חיישן פריסטייל ליברה 2.
                    </p>
                    <p style="color: #8e8e8e;">
                        אם בכוונתכם להשתמש הן באפליקציית FreeStyle LibreLink והן בקורא פריסטייל ליברה 2, תחילה עליכם להפעיל את חיישן פריסטייל ליברה 2 באמצעות קורא פריסטייל ליברה 2. במקרה זה, רק קורא פריסטייל ליברה 2 יוכל להפיק את ההתראות.
                    </p>

                    <p style="color: #8e8e8e;">
                        כדי לקבל התראות אופציונליות במכשיר הטלפון שלכם, תחילה עליכם להפעיל את חיישן פריסטייל ליברה 2 באמצעות הטלפון.
                    </p>
                </div>
            </div>
        </section>
        <div class="choose">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p style="color: #000;">אם אתם מגדירים התראות במכשיר הטלפון, ודאו כי תקשורת Bluetooth מופעלת בטרם תפעילו את חיישן פריסטייל ליברה 2.</>
                    <div class="choose-list">
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>פתחו את אפליקציית FreeStyle LibreLink.</p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>הקישו על התפריט ובחרו "התראות".</p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>הקישו על "התראת רמת סוכר נמוכה".
                            </p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>העבירו למצב ההפעלה "On" כדי להפעיל את ההתראה. </p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>הגדירו את ערך הסף עבור ההתראה. </p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>הקישו על הלחצן חזרה וחזרו על הפעולות להגדרת "התראת רמת סוכר גבוהה". </p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>התראות רמת הסוכר הנמוכה והגבוהה מוגדרות כעת. הערה: ניתן גם להגדיר רק סוג התראה אחד. </p>
                        </div>
                        <div class="choose-list__item">
                            <img src="/wp-content/uploads/2023/01/Ellipse-As.png" alt="">
                            <p>התראת "אובדן אות" מופעלת אוטומטית בעת הפעלה של כל אחת מהתראות רמת הסוכר. התראת אובדן האות מתריעה בפניכם כאשר החיישן אינו מתקשר עם האפליקציה במשך 20 דקות, כשהמשמעות היא שאינכם מקבלים התראות בנוגע לרמת סוכר נמוכה או גבוהה</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-order-1  my-row-alarm">
                    <img src="/wp-content/uploads/2023/03/alarms_set-up-alarms-HEB.png" alt="" class="mobil-img-alarm">
                </div>
            </div>
        </div>
        <img src="/wp-content/uploads/2023/03/alarms_enable-alarms-section.jpg" style="width: 100%" alt="">
        <div class="products__item">
            <h3 style="color: #20467f;">כיצד לאפשר קבלת עדכונים על התראות</h3>
            <div class="row justify-content-center" style="align-items: center;">
                <div class="col-md-7" style="text-align: center;">
                    <h4 style="color: #20467f;">עבור IOS</h4>
                    <p>
                        1. פתחו את "הגדרות" במכשיר הטלפון החכם שלכם.
                    </p>
                    <p>
                        2. עברו ל- "עדכונים" ובחרו באפשרות FreeStyle LibreLink שנקראת <span>"LibreLink"</span>.
                    </p>
                    <p>
                        3. העבירו את האפשרות "אפשר עדכונים" למצב פועל.
                    </p>
                    <p>
                        4. הקישו לסימון האפשרויות "מסך נעילה", "הודעות" ו"באנרים" כדי להפעיל את כל ההתראות.
                    </p>
                </div>
                <style>

                </style>
                <div class="col-md-4 col-8 my-row-alarm">
                    <img src="/wp-content/uploads/2023/03/alarms_enable-alarms-ios-HEB.png" alt="product_sensor" class="my-row-alarm-img">
                </div>
            </div>
        </div>
        <div class="products__item">
            <div class="row justify-content-center" style="align-items: center;">
                <div class="col-md-6" style="text-align: center;">
                    <h4 style="color: #20467f;">עבור אנדרואיד</h4>
                    <p>
                        1. פתחו את "הגדרות" במכשיר הטלפון החכם שלכם.
                    </p>
                    <p>
                        2. עברו ל "התראות". נווטו מטה ובחרו באפשרות FreeStyle LibreLink שנקראת "LibreLink".
                    </p>
                    <p>
                        3. העבירו את האפשרות "הצג התראות" למצב פועל.
                    </p>
                    <p>
                        4. הקישו לסימון כל הקטגוריות.
                    </p>
                </div>
                <div class="col-md-4 col-8 my-row-alarm">
                    <img src="/wp-content/uploads/2023/03/alarms_enable-alarms-android_HEB.png" alt="product_sensor" class="my-row-alarm-img">
                </div>
            </div>
        </div>
        <div class="image_title_des">
            <section class="section care-block container-fluid">
                <div class=" text-center my-row-alarm ">
                    <div class="col-lg-10">
                        <h3 class="fl-functionality-title m-b-t"><span style="color: #E4572D;">איך לוודא שלא תפספסו התראות במכשיר הטלפון</span></h3>
                        <div class="row flex-items-md fl-functionality-box">
                            <div class="col-md-6">
                                <div class="how-make">
                                    <div class="col-md-3">
                                        <img src="/wp-content/uploads/2023/03/alarms-icon-2_90x90.png" alt="Accuracy Icon" class="img" width="90">
                                    </div>
                                    <div class="col-md-9">
                                        <h4><span style="color: #E4572D;"><strong>הקפידו שמכשיר הטלפון יהיה בהישג יד</strong></span></h4>
                                        <p>ודאו כי מכשיר הטלפון נמצא בטווח של 6 מטרים מכם בכל עת, ללא כל מכשולים.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="how-make">
                                    <div class="col-md-4">
                                        <img src="/wp-content/uploads/2023/03/alarms-icon-1_90x90.png" alt="Accuracy Icon" class="img" width="90">
                                    </div>
                                    <div class="col-md-8">
                                        <h4><span style="color: #E4572D;"><strong>הקפידו שתקשורת <span class="ltr">BLUETOOTH</span> תישאר פעילה</strong></span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="how-make">
                                    <div class="col-md-3">
                                        <img src="/wp-content/uploads/2023/03/alarms-icon-3_90x90.png" alt="Accuracy Icon" class="img" width="90">
                                    </div>
                                    <div class="col-md-9">
                                        <h4><span style="color: #E4572D;"><strong>הקפידו שהאפליקציה תמשיך לפעול</strong></span></h4>
                                        <p>אין לאלץ את סגירת האפליקציה – השאירו אותה פועלת ברקע.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="how-make">
                                    <div class="col-md-3">
                                        <img src="/wp-content/uploads/2023/03/alarms-icon-4_90x90.png" alt="Accuracy Icon" class="img" width="90">
                                    </div>
                                    <div class="col-md-9">
                                        <h4><span style="color: #E4572D;"><strong>שנו את ההגדרות שלכם</strong></span></h4>
                                        <p>כבו את מצב "נא לא להפריע" או הפעילו את האפשרות "עקפו את 'נא לא להפריע'
                                            בהגדרת ההתראות1.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
        </div>
        <section class="help">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-8">
                        <h2>צריך עזרה?</h2>
                        <p style="font-size:16px;">לתמיכה במוצר,טיפים או הדרכה איך להשתמש במערכת פריסטייל ליברה, אנו מעמידים לרשותך מספר מקורות מידע.</p>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-5  help__block help__block--right">
                        <img src="/wp-content/uploads/2023/03/phone_icon.png" alt="">
                        <h3>שירות לקוחות</h3>
                        <p>נשמח לשמוע מכם</p>
                        <span class="he-number big">*6364</span>
                        <p>בימים א'-ה בין השעות <span class="he-number">8:30</span> עד <span class="he-number">18:00</span>, בימי ו'
                            ובערבי חג בין השעות <span class="he-number">8:30</span> עד <span class="he-number">12:15</span> , בחול המועד
                            בין השעות <span class="he-number">8:30</span> עד <span class="he-number">14:00</span>. לחלופין, אתם מוזמנים
                            למלא את טופס הפניות שלנו באתר או לשלוח מייל לכתובת <a href="mailto:cs@geffenmedical.com" target="_blank"> <span class="he-number ltr">cs@geffenmedical.com</span></a></p>
                    </div>
                    <div class="col-md-5  help__block help__block--left">
                        <img src="/wp-content/uploads/2023/03/video_icon.png" alt="">
                        <h3>שאלות נפוצות וסרטוני הדרכה</h3>
                        <p>מענה לשאלותך תמצא בסרטוני הדרכה ועמודי שאלות נפוצות באתר</p>
                        <a href="#" class="btn btn-transp btn-transp--white" title="בקר בעמוד התמיכה שלנו" target="_blank">בקר בעמוד התמיכה שלנו</a>
                    </div>
                </div>
                <i>
                </i>
            </div><i>
            </i>
        </section>

        <div class="row justify-content-between next__bottom">
            <div class="col-6">
                <a href="" class="next-link left" target="_blank">
                    <img src="/img/icons/btn-right-arrow.png" alt="">
                    התכונו לפגישה עם הצוות הרפואי
                </a>
            </div>
            <div class="col-6 text-left">
                <a href="" class="next-link">
                    <span> נתוני "עולם אמיתי" (REAL-WORLD)
                    </span>
                    <img src="/img/icons/btn-left-arrow.png" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <ul class="help__list list">
                <li>
                    <!--<p><sup><i>התמונות נועדו להמחשה בלבד. לא מטופל או נתונים אמיתיים.<br>
                    1.בדיקת רמת סוכר בדם באמצעות דקירת אצבע נדרשת כאשר קריאות רמות הסוכר שלך אינן תואמות לתסמינים או לציפיות
                    <br>
                    2. Data on file, Abbott Diabetes Care, Inc.
                    <br>
                    3. Alva, Shridhara, Timothy Bailey, Ronald L. Brazg, Erwin S. Budiman, Kristin Castorino, Mark P. Christiansen, Gregory Forlenza, Mark Kipnes, David R. Liljenquist, and Hanqing Liu. “Accuracy of a 14-Day Factory-Calibrated Continuous Glucose Monitoring System with Advanced Algorithm in Pediatric and Adult Population With Diabetes. Journal of Diabetes Science and Technology, (September 2020). <a href="http://doi.org/10.1177/1932296820958754" style="color:#333;" target="_blank">http://doi.org/10.1177/1932296820958754</a> -->
                    <p><i><sup>
                    1. "הפונקציונליות של  'עקיפת נא לא להפריע' תלויה בדגם הטלפון ובגרסת מערכת ההפעלה שבה אתם משתמשים. כדי לכבות את מצב 'נא לא להפריע', עליכם לאשר את בקשת ההרשאה של האפליקציה  עבור התראות קריטיות. ניתן גם להפעיל ישירות את הגדרת 'התראות קריטיות' מתוך הגדרות ההודעות של האפליקציה.<br>
                    2. מטופלים בוחרים באיזה מכשיר הם רוצים לקבל התראות: קורא פריסטייל ליברה 2 או אפליקציית FreeStyle LibreLink. עליהם להפעיל את חיישן הפריסטייל ליברה 2 שלהם עם המכשיר שנבחר.<br>
                    לאחר שהמטופל סורק את חיישן הפריסטייל ליברה 2 עם המכשיר הזה, הוא יכול לקבל התראות רק באותו המכשיר. אפליקציית FreeStyle LibreLink תואמת רק למכשירים ניידים מסוימים<br>
                    ולמערכות הפעלה מסוימות. אנא עיינו באתר למידע נוסף על תאימות המכשיר לפני השימוש באפליקציה. השימוש ב- FreeStyle LibreLink מחייב הרשמה ב- LibreView<br>
                    3. החיישן הינו חסין מים עד לעומק של מטר אחד למשך עד 30 דקות לכל היותר. אסור לשימוש מעל 3,048 מטר<br>
                    4. יש צורך ב-60 דקות המתנה לאחר הצמדת החיישן.
                    </sup></i></p>
                </li>
            </ul>
        </div>
    </div>

</main>
    </div>
    <?php get_template_part('template-parts/freestyle/footer') ?>