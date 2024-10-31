<?php

// Check if is non-administrator user
// Case true, hide some profile fields by your css class name
if (!current_user_can('administrator')) {
  add_action('personal_options', 'pxl_hide_user_personal_options');
  remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
}

function pxl_hide_user_personal_options()
{
?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('#your-profile .form-table:first, #your-profile h3:first, .yoast, .user-description-wrap, .user-display-name-wrap, .user-url-wrap, h2, .user-pinterest-wrap, .user-myspace-wrap, .user-soundcloud-wrap, .user-tumblr-wrap, .user-wikipedia-wrap, .user-facebook-wrap, .user-instagram-wrap, .user-linkedin-wrap, .user-twitter-wrap, .user-youtube-wrap').hide();
    });
  </script>
<?php
}
