<?php
/**
 * Template Name: Search-page
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

get_header(); ?>
<style>
  .search-page-conteiner {
    margin-top: 40px;
  }

  .search-page-input {
    width: 100%;
    border-radius: 10px;
    border: 1px solid #D9D9D9;
    background: #FFF;
    height: 60px;
    padding: 0.5rem 3.75rem 0.5rem 1.1875rem !important;
  }

  .block-search-page-inside {
    position: relative;
  }

  .block-search-page-inside::before {
    content: "";
    display: block;
    position: absolute;
    top: 12px;
    right: 3.5rem;
    width: 0.0625rem;
    height: 2.5rem;
    background-color: #0A3B64;
    z-index: 2;
  }

  .search-page-input::placeholder {
    font-size: 1rem;
    color: rgba(10, 59, 100, 0.80);
    text-align: right;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
  }

  .block-search-page-inside::after {
    background: url("/wp-content/uploads/2023/12/group.png") no-repeat center/contain;
    content: "";
    display: block;
    width: 1rem;
    height: 1rem;
    position: absolute;
    top: 26px;
    right: 1.375rem;
  }
  .search-page-conteiner-product{
    margin: 30px 0;
    padding-bottom: 30px;
    border-bottom: 1px solid #C4E7FB;
  }
  .search-page-conteiner-product-img{
    width: 384px;
    border-radius: 9px;
    border: 1px solid #D9D9D9;
    height: 248px;
    display: flex;
    justify-content: center;
  }
  .search-page-conteiner-product-info{
    display: flex;
    align-items: center;
  }
  .search-page-conteiner-product-info-content h1.product-title{
 color: #0A3B64;
text-align: right;
font-family: Assistant;
font-size: 25px;
font-style: normal;
font-weight: 700;
line-height: normal;
  }
  .search-page-conteiner-product-info-content p.product-info-subtitle{
    color: #0A3B64;
    text-align: right;
    font-family: Assistant;
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
  }
  .search-page-conteiner-product-info-content .promotions-item-prise{
    color: #0A3B64;
text-align: right;
font-family: Assistant;
font-style: normal;
font-weight: 700;
line-height: normal;
  }
</style>
<div class="contact-page">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start">תוצאות חיפוש</h1>
      </div>
    </div>
  </div>
  <div class="conteiner-968 search-page-conteiner">
    <div class="row">
      <div class="col-md-12">
        <section id="block-2" class="widget widget_block widget_search">
          <form role="search" method="get" action="/"
            class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
            <div class="wp-block-search__inside-wrapper block-search-page-inside">
              <input class="wp-block-search__input search-page-input" id="wp-block-search__input-1"
                placeholder="גלוקוסטנדרט" value="" type="search" name="s" required="">

            </div>
          </form>
        </section>

      </div>
    </div>

    <div class="conteiner-968">
      <div class="row  search-page-conteiner-product">
        <div class="col-6">
          <div class="search-page-conteiner-product-img">
            <img src="/wp-content/uploads/2023/09/1-8.svg" alt="">
          </div>
        </div>
        <div class="col-6 search-page-conteiner-product-info">
          <a class="search-page-conteiner-product-info-content" href="/product/glucostandard-15/">
            <div class="product-info">
              <h1 class="product-title">גלוצרנה פלוס</h1>
              <p class="product-info-subtitle">מזון ייעודי להשלמה תזונתית או לתזונה מלאה לחולי סוכרת</p>
              <div class="promotions-prise">
                <p class="promotions-item-prise">309 ₪</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row  search-page-conteiner-product">
        <div class="col-6">
          <div class="search-page-conteiner-product-img">
            <img src="/wp-content/uploads/2023/09/1-8.svg" alt="">
          </div>
        </div>
        <div class="col-6 search-page-conteiner-product-info">
          <a class="search-page-conteiner-product-info-content" href="/product/glucostandard-15/">
            <div class="product-info">
              <h1 class="product-title">גלוצרנה פלוס</h1>
              <p class="product-info-subtitle">מזון ייעודי להשלמה תזונתית או לתזונה מלאה לחולי סוכרת</p>
              <div class="promotions-prise">
                <p class="promotions-item-prise">309 ₪</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row  search-page-conteiner-product">
        <div class="col-6">
          <div class="search-page-conteiner-product-img">
            <img src="/wp-content/uploads/2023/09/1-8.svg" alt="">
          </div>
        </div>
        <div class="col-6 search-page-conteiner-product-info">
          <a class="search-page-conteiner-product-info-content" href="/product/glucostandard-15/">
            <div class="product-info">
              <h1 class="product-title">גלוצרנה פלוס</h1>
              <p class="product-info-subtitle">מזון ייעודי להשלמה תזונתית או לתזונה מלאה לחולי סוכרת</p>
              <div class="promotions-prise">
                <p class="promotions-item-prise">309 ₪</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>


  </div>
</div>

<?php get_footer(); ?>