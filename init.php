<?php
/*
 * Plugin Name: Xunhu Wechat Payment For WooCommerce
 * Plugin URI: http://www.wpweixin.net
 * Description: 微信扫码支付、微信H5支付、支付宝扫码支付
 * Author: 重庆迅虎网络有限公司
 * Version: 1.0.4
 * Author URI:  http://www.wpweixin.net
 * Text Domain: Wechat Easy Digital Downloads
 */

if (! defined ( 'ABSPATH' ))
	exit (); // Exit if accessed directly

if (! defined ( 'XH_Wechat_Payment' )) {define ( 'XH_Wechat_Payment', 'XH_Wechat_Payment' );} else {return;}
define ( 'XH_Wechat_Payment_VERSION', '1.0.4');
define ( 'XH_Wechat_Payment_ID', 'xh-wechat-payment-wc');
define ( 'XH_Wechat_Payment_FILE', __FILE__);
define ( 'XH_Wechat_Payment_DIR', rtrim ( plugin_dir_path ( XH_Wechat_Payment_FILE ), '/' ) );
define ( 'XH_Wechat_Payment_URL', rtrim ( plugin_dir_url ( XH_Wechat_Payment_FILE ), '/' ) );
load_plugin_textdomain( XH_Wechat_Payment, false,dirname( plugin_basename( __FILE__ ) ) . '/lang/'  );

add_filter ( 'plugin_action_links_'.plugin_basename( XH_Wechat_Payment_FILE ),'xh_wechat_payment_plugin_action_links',10,1 );
function xh_wechat_payment_plugin_action_links($links) {
    return array_merge ( array (
        'settings' => '<a href="' . admin_url ( 'admin.php?page=wc-settings&tab=checkout&section='.XH_Wechat_Payment_ID ) . '">'.__('Settings',XH_Wechat_Payment).'</a>'
    ), $links );
}
if(!class_exists('WC_Payment_Gateway')){
    return;
}

require_once XH_Wechat_Payment_DIR.'/class-wechat-wc-payment-gateway.php';
global $XH_Wechat_Payment_WC_Payment_Gateway;
$XH_Wechat_Payment_WC_Payment_Gateway= new XH_Wechat_Payment_WC_Payment_Gateway();

add_action('init', array($XH_Wechat_Payment_WC_Payment_Gateway,'notify'),10);