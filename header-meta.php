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
.fadein{-webkit-transform:translate(0,30px);opacity:.1;transform:translate(0,30px);transition:all .5s ease 0}.fadein.m_anim{-webkit-transform:translate(0,0);opacity:1;transform:translate(0,0)}#header{background:#fff;width:100%;z-index:1}#header.m_anim{-webkit-animation:a .5s ease 0 1 normal none running;animation:a .5s ease 0 1 normal none running}#header.m_fixed{box-shadow:0 1px 3px rgba(0,0,0,.16);left:0;position:fixed;top:0}#header>.inner{align-items:center;display:flex;flex-wrap:wrap;padding-bottom:0;padding-top:0}.header-logo{margin-right:auto}.header-logo a{display:block;font-size:28px;font-weight:700;text-decoration:none;transition:all .3s ease 0}.header-logo a:hover{opacity:.6}.header-logo img{max-height:5pc;vertical-align:middle;width:auto}.header-nav .header-list{display:flex}.header-nav li{margin-right:9pt;padding:1pc 0;position:relative;z-index:3}.header-nav li:hover>.sub-menu{opacity:1;visibility:visible}.header-nav li:last-child{margin-right:0}.header-nav li:last-child .sub-menu{left:auto;right:0}.header-nav li>a{display:block;font-size:14px;padding:6px 8px;text-decoration:none;transition:all .3s ease 0}.header-nav li>a:hover{opacity:.6}.header-nav li.m_pickup a{background:#e65100;box-shadow:0 0 3px 0 rgba(0,0,0,.16);color:#fff;font-weight:700}.header-nav .sub-menu{display:block;font-size:1pc;left:0;min-width:200px;opacity:0;padding:0;position:absolute;top:100%;transition:all .3s ease 0;visibility:hidden;width:100%;z-index:2}.header-nav .sub-menu li{display:block;height:auto;margin-bottom:2px;margin-right:0;padding:0}.header-nav .sub-menu li a{background:#efa336;display:block;font-size:14px;font-weight:400;height:auto;letter-spacing:.05em;line-height:1.6;padding:8px 28px 8px 1pc}@media screen and (max-width:767px){#header>.inner{height:60px}.header-logo img{max-height:60px}.header-nav{display:none}}@-webkit-keyframes a{0%{-webkit-transform:translateY(-50px);opacity:0;transform:translateY(-50px)}to{-webkit-transform:translateY(0);opacity:1;transform:translateY(0)}}@keyframes a{0%{-webkit-transform:translateY(-50px);opacity:0;transform:translateY(-50px)}to{-webkit-transform:translateY(0);opacity:1;transform:translateY(0)}}
</style>
</head>
