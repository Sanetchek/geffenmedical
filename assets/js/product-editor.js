jQuery(document).ready(function($) {
  $("body").on("change", "input.tab-radio", function() {
    const wrap = $(this).closest(".options_group");
    var selectedTab = $(wrap).find("input.tab-radio:checked").val();
    if (selectedTab == "case") {
      $(wrap).find(".max-quantity-field").show();
    } else {
      $(wrap).find(".max-quantity-field").hide();
      $(wrap).find(".max-quantity-input").val("");
    }
  });
});