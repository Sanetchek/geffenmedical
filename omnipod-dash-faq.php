<?php

/**
 * Template Name: Omnipod-dash-FAQ
 * Template Post Type: omnipod
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
<main class="omnipod-main-page">
  <div class="omnipod-main-page-title">
    <div class="omnipod-main-page-title-img">
      <img src="/wp-content/themes/geffenmedical/assets/img/FAQ_main_Picture-ioga.jpg"
        alt="">
    </div>
    <h1 class="omnipod-main-page-h1">שאלות נפוצות מערכת לניהול אינסולין ®Omnipod DASH</h1>
  </div>


  <div class="container reader realReader">
    <div class="section g-24-40">
      <div class="row">
        <div class="col-lg-3 col-sm-12">
        </div>
        <div class="col-lg-6 col-sm-12 omnipod-style-page">
          <div class="instructions-use-fl3 omnipod-accordions-page">
            <div class="instruction-use-fl3 omnipod-accordion-page">
              <button id="expandCollapseButton"></button>
            </div>

            <div class="accordion">
              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>מהי מערכת ה-®Omnipod DASH?</strong></p>
                </div>

                <div class="accordion-content" style="display: none;">
                  <p>מערכת ה-®Omnipod DASH הינה משאבת אינסולין ללא צינורית, שניתן לחבר על הגוף המכילה עד 200 יחידות
                    אינסולין. המערכת מספקת טיפול רציף באינסולין1 באמצעות קצבים בזאלים ומינוני בולוס הניתנים להתאמה
                    אישית. המערכת מורכבת מפוד שהוא משאבת אינסולין עמידה במים2 שניתן לחבר על הגוף, וממנהל סוכרת אישי-
                    Omnipod DASH® PDM, שבאמצעותו ניתן לשלוט באופן אלחוטי3 בפוד. ה-Omnipod DASH® PDM כולל ממשק מסך מגע
                    מודרני, פשוט, צבעוני ואינטואיטיבי.</p>
                  <p>מערכת ה-®Omnipod DASH כוללת את התכונות הבאות:</p>
                  <ul class="omnipod-page-list-disck">
                    <li>
                      <p>פוד דיסקרטי, ללא צינורית ועמיד למים<sup style="font-size: 75%;">2</sup></p>
                    </li>
                    <li>
                      <p>פרופיל אינסולין בזאלי הניתן להתאמה אישית ומחשבון בולוס</p>
                    </li>
                    <li>
                      <p>תצוגות גרפיות אינטואיטיביות</p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>באילו מדי סוכר לבדיקה בדם (BGM) או מדי סוכר רציפים (CGM) ניתן להשתמש עם מערכת ה-®Omnipod
                      DASH?</strong></p>
                </div>

                <div class="accordion-content">
                  <p>מערכת ה-®Omnipod DASH אינה מוגבלת לשימוש בלעדי בשום מערכת לניטור סוכר רציף (CGM) או מד סוכר לבדיקה
                    בדם (BGM). אין ממשק משולב עם מערכת לניטור סוכר רציף, אולם מערכת ה-®Omnipod DASH מאפשרת למשתמש להזין
                    ידנית את קריאת רמת הסוכר שלו מכל מכשיר שיבחר.</p>
                  <p>משתמשים יכולים להזין ידנית קריאות של רמות סוכר מכל מד סוכר שהם בוחרים להשתמש בו. לאחר הזנת קריאות
                    רמת הסוכר, המשתמש יכול לבחור לשמור את ערך רמת הסוכר שהוזן בהיסטוריה שלו או להוסיף אותו למחשבון
                    הבולוס של ה- Omnipod DASH® PDM כדי לספק בולוס.</p>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם מערכת ה-®Omnipod DASH מאפשרת לך להגדיר קצב בזאלי של אפס ?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>כן, עם מערכת ה-®Omnipod DASH ניתן להגדיר קצב בזאלי של 0.0 יח' / שעה</p>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>מה גודל השלט של מערכת ה-®Omnipod DASH ?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>ה- Omnipod DASH® PDM הוא טכנולוגיה דמוית טלפון חכם דק עם מסך 4 אינץ' ועובי של 1 ס"מ. המכשיר הוא גם קל משקל, משקלו עומד על 106 גרם.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>מהי המשמעות של טכנולוגיית ®Bluetooth אלחוטית בהתייחס למערכת ה-®Omnipod DASH?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>טכנולוגיית ®Bluetooth אלחוטית מאפשרת קישוריות בין ה- PDM של מערכת ה-®Omnipod DASH ופוד.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם ה- Omnipod DASH® PDM עמיד למים? האם הפוד עדיין עמיד למים?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>ה-Omnipod DASH® PDM אינו עמיד למים. הפוד עדיין עמיד למים עם דירוג IP28 עד 7.6 מטר למשך 60 דקות.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>כמה זמן לוקח להגיע לטעינה מלאה של סוללת ה- Omnipod DASH® PDM?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>ל- Omnipod DASH® PDM לוקח עד 1.5 שעות להגיע לטעינה של 80% ומעלה.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם אוכל להעביר את ה-Omnipod DASH® PDM דרך מכונת הרנטגן בשדה התעופה?</strong></p>
                </div>
                <div class="accordion-content">
                 <ul  class="omnipod-page-list-disck">
                  <li>
                    <p>כן. ניתן להתייחס לשימוש ב- PDM והפודים של מערכת ה- Omnipod DASH® בשדה התעופה באותו האופן כמו עם ה- PDM והפודים של מערכת האומניפוד. זה בטוח לעבור דרך מכונת הרנטגן ולהיות מחובר לפוד בעת מעבר דרך סורקי שדה תעופה.</p>
                    </li>
                    <li>
                    <p>טיפים נוספים לנסיעות עם מערכת ®Omnipod DASH זמינים במדריך מקורות מידע לפודר של מערכת ה-®Omnipod DASH</p>
                  </li>
                 </ul>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>מהם ההבדלים העיקריים בין מערכת ה- ®Omnipod DASH החדשה לבין מערכת ה- ®Omnipod הנוכחית?</strong></p>
                </div>
                <div class="accordion-content">
                <ul  class="omnipod-page-list-disck">
                  <li>
                    <p>ל- Omnipod DASH® PDM יש ממשק מסך מגע מודרני שהינו קל משקל, פשוט, צבעוני ואינטואיטיבי.</p>
                    </li>
                    <li>
                    <p>תכנון הממשק החדש הובל על ידי חוויית משתמש לייעול הניווט והתצוגות.</p>
                  </li>
                  <li>
                    <p>מערכת ה-®Omnipod DASH כוללת קישוריות באמצעות טכנולוגיית ®Bluetooth אלחוטית.</p>
                  </li>
                  <li>
                    <p>ה- Omnipod DASH® PDM הוא טכנולוגיה דמוית סמארטפון, שבו משתמשים יכולים להזין בקלות קריאות רמות סוכר באופן ידני מכל מד סוכר שהם בחרו להשתמש בו.</p>
                  </li>
                  <li>
                    <p>ישנן כמה תכונות שנוספו למערכת ה- ®Omnipod DASH החדשה. כמו היכולת להגדיר קצב בזאלי של אפס, להגדיר יחס אינסולין פחמימה עשרוני ולעקוב אחר היסטוריית אתרי חיבור הפוד .</p>
                  </li>
                 </ul>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>באילו שפות ה- Omnipod DASH® PDM זמין?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>ה-PDM זמין באנגלית, דנית, הולנדית, פינית, צרפתית, גרמנית, איטלקית, נורווגית ושוודית.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>מערכת האומניפוד הנוכחית שלי נמצאת באחריות - אם יש לי בעיה שהיא מכוסה תחת אחריות, האם יחליפו לי אותה במערכת ®Omnipod DASH?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>אם מערכת האומניפוד הנוכחית שבה אתה משתמש נמצאת תחת אחריות ואתה נתקל בבעיה או תקלה שדורשת החלפה באחריות של המערכת, גפן מדיקל תחליף באותה גרסה של מערכת האומניפוד בה אתה משתמש כרגע, ולא מערכת ®Omnipod DASH. לקבלת מידע על אופן השגת מערכת ה- ®Omnipod DASH , אנא פנה לרופא המטפל שלך,לנציג המקומי שלך או לצוות שירות הלקוחות שלנו.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם הפודים של מערכת האומניפוד הנוכחית שלי יעבדו עם מערכת ®Omnipod DASH החדשה?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>לא, הפודים הנוכחיים של מערכת האומניפוד לא יהיו תואמים למערכת ה-®Omnipod DASH . לפודים של מערכת ה-®Omnipod DASH יש מכסה מחט כחול ותווית פוד מעודכנת לצורך הבחנה בין הדגמים. בנוסף, ה- PDM הנוכחי של מערכת האומניפוד לא יהיה תואם לפודים של מערכת ה-®Omnipod DASH.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>איך ניתן לדעת שקיבלת את הפודים הנכונים עם ה-Omnipod DASH® PDM?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>לפודים של מערכת ה- ®Omnipod DASH יש מכסה מחט כחול, תווית פוד מעודכנת ומספר ייחודי כדי להבדיל אותם במדויק מפודים אחרים.</p>
                  <p>השלט והפודים של מערכת ה- ®Omnipod DASH אינם תואמים למערכת האומניפוד הנוכחית.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם הפוד של מערכת ה- ®Omnipod DASH זהה לגודלו של הפוד של מערכת האומניפוד הנוכחית?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>כן, הפוד של מערכת ®Omnipod DASH זהה לגודל הפוד של מערכת האומניפוד הנוכחית. מערכת האומניפוד ומערכת ה-®Omnipod DASH אינן תואמות - אינך יכול להשתמש בפודים ממערכת אחת עם השנייה.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם הפוד של מערכת ה-®Omnipod DASH מכיל פחות או יותר אינסולין?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>בפוד של מערכת ה-®Omnipod DASH ניתן למלא עד 200 יחידות של אינסולין U-100, כמו הפודים במערכת האומניפוד הנוכחית.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם גם הפוד של מערכת ה-®Omnipod DASH מספק אינסולין לתקופת זמן של עד 3 ימים ?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>כן. מערכת ה-®Omnipod DASH מספקת עד 72 שעות של הזלפת אינסולין רציפה.</p>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header">
                  <span class="icon">+</span>
                  <p><strong>האם יופסק השיווק של מערכת האומניפוד הנוכחית?</strong></p>
                </div>
                <div class="accordion-content">
                  <p>בשלב זה, שיווק מערכת האומניפוד הנוכחית לא תיפסק. משתמשים יכולים להמשיך ליהנות ממערכת האומניפוד הנוכחית שלהם. משתמשים אינם צריכים לעבור למערכת ה- ®Omnipod DASH ויכולים להמשיך להשתמש ולקבל פודים עם מערכת האומניפוד הקיימת.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12">
        </div>
      </div>
    </div>
  </div>
</main>
</div>

<?php get_footer(); ?>