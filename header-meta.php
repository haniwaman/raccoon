<?php
/**
 * Header Meta
 *
 * @package WordPress
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<?php wp_head(); ?>
<style>
@keyframes fadeInDown{from{opacity:0;transform:translateY(-50px)}to{opacity:1;transform:translateY(0)}}.fadein{opacity:0.1;transform:translate(0, 30px);transition:all 0.5s ease 0s}.fadein.m_anim{opacity:1;transform:translate(0, 0)}#header{width:100%;background:#fff;z-index:20}#header.m_anim{animation:fadeInDown 0.5s ease 0s 1 normal none running}#header.m_fixed{position:fixed;top:0;left:0;box-shadow:0 1px 3px rgba(0,0,0,0.16)}#header>.inner{display:flex;flex-wrap:wrap;align-items:center;padding-top:0;padding-bottom:0}@media screen and (max-width: 767px){#header>.inner{height:60px}}.header-logo{margin-right:auto}.header-logo a{transition:all 0.3s ease 0s;display:block;text-decoration:none;font-size:28px;font-weight:700}.header-logo a:hover{opacity:.6}.header-logo img{vertical-align:middle;width:auto;max-height:80px}@media screen and (max-width: 767px){.header-logo img{max-height:60px}}@media screen and (max-width: 767px){.header-nav{display:none}}.header-nav .header-list{display:flex}.header-nav li{margin-right:12px;position:relative;z-index:22;padding:16px 0}.header-nav li:hover>.sub-menu{visibility:visible;opacity:1}.header-nav li:last-child{margin-right:0}.header-nav li:last-child .sub-menu{left:auto;right:0}.header-nav li>a{text-decoration:none;display:block;padding:6px 8px;font-size:14px;transition:all 0.3s ease 0s}.header-nav li>a:hover{opacity:.6}.header-nav li.m_pickup a{background:#e65100;color:#fff;font-weight:700;box-shadow:0 0 3px 0 rgba(0,0,0,0.16)}.header-nav .sub-menu{font-size:16px;transition:all 0.3s ease 0s;position:absolute;top:100%;left:0;width:100%;opacity:0;z-index:21;min-width:200px;visibility:hidden;display:block;padding:0}.header-nav .sub-menu li{margin-bottom:2px;margin-right:0;height:auto;display:block;padding:0}.header-nav .sub-menu li a{display:block;height:auto;line-height:1.6;background:#efa336;padding:8px 28px 8px 16px;font-size:14px;font-weight:400;letter-spacing:0.05em}
</style>
</head>
