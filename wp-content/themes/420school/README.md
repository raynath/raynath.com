# 420.school WordPress Theme

Minimal theme scaffolding to mirror the existing static `index.html`.

## Install

1. Copy this folder `420school` into your WordPress `wp-content/themes/` directory.
2. In the WordPress admin, go to Appearance → Themes, and activate "420.school".
3. Go to Settings → Reading and set "Your homepage displays" to "A static page" and choose a page for Home. The `front-page.php` template will render for the home page.
4. Place the image asset into `wp-content/themes/420school/assets/PXL_20231209_050307132.jpg`.

## Development notes

- Styles are in `style.css`.
- Edit `front-page.php` to customize the homepage hero and content.
- Templates follow standard WordPress hierarchy: `index.php`, `single.php`, `page.php`, `archive.php`, `404.php`.

