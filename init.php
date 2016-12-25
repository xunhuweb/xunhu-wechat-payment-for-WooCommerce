<?php
/*
 * Plugin Name: Xunhu Wechat Payment For WooCommerce
 * Plugin URI: http://www.wpweixin.net
 * Description: 微信扫码支付、微信H5支付、支付宝扫码支付
 * Author: 重庆迅虎网络有限公司
 * Version: 1.0.0
 * Author URI:  http://www.wpweixin.net
 */

if (! defined ( 'ABSPATH' ))
	exit (); // Exit if accessed directly

if (! defined ( 'XH_Wechat_Payment' )) {define ( 'XH_Wechat_Payment', 'XH_Wechat_Payment' );} else {return;}
define ( 'XH_Wechat_Payment_VERSION', '1.0.0');
define ( 'XH_Wechat_Payment_FILE', __FILE__);
define ( 'XH_Wechat_Payment_DIR', rtrim ( plugin_dir_path ( XH_Wechat_Payment_FILE ), '/' ) );
define ( 'XH_Wechat_Payment_URL', rtrim ( plugin_dir_url ( XH_Wechat_Payment_FILE ), '/' ) );
load_plugin_textdomain( XH_Wechat_Payment, false,dirname( plugin_basename( __FILE__ ) ) . '/lang/'  );

require_once XH_Wechat_Payment_DIR.'/class-wechat-wc-payment-gateway.php';
global $XH_Wechat_Payment_WC_Payment_Gateway;
$XH_Wechat_Payment_WC_Payment_Gateway=new XH_Wechat_Payment_WC_Payment_Gateway();