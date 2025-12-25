<div class="cart__wrap">
  <div id="shipping_details_local_pickup3" class="shipping__details">
    <h2 class="cart__title"><?php echo __('איסוף עצמי ממרכז רפואי DMC בתל אביב', 'geffen') ?></h2>
    <p>
     <?= __('זמן האספקה ממרכז רפואי DMC תל אביב – 6 ימי עסקים.') ?>
    </p>
    <p><?= __('כתובת המרכז: הרצל רוזנבלום 6 תל אביב, במתחם סי אנד סאן.') ?></p>
    <p>
      <strong><?= __('מסרון יישלח למספר הטלפון הנייד המעודכן בהזמנה כאשר ההזמנה תהיה מוכנה לאיסוף', 'geffen') ?></strong>
    </p>
    <p><?= __('זמני איסוף: ימים א-ה בין השעות 09:00 ועד 16:30', 'geffen') ?></p>
    <p><?= __('ימי ו, ערבי חג וימי חול המועד: סגור', 'geffen') ?></p>
  </div>

  <div id="shipping_details_local_pickup6" class="shipping__details">
    <h2 class="cart__title"><?php echo __('איסוף עצמי מודיעין', 'geffen') ?></h2>
      <p>
   <?= __('זמן האספקה ממרכז הלוגיסטיקה של גפן מדיקל – 2 ימי עסקים.') ?>
    </p>
    <p><?= __('כתובת המרכז: צלע ההר 1 מודיעין.') ?></p>
    <p>
      <strong><?= __('מסרון יישלח למספר הטלפון הנייד המעודכן בהזמנה כאשר ההזמנה תהיה מוכנה לאיסוף.', 'geffen') ?></strong>
    </p>
    <p><?= __('זמני איסוף: ימים א-ה בין השעות 08:30 ועד 15:30.', 'geffen') ?></p>
    <p><?= __('ימי ו, ערבי חג וימי חול המועד: סגור', 'geffen') ?></p>
  </div>

  <?php get_template_part('template-parts/checkout-one-page/shipping', 'home') ?>

  <?php get_template_part('template-parts/checkout-one-page/shipping', 'done') ?>

</div>