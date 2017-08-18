-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2016 at 12:59 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crunchy`
--

-- --------------------------------------------------------

--
-- Table structure for table `dn_addons`
--

CREATE TABLE IF NOT EXISTS `dn_addons` (
`addon_id` int(11) NOT NULL,
  `addon_name` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `addon_image` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_currency`
--

CREATE TABLE IF NOT EXISTS `dn_currency` (
  `currency_code_alpha` char(3) NOT NULL,
  `currency_code_numeric` varchar(3) DEFAULT NULL,
  `currency_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dn_currency`
--

INSERT INTO `dn_currency` (`currency_code_alpha`, `currency_code_numeric`, `currency_name`) VALUES
('AFN', '971', 'Afghani'),
('DZD', '12', 'Algerian Dinar'),
('ARS', '32', 'Argentine Peso'),
('AMD', '51', 'Armenian Dram'),
('AWG', '533', 'Aruban Guilder'),
('AUD', '36', 'Australian Dollar'),
('AZN', '944', 'Azerbaijanian Manat'),
('BSD', '44', 'Bahamian Dollar'),
('BHD', '48', 'Bahraini Dinar'),
('THB', '764', 'Baht'),
('PAB', '590', 'Balboa'),
('BBD', '52', 'Barbados Dollar'),
('BYR', '974', 'Belarussian Ruble'),
('BZD', '84', 'Belize Dollar'),
('BMD', '60', 'Bermudian Dollar (customarily known as Bermuda Dollar)'),
('VEF', '937', 'Bolivar Fuerte'),
('BOB', '68', 'Boliviano'),
('XBA', '955', 'Bond Markets Units European Composite Unit (EURCO)'),
('BRL', '986', 'Brazilian Real'),
('BND', '96', 'Brunei Dollar'),
('BGN', '975', 'Bulgarian Lev'),
('BIF', '108', 'Burundi Franc'),
('CAD', '124', 'Canadian Dollar'),
('CVE', '132', 'Cape Verde Escudo'),
('KYD', '136', 'Cayman Islands Dollar'),
('GHS', '936', 'Cedi'),
('XOF', '952', 'CFA Franc BCEAO'),
('XAF', '950', 'CFA Franc BEAC'),
('XPF', '953', 'CFP Franc'),
('CLP', '152', 'Chilean Peso'),
('XTS', '963', 'Codes specifically reserved for testing purposes'),
('COP', '170', 'Colombian Peso'),
('KMF', '174', 'Comoro Franc'),
('CDF', '976', 'Congolese Franc'),
('BAM', '977', 'Convertible Marks'),
('NIO', '558', 'Cordoba Oro'),
('CRC', '188', 'Costa Rican Colon'),
('HRK', '191', 'Croatian Kuna'),
('CUP', '192', 'Cuban Peso'),
('CZK', '203', 'Czech Koruna'),
('GMD', '270', 'Dalasi'),
('DKK', '208', 'Danish Krone'),
('MKD', '807', 'Denar'),
('DJF', '262', 'Djibouti Franc'),
('STD', '678', 'Dobra'),
('DOP', '214', 'Dominican Peso'),
('VND', '704', 'Dong'),
('XCD', '951', 'East Caribbean Dollar'),
('EGP', '818', 'Egyptian Pound'),
('SVC', '222', 'El Salvador Colon'),
('ETB', '230', 'Ethiopian Birr'),
('EUR', '978', 'Euro'),
('XBB', '956', 'European Monetary Unit (E.M.U.-6)'),
('XBD', '958', 'European Unit of Account 17 (E.U.A.-17)'),
('XBC', '957', 'European Unit of Account 9 (E.U.A.-9)'),
('FKP', '238', 'Falkland Islands Pound'),
('FJD', '242', 'Fiji Dollar'),
('HUF', '348', 'Forint'),
('GIP', '292', 'Gibraltar Pound'),
('XAU', '959', 'Gold'),
('HTG', '332', 'Gourde'),
('PYG', '600', 'Guarani'),
('GNF', '324', 'Guinea Franc'),
('GWP', '624', 'Guinea-Bissau Peso'),
('GYD', '328', 'Guyana Dollar'),
('HKD', '344', 'Hong Kong Dollar'),
('UAH', '980', 'Hryvnia'),
('ISK', '352', 'Iceland Krona'),
('INR', '356', 'Indian Rupee'),
('IRR', '364', 'Iranian Rial'),
('IQD', '368', 'Iraqi Dinar'),
('JMD', '388', 'Jamaican Dollar'),
('JOD', '400', 'Jordanian Dinar'),
('KES', '404', 'Kenyan Shilling'),
('PGK', '598', 'Kina'),
('LAK', '418', 'Kip'),
('EEK', '233', 'Kroon'),
('KWD', '414', 'Kuwaiti Dinar'),
('MWK', '454', 'Kwacha'),
('AOA', '973', 'Kwanza'),
('MMK', '104', 'Kyat'),
('GEL', '981', 'Lari'),
('LVL', '428', 'Latvian Lats'),
('LBP', '422', 'Lebanese Pound'),
('ALL', '8', 'Lek'),
('HNL', '340', 'Lempira'),
('SLL', '694', 'Leone'),
('LRD', '430', 'Liberian Dollar'),
('LYD', '434', 'Libyan Dinar'),
('SZL', '748', 'Lilangeni'),
('LTL', '440', 'Lithuanian Litas'),
('LSL', '426', 'Loti'),
('MGA', '969', 'Malagasy Ariary'),
('MYR', '458', 'Malaysian Ringgit'),
('TMT', '934', 'Manat'),
('MUR', '480', 'Mauritius Rupee'),
('MZN', '943', 'Metical'),
('MXN', '484', 'Mexican Peso'),
('MXV', '979', 'Mexican Unidad de Inversion (UDI)'),
('MDL', '498', 'Moldovan Leu'),
('MAD', '504', 'Moroccan Dirham'),
('BOV', '984', 'Mvdol'),
('NGN', '566', 'Naira'),
('ERN', '232', 'Nakfa'),
('NAD', '516', 'Namibia Dollar'),
('NPR', '524', 'Nepalese Rupee'),
('ANG', '532', 'Netherlands Antillian Guilder'),
('ILS', '376', 'New Israeli Sheqel'),
('RON', '946', 'New Leu'),
('TWD', '901', 'New Taiwan Dollar'),
('NZD', '554', 'New Zealand Dollar'),
('BTN', '64', 'Ngultrum'),
('KPW', '408', 'North Korean Won'),
('NOK', '578', 'Norwegian Krone'),
('PEN', '604', 'Nuevo Sol'),
('MRO', '478', 'Ouguiya'),
('TOP', '776', 'Pa''anga'),
('PKR', '586', 'Pakistan Rupee'),
('XPD', '964', 'Palladium'),
('MOP', '446', 'Pataca'),
('CUC', '931', 'Peso Convertible'),
('UYU', '858', 'Peso Uruguayo'),
('PHP', '608', 'Philippine Peso'),
('XPT', '962', 'Platinum'),
('GBP', '826', 'Pound Sterling'),
('BWP', '72', 'Pula'),
('QAR', '634', 'Qatari Rial'),
('GTQ', '320', 'Quetzal'),
('ZAR', '710', 'Rand'),
('OMR', '512', 'Rial Omani'),
('KHR', '116', 'Riel'),
('MVR', '462', 'Rufiyaa'),
('IDR', '360', 'Rupiah'),
('RUB', '643', 'Russian Ruble'),
('RWF', '646', 'Rwanda Franc'),
('SHP', '654', 'Saint Helena Pound'),
('SAR', '682', 'Saudi Riyal'),
('XDR', '960', 'SDR'),
('RSD', '941', 'Serbian Dinar'),
('SCR', '690', 'Seychelles Rupee'),
('XAG', '961', 'Silver'),
('SGD', '702', 'Singapore Dollar'),
('SBD', '90', 'Solomon Islands Dollar'),
('KGS', '417', 'Som'),
('SOS', '706', 'Somali Shilling'),
('TJS', '972', 'Somoni'),
('LKR', '144', 'Sri Lanka Rupee'),
('SDG', '938', 'Sudanese Pound'),
('SRD', '968', 'Surinam Dollar'),
('SEK', '752', 'Swedish Krona'),
('CHF', '756', 'Swiss Franc'),
('SYP', '760', 'Syrian Pound'),
('BDT', '50', 'Taka'),
('WST', '882', 'Tala'),
('TZS', '834', 'Tanzanian Shilling'),
('KZT', '398', 'Tenge'),
('XXX', '999', 'Codes assigned for transactions where no currency is involved'),
('TTD', '780', 'Trinidad and Tobago Dollar'),
('MNT', '496', 'Tugrik'),
('TND', '788', 'Tunisian Dinar'),
('TRY', '949', 'Turkish Lira'),
('AED', '784', 'UAE Dirham'),
('UGX', '800', 'Uganda Shilling'),
('XFU', NULL, 'UIC-Franc'),
('COU', '970', 'Unidad de Valor Real'),
('CLF', '990', 'Unidades de fomento'),
('UYI', '940', 'Uruguay Peso en Unidades Indexadas'),
('USD', '840', 'US Dollar'),
('USN', '997', 'US Dollar (Next day)'),
('USS', '998', 'US Dollar (Same day)'),
('UZS', '860', 'Uzbekistan Sum'),
('VUV', '548', 'Vatu'),
('CHE', '947', 'WIR Euro'),
('CHW', '948', 'WIR Franc'),
('KRW', '410', 'Won'),
('YER', '886', 'Yemeni Rial'),
('JPY', '392', 'Yen'),
('CNY', '156', 'Yuan Renminbi'),
('ZMK', '894', 'Zambian Kwacha'),
('ZWL', '932', 'Zimbabwe Dollar'),
('PLN', '985', 'Zloty');

-- --------------------------------------------------------

--
-- Table structure for table `dn_email_settings`
--

CREATE TABLE IF NOT EXISTS `dn_email_settings` (
`id` int(11) NOT NULL,
  `smtp_host` varchar(512) NOT NULL,
  `smtp_port` int(10) NOT NULL,
  `smtp_user` varchar(512) NOT NULL,
  `smtp_password` varchar(512) NOT NULL,
  `api_key` varchar(512) NOT NULL,
  `mail_config` enum('webmail','mandrill') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dn_email_settings`
--

INSERT INTO `dn_email_settings` (`id`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_password`, `api_key`, `mail_config`) VALUES
(1, 'mail.mindsworthy.com', 587, 'contact@mindsworthy.com', '9490472748', '', 'webmail');

-- --------------------------------------------------------

--
-- Table structure for table `dn_email_templates`
--

CREATE TABLE IF NOT EXISTS `dn_email_templates` (
`id` int(11) unsigned NOT NULL,
  `subject` varchar(512) NOT NULL,
  `email_template` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `dn_email_templates`
--

INSERT INTO `dn_email_templates` (`id`, `subject`, `email_template`, `status`) VALUES
(58, 'when_user_order_booked_template_mail_to_admin', '<p><img alt="SITE LOGO" src="http://conquerorslabs.com/crunchy/uploads/site_logo/site_logo.png" />&nbsp; &nbsp; &nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to __SITE_TITLE__ </strong></h2>\n\n<p>&nbsp;</p>\n\n<p>Hello Dear Admin,&nbsp;</p>\n\n<p><strong>__USER_NAME__&nbsp;</strong>has&nbsp;successfully Booked an order</p>\n\n<p>&nbsp;</p>\n\n<p><strong>USER DETAILS</strong></p>\n\n<p>Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__USER_NAME__</strong></p>\n\n<p>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__EMAIL__</strong></p>\n\n<p>Phone &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__PHONE__</strong></p>\n\n<p>Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__ADDRESS__</strong></p>\n\n<p>Landmark &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__LAND_MARK__</strong></p>\n\n<p>City &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__CITY__</strong></p>\n\n<p>PINCode &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__PIN_CODE__</strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong>ORDER DETAILS</strong></p>\n\n<p>Order Type &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;__ORDER_TYPE__</strong></p>\n\n<p>No of Items Booked &nbsp; &nbsp;&nbsp;<strong>__NO_OF_ITEMS__</strong></p>\n\n<p>Order Booked Time &nbsp; &nbsp;&nbsp;<strong>__ORDER_TIME__</strong></p>\n\n<p>Total Cost &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__TOTAL_COST__</strong></p>\n\n<p>Payment Mode &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__PAYMENT_MODE__</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\n\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\n\n<p>&nbsp;</p>\n\n<p><a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/android.png" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/appleios.png" /></a></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Regards,</strong>&nbsp;<br />\nCustomer Support<br />\n<strong>__SITE_TITLE__</strong> | Restaurent System</p>\n\n<p><strong>__COPY_RIGHTS__</strong></p>\n', 'Active'),
(60, 'order_cancelled', '<p><img src="http://conquerorslabs.com/crunchy/uploads/site_logo/site_logo.png" />&nbsp; &nbsp; &nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Welcome to __SITE_TITLE__</strong></h2>\n\n<p>&nbsp;</p>\n\n<p><strong>Dear __NAME__</strong><strong> </strong><strong>,</strong></p>\n\n<p>Your Order No <strong>__ORDER__NO__ &nbsp;</strong>status has changed</p>\n\n<p><strong>ITEM DELETED FROM&nbsp;ORDER</strong></p>\n\n<p><strong>__ITEM_NAME__&nbsp;</strong>is deleted form Order, for details please login to Mobile app and check the order history</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>For any assistance or questions, feel free to contact us at <strong>__CONTACT__EMAIL__</strong>&nbsp; or call us at <strong>__CONTACT__NO__</strong></p>\n\n<p>&nbsp;</p>\n\n<p><a href="&lt;?php echo base_url();?&gt;" target="_blank"><img src="http://conquerorslabs.com/crunchy/assets/images/android.png" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/appleios.png" /></a></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Regards,</strong>&nbsp;<br />\nCustomer Support</p>\n\n<p><strong>__SITE_TITLE__</strong></p>\n\n<p><strong>__COPY_RIGHTS__</strong></p>\n', 'Active'),
(7, 'registration_template', '<p><img alt="SITE LOGO" src="http://conquerorslabs.com/crunchy/uploads/site_logo/site_logo.png" />&nbsp; &nbsp; &nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__ </strong></h2>\n\n<p>&nbsp;</p>\n\n<p>Dear <strong>__USER__NAME__</strong>,&nbsp;</p>\n\n<p>You have successfully Registered in&nbsp;<strong>__SITE_TITLE__</strong></p>\n\n<p><strong>Your credentials</strong></p>\n\n<p>Email<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; __EMAIL__</strong></p>\n\n<p>Password<strong>&nbsp; __PASSWORD__</strong></p>\n\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\n\n<p>Please click this link for <strong>__ACCOUNT_ACTIVATOIN_LINK__</strong></p>\n\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\n\n<p>&nbsp;</p>\n\n<p><a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/android.png" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/appleios.png" /></a></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Regards,</strong>&nbsp;<br />\nCustomer Support<br />\n<strong>__SITE_TITLE__</strong> | Restaurent System</p>\n\n<p><strong>__COPY_RIGHTS__</strong></p>\n', 'Active'),
(57, 'when_user_order_booked_template_mail_to_user', '<p><img alt="SITE LOGO" src="http://conquerorslabs.com/crunchy/uploads/site_logo/site_logo.png" />&nbsp; &nbsp; &nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__ </strong></h2>\n\n<p>&nbsp;</p>\n\n<p>Dear <strong>__USER_NAME__</strong>,&nbsp;</p>\n\n<p>You have successfully Booked an order in&nbsp;<strong>__SITE_TITLE__</strong></p>\n\n<p><strong>ORDER DETAILS</strong></p>\n\n<p>Order Type &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;__ORDER_TYPE__</strong></p>\n\n<p>No of Items Booked &nbsp; &nbsp;&nbsp;<strong>__NO_OF_ITEMS__</strong></p>\n\n<p>Order Delivered Time &nbsp; &nbsp;&nbsp;<strong>__ORDER_TIME__</strong></p>\n\n<p>Total Cost &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__TOTAL_COST__</strong></p>\n\n<p>Payment Mode &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__PAYMENT_MODE__</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\n\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\n\n<p>&nbsp;</p>\n\n<p><a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/android.png" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/appleios.png" /></a></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Regards,</strong>&nbsp;<br />\nCustomer Support<br />\n<strong>__SITE_TITLE__</strong> | Restaurent System</p>\n\n<p><strong>__COPY_RIGHTS__</strong></p>\n', 'Active'),
(8, 'fb_google_registration_template', '<p><img src="http://conquerorslabs.com/crunchy/uploads/site_logo/site_logo.png" />&nbsp; &nbsp; &nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Welcome&nbsp;to&nbsp;__SITE_TITLE__</strong></h2>\n\n<p>&nbsp;</p>\n\n<p><strong>Dear __USER_NAME__&nbsp;,</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Email &nbsp; &nbsp; &nbsp;: &nbsp;<strong>__EMAIL__</strong></p>\n\n<p>Password : <strong>__PASSWORD__</strong></p>\n\n<p>For any assistance or questions, feel free to contact us at&nbsp;<strong>__CONTACT_US__&nbsp;</strong>or call us at&nbsp;<strong>__CONTACT__NO__</strong></p>\n\n<p><img src="http://conquerorslabs.com/crunchy/assets/images/android.png" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src="http://conquerorslabs.com/crunchy/assets/images/appleios.png" /></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Regards,</strong>&nbsp;<br />\nCustomer Support</p>\n\n<p><strong>__SITE_TITLE__</strong>&nbsp;| Restaurent System</p>\n\n<p><strong>__COPY_RIGHTS__</strong></p>\n', 'Active'),
(59, 'order_status_changed', '<p><img src="http://conquerorslabs.com/crunchy/uploads/site_logo/site_logo.png" />&nbsp; &nbsp; &nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Welcome&nbsp;to&nbsp;__SITE_TITLE__</strong></h2>\n\n<p>&nbsp;</p>\n\n<p><strong>Dear __NAME__</strong><strong> </strong><strong>,</strong></p>\n\n<p>Your Order No <strong>__ORDER__NO__ &nbsp;</strong>status has changed</p>\n\n<p><strong>ORDER DETAILS</strong></p>\n\n<p>No of Items Booked &nbsp; &nbsp;&nbsp;<strong>__NO_OF_ITEMS__</strong></p>\n\n<p>Order Booked Time &nbsp; &nbsp;&nbsp;<strong>__ORDER_TIME__</strong></p>\n\n<p>Total Cost &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__TOTAL_COST__</strong></p>\n\n<p>Payment Mode &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__PAYMENT_MODE__</strong></p>\n\n<p>Message<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;__MESSAGE__</strong></p>\n\n<p>Status &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>__STATUS__</strong></p>\n\n<p>&nbsp;</p>\n\n<p>For any assistance or questions, feel free to contact us at <strong>__CONTACT__EMAIL__</strong>&nbsp; or call us at <strong>__CONTACT__NO__</strong></p>\n\n<p>&nbsp;</p>\n\n<p><a href="&lt;?php echo base_url();?&gt;" target="_blank"><img src="http://conquerorslabs.com/crunchy/assets/images/android.png" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=""><img src="http://conquerorslabs.com/crunchy/assets/images/appleios.png" /></a></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Regards,</strong>&nbsp;<br />\nCustomer Support</p>\n\n<p><strong>__SITE_TITLE__</strong></p>\n\n<p><strong>__COPY_RIGHTS__</strong></p>\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dn_gallery`
--

CREATE TABLE IF NOT EXISTS `dn_gallery` (
`gallery_id` int(11) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `alt_text` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_groups`
--

CREATE TABLE IF NOT EXISTS `dn_groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dn_groups`
--

INSERT INTO `dn_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `dn_items`
--

CREATE TABLE IF NOT EXISTS `dn_items` (
`item_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL,
  `item_type` enum('Veg','Non-Veg','Other') NOT NULL DEFAULT 'Other',
  `item_image_name` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET latin1 NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=163 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_item_addons`
--

CREATE TABLE IF NOT EXISTS `dn_item_addons` (
`item_addon_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `addon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_item_options`
--

CREATE TABLE IF NOT EXISTS `dn_item_options` (
`item_option_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_languages`
--

CREATE TABLE IF NOT EXISTS `dn_languages` (
`id` int(11) NOT NULL,
  `lang_name` varchar(512) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dn_languages`
--

INSERT INTO `dn_languages` (`id`, `lang_name`, `lang_code`, `status`) VALUES
(1, 'english', 'en', 'Active'),
(16, 'हिंदी', 'hi', 'Active'),
(17, 'français', 'fr', 'Active'),
(18, 'german', 'de', 'Active'),
(19, 'עברית', 'he', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dn_login_attempts`
--

CREATE TABLE IF NOT EXISTS `dn_login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_menu`
--

CREATE TABLE IF NOT EXISTS `dn_menu` (
`menu_id` bigint(20) NOT NULL,
  `menu_name` varchar(256) NOT NULL,
  `punch_line` varchar(256) NOT NULL,
  `description` varchar(512) NOT NULL,
  `menu_image_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET latin1 NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_multi_lang`
--

CREATE TABLE IF NOT EXISTS `dn_multi_lang` (
`id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `phrase_id` int(11) NOT NULL,
  `phrase_type` enum('web','app') NOT NULL DEFAULT 'web',
  `text` varchar(512) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33772 ;

--
-- Dumping data for table `dn_multi_lang`
--

INSERT INTO `dn_multi_lang` (`id`, `lang_id`, `phrase_id`, `phrase_type`, `text`) VALUES
(29245, 16, 5, 'web', ' मास्टर सेटिंग्स'),
(29246, 16, 6, 'web', 'डैशबोर्ड'),
(29247, 16, 12, 'web', 'घर'),
(29248, 16, 14, 'web', 'पृष्ठों'),
(29249, 16, 15, 'web', ' नमूना'),
(29250, 16, 17, 'web', 'नाम'),
(29251, 16, 18, 'web', ' विवरण'),
(29252, 16, 19, 'web', 'स्थिति'),
(29253, 16, 20, 'web', ' कार्य'),
(29254, 16, 21, 'web', 'जोड़ना'),
(29255, 16, 23, 'web', 'अपडेट'),
(29256, 16, 24, 'web', 'संपादित'),
(29257, 16, 26, 'web', 'टेक्स्ट'),
(29258, 16, 27, 'web', 'चुनते हैं'),
(29259, 16, 29, 'web', 'शीर्षक'),
(29260, 16, 30, 'web', 'आरंभ करने की तिथि'),
(29261, 16, 31, 'web', 'समाप्ति तिथि'),
(29262, 16, 32, 'web', ' निर्माण की तिथि'),
(29263, 16, 33, 'web', 'तस्वीर'),
(29264, 16, 35, 'web', 'भाषा'),
(29265, 16, 36, 'web', ' बंद करे'),
(29266, 16, 37, 'web', 'मिटाना'),
(29267, 16, 38, 'web', 'क्या वाकई हटाना है'),
(29268, 16, 39, 'web', 'हाँ'),
(29269, 16, 40, 'web', 'नहीं'),
(29270, 16, 41, 'web', 'मुहावरा'),
(29271, 16, 44, 'web', 'खोजशब्दों'),
(29272, 16, 45, 'web', 'गतिशील पृष्ठों'),
(29273, 16, 46, 'web', 'नीचे है'),
(29274, 16, 47, 'web', 'क्रमबद्ध आदेश'),
(29275, 16, 49, 'web', 'पूछे जाने वाले प्रश्न'),
(29276, 16, 52, 'web', 'सेटिंग्स'),
(29277, 16, 53, 'web', 'साइट'),
(29278, 16, 55, 'web', 'सामाजिक नेटवर्क सेटिंग्स'),
(29279, 16, 56, 'web', 'ईमेल सेटिंग्स'),
(29280, 16, 58, 'web', 'मेज़बान'),
(29281, 16, 59, 'web', 'ईमेल'),
(29282, 16, 60, 'web', 'पारण शब्द'),
(29283, 16, 61, 'web', 'बंदरगाह'),
(29284, 16, 63, 'web', 'पता'),
(29285, 16, 64, 'web', 'शहर'),
(29286, 16, 65, 'web', 'राज्य'),
(29287, 16, 67, 'web', 'पिन कोड'),
(29288, 16, 68, 'web', 'फ़ोन'),
(29289, 16, 69, 'web', 'लैंड लाइन'),
(29290, 16, 70, 'web', 'फैक्स'),
(29291, 16, 71, 'web', 'ई - मेल से संपर्क करे'),
(29292, 16, 72, 'web', ' भाषा चुनिए'),
(29293, 16, 74, 'web', 'द्वारा डिजाइन किया'),
(29294, 16, 75, 'web', 'अधिकार सुरक्षित'),
(29295, 16, 76, 'web', 'साइट के लोगो'),
(29296, 16, 78, 'web', 'एप्लिकेशन सेटिंग'),
(29297, 16, 80, 'web', 'हमसे संपर्क करें'),
(29298, 16, 81, 'web', 'मोबाइल'),
(29299, 16, 82, 'web', 'संदेश'),
(29300, 16, 83, 'web', 'जमा करें'),
(29301, 16, 84, 'web', 'हमारे बारे में'),
(29302, 16, 86, 'web', 'डिजी'),
(29303, 16, 89, 'web', 'पिछला'),
(29304, 16, 90, 'web', 'अगला'),
(29305, 16, 93, 'web', 'भाषा सेटिंग'),
(29306, 16, 98, 'web', 'सूची भाषाओं'),
(29307, 16, 99, 'web', 'वाक्यांश जोड़ने'),
(29308, 16, 100, 'web', 'भाषा जोड़ने'),
(29309, 16, 101, 'web', ' यह काम किस प्रकार करता है'),
(29310, 16, 102, 'web', ' नियम और शर्तें'),
(29311, 16, 103, 'web', 'गोपनीयता और नीति'),
(29312, 16, 105, 'web', 'ईमेल सेटिंग्स'),
(29313, 16, 109, 'web', 'द्वारा संचालित'),
(29314, 16, 110, 'web', 'कोई डेटा उपलब्ध नहीं है'),
(29315, 16, 112, 'web', 'सक्रिय'),
(29316, 16, 113, 'web', 'निष्क्रिय'),
(29317, 16, 123, 'web', 'वाक्यांश आवश्यक'),
(29318, 16, 124, 'web', 'भाषाओं'),
(29319, 16, 125, 'web', 'मुहावरों'),
(29320, 16, 126, 'web', 'अद्यतन वाक्यांशों'),
(29321, 16, 127, 'web', 'नया करने के लिए वैधता का चयन'),
(29322, 16, 140, 'web', 'एप्लिकेशन सेटिंग'),
(29323, 16, 141, 'web', 'सक्षम'),
(29324, 16, 142, 'web', 'अक्षम करें'),
(29325, 16, 152, 'web', 'नई आवश्यकता के लिए मान्य'),
(29326, 16, 177, 'web', 'तल'),
(29327, 16, 180, 'web', 'रद्द करना'),
(29328, 16, 182, 'web', 'पासवर्ड बदलें'),
(29329, 16, 183, 'web', 'लोग आउट'),
(29330, 16, 184, 'web', 'पुराना पासवर्ड'),
(29331, 16, 185, 'web', 'नया पासवर्ड'),
(29332, 16, 186, 'web', 'नए पासवर्ड की पुष्टि करें'),
(29333, 16, 187, 'web', 'पुराना'),
(29334, 16, 191, 'web', 'प्रोफ़ाइल'),
(29335, 16, 192, 'web', 'पासवर्ड की पुष्टि और पासवर्ड मेल नहीं खाता'),
(29336, 16, 193, 'web', 'व्यक्तिगत विवरण'),
(29337, 16, 194, 'web', 'पहला नाम'),
(29338, 16, 195, 'web', 'अंतिम नाम'),
(29339, 16, 196, 'web', 'केवल अक्षर दर्ज करें'),
(29340, 16, 197, 'web', 'कृपया केवल संख्याएँ दर्ज करें'),
(29341, 16, 201, 'web', 'टॉगल से संचालित करना'),
(29342, 16, 202, 'web', 'पिछला'),
(29343, 16, 210, 'web', 'हमसे संपर्क करें'),
(29344, 16, 212, 'web', 'सब'),
(29345, 16, 213, 'web', 'जल्द ही अद्यतन किया जाएगा'),
(29346, 16, 214, 'web', 'संपर्क नंबर'),
(29347, 16, 215, 'web', 'नया'),
(29348, 16, 216, 'web', 'अंतिम तिथि'),
(29349, 16, 217, 'web', 'आरंभ करने की तिथि'),
(29350, 16, 218, 'web', 'दिखा'),
(29351, 16, 225, 'web', 'संपादित भाषा'),
(29352, 16, 226, 'web', 'भाषा का नाम'),
(29353, 16, 227, 'web', 'संपादित वाक्यांश'),
(29354, 16, 228, 'web', 'वाक्यांशों संपादित करें'),
(29355, 16, 231, 'web', 'यह काम किस प्रकार करता है'),
(29356, 16, 235, 'web', 'क्षेत्र शीर्षक'),
(29357, 16, 238, 'web', 'संपादित पूछे जाने वाले प्रश्न'),
(29358, 16, 239, 'web', 'पूछे जाने वाले प्रश्न जोड़ने'),
(29359, 16, 241, 'web', 'दिखा 1 - 10 की'),
(29360, 16, 242, 'web', 'मुझे याद रखना'),
(29361, 16, 243, 'web', 'लॉगिन'),
(29362, 16, 244, 'web', 'ईमेल टेम्पलेट सेटिंग्स'),
(29363, 16, 245, 'web', 'संपादित ईमेल टेम्पलेट'),
(29364, 16, 246, 'web', 'ईमेल टेम्पलेट'),
(29365, 16, 247, 'web', 'विषय'),
(29366, 16, 251, 'web', 'साइट के लोगो'),
(29367, 16, 254, 'web', 'एंड्रॉयड यूआरएल'),
(29368, 16, 255, 'web', 'आईओएस यूआरएल'),
(29369, 16, 256, 'web', 'अमान्य फाइल प्रारूप'),
(29370, 16, 257, 'web', 'सफलतापूर्वक अपडेट किया गया'),
(29371, 16, 258, 'web', 'पर प्रविष्ट किया'),
(29372, 16, 261, 'web', 'और देखो'),
(29373, 16, 262, 'web', 'भाषा बदलो'),
(29374, 16, 263, 'web', 'भाषा सफलतापूर्वक परिवर्तित'),
(29375, 16, 265, 'web', 'की तैनाती'),
(29376, 16, 266, 'web', 'पूर्व'),
(29377, 16, 267, 'web', 'प्रकार का बंदर कुंजी'),
(29378, 16, 268, 'web', 'एपीआई कुंजी'),
(29379, 16, 269, 'web', 'वेबमेल'),
(29380, 16, 270, 'web', 'एक प्रकार का बंदर'),
(29381, 16, 271, 'web', 'एक प्रकार का बंदर'),
(29382, 16, 272, 'web', 'सभी को देखें'),
(29383, 16, 276, 'web', 'रीसेट'),
(29384, 16, 279, 'web', 'आइटम'),
(29385, 16, 280, 'web', 'सामान जोडें'),
(29386, 16, 281, 'web', ' संपादित आइटम'),
(29387, 16, 282, 'web', 'देखें आइटम'),
(29388, 16, 283, 'web', 'वस्तु का नाम'),
(29389, 16, 284, 'web', ' मद लागत'),
(29390, 16, 285, 'web', ' आइटम छवि'),
(29391, 16, 286, 'web', 'चित्र को बदलें'),
(29392, 16, 287, 'web', 'प्रस्तावों'),
(29393, 16, 288, 'web', ' प्रस्ताव बनाने'),
(29394, 16, 289, 'web', ' ऑफ़र देखें'),
(29395, 16, 290, 'web', ' दृश्य प्रस्तुत करता है'),
(29396, 16, 291, 'web', 'प्रस्ताव के नाम'),
(29397, 16, 292, 'web', 'पेशकश की लागत'),
(29398, 16, 293, 'web', ' प्रस्ताव को शुरू करने की तारीख'),
(29399, 16, 294, 'web', 'प्रस्ताव के अंत की तारीख'),
(29400, 16, 295, 'web', 'संपादित की पेशकश'),
(29401, 16, 296, 'web', ' वैध तारीख पेशकश'),
(29402, 16, 297, 'web', 'प्रस्ताव के हालत'),
(29403, 16, 298, 'web', 'ऑफ़र चित्र'),
(29404, 16, 299, 'web', ' प्रस्ताव शर्तों'),
(29405, 16, 300, 'web', ' मात्रा'),
(29406, 16, 301, 'web', ' जोड़ना हटाना'),
(29407, 16, 302, 'web', 'जोड़ना हटाना'),
(29408, 16, 303, 'web', 'आइटम का कोई'),
(29409, 16, 304, 'web', ' नवीनतम प्रदान करता है'),
(29410, 16, 305, 'web', 'सेवा कर लोगों की कोई'),
(29411, 16, 312, 'web', 'गेलरी'),
(29412, 16, 313, 'web', 'वैकल्पिक शब्द'),
(29413, 16, 314, 'web', ' की छवि'),
(29414, 16, 315, 'web', ' गैलरी जोड़ने'),
(29415, 16, 316, 'web', ' पाठ में परिवर्तन की आवश्यकता'),
(29416, 16, 318, 'web', ' पेपैल सेटिंग्स'),
(29417, 16, 319, 'web', 'वेतन पाल पर्यावरण उत्पादन'),
(29418, 16, 320, 'web', ' वेतन पाल पर्यावरण सैंडबॉक्स'),
(29419, 16, 321, 'web', 'व्यापारी का नाम'),
(29420, 16, 322, 'web', 'व्यापारी गोपनीयता नीति यूनिफ़ॉर्म रिसोर्स लोकेटर'),
(29421, 16, 323, 'web', ' व्यापारी प्रयोक्ता समझौते यूआरएल'),
(29422, 16, 324, 'web', 'मुद्रा'),
(29423, 16, 325, 'web', 'खाते का प्रकार'),
(29424, 16, 326, 'web', 'लोगो छवि'),
(29425, 16, 327, 'web', ' पेपैल पर्यावरण उत्पादन'),
(29426, 16, 328, 'web', 'पेपैल पर्यावरण सैंडबॉक्स'),
(29427, 16, 329, 'web', 'व्यापारी का नाम'),
(29428, 16, 330, 'web', ' व्यापारी गोपनीयता नीति यूनिफ़ॉर्म रिसोर्स लोकेटर'),
(29429, 16, 331, 'web', ' व्यापारी उपयोगकर्ता समझौते यूआरएल'),
(29430, 16, 332, 'web', 'मुद्रा प्रतीक'),
(29431, 16, 339, 'web', 'अवैध फाइल'),
(29432, 16, 340, 'web', 'सफलतापूर्वक जोड़ा'),
(29433, 16, 341, 'web', ' जोड़ने में असमर्थ'),
(29434, 16, 342, 'web', 'जोड़ने में असमर्थ'),
(29435, 16, 343, 'web', ' रिकॉर्ड नहीं मिला सका'),
(29436, 16, 344, 'web', ' सफलतापूर्वक मिटाया गया'),
(29437, 16, 345, 'web', 'हटाने में असमर्थ'),
(29438, 16, 354, 'web', 'उत्पाद गिनती'),
(29439, 16, 355, 'web', ' मान्य दिनांक प्रारंभ दिनांक से अधिक होना चाहिए'),
(29440, 16, 356, 'web', ' अवैध ऑपरेशन'),
(29441, 16, 365, 'web', 'वस्तु चुनें'),
(29442, 16, 366, 'web', 'कोई आइटम उपलब्ध'),
(29443, 16, 367, 'web', 'आदेशों'),
(29444, 16, 368, 'web', 'नए आदेश'),
(29445, 16, 369, 'web', 'प्रक्रिया आदेश के तहत'),
(29446, 16, 370, 'web', 'छुड़ाया के आदेश'),
(29447, 16, 371, 'web', 'रद्द आदेश'),
(29448, 16, 372, 'web', 'आदेश संख्या'),
(29449, 16, 373, 'web', 'आर्डर की तारीख'),
(29450, 16, 374, 'web', ' ऑर्डर का समय'),
(29451, 16, 375, 'web', 'आदेश में लागत'),
(29452, 16, 376, 'web', ' ग्राहक का नाम'),
(29453, 16, 378, 'web', ' ऑर्डर का विवरण'),
(29454, 16, 379, 'web', 'बुक तारीख'),
(29455, 16, 380, 'web', 'सीमा चिन्ह'),
(29456, 16, 381, 'web', 'पिन कोड'),
(29457, 16, 382, 'web', 'आदेश अपडेट'),
(29458, 16, 383, 'web', 'अद्यतन आदेश की स्थिति'),
(29459, 16, 384, 'web', ' विवरण नहीं मिले'),
(29460, 16, 385, 'web', 'प्रक्रिया'),
(29461, 16, 386, 'web', 'पहुंचा दिया'),
(29462, 16, 387, 'web', 'रद्द'),
(29463, 16, 388, 'web', 'कोई उत्पाद उपलब्ध'),
(29464, 16, 389, 'web', 'वस्तु की मात्रा'),
(29465, 16, 391, 'web', 'सफलता पूर्वक जोड़'),
(29466, 16, 392, 'web', ' अवैध प्रत्यय पत्र'),
(29467, 16, 393, 'web', 'साइट का नाम'),
(29468, 16, 394, 'web', 'उपयोगकर्ताओं'),
(29469, 16, 395, 'web', ' सफलतापूर्वक लॉगआउट'),
(29470, 16, 396, 'web', ' नवीनतम आदेश'),
(29471, 16, 397, 'web', ' उपयोगकर्ता विवरण'),
(29472, 16, 398, 'web', ' कम से कम एक आइटम जोड़ने'),
(29473, 16, 400, 'web', 'पार्टी साइज'),
(29474, 16, 401, 'web', 'अधिवेशन'),
(29475, 16, 402, 'web', ' बुकिंग की तिथि'),
(29476, 16, 404, 'web', ' सफलतापूर्वक अपलोड'),
(29477, 16, 405, 'web', ' एप्लिकेशन फाइल अपलोड'),
(29478, 16, 408, 'web', ' मुद्रा चुनें'),
(29479, 16, 409, 'web', 'स्वागत हे'),
(29480, 16, 410, 'web', 'व्यवस्थापक'),
(29481, 16, 411, 'web', 'मेन्यू'),
(29482, 16, 412, 'web', 'मेनू जोड़ने'),
(29483, 16, 413, 'web', ' दृश्य मेनू'),
(29484, 16, 414, 'web', 'मेनू नाम'),
(29485, 16, 415, 'web', 'पंच लाइन'),
(29486, 16, 416, 'web', 'अपेक्षित'),
(29487, 16, 417, 'web', 'मेनू छवि'),
(29488, 16, 418, 'web', 'संपादन मेनू'),
(29489, 16, 419, 'web', 'वस्तु परक'),
(29490, 16, 420, 'web', ' स्थान मास्टर'),
(29491, 16, 422, 'web', 'राज्यों'),
(29492, 16, 423, 'web', 'शहरों'),
(29493, 16, 424, 'web', ' सेवा वितरण स्थानों'),
(29494, 16, 425, 'web', 'राज्य का नाम'),
(29495, 16, 426, 'web', 'अपलोड एक्सेल'),
(29496, 16, 427, 'web', 'शहर का नाम'),
(29497, 16, 428, 'web', 'इलाके नाम'),
(29498, 16, 429, 'web', 'नमूना फाइल को डाउनलोड करने के लिए यहां क्लिक करें'),
(29499, 16, 430, 'web', 'अपलोड फ़ाइल उत्कृष्टता'),
(29500, 16, 431, 'web', 'फ़ाइल'),
(29501, 16, 432, 'web', 'ईमेल टेम्पलेट्स'),
(29502, 16, 433, 'web', 'पंजीकरण'),
(29503, 16, 434, 'web', ' पंजीकरण सफलतापूर्वक सक्रियण ईमेल भेजा पूरा'),
(29504, 16, 435, 'web', 'लॉगिन की सफलता'),
(29505, 16, 436, 'web', 'देश'),
(29506, 16, 437, 'web', 'पासवर्ड रीसेट'),
(29507, 16, 438, 'web', ' देशान्तर'),
(29508, 16, 439, 'web', 'अक्षांश'),
(29509, 16, 440, 'web', 'कृपया लॉगिन करें'),
(29510, 16, 441, 'web', 'अनधिकृत उपयोगकर्ता'),
(29511, 16, 442, 'web', 'पहले से ही अस्तित्व में है'),
(29512, 16, 443, 'web', ' सेवा वितरण स्थान जोड़ने'),
(29513, 16, 444, 'web', 'संपादित सेवा वितरण स्थानों'),
(29514, 16, 445, 'web', 'राज्य जोड़ने'),
(29515, 16, 446, 'web', 'संपादित राज्य'),
(29516, 16, 447, 'web', 'राज्यों अपलोड'),
(29517, 16, 448, 'web', 'शहर को जोड़ने'),
(29518, 16, 449, 'web', 'संपादित शहर'),
(29519, 16, 450, 'web', 'अपलोड शहरों'),
(29520, 16, 453, 'web', 'भाषा कोड'),
(29521, 16, 454, 'web', 'वाक्यांश प्रकार'),
(29522, 16, 458, 'web', 'पासवर्ड बदलें'),
(29523, 16, 459, 'web', 'सूची वाक्यांशों'),
(29524, 16, 461, 'web', ' अद्यतन एप्लिकेशन वाक्यांशों'),
(29525, 16, 462, 'web', 'अद्यतन वेब वाक्यांशों'),
(29526, 16, 467, 'web', 'नया पासवर्ड'),
(29527, 16, 568, 'web', ' ईमेल और पासवर्ड दर्ज करें'),
(29528, 16, 571, 'web', 'परीक्षण वेब वाक्यांश'),
(29529, 16, 572, 'web', 'संपादित वेब वाक्यांशों'),
(29530, 16, 573, 'web', 'संपादित एप्लिकेशन वाक्यांशों'),
(29531, 16, 574, 'web', 'राज्य आईडी'),
(29532, 16, 575, 'web', 'अपलोड कृपया केवल JPG | जेपीईजी | पीएनजी'),
(29533, 16, 577, 'web', 'शाकाहारी'),
(29534, 16, 578, 'web', 'मासाहारी'),
(29535, 16, 579, 'web', 'अन्य'),
(29536, 16, 584, 'web', 'प्रस्ताव के विवरण'),
(29537, 16, 585, 'web', 'आप इस राज्य कारण शहरों के तहत यह अस्तित्व में नहीं हटा सकते'),
(29538, 16, 586, 'web', 'आप नहीं हटा सकते छुड़ाया स्थान कारण शहरों के तहत यह मौजूद'),
(29539, 16, 587, 'web', 'संपादित गैलरी'),
(29540, 16, 588, 'web', 'टेस्ट वेब वाक्यांश'),
(29541, 16, 589, 'web', 'लेनदेन आईडी'),
(29542, 16, 590, 'web', 'भुगतान के प्रकार'),
(29543, 16, 591, 'web', 'भुगतान की स्थिति'),
(29544, 16, 592, 'web', 'फेसबुक एपीआई'),
(29545, 16, 593, 'web', 'गूगल एपीआई'),
(29546, 16, 613, 'web', 'भरी गई राशि'),
(29547, 16, 614, 'web', 'हटा दिया गया है'),
(29548, 16, 615, 'web', ' कारण'),
(29549, 16, 616, 'web', 'आदेश से हटाए गए आइटम'),
(29550, 16, 617, 'web', ' ऐड ऑन'),
(29551, 16, 618, 'web', ' लाभ विकल्प'),
(29552, 16, 619, 'web', 'देखें लाभ विकल्प'),
(29553, 16, 620, 'web', 'जोड़ना ऐड ऑन'),
(29554, 16, 621, 'web', 'संपादित ऐड ऑन'),
(29555, 16, 622, 'web', ' विकल्प'),
(29556, 16, 623, 'web', 'विकल्प जोड़ने'),
(29557, 16, 624, 'web', ' देखने के विकल्प'),
(29558, 16, 625, 'web', ' संपादित करें विकल्प'),
(29559, 16, 626, 'web', 'मूल्य उपसर्ग'),
(29560, 16, 627, 'web', 'मूल्य'),
(29561, 16, 628, 'web', 'आदेश आइटम'),
(29562, 16, 629, 'web', ' आदेश में लाभ विकल्प'),
(29563, 16, 630, 'web', 'कुल'),
(29564, 16, 631, 'web', 'आदेश से हटा ऐड ऑन'),
(29565, 16, 633, 'web', ' रेस्तरां समय'),
(29566, 16, 634, 'web', ' से'),
(29567, 16, 635, 'web', 'सेवा मेरे'),
(29568, 16, 636, 'web', ' समय से'),
(29569, 16, 637, 'web', ' समय पर'),
(29570, 16, 638, 'web', ' साधारण'),
(29571, 16, 639, 'web', 'उपयोगकर्ता सक्रिय'),
(29572, 16, 640, 'web', 'उपयोगकर्ता कुकीज़ को निष्क्रिय कर'),
(29573, 16, 641, 'web', ' गलत आपरेशन'),
(29704, 17, 5, 'web', 'paramètres de base'),
(29705, 17, 6, 'web', 'tableau de bord'),
(29706, 17, 12, 'web', 'domicile'),
(29707, 17, 14, 'web', 'pages'),
(29708, 17, 15, 'web', 'échantillon'),
(29709, 17, 17, 'web', 'prénom'),
(29710, 17, 18, 'web', ' la description'),
(29711, 17, 19, 'web', ' statut'),
(29712, 17, 20, 'web', 'action'),
(29713, 17, 21, 'web', 'ajouter'),
(29714, 17, 23, 'web', 'mettre à jour'),
(29715, 17, 24, 'web', 'modifier'),
(29716, 17, 26, 'web', 'texte'),
(29717, 17, 27, 'web', 'sélectionner'),
(29718, 17, 29, 'web', 'Titre'),
(29719, 17, 30, 'web', 'date de début'),
(29720, 17, 31, 'web', 'date d''expiration'),
(29721, 17, 32, 'web', 'date de création'),
(29722, 17, 33, 'web', 'photo'),
(29723, 17, 35, 'web', 'la langue'),
(29724, 17, 36, 'web', 'Fermer'),
(29725, 17, 37, 'web', 'effacer'),
(29726, 17, 38, 'web', 'êtes-vous sûr de vouloir supprimer'),
(29727, 17, 39, 'web', 'Oui'),
(29728, 17, 40, 'web', 'non'),
(29729, 17, 41, 'web', 'phrase'),
(29730, 17, 44, 'web', 'mots clés'),
(29731, 17, 45, 'web', 'pages dynamiques'),
(29732, 17, 46, 'web', 'est inférieure'),
(29733, 17, 47, 'web', 'ordre de tri'),
(29734, 17, 49, 'web', 'faqs'),
(29735, 17, 52, 'web', 'paramètres'),
(29736, 17, 53, 'web', 'site'),
(29737, 17, 55, 'web', 'paramètres de réseau social'),
(29738, 17, 56, 'web', 'Paramètres de messagerie'),
(29739, 17, 58, 'web', 'hôte'),
(29740, 17, 59, 'web', 'email'),
(29741, 17, 60, 'web', 'mot de passe'),
(29742, 17, 61, 'web', 'Port'),
(29743, 17, 63, 'web', 'adresse'),
(29744, 17, 64, 'web', 'ville'),
(29745, 17, 65, 'web', 'Etat'),
(29746, 17, 67, 'web', 'code postal'),
(29747, 17, 68, 'web', 'téléphone'),
(29748, 17, 69, 'web', ' ligne terrestre'),
(29749, 17, 70, 'web', 'fax'),
(29750, 17, 71, 'web', 'Email du contact'),
(29751, 17, 72, 'web', ' Choisir la langue'),
(29752, 17, 74, 'web', 'concu par'),
(29753, 17, 75, 'web', 'droits réservés'),
(29754, 17, 76, 'web', 'le logo du site'),
(29755, 17, 78, 'web', ' paramètres de l''application'),
(29756, 17, 80, 'web', 'Contactez nous'),
(29757, 17, 81, 'web', 'mobile'),
(29758, 17, 82, 'web', 'message'),
(29759, 17, 83, 'web', 'soumettre'),
(29760, 17, 84, 'web', 'à propos de nous'),
(29761, 17, 86, 'web', 'digi'),
(29762, 17, 89, 'web', 'précédent'),
(29763, 17, 90, 'web', 'prochain'),
(29764, 17, 93, 'web', 'paramètres de langue'),
(29765, 17, 98, 'web', ' liste des langues'),
(29766, 17, 99, 'web', 'ajouter la phrase'),
(29767, 17, 100, 'web', 'ajouter la langue'),
(29768, 17, 101, 'web', 'Comment cela fonctionne'),
(29769, 17, 102, 'web', 'termes et conditions'),
(29770, 17, 103, 'web', ' la vie privée et de la politique'),
(29771, 17, 105, 'web', 'Paramètres de messagerie'),
(29772, 17, 109, 'web', 'Alimenté par'),
(29773, 17, 110, 'web', 'pas de données disponibles'),
(29774, 17, 112, 'web', 'actif'),
(29775, 17, 113, 'web', 'inactif'),
(29776, 17, 123, 'web', 'phrase requise'),
(29777, 17, 124, 'web', 'Langues'),
(29778, 17, 125, 'web', 'phrases'),
(29779, 17, 126, 'web', ' phrases de mise à jour'),
(29780, 17, 127, 'web', 'sélectionnez la validité pour la nouvelle'),
(29781, 17, 140, 'web', ' paramètres de l''application'),
(29782, 17, 141, 'web', 'activer'),
(29783, 17, 142, 'web', 'désactiver'),
(29784, 17, 152, 'web', 'valider de nouveaux requis'),
(29785, 17, 177, 'web', 'bas'),
(29786, 17, 180, 'web', 'Annuler'),
(29787, 17, 182, 'web', 'changer le mot de passe'),
(29788, 17, 183, 'web', 'se déconnecter'),
(29789, 17, 184, 'web', ' ancien mot de passe'),
(29790, 17, 185, 'web', ' nouveau mot de passe'),
(29791, 17, 186, 'web', 'confirmer le nouveau mot de passe'),
(29792, 17, 187, 'web', 'vieux'),
(29793, 17, 191, 'web', 'Profil'),
(29794, 17, 192, 'web', ' mot de passe et le mot de passe de confirmation ne correspond pas'),
(29795, 17, 193, 'web', ' details personnels'),
(29796, 17, 194, 'web', 'Prénom'),
(29797, 17, 195, 'web', 'nom de famille'),
(29798, 17, 196, 'web', ' s''il vous plaît entrer les lettres seulement'),
(29799, 17, 197, 'web', ' S''il vous plait entrez uniquement des nombres'),
(29800, 17, 201, 'web', ' navigation toggle'),
(29801, 17, 202, 'web', 'prev'),
(29802, 17, 210, 'web', 'Contactez nous'),
(29803, 17, 212, 'web', 'tout'),
(29804, 17, 213, 'web', 'sera mis à jour bientôt'),
(29805, 17, 214, 'web', 'contactez pas'),
(29806, 17, 215, 'web', 'Nouveau'),
(29807, 17, 216, 'web', 'date de fin'),
(29808, 17, 217, 'web', 'date de début'),
(29809, 17, 218, 'web', ' projection'),
(29810, 17, 225, 'web', 'modifier la langue'),
(29811, 17, 226, 'web', ' Nom de la langue'),
(29812, 17, 227, 'web', 'modifier la phrase'),
(29813, 17, 228, 'web', 'modifier des phrases'),
(29814, 17, 231, 'web', 'Comment cela fonctionne'),
(29815, 17, 235, 'web', 'Titre du site'),
(29816, 17, 238, 'web', 'modifier faq'),
(29817, 17, 239, 'web', 'ajouter faq'),
(29818, 17, 241, 'web', 'montrant 1 - 10'),
(29819, 17, 242, 'web', ' souviens-toi de moi'),
(29820, 17, 243, 'web', 's''identifier'),
(29821, 17, 244, 'web', 'paramètres email de modèle'),
(29822, 17, 245, 'web', 'modifier modèle de courriel'),
(29823, 17, 246, 'web', 'email modèle'),
(29824, 17, 247, 'web', 'assujettir'),
(29825, 17, 251, 'web', 'le logo du site'),
(29826, 17, 254, 'web', 'url android'),
(29827, 17, 255, 'web', 'ios url'),
(29828, 17, 256, 'web', 'Format de fichier non valide'),
(29829, 17, 257, 'web', 'Mis à jour avec succés'),
(29830, 17, 258, 'web', 'Posté sur'),
(29831, 17, 261, 'web', 'voir plus'),
(29832, 17, 262, 'web', 'changer de langue'),
(29833, 17, 263, 'web', ' la langue a changé avec succès'),
(29834, 17, 265, 'web', ' posté'),
(29835, 17, 266, 'web', 'depuis'),
(29836, 17, 267, 'web', 'clé mandrill'),
(29837, 17, 268, 'web', 'clé API'),
(29838, 17, 269, 'web', 'web mail'),
(29839, 17, 270, 'web', 'mandrill'),
(29840, 17, 271, 'web', 'mandrill'),
(29841, 17, 272, 'web', 'Voir tout'),
(29842, 17, 276, 'web', ' réinitialiser'),
(29843, 17, 279, 'web', 'articles'),
(29844, 17, 280, 'web', 'ajouter un item'),
(29845, 17, 281, 'web', 'modifier l''article'),
(29846, 17, 282, 'web', ' afficher les articles'),
(29847, 17, 283, 'web', 'nom de l''article'),
(29848, 17, 284, 'web', 'coût de l''article'),
(29849, 17, 285, 'web', ' image de l''article'),
(29850, 17, 286, 'web', ' changer l''image'),
(29851, 17, 287, 'web', 'des offres'),
(29852, 17, 288, 'web', 'créer l''offre'),
(29853, 17, 289, 'web', 'voir l''offre'),
(29854, 17, 290, 'web', ' afficher les offres'),
(29855, 17, 291, 'web', 'Nom de l''offre'),
(29856, 17, 292, 'web', ' offre coût'),
(29857, 17, 293, 'web', ' Offre date de début'),
(29858, 17, 294, 'web', 'Date offre de fin'),
(29859, 17, 295, 'web', ' modifier l''offre'),
(29860, 17, 296, 'web', 'offrir date valide'),
(29861, 17, 297, 'web', 'offre état'),
(29862, 17, 298, 'web', ' l''image de l''offre'),
(29863, 17, 299, 'web', ' conditions de l''offre'),
(29864, 17, 300, 'web', 'Quantité'),
(29865, 17, 301, 'web', 'Ajouter enlever'),
(29866, 17, 302, 'web', 'Ajouter enlever'),
(29867, 17, 303, 'web', ' aucun des éléments'),
(29868, 17, 304, 'web', ' dernières offres'),
(29869, 17, 305, 'web', ' servirait à rien de personnes'),
(29870, 17, 312, 'web', ' Galerie'),
(29871, 17, 313, 'web', 'alt texte'),
(29872, 17, 314, 'web', 'image'),
(29873, 17, 315, 'web', 'ajouter la galerie'),
(29874, 17, 316, 'web', 'alt texte requis'),
(29875, 17, 318, 'web', ' paramètres paypal'),
(29876, 17, 319, 'web', ' PayPal environnement de production'),
(29877, 17, 320, 'web', ' PayPal Environnement Sandbox'),
(29878, 17, 321, 'web', ' Nom du commerçant'),
(29879, 17, 322, 'web', ' merchantPrivacyPolicyURL'),
(29880, 17, 323, 'web', 'merchantUserAgreementURL'),
(29881, 17, 324, 'web', 'devise'),
(29882, 17, 325, 'web', ' type de compte'),
(29883, 17, 326, 'web', ' image logo'),
(29884, 17, 327, 'web', 'paypal production de l''environnement'),
(29885, 17, 328, 'web', ' paypal environnement sandbox'),
(29886, 17, 329, 'web', ' Nom du commerçant'),
(29887, 17, 330, 'web', ' politique de confidentialité marchand URL'),
(29888, 17, 331, 'web', ' contrat d''utilisateur marchand URL'),
(29889, 17, 332, 'web', ' symbole de la monnaie'),
(29890, 17, 339, 'web', 'Fichier non valide'),
(29891, 17, 340, 'web', 'ajouté sucessfully'),
(29892, 17, 341, 'web', 'incapable d''ajouter'),
(29893, 17, 342, 'web', 'incapable de mettre à jour'),
(29894, 17, 343, 'web', ' n''a pas pu trouver le dossier'),
(29895, 17, 344, 'web', 'supprimé avec succès'),
(29896, 17, 345, 'web', 'incapable de supprimer'),
(29897, 17, 354, 'web', ' Nombre de produits'),
(29898, 17, 355, 'web', 'date valide doit être supérieure à la date de début'),
(29899, 17, 356, 'web', 'opération invalide'),
(29900, 17, 365, 'web', ' sélectionner un article'),
(29901, 17, 366, 'web', 'pas d''articles disponibles'),
(29902, 17, 367, 'web', 'orders'),
(29903, 17, 368, 'web', 'nouvelles commandes'),
(29904, 17, 369, 'web', ' sous les ordres de process'),
(29905, 17, 370, 'web', ' les commandes livrées'),
(29906, 17, 371, 'web', 'commandes annulées'),
(29907, 17, 372, 'web', 'N ° de commande'),
(29908, 17, 373, 'web', ' date de commande'),
(29909, 17, 374, 'web', 'temps de commande'),
(29910, 17, 375, 'web', 'coût de la commande'),
(29911, 17, 376, 'web', 'le nom du client'),
(29912, 17, 378, 'web', 'détails de la commande'),
(29913, 17, 379, 'web', 'date de réservation'),
(29914, 17, 380, 'web', 'point de repère'),
(29915, 17, 381, 'web', 'code PIN'),
(29916, 17, 382, 'web', 'mise à jour de l''ordre'),
(29917, 17, 383, 'web', ' état mise à jour de l''ordre'),
(29918, 17, 384, 'web', 'détails non trouvé'),
(29919, 17, 385, 'web', 'processus'),
(29920, 17, 386, 'web', 'livré'),
(29921, 17, 387, 'web', 'annulé'),
(29922, 17, 388, 'web', ' aucun produit disponible'),
(29923, 17, 389, 'web', ' la quantité de l''article'),
(29924, 17, 391, 'web', 'ajouté avec succès'),
(29925, 17, 392, 'web', ' informations d''identification non valides'),
(29926, 17, 393, 'web', 'nom du site'),
(29927, 17, 394, 'web', 'utilisateurs'),
(29928, 17, 395, 'web', 'dconnecter avec succès'),
(29929, 17, 396, 'web', ' dernières commandes'),
(29930, 17, 397, 'web', ' détails de l''utilisateur'),
(29931, 17, 398, 'web', 'ajouter atleast un article'),
(29932, 17, 400, 'web', ' taille partie'),
(29933, 17, 401, 'web', 'session'),
(29934, 17, 402, 'web', 'date de réservation'),
(29935, 17, 404, 'web', ' téléchargé avec succès'),
(29936, 17, 405, 'web', 'télécharger des fichiers d''applications'),
(29937, 17, 408, 'web', 'Sélectionnez la devise'),
(29938, 17, 409, 'web', 'Bienvenue'),
(29939, 17, 410, 'web', ' administrateur'),
(29940, 17, 411, 'web', 'menu'),
(29941, 17, 412, 'web', 'ajouter le menu'),
(29942, 17, 413, 'web', 'Menu vue'),
(29943, 17, 414, 'web', 'Nom du menu'),
(29944, 17, 415, 'web', ' trait final'),
(29945, 17, 416, 'web', 'Obligatoire'),
(29946, 17, 417, 'web', 'image de menu'),
(29947, 17, 418, 'web', 'menu d''édition'),
(29948, 17, 419, 'web', ' type d''élément'),
(29949, 17, 420, 'web', ' maître d''emplacement'),
(29950, 17, 422, 'web', 'États'),
(29951, 17, 423, 'web', 'villes'),
(29952, 17, 424, 'web', ' lieux de prestation de services'),
(29953, 17, 425, 'web', 'nom de l''état'),
(29954, 17, 426, 'web', ' téléchargement excel'),
(29955, 17, 427, 'web', 'Nom de Ville'),
(29956, 17, 428, 'web', ' nom de la localité'),
(29957, 17, 429, 'web', ' cliquez ici pour télécharger le fichier d''échantillon'),
(29958, 17, 430, 'web', 'télécharger fichier excel'),
(29959, 17, 431, 'web', 'fichier'),
(29960, 17, 432, 'web', ' modèles de courrier électronique'),
(29961, 17, 433, 'web', 'registration'),
(29962, 17, 434, 'web', ' inscription complété avec succès e-mail d''activation envoyé'),
(29963, 17, 435, 'web', ' succès connexion'),
(29964, 17, 436, 'web', 'Pays'),
(29965, 17, 437, 'web', ' réinitialiser le mot de passe'),
(29966, 17, 438, 'web', 'longitude'),
(29967, 17, 439, 'web', 'latitude'),
(29968, 17, 440, 'web', 's''il vous plaît vous connecter'),
(29969, 17, 441, 'web', 'n utilisateur non autorisé'),
(29970, 17, 442, 'web', 'existait déjà'),
(29971, 17, 443, 'web', ' ajouter l''emplacement de la prestation de services'),
(29972, 17, 444, 'web', ' lieux de prestation de services d''édition'),
(29973, 17, 445, 'web', 'ajouter l''état'),
(29974, 17, 446, 'web', 'modifier l''état'),
(29975, 17, 447, 'web', 'télécharger états'),
(29976, 17, 448, 'web', 'ajouter la ville'),
(29977, 17, 449, 'web', 'modifier ville'),
(29978, 17, 450, 'web', 'villes de téléchargement'),
(29979, 17, 453, 'web', 'code de langue'),
(29980, 17, 454, 'web', 'type de phrase'),
(29981, 17, 458, 'web', ' changer le mot de passe'),
(29982, 17, 459, 'web', ' liste des phrases'),
(29983, 17, 461, 'web', 'phrases mise à jour d''applications'),
(29984, 17, 462, 'web', ' phrases mise à jour Web'),
(29985, 17, 467, 'web', ' nouveau mot de passe'),
(29986, 17, 568, 'web', ' s''il vous plaît entrez email et mot de passe'),
(29987, 17, 571, 'web', ' Test Phrase Web'),
(29988, 17, 572, 'web', 'phrases modifier web'),
(29989, 17, 573, 'web', ' phrases modifier app'),
(29990, 17, 574, 'web', 'Etat id'),
(29991, 17, 575, 'web', ' s''il vous plaît télécharger seulement jpg | jpeg | png'),
(29992, 17, 577, 'web', ' veg'),
(29993, 17, 578, 'web', 'non veg'),
(29994, 17, 579, 'web', 'autre'),
(29995, 17, 584, 'web', 'détails de l''offre'),
(29996, 17, 585, 'web', 'vous ne pouvez pas supprimer cet état de cause villes existent sous elle'),
(29997, 17, 586, 'web', 'vous ne pouvez pas supprimer les villes provoquent l''emplacement livré existent sous elle'),
(29998, 17, 587, 'web', 'Galerie d''édition'),
(29999, 17, 588, 'web', 'Test Phrase Web'),
(30000, 17, 589, 'web', 'identifiant de transaction'),
(30001, 17, 590, 'web', 'type de paiement'),
(30002, 17, 591, 'web', 'statut de paiement'),
(30003, 17, 592, 'web', 'Facebook API'),
(30004, 17, 593, 'web', 'Google API'),
(30005, 17, 613, 'web', 'montant payé'),
(30006, 17, 614, 'web', 'est supprimé'),
(30007, 17, 615, 'web', 'raison'),
(30008, 17, 616, 'web', ' élément supprimé de l''ordre'),
(30009, 17, 617, 'web', ' Ajouter'),
(30010, 17, 618, 'web', 'addons'),
(30011, 17, 619, 'web', 'vue addons'),
(30012, 17, 620, 'web', 'ajouter addon'),
(30013, 17, 621, 'web', ' modifier addon'),
(30014, 17, 622, 'web', 'Options'),
(30015, 17, 623, 'web', ' ajouter l''option'),
(30016, 17, 624, 'web', ' Options d''affichage'),
(30017, 17, 625, 'web', 'option de modifier'),
(30018, 17, 626, 'web', 'prix préfixe'),
(30019, 17, 627, 'web', ' prix'),
(30020, 17, 628, 'web', 'les postes de commande'),
(30021, 17, 629, 'web', ' ordre addons'),
(30022, 17, 630, 'web', 'total'),
(30023, 17, 631, 'web', ' addon supprimé de l''ordre'),
(30024, 17, 633, 'web', 'le restaurant timings'),
(30025, 17, 634, 'web', ' de'),
(30026, 17, 635, 'web', ' à'),
(30027, 17, 636, 'web', 'de temps'),
(30028, 17, 637, 'web', ' à l''heure'),
(30029, 17, 638, 'web', 'Ordinaire'),
(30030, 17, 639, 'web', ' utilisateur activé'),
(30031, 17, 640, 'web', 'utilisateur désactivé'),
(30032, 17, 641, 'web', ' mauvaise opération'),
(30293, 18, 5, 'web', 'Master-Einstellungen'),
(30294, 18, 6, 'web', 'Instrumententafel'),
(30295, 18, 12, 'web', 'Zuhause'),
(30296, 18, 14, 'web', 'Seiten'),
(30297, 18, 15, 'web', 'Sample'),
(30298, 18, 17, 'web', 'Name'),
(30299, 18, 18, 'web', 'Beschreibung'),
(30300, 18, 19, 'web', 'Status'),
(30301, 18, 20, 'web', 'Aktion'),
(30302, 18, 21, 'web', 'hinzufügen'),
(30303, 18, 23, 'web', 'aktualisieren'),
(30304, 18, 24, 'web', 'bearbeiten'),
(30305, 18, 26, 'web', 'Text'),
(30306, 18, 27, 'web', 'wählen'),
(30307, 18, 29, 'web', 'Titel'),
(30308, 18, 30, 'web', 'Anfangsdatum'),
(30309, 18, 31, 'web', 'Verfallsdatum'),
(30310, 18, 32, 'web', 'Datum erstellt'),
(30311, 18, 33, 'web', 'Foto'),
(30312, 18, 35, 'web', 'Sprache'),
(30313, 18, 36, 'web', 'schließen'),
(30314, 18, 37, 'web', 'löschen'),
(30315, 18, 38, 'web', 'zu löschen sind Sie sicher,'),
(30316, 18, 39, 'web', 'ja'),
(30317, 18, 40, 'web', 'Nein'),
(30318, 18, 41, 'web', 'Phrase'),
(30319, 18, 44, 'web', 'Schlüsselwörter'),
(30320, 18, 45, 'web', 'dynamische Seiten'),
(30321, 18, 46, 'web', 'ist unten'),
(30322, 18, 47, 'web', 'Sortierreihenfolge'),
(30323, 18, 49, 'web', 'faqs'),
(30324, 18, 52, 'web', 'Einstellungen'),
(30325, 18, 53, 'web', 'Standort'),
(30326, 18, 55, 'web', 'soziale Netzwerk-Einstellungen'),
(30327, 18, 56, 'web', 'Email Einstellungen'),
(30328, 18, 58, 'web', 'Gastgeber'),
(30329, 18, 59, 'web', 'Email'),
(30330, 18, 60, 'web', 'Passwort'),
(30331, 18, 61, 'web', 'Hafen'),
(30332, 18, 63, 'web', 'Adresse'),
(30333, 18, 64, 'web', 'Stadt'),
(30334, 18, 65, 'web', 'Bundesland'),
(30335, 18, 67, 'web', 'Postleitzahl'),
(30336, 18, 68, 'web', 'Telefon'),
(30337, 18, 69, 'web', 'Landlinie'),
(30338, 18, 70, 'web', 'Fax'),
(30339, 18, 71, 'web', 'Kontakt E-mail'),
(30340, 18, 72, 'web', 'Sprache auswählen'),
(30341, 18, 74, 'web', 'Design von'),
(30342, 18, 75, 'web', 'Rechte vorbehalten'),
(30343, 18, 76, 'web', 'Site-logo'),
(30344, 18, 78, 'web', 'App Einstellungen'),
(30345, 18, 80, 'web', 'kontaktiere uns'),
(30346, 18, 81, 'web', 'Mobile'),
(30347, 18, 82, 'web', 'Nachricht'),
(30348, 18, 83, 'web', 'einreichen'),
(30349, 18, 84, 'web', 'Über uns'),
(30350, 18, 86, 'web', 'digi'),
(30351, 18, 89, 'web', 'früher'),
(30352, 18, 90, 'web', 'Nächster'),
(30353, 18, 93, 'web', 'Spracheinstellungen'),
(30354, 18, 98, 'web', 'Liste Sprachen'),
(30355, 18, 99, 'web', 'hinzufügen Phrase'),
(30356, 18, 100, 'web', 'prache hinzufügen'),
(30357, 18, 101, 'web', 'wie es funktioniert'),
(30358, 18, 102, 'web', 'Geschäftsbedingungen'),
(30359, 18, 103, 'web', 'Privatsphäre und Politik'),
(30360, 18, 105, 'web', 'Email Einstellungen'),
(30361, 18, 109, 'web', 'unterstützt von'),
(30362, 18, 110, 'web', 'keine Daten verfügbar'),
(30363, 18, 112, 'web', 'aktiv'),
(30364, 18, 113, 'web', 'inaktiv'),
(30365, 18, 123, 'web', 'Satz erforderlich'),
(30366, 18, 124, 'web', 'Sprachen'),
(30367, 18, 125, 'web', 'Sätze'),
(30368, 18, 126, 'web', 'Update -Sätze'),
(30369, 18, 127, 'web', 'wählen Gültigkeit für neue'),
(30370, 18, 140, 'web', 'App Einstellungen'),
(30371, 18, 141, 'web', 'aktivieren'),
(30372, 18, 142, 'web', 'deaktivieren'),
(30373, 18, 152, 'web', 'Validierung neuer erforderlich'),
(30374, 18, 177, 'web', 'Boden'),
(30375, 18, 180, 'web', 'stornieren'),
(30376, 18, 182, 'web', 'Passwort ändern'),
(30377, 18, 183, 'web', 'Ausloggen'),
(30378, 18, 184, 'web', 'Altes Passwort'),
(30379, 18, 185, 'web', 'Neues Kennwort'),
(30380, 18, 186, 'web', 'bestätige neues Passwort'),
(30381, 18, 187, 'web', 'alt'),
(30382, 18, 191, 'web', 'Profil'),
(30383, 18, 192, 'web', 'Passwort ein und bestätigen Passwort stimmt nicht überein'),
(30384, 18, 193, 'web', 'persönliche Details'),
(30385, 18, 194, 'web', 'Vorname'),
(30386, 18, 195, 'web', 'Familienname, Nachname'),
(30387, 18, 196, 'web', 'Bitte geben Sie die Buchstaben nur'),
(30388, 18, 197, 'web', 'bitte nur Nummern eingeben'),
(30389, 18, 201, 'web', 'Toggle- Navigation'),
(30390, 18, 202, 'web', 'zurück'),
(30391, 18, 210, 'web', 'kontaktiere uns'),
(30392, 18, 212, 'web', 'alle'),
(30393, 18, 213, 'web', 'wird aktualisiert, sobald'),
(30394, 18, 214, 'web', 'Kontakt Nr'),
(30395, 18, 215, 'web', 'neu'),
(30396, 18, 216, 'web', 'Enddatum'),
(30397, 18, 217, 'web', 'Anfangsdatum'),
(30398, 18, 218, 'web', 'zeigt'),
(30399, 18, 225, 'web', 'bearbeiten Sprache'),
(30400, 18, 226, 'web', 'Sprache Name'),
(30401, 18, 227, 'web', 'bearbeiten Phrase'),
(30402, 18, 228, 'web', 'bearbeiten Phrasen'),
(30403, 18, 231, 'web', 'wie es funktioniert'),
(30404, 18, 235, 'web', 'Seitentitel'),
(30405, 18, 238, 'web', 'bearbeiten FAQ'),
(30406, 18, 239, 'web', 'FAQ vorschlagen'),
(30407, 18, 241, 'web', 'Ergebnisse 1 - 10 von'),
(30408, 18, 242, 'web', 'Erinnere dich an mich'),
(30409, 18, 243, 'web', 'Anmeldung'),
(30410, 18, 244, 'web', 'E-Mail- Template-Einstellungen'),
(30411, 18, 245, 'web', 'bearbeiten E-Mail -Vorlage'),
(30412, 18, 246, 'web', 'E-Mail -Vorlage'),
(30413, 18, 247, 'web', 'Fach'),
(30414, 18, 251, 'web', 'Site-logo'),
(30415, 18, 254, 'web', 'android url'),
(30416, 18, 255, 'web', 'ios url'),
(30417, 18, 256, 'web', 'ungültiges Dateiformat'),
(30418, 18, 257, 'web', 'Erfolgreich geupdated'),
(30419, 18, 258, 'web', 'Veröffentlicht am'),
(30420, 18, 261, 'web', 'mehr sehen'),
(30421, 18, 262, 'web', 'Sprache ändern'),
(30422, 18, 263, 'web', 'Sprache erfolgreich geändert'),
(30423, 18, 265, 'web', 'Gesendet'),
(30424, 18, 266, 'web', 'vor'),
(30425, 18, 267, 'web', 'mandrill Schlüssel'),
(30426, 18, 268, 'web', 'API-Schlüssel'),
(30427, 18, 269, 'web', 'Web-Mail'),
(30428, 18, 270, 'web', 'Mandrill'),
(30429, 18, 271, 'web', 'Mandrill'),
(30430, 18, 272, 'web', 'sehen Sie alle'),
(30431, 18, 276, 'web', 'zurückstellen'),
(30432, 18, 279, 'web', 'Artikel'),
(30433, 18, 280, 'web', 'Artikel hinzufügen'),
(30434, 18, 281, 'web', 'Element bearbeiten'),
(30435, 18, 282, 'web', 'Ansicht Artikel'),
(30436, 18, 283, 'web', 'Artikelname'),
(30437, 18, 284, 'web', 'Einzelteilkosten'),
(30438, 18, 285, 'web', 'Artikelbild'),
(30439, 18, 286, 'web', 'Bild ändern'),
(30440, 18, 287, 'web', 'bietet an'),
(30441, 18, 288, 'web', 'erstellen Angebot'),
(30442, 18, 289, 'web', 'zum Angebot'),
(30443, 18, 290, 'web', 'Ansicht Angebote'),
(30444, 18, 291, 'web', 'Angebot Name'),
(30445, 18, 292, 'web', 'Angebot Kosten'),
(30446, 18, 293, 'web', 'Angebot Starttermin'),
(30447, 18, 294, 'web', 'Angebot Enddatum'),
(30448, 18, 295, 'web', 'bearbeiten Angebot'),
(30449, 18, 296, 'web', 'Angebot gültig Datum'),
(30450, 18, 297, 'web', 'Angebot erhalten'),
(30451, 18, 298, 'web', 'offer image'),
(30452, 18, 299, 'web', 'Angebotsbedingungen'),
(30453, 18, 300, 'web', 'Menge'),
(30454, 18, 301, 'web', 'Hinzufügen / Entfernen'),
(30455, 18, 302, 'web', 'Hinzufügen / Entfernen'),
(30456, 18, 303, 'web', 'Anzahl der Artikel'),
(30457, 18, 304, 'web', 'Aktuelle Angebote'),
(30458, 18, 305, 'web', 'nicht von Menschen dienen'),
(30459, 18, 312, 'web', 'Galerie'),
(30460, 18, 313, 'web', 'Alt-Text'),
(30461, 18, 314, 'web', 'Image'),
(30462, 18, 315, 'web', 'hinzufügen Galerie'),
(30463, 18, 316, 'web', 'Alt-Text erforderlich'),
(30464, 18, 318, 'web', 'paypal Einstellungen'),
(30465, 18, 319, 'web', 'PayPal Umwelt Produktion'),
(30466, 18, 320, 'web', 'PayPal Environment Sandbox'),
(30467, 18, 321, 'web', 'Händlername'),
(30468, 18, 322, 'web', 'Händler Datenschutz URL'),
(30469, 18, 323, 'web', 'Händler Benutzervereinbarung URL'),
(30470, 18, 324, 'web', 'Währung'),
(30471, 18, 325, 'web', 'Konto Typ'),
(30472, 18, 326, 'web', 'logo_image'),
(30473, 18, 327, 'web', 'paypal Umwelt Produktion'),
(30474, 18, 328, 'web', 'paypal Umwelt Sandbox'),
(30475, 18, 329, 'web', 'Händlername'),
(30476, 18, 330, 'web', 'Händler Datenschutzbestimmungen  URL'),
(30477, 18, 331, 'web', 'Händler Nutzungsvertrag URL'),
(30478, 18, 332, 'web', 'Währungszeichen'),
(30479, 18, 339, 'web', 'ungültige Datei'),
(30480, 18, 340, 'web', 'erfolgreich hinzugefügt'),
(30481, 18, 341, 'web', 'nicht hinzufügen'),
(30482, 18, 342, 'web', 'nicht in der Lage zu aktualisieren'),
(30483, 18, 343, 'web', 'konnte den Datensatz gefunden'),
(30484, 18, 344, 'web', 'erfolgreich gelöscht'),
(30485, 18, 345, 'web', 'nicht in der Lage zu löschen'),
(30486, 18, 354, 'web', 'die Anzahl der Produkte'),
(30487, 18, 355, 'web', 'gültiges Datum muss größer sein als Startdatum'),
(30488, 18, 356, 'web', 'ungültige Operation'),
(30489, 18, 365, 'web', 'Menüpunkt wählen'),
(30490, 18, 366, 'web', 'keine Produkte verfügbar'),
(30491, 18, 367, 'web', 'Aufträge'),
(30492, 18, 368, 'web', 'neue Bestellungen'),
(30493, 18, 369, 'web', 'unter Prozessaufträge'),
(30494, 18, 370, 'web', 'gelieferte Aufträge'),
(30495, 18, 371, 'web', 'stornierte Aufträge'),
(30496, 18, 372, 'web', 'Best.-Nr'),
(30497, 18, 373, 'web', 'Auftragsdatum'),
(30498, 18, 374, 'web', 'um Zeit'),
(30499, 18, 375, 'web', 'um Kosten'),
(30500, 18, 376, 'web', 'Kundenname'),
(30501, 18, 378, 'web', 'estelldetails'),
(30502, 18, 379, 'web', 'gebuchten Termin'),
(30503, 18, 380, 'web', 'Wahrzeichen'),
(30504, 18, 381, 'web', 'PIN-Code'),
(30505, 18, 382, 'web', 'um Update'),
(30506, 18, 383, 'web', 'Update Auftragsstatus'),
(30507, 18, 384, 'web', 'Info nicht gefunden'),
(30508, 18, 385, 'web', 'verarbeiten'),
(30509, 18, 386, 'web', 'geliefert'),
(30510, 18, 387, 'web', 'abgebrochen'),
(30511, 18, 388, 'web', 'keine Produkte verfügbar'),
(30512, 18, 389, 'web', 'Artikelmenge'),
(30513, 18, 391, 'web', 'erfolgreich hinzugefügt'),
(30514, 18, 392, 'web', 'ungültige Anmeldeinformationen'),
(30515, 18, 393, 'web', 'Site-Namen'),
(30516, 18, 394, 'web', 'Benutzer'),
(30517, 18, 395, 'web', 'Abmeldung erfolgreich'),
(30518, 18, 396, 'web', 'neueste Aufträge'),
(30519, 18, 397, 'web', 'Nutzerdetails'),
(30520, 18, 398, 'web', 'hinzufügen atleast ein Element'),
(30521, 18, 400, 'web', 'Partygröße'),
(30522, 18, 401, 'web', 'Session'),
(30523, 18, 402, 'web', 'Datum der Buchung'),
(30524, 18, 404, 'web', 'erfolgreich hochgeladen'),
(30525, 18, 405, 'web', 'laden App -Dateien'),
(30526, 18, 408, 'web', 'ährung wählen'),
(30527, 18, 409, 'web', 'herzlich willkommen'),
(30528, 18, 410, 'web', 'Administrator'),
(30529, 18, 411, 'web', 'Menü'),
(30530, 18, 412, 'web', 'Menü hinzufügen'),
(30531, 18, 413, 'web', 'Ansicht -Menü'),
(30532, 18, 414, 'web', 'Menü-Name'),
(30533, 18, 415, 'web', 'punch line'),
(30534, 18, 416, 'web', 'erforderlich'),
(30535, 18, 417, 'web', 'Menübild'),
(30536, 18, 418, 'web', 'bearbeiten-Menü'),
(30537, 18, 419, 'web', 'Gegenstandsart'),
(30538, 18, 420, 'web', 'Standort-Stamm'),
(30539, 18, 422, 'web', 'Staaten'),
(30540, 18, 423, 'web', 'Städte'),
(30541, 18, 424, 'web', 'Service Abladestellen'),
(30542, 18, 425, 'web', 'Staat Namen'),
(30543, 18, 426, 'web', 'und Excel'),
(30544, 18, 427, 'web', 'Stadtname'),
(30545, 18, 428, 'web', 'Ortsnamen'),
(30546, 18, 429, 'web', 'Klicken Sie hier, um die Beispieldatei herunterladen'),
(30547, 18, 430, 'web', 'und Excel -Datei'),
(30548, 18, 431, 'web', 'Datei'),
(30549, 18, 432, 'web', 'E-Mail -Vorlagen'),
(30550, 18, 433, 'web', 'Anmeldung'),
(30551, 18, 434, 'web', 'Anmeldung erfolgreich Aktivierung E-Mail abgeschlossen gesendet'),
(30552, 18, 435, 'web', 'Login Erfolg'),
(30553, 18, 436, 'web', 'Land'),
(30554, 18, 437, 'web', 'Passwort zurücksetzen'),
(30555, 18, 438, 'web', 'longitude'),
(30556, 18, 439, 'web', 'Breite'),
(30557, 18, 440, 'web', 'bitte loggen Sie sich ein'),
(30558, 18, 441, 'web', 'nicht autorisierter Benutzer'),
(30559, 18, 442, 'web', 'bereits vorhanden'),
(30560, 18, 443, 'web', 'addieren Service Lieferort'),
(30561, 18, 444, 'web', 'bearbeiten Service Abladestellen'),
(30562, 18, 445, 'web', 'addieren Zustand'),
(30563, 18, 446, 'web', 'Bearbeitungsstatus'),
(30564, 18, 447, 'web', 'laden Staaten'),
(30565, 18, 448, 'web', 'in city'),
(30566, 18, 449, 'web', 'bearbeiten Stadt'),
(30567, 18, 450, 'web', 'Upload- Städte'),
(30568, 18, 453, 'web', 'Sprachcode'),
(30569, 18, 454, 'web', 'Satz Typ'),
(30570, 18, 458, 'web', 'Passwort ändern'),
(30571, 18, 459, 'web', 'Liste Phrasen'),
(30572, 18, 461, 'web', 'Update App -Sätze'),
(30573, 18, 462, 'web', 'Update- Sätze'),
(30574, 18, 467, 'web', 'Neues Kennwort'),
(30575, 18, 568, 'web', 'Bitte geben Sie E-Mail und Passwort'),
(30576, 18, 571, 'web', 'Test Web Phrase'),
(30577, 18, 572, 'web', 'bearbeiten Web -Sätze'),
(30578, 18, 573, 'web', 'bearbeiten app -Sätze'),
(30579, 18, 574, 'web', 'Zustand id'),
(30580, 18, 575, 'web', 'Bitte laden Sie nur jpg | jpeg | png'),
(30581, 18, 577, 'web', 'veg'),
(30582, 18, 578, 'web', 'nicht vegetarisch'),
(30583, 18, 579, 'web', 'andere'),
(30584, 18, 584, 'web', 'Angebotsdetails'),
(30585, 18, 585, 'web', 'Sie können diesen Zustand Ursache Städte darunter existieren löschen'),
(30586, 18, 586, 'web', 'Sie können die Städte Ursache geliefert Standort nicht löschen darunter existieren'),
(30587, 18, 587, 'web', 'bearbeiten Galerie'),
(30588, 18, 588, 'web', 'Test Web Phrase'),
(30589, 18, 589, 'web', 'Transaktions-ID'),
(30590, 18, 590, 'web', 'Zahlungsart'),
(30591, 18, 591, 'web', 'Zahlungsstatus'),
(30592, 18, 592, 'web', 'Facebook API'),
(30593, 18, 593, 'web', 'Google API'),
(30594, 18, 613, 'web', ' bezahlte Menge'),
(30595, 18, 614, 'web', 'ist gelöscht'),
(30596, 18, 615, 'web', 'Grund'),
(30597, 18, 616, 'web', ' gelöschte Element aus , um'),
(30598, 18, 617, 'web', 'Erweiterung'),
(30599, 18, 618, 'web', 'Addons'),
(30600, 18, 619, 'web', 'Ansicht Addons'),
(30601, 18, 620, 'web', 'hinzufügen addon'),
(30602, 18, 621, 'web', 'bearbeiten addon'),
(30603, 18, 622, 'web', ' Optionen'),
(30604, 18, 623, 'web', 'addieren,'),
(30605, 18, 624, 'web', 'Ansichtsoptionen'),
(30606, 18, 625, 'web', ' Bearbeitungsoption'),
(30607, 18, 626, 'web', 'Preis Präfix'),
(30608, 18, 627, 'web', 'Preis'),
(30609, 18, 628, 'web', 'Auftragspositionen'),
(30610, 18, 629, 'web', 'bestellen Addons'),
(30611, 18, 630, 'web', ' gesamt'),
(30612, 18, 631, 'web', 'gelöscht Addon von der Bestellung'),
(30613, 18, 633, 'web', ' Restaurant -Timings'),
(30614, 18, 634, 'web', 'von'),
(30615, 18, 635, 'web', 'nach'),
(30616, 18, 636, 'web', 'von Zeit'),
(30617, 18, 637, 'web', 'zu Zeit'),
(30618, 18, 638, 'web', 'normal'),
(30619, 18, 639, 'web', 'Benutzer aktiviert'),
(30620, 18, 640, 'web', 'Benutzer deaktiviert'),
(30621, 18, 641, 'web', ' falsche Bedienung'),
(30622, 1, 5, 'web', 'Master Settings'),
(30623, 1, 6, 'web', 'Dashboard'),
(30624, 1, 12, 'web', 'Home'),
(30625, 1, 14, 'web', 'Pages'),
(30626, 1, 15, 'web', 'Sample');
INSERT INTO `dn_multi_lang` (`id`, `lang_id`, `phrase_id`, `phrase_type`, `text`) VALUES
(30627, 1, 17, 'web', 'Name'),
(30628, 1, 18, 'web', 'Description'),
(30629, 1, 19, 'web', 'Status'),
(30630, 1, 20, 'web', 'Action'),
(30631, 1, 21, 'web', 'Add'),
(30632, 1, 23, 'web', 'Update'),
(30633, 1, 24, 'web', 'Edit'),
(30634, 1, 26, 'web', 'Text'),
(30635, 1, 27, 'web', 'Select'),
(30636, 1, 29, 'web', 'Title'),
(30637, 1, 30, 'web', 'Start Date'),
(30638, 1, 31, 'web', 'Expiry Date'),
(30639, 1, 32, 'web', 'Date Created'),
(30640, 1, 33, 'web', 'Photo'),
(30641, 1, 35, 'web', 'Language'),
(30642, 1, 36, 'web', 'Close'),
(30643, 1, 37, 'web', 'Delete'),
(30644, 1, 38, 'web', 'Are you sure you want to delete '),
(30645, 1, 39, 'web', 'Yes'),
(30646, 1, 40, 'web', 'No'),
(30647, 1, 41, 'web', 'Phrase'),
(30648, 1, 44, 'web', 'Keywords'),
(30649, 1, 45, 'web', 'Dynamic Pages'),
(30650, 1, 46, 'web', 'Is Bottom'),
(30651, 1, 47, 'web', 'Sort Order'),
(30652, 1, 49, 'web', 'Faqs'),
(30653, 1, 52, 'web', 'Settings'),
(30654, 1, 53, 'web', 'Site'),
(30655, 1, 55, 'web', 'Social Network Settings'),
(30656, 1, 56, 'web', 'Email settings'),
(30657, 1, 58, 'web', 'Host'),
(30658, 1, 59, 'web', 'Email'),
(30659, 1, 60, 'web', 'Password'),
(30660, 1, 61, 'web', 'Port'),
(30661, 1, 63, 'web', 'Address'),
(30662, 1, 64, 'web', 'City'),
(30663, 1, 65, 'web', 'State'),
(30664, 1, 67, 'web', 'PINCode'),
(30665, 1, 68, 'web', 'Phone'),
(30666, 1, 69, 'web', 'Land line'),
(30667, 1, 70, 'web', 'Fax'),
(30668, 1, 71, 'web', 'Contact Email'),
(30669, 1, 72, 'web', 'Select Language'),
(30670, 1, 74, 'web', 'Design By'),
(30671, 1, 75, 'web', 'Rights Reserved'),
(30672, 1, 76, 'web', ' Site logo'),
(30673, 1, 78, 'web', 'App Settings'),
(30674, 1, 80, 'web', 'Contact us'),
(30675, 1, 81, 'web', 'Mobile'),
(30676, 1, 82, 'web', 'Message'),
(30677, 1, 83, 'web', 'Submit'),
(30678, 1, 84, 'web', 'About us'),
(30679, 1, 86, 'web', 'Digi'),
(30680, 1, 89, 'web', 'Previous'),
(30681, 1, 90, 'web', 'Next'),
(30682, 1, 93, 'web', 'Language Settings'),
(30683, 1, 98, 'web', 'List Languages'),
(30684, 1, 99, 'web', 'Add Phrase'),
(30685, 1, 100, 'web', 'Add Language'),
(30686, 1, 101, 'web', 'How it works'),
(30687, 1, 102, 'web', 'Terms and Conditions'),
(30688, 1, 103, 'web', 'Privacy and Policy'),
(30689, 1, 105, 'web', 'Email Settings'),
(30690, 1, 109, 'web', 'Powered By'),
(30691, 1, 110, 'web', 'No Data Available'),
(30692, 1, 112, 'web', 'Active'),
(30693, 1, 113, 'web', 'Inactive'),
(30694, 1, 123, 'web', 'Phrase Required'),
(30695, 1, 124, 'web', 'Languages'),
(30696, 1, 125, 'web', 'Phrases'),
(30697, 1, 126, 'web', 'Update Phrases'),
(30698, 1, 127, 'web', 'Select validity for new'),
(30699, 1, 140, 'web', 'App settings'),
(30700, 1, 141, 'web', 'Enable'),
(30701, 1, 142, 'web', 'Disable'),
(30702, 1, 152, 'web', 'Validate for new required'),
(30703, 1, 177, 'web', 'Bottom'),
(30704, 1, 180, 'web', 'Cancel'),
(30705, 1, 182, 'web', 'Change Password'),
(30706, 1, 183, 'web', 'Logout'),
(30707, 1, 184, 'web', 'Old Password'),
(30708, 1, 185, 'web', 'New Password'),
(30709, 1, 186, 'web', 'Confirm New Password'),
(30710, 1, 187, 'web', 'Old'),
(30711, 1, 191, 'web', 'Profile'),
(30712, 1, 192, 'web', 'Password and Confirm Password Does Not Match'),
(30713, 1, 193, 'web', 'Personal Details'),
(30714, 1, 194, 'web', 'First name'),
(30715, 1, 195, 'web', 'Last name'),
(30716, 1, 196, 'web', 'Please Enter Letters Only'),
(30717, 1, 197, 'web', 'Please Enter Numbers Only'),
(30718, 1, 201, 'web', 'Toggle Navigation'),
(30719, 1, 202, 'web', 'Prev'),
(30720, 1, 210, 'web', 'Contact Us'),
(30721, 1, 212, 'web', 'All'),
(30722, 1, 213, 'web', 'Will be updated soon'),
(30723, 1, 214, 'web', 'Contact No'),
(30724, 1, 215, 'web', 'New'),
(30725, 1, 216, 'web', 'End Date'),
(30726, 1, 217, 'web', 'Start Date'),
(30727, 1, 218, 'web', 'Showing'),
(30728, 1, 225, 'web', 'Edit Language'),
(30729, 1, 226, 'web', 'Language Name'),
(30730, 1, 227, 'web', 'Edit Phrase'),
(30731, 1, 228, 'web', 'Edit Phrases'),
(30732, 1, 231, 'web', 'How it works'),
(30733, 1, 235, 'web', 'Site Title'),
(30734, 1, 238, 'web', 'Edit Faq'),
(30735, 1, 239, 'web', 'Add Faq'),
(30736, 1, 241, 'web', 'Showing 1 - 10 Of'),
(30737, 1, 242, 'web', 'Remember me'),
(30738, 1, 243, 'web', 'Login'),
(30739, 1, 244, 'web', 'Email Template Settings'),
(30740, 1, 245, 'web', 'Edit Email Template'),
(30741, 1, 246, 'web', 'Email Template'),
(30742, 1, 247, 'web', 'Subject'),
(30743, 1, 251, 'web', 'Site logo'),
(30744, 1, 254, 'web', 'Android url'),
(30745, 1, 255, 'web', 'IOS URL'),
(30746, 1, 256, 'web', 'Invalid file format'),
(30747, 1, 257, 'web', 'Updated Successfully'),
(30748, 1, 258, 'web', 'Posted on'),
(30749, 1, 261, 'web', 'View More'),
(30750, 1, 262, 'web', 'Change Language'),
(30751, 1, 263, 'web', 'Language Changed Successfully'),
(30752, 1, 265, 'web', 'Posted'),
(30753, 1, 266, 'web', 'Ago'),
(30754, 1, 267, 'web', 'Mandrill Key'),
(30755, 1, 268, 'web', 'Api Key'),
(30756, 1, 269, 'web', 'Web mail'),
(30757, 1, 270, 'web', ' Mandrill'),
(30758, 1, 271, 'web', 'Mandrill'),
(30759, 1, 272, 'web', 'View All'),
(30760, 1, 276, 'web', 'Reset'),
(30761, 1, 279, 'web', 'Items'),
(30762, 1, 280, 'web', 'Add Item'),
(30763, 1, 281, 'web', 'Edit Item'),
(30764, 1, 282, 'web', 'View Items'),
(30765, 1, 283, 'web', 'Item Name'),
(30766, 1, 284, 'web', 'Item Cost'),
(30767, 1, 285, 'web', 'Item Image'),
(30768, 1, 286, 'web', 'Change Image'),
(30769, 1, 287, 'web', 'Offers'),
(30770, 1, 288, 'web', 'Create Offer'),
(30771, 1, 289, 'web', 'View Offer'),
(30772, 1, 290, 'web', 'View Offers'),
(30773, 1, 291, 'web', 'Offer Name'),
(30774, 1, 292, 'web', 'Offer Cost'),
(30775, 1, 293, 'web', 'Offer Start Date'),
(30776, 1, 294, 'web', 'Offer End Date'),
(30777, 1, 295, 'web', 'Edit Offer'),
(30778, 1, 296, 'web', 'Offer Valid Date'),
(30779, 1, 297, 'web', 'Offer Condition'),
(30780, 1, 298, 'web', 'Offer Image'),
(30781, 1, 299, 'web', 'Offer Conditions'),
(30782, 1, 300, 'web', 'Quantity'),
(30783, 1, 301, 'web', 'Add/Remove'),
(30784, 1, 302, 'web', 'Add/ Remove'),
(30785, 1, 303, 'web', 'No of Items'),
(30786, 1, 304, 'web', 'Latest Offers'),
(30787, 1, 305, 'web', 'Serve No Of People'),
(30788, 1, 312, 'web', 'Gallery'),
(30789, 1, 313, 'web', 'Alt Text'),
(30790, 1, 314, 'web', 'Image'),
(30791, 1, 315, 'web', 'Add Gallery'),
(30792, 1, 316, 'web', 'Alt Text Required'),
(30793, 1, 318, 'web', 'Paypal Settings'),
(30794, 1, 319, 'web', 'PayPal Environment Production'),
(30795, 1, 320, 'web', 'PayPal Environment Sandbox'),
(30796, 1, 321, 'web', 'Merchant Name'),
(30797, 1, 322, 'web', 'Merchant Privacy Policy URL'),
(30798, 1, 323, 'web', 'Merchant User Agreement URL'),
(30799, 1, 324, 'web', 'Currency'),
(30800, 1, 325, 'web', 'Account_type'),
(30801, 1, 326, 'web', 'Logo_Image'),
(30802, 1, 327, 'web', 'Paypal Environment Production'),
(30803, 1, 328, 'web', 'Paypal Environment Sandbox'),
(30804, 1, 329, 'web', 'Merchant Name'),
(30805, 1, 330, 'web', 'Merchant Privacy Policy URL'),
(30806, 1, 331, 'web', 'Merchant User Agreement URL'),
(30807, 1, 332, 'web', 'Currency Symbol'),
(30808, 1, 339, 'web', 'Invalid file'),
(30809, 1, 340, 'web', 'Added Sucessfully'),
(30810, 1, 341, 'web', 'Unable to Add'),
(30811, 1, 342, 'web', 'Unable to Update'),
(30812, 1, 343, 'web', 'Could Not Found The Record'),
(30813, 1, 344, 'web', 'Deleted Successfully'),
(30814, 1, 345, 'web', 'Unable to Delete'),
(30815, 1, 354, 'web', 'Product count'),
(30816, 1, 355, 'web', 'Valid Date Must Be Greater Than Start Date'),
(30817, 1, 356, 'web', 'Invalid Operation'),
(30818, 1, 365, 'web', 'Select Item'),
(30819, 1, 366, 'web', 'No Items Available'),
(30820, 1, 367, 'web', 'Orders'),
(30821, 1, 368, 'web', 'New Orders'),
(30822, 1, 369, 'web', 'Under Process Orders'),
(30823, 1, 370, 'web', 'Delivered Orders'),
(30824, 1, 371, 'web', 'Cancelled Orders'),
(30825, 1, 372, 'web', 'Order No'),
(30826, 1, 373, 'web', 'Order Date'),
(30827, 1, 374, 'web', 'Order Time'),
(30828, 1, 375, 'web', 'Order Cost'),
(30829, 1, 376, 'web', 'Customer Name'),
(30830, 1, 378, 'web', 'Order Details'),
(30831, 1, 379, 'web', 'Booked Date'),
(30832, 1, 380, 'web', 'Land Mark'),
(30833, 1, 381, 'web', 'Pincode'),
(30834, 1, 382, 'web', 'Order Update'),
(30835, 1, 383, 'web', 'Update Order Status'),
(30836, 1, 384, 'web', 'Details Not Found'),
(30837, 1, 385, 'web', 'Process'),
(30838, 1, 386, 'web', 'Delivered'),
(30839, 1, 387, 'web', 'Cancelled'),
(30840, 1, 388, 'web', 'No Products Available'),
(30841, 1, 389, 'web', 'Item quantity'),
(30842, 1, 391, 'web', 'Added Successfully'),
(30843, 1, 392, 'web', 'Invalid Credentials'),
(30844, 1, 393, 'web', 'Site Name'),
(30845, 1, 394, 'web', 'Users'),
(30846, 1, 395, 'web', 'Logout Successfully'),
(30847, 1, 396, 'web', 'Latest Orders'),
(30848, 1, 397, 'web', 'User Details'),
(30849, 1, 398, 'web', 'Add Atleast One Item'),
(30850, 1, 400, 'web', 'Party Size'),
(30851, 1, 401, 'web', 'Session'),
(30852, 1, 402, 'web', 'Date Of Booking'),
(30853, 1, 404, 'web', 'Uploaded Successfully'),
(30854, 1, 405, 'web', 'Upload App files'),
(30855, 1, 408, 'web', 'Select Currency'),
(30856, 1, 409, 'web', 'Welcome'),
(30857, 1, 410, 'web', 'Admin'),
(30858, 1, 411, 'web', 'Menu'),
(30859, 1, 412, 'web', 'Add Menu'),
(30860, 1, 413, 'web', 'View Menu'),
(30861, 1, 414, 'web', 'Menu Name'),
(30862, 1, 415, 'web', 'Punch Line'),
(30863, 1, 416, 'web', 'Required'),
(30864, 1, 417, 'web', 'Menu Image'),
(30865, 1, 418, 'web', 'Edit Menu'),
(30866, 1, 419, 'web', 'Item Type'),
(30867, 1, 420, 'web', 'Location Master'),
(30868, 1, 422, 'web', 'States'),
(30869, 1, 423, 'web', 'Cities'),
(30870, 1, 424, 'web', 'Service Delivery Locations'),
(30871, 1, 425, 'web', 'State Name'),
(30872, 1, 426, 'web', 'Upload Excel'),
(30873, 1, 427, 'web', 'City Name'),
(30874, 1, 428, 'web', 'Locality Name'),
(30875, 1, 429, 'web', 'Click here to Download sample file'),
(30876, 1, 430, 'web', 'Upload Excel File'),
(30877, 1, 431, 'web', 'File'),
(30878, 1, 432, 'web', 'Email Templates'),
(30879, 1, 433, 'web', 'Registration'),
(30880, 1, 434, 'web', 'Registration Completed Successfully Activation Email Sent'),
(30881, 1, 435, 'web', 'Login Success'),
(30882, 1, 436, 'web', 'Country'),
(30883, 1, 437, 'web', 'Reset Password'),
(30884, 1, 438, 'web', 'Longitude'),
(30885, 1, 439, 'web', 'Latitude'),
(30886, 1, 440, 'web', 'Please Login'),
(30887, 1, 441, 'web', 'Unauthorised User'),
(30888, 1, 442, 'web', 'Already Existed'),
(30889, 1, 443, 'web', 'Add Service Delivery Location'),
(30890, 1, 444, 'web', 'Edit Service Delivery Locations'),
(30891, 1, 445, 'web', 'Add State'),
(30892, 1, 446, 'web', 'Edit State'),
(30893, 1, 447, 'web', 'Upload States'),
(30894, 1, 448, 'web', 'Add City'),
(30895, 1, 449, 'web', 'Edit City'),
(30896, 1, 450, 'web', 'Upload Cities'),
(30897, 1, 453, 'web', 'Language Code'),
(30898, 1, 454, 'web', 'Phrase Type'),
(30899, 1, 458, 'web', 'Change Password'),
(30900, 1, 459, 'web', 'List Phrases'),
(30901, 1, 461, 'web', 'Update App Phrases'),
(30902, 1, 462, 'web', 'Update Web Phrases'),
(30903, 1, 467, 'web', 'New Password'),
(30904, 1, 568, 'web', 'Please Enter Email and Password'),
(30905, 1, 571, 'web', 'Test Web Phrase'),
(30906, 1, 572, 'web', 'Edit Web Phrases'),
(30907, 1, 573, 'web', 'Edit App Phrases'),
(30908, 1, 574, 'web', 'State Id'),
(30909, 1, 575, 'web', 'Please Upload Only jpg|jpeg|png'),
(30910, 1, 577, 'web', 'Veg'),
(30911, 1, 578, 'web', 'Non Veg'),
(30912, 1, 579, 'web', 'Other'),
(30913, 1, 584, 'web', 'Offer Details'),
(30914, 1, 585, 'web', 'You Cannot Delete This State Cause Cities Exist Under It'),
(30915, 1, 586, 'web', 'You Cannot Delete Cities Cause Delivered Location Exist Under It '),
(30916, 1, 587, 'web', 'Edit Gallery'),
(30917, 1, 588, 'web', 'Test  Web Phrase'),
(30918, 1, 589, 'web', 'Transaction id'),
(30919, 1, 590, 'web', 'Payment Type'),
(30920, 1, 591, 'web', 'Payment Status'),
(30921, 1, 592, 'web', 'Facebook API'),
(30922, 1, 593, 'web', 'Google API'),
(30923, 1, 613, 'web', 'Paid Amount'),
(30924, 1, 614, 'web', 'Is Deleted'),
(30925, 1, 615, 'web', 'Reason'),
(30926, 1, 616, 'web', 'Deleted Item From Order'),
(30927, 1, 617, 'web', 'Addon'),
(30928, 1, 618, 'web', 'Addons'),
(30929, 1, 619, 'web', 'View Addons'),
(30930, 1, 620, 'web', 'Add Addon'),
(30931, 1, 621, 'web', 'Edit Addon'),
(30932, 1, 622, 'web', 'Options'),
(30933, 1, 623, 'web', 'Add Option'),
(30934, 1, 624, 'web', 'View Options'),
(30935, 1, 625, 'web', 'Edit Option'),
(30936, 1, 626, 'web', 'Price Prefix'),
(30937, 1, 627, 'web', 'Price'),
(30938, 1, 628, 'web', 'Prder Items'),
(30939, 1, 629, 'web', 'Order Addons'),
(30940, 1, 630, 'web', 'Total'),
(30941, 1, 631, 'web', 'Deleted Addon From Order'),
(30942, 1, 633, 'web', 'Restaurant Timings'),
(30943, 1, 634, 'web', 'From'),
(30944, 1, 635, 'web', 'To'),
(30945, 1, 636, 'web', 'From Time'),
(30946, 1, 637, 'web', 'To Time'),
(30947, 1, 638, 'web', 'Normal'),
(30948, 1, 639, 'web', 'User Activated'),
(30949, 1, 640, 'web', 'User Deactivated'),
(30950, 1, 641, 'web', 'Wrong Operation'),
(33124, 1, 463, 'app', 'Change Password'),
(33125, 1, 464, 'app', 'Menu'),
(33126, 1, 465, 'app', 'Login'),
(33127, 1, 468, 'app', 'Confirm New Password'),
(33128, 1, 469, 'app', 'Forgot Password'),
(33129, 1, 470, 'app', 'Email Address'),
(33130, 1, 471, 'app', 'Send'),
(33131, 1, 472, 'app', 'Don''t worry ! Just fill in your email and we will help you reset your password'),
(33132, 1, 473, 'app', 'Enter Email'),
(33133, 1, 474, 'app', 'Password'),
(33134, 1, 475, 'app', 'Sign in'),
(33135, 1, 476, 'app', 'OR'),
(33136, 1, 477, 'app', 'New User?'),
(33137, 1, 478, 'app', 'Sign Up Here'),
(33138, 1, 479, 'app', 'Sign Up'),
(33139, 1, 480, 'app', 'I Accept'),
(33140, 1, 481, 'app', 'Register'),
(33141, 1, 482, 'app', 'First Name'),
(33142, 1, 483, 'app', 'Last Name'),
(33143, 1, 484, 'app', 'Email'),
(33144, 1, 485, 'app', 'Phone Number'),
(33145, 1, 486, 'app', 'Terms and Conditions'),
(33146, 1, 487, 'app', 'Reset Password'),
(33147, 1, 488, 'app', 'Confirm Password'),
(33148, 1, 489, 'app', 'Submit'),
(33149, 1, 490, 'app', 'About Us'),
(33150, 1, 491, 'app', 'Version'),
(33151, 1, 492, 'app', 'Address'),
(33152, 1, 493, 'app', 'Cart List'),
(33153, 1, 494, 'app', 'Cost'),
(33154, 1, 495, 'app', 'Add Items'),
(33155, 1, 496, 'app', 'Total Cost '),
(33156, 1, 497, 'app', 'Order'),
(33157, 1, 498, 'app', 'Change Language'),
(33158, 1, 499, 'app', 'Select Language'),
(33159, 1, 500, 'app', 'English'),
(33160, 1, 501, 'app', 'Chinese'),
(33161, 1, 502, 'app', 'By Your Mood Or Preference'),
(33162, 1, 503, 'app', 'Edit Profile'),
(33163, 1, 504, 'app', 'City'),
(33164, 1, 505, 'app', 'State'),
(33165, 1, 506, 'app', 'Pincode'),
(33166, 1, 507, 'app', 'Land Mark'),
(33167, 1, 508, 'app', 'Update'),
(33168, 1, 509, 'app', 'Place Order'),
(33169, 1, 510, 'app', 'Mobile Number'),
(33170, 1, 511, 'app', 'Location'),
(33171, 1, 512, 'app', 'FlatNo./HouseNo'),
(33172, 1, 513, 'app', 'Apartment/LocalityName'),
(33173, 1, 514, 'app', 'Address other(optional)'),
(33174, 1, 515, 'app', 'Select Date'),
(33175, 1, 516, 'app', 'Date'),
(33176, 1, 517, 'app', 'Time'),
(33177, 1, 518, 'app', 'Select Title'),
(33178, 1, 519, 'app', 'Online Payment'),
(33179, 1, 520, 'app', 'Cash On Deliver'),
(33180, 1, 521, 'app', 'Proceed'),
(33181, 1, 522, 'app', 'All Time Favourites'),
(33182, 1, 523, 'app', 'Welcome'),
(33183, 1, 524, 'app', 'Offers'),
(33184, 1, 525, 'app', 'Order History'),
(33185, 1, 526, 'app', 'Share To Friends'),
(33186, 1, 527, 'app', 'Rate Us On The Play Store'),
(33187, 1, 528, 'app', 'Sign Out'),
(33188, 1, 529, 'app', 'Offers Available'),
(33189, 1, 530, 'app', 'Valid From'),
(33190, 1, 531, 'app', 'Valid To'),
(33191, 1, 532, 'app', 'No Of Persons'),
(33192, 1, 533, 'app', 'No Of Products'),
(33193, 1, 534, 'app', 'Discount'),
(33194, 1, 535, 'app', 'Order Items'),
(33195, 1, 536, 'app', 'Your Orders'),
(33196, 1, 537, 'app', 'Current Password'),
(33197, 1, 538, 'app', 'No Of Items'),
(33198, 1, 539, 'app', 'No Orders Found'),
(33199, 1, 540, 'app', 'Payment Status'),
(33200, 1, 541, 'app', 'Your Payment Status Is'),
(33201, 1, 542, 'app', 'Successful'),
(33202, 1, 543, 'app', 'Your Payment Of Amount'),
(33203, 1, 544, 'app', 'Has Been Successfully Processed'),
(33204, 1, 545, 'app', 'Select City'),
(33205, 1, 546, 'app', 'Search'),
(33206, 1, 547, 'app', 'Select Location'),
(33207, 1, 548, 'app', 'Description'),
(33208, 1, 549, 'app', 'View Cart'),
(33209, 1, 550, 'app', 'Terms'),
(33210, 1, 551, 'app', 'My Account'),
(33211, 1, 552, 'app', 'Timed Out Error'),
(33212, 1, 553, 'app', 'Check Network Connection'),
(33213, 1, 554, 'app', 'Validating User...'),
(33214, 1, 555, 'app', 'Password Not Match'),
(33215, 1, 556, 'app', 'Sign out successfully'),
(33216, 1, 557, 'app', 'Specify Date'),
(33217, 1, 558, 'app', 'Specify Time'),
(33218, 1, 559, 'app', 'Incorrect Login'),
(33219, 1, 560, 'app', 'No'),
(33220, 1, 561, 'app', 'Available Now'),
(33221, 1, 562, 'app', 'Already Added To Cart'),
(33222, 1, 563, 'app', 'Email Already Used Or Invalid UnableToCreateAccount'),
(33223, 1, 564, 'app', 'No Items In Your Cart'),
(33224, 1, 565, 'app', 'Guest'),
(33225, 1, 566, 'app', 'User'),
(33226, 1, 567, 'app', 'Payment'),
(33227, 1, 569, 'app', 'Peter Srinivas'),
(33228, 1, 570, 'app', 'New Password'),
(33229, 1, 576, 'app', 'Ordered on'),
(33230, 1, 580, 'app', 'Offer Items'),
(33231, 1, 581, 'app', 'No items available'),
(33232, 1, 582, 'app', 'Make Payment'),
(33233, 1, 583, 'app', 'Payment Method'),
(33234, 1, 594, 'app', 'Facebook Api'),
(33235, 1, 595, 'app', 'Google Api'),
(33236, 1, 596, 'app', 'Payment Type'),
(33237, 1, 597, 'app', 'Stripe'),
(33238, 1, 598, 'app', 'Card Number'),
(33239, 1, 599, 'app', 'Expiration Date'),
(33240, 1, 600, 'app', 'Month'),
(33241, 1, 601, 'app', 'Year'),
(33242, 1, 602, 'app', 'CVC'),
(33243, 1, 603, 'app', 'Proceed To Pay'),
(33244, 1, 604, 'app', 'All'),
(33245, 1, 605, 'app', 'Veg'),
(33246, 1, 606, 'app', 'Non-Veg'),
(33247, 1, 607, 'app', 'Other'),
(33248, 1, 608, 'app', 'Password Successfully Changed'),
(33249, 1, 609, 'app', 'Registration Completed Successfully Activation Mail Sent'),
(33250, 1, 610, 'app', 'Account is inactive'),
(33251, 1, 611, 'app', 'Item Added to Cart'),
(33252, 1, 612, 'app', 'Quantity'),
(33253, 1, 632, 'app', 'Registration Completed Successfully Password Sent To Email'),
(33254, 1, 642, 'app', ' Save'),
(33255, 1, 643, 'app', 'Item Addons'),
(33256, 1, 644, 'app', 'No Addons Available'),
(33257, 1, 645, 'app', 'Item Sizes'),
(33258, 1, 646, 'app', 'Customize Your Item'),
(33259, 1, 647, 'app', 'No Item Sizes Available'),
(33260, 1, 648, 'app', 'Contact Information'),
(33261, 1, 649, 'app', 'Add New'),
(33262, 1, 650, 'app', 'Saved Addresses'),
(33263, 1, 651, 'app', 'Opening Hours'),
(33264, 1, 652, 'app', 'Closing Hours'),
(33265, 1, 653, 'app', 'Sizes'),
(33266, 1, 654, 'app', 'Addons'),
(33267, 1, 655, 'app', 'Deleted'),
(33268, 1, 656, 'app', 'Select Minimum One Item Then Only Addons Will Apply'),
(33269, 1, 657, 'app', 'Items'),
(33270, 1, 658, 'app', 'Add Address'),
(33271, 1, 659, 'app', 'Edit Address'),
(33272, 1, 660, 'app', 'Crunchy Restaurant Not Available On Selected Time'),
(33273, 1, 661, 'app', 'Select Address'),
(33274, 1, 662, 'app', 'Invalid Card'),
(33275, 1, 663, 'app', 'Cancel'),
(33276, 1, 664, 'app', 'Done'),
(33277, 1, 665, 'app', 'Crunchy'),
(33278, 1, 666, 'app', 'Crunchy App For Restaurant'),
(33279, 1, 667, 'app', 'Restaruant Timings'),
(33280, 1, 668, 'app', 'Ok'),
(33281, 1, 669, 'app', 'Debited Through Crunchy Account'),
(33282, 1, 670, 'app', 'Crunchy Account'),
(33283, 1, 671, 'app', 'My Profile'),
(33284, 1, 672, 'app', 'Add New Address'),
(33285, 1, 673, 'app', 'Crunchy Restaurant Is Currently Closed'),
(33286, 16, 463, 'app', ' पासवर्ड बदलें'),
(33287, 16, 464, 'app', 'मेन्यू'),
(33288, 16, 465, 'app', 'लॉगिन'),
(33289, 16, 468, 'app', 'नए पासवर्ड की पुष्टि करें'),
(33290, 16, 469, 'app', 'पासवर्ड भूल गए'),
(33291, 16, 470, 'app', ' ईमेल पता'),
(33292, 16, 471, 'app', 'भेजना'),
(33293, 16, 472, 'app', ' न सिर्फ आपके ईमेल में भरें चिंता और हम मदद मिलेगी आप अपने पासवर्ड को रीसेट'),
(33294, 16, 473, 'app', ' ईमेल दर्ज करें'),
(33295, 16, 474, 'app', 'पारण शब्द'),
(33296, 16, 475, 'app', 'साइन इन करें'),
(33297, 16, 476, 'app', 'या'),
(33298, 16, 477, 'app', 'नया उपयोगकर्ता'),
(33299, 16, 478, 'app', ' यहां साइन अप करें'),
(33300, 16, 479, 'app', 'साइन अप करें'),
(33301, 16, 480, 'app', 'मुझे स्वीकार है'),
(33302, 16, 481, 'app', ' रजिस्टर'),
(33303, 16, 482, 'app', ' पहला नाम'),
(33304, 16, 483, 'app', 'अंतिम नाम'),
(33305, 16, 484, 'app', 'ईमेल'),
(33306, 16, 485, 'app', ' फ़ोन नंबर'),
(33307, 16, 486, 'app', 'नियम और शर्तें'),
(33308, 16, 487, 'app', 'पासवर्ड रीसेट'),
(33309, 16, 488, 'app', 'पासवर्ड की पुष्टि कीजिये'),
(33310, 16, 489, 'app', 'जमा करें'),
(33311, 16, 490, 'app', ' हमारे बारे में'),
(33312, 16, 491, 'app', 'संस्करण'),
(33313, 16, 492, 'app', 'पता'),
(33314, 16, 493, 'app', 'गाड़ी सूची'),
(33315, 16, 494, 'app', 'लागत'),
(33316, 16, 495, 'app', ' सामगंरियां जोड़ें'),
(33317, 16, 496, 'app', 'कुल लागत'),
(33318, 16, 497, 'app', ' व्यवस्था'),
(33319, 16, 498, 'app', ' भाषा बदलो'),
(33320, 16, 499, 'app', 'भाषा चुनिए'),
(33321, 16, 500, 'app', 'अंग्रेज़ी'),
(33322, 16, 501, 'app', 'चीनी'),
(33323, 16, 502, 'app', 'अपने मूड या पसंद से'),
(33324, 16, 503, 'app', 'प्रोफाइल एडिट करें'),
(33325, 16, 504, 'app', ' शहर'),
(33326, 16, 505, 'app', ' राज्य'),
(33327, 16, 506, 'app', 'पिन कोड'),
(33328, 16, 507, 'app', ' सीमा चिन्ह'),
(33329, 16, 508, 'app', 'अपडेट'),
(33330, 16, 509, 'app', 'आदेश देना'),
(33331, 16, 510, 'app', 'मोबाइल नंबर'),
(33332, 16, 511, 'app', 'स्थान'),
(33333, 16, 512, 'app', 'फ्लैट कोई घर नहीं'),
(33334, 16, 513, 'app', 'फ्लैट लोकैलिटी नाम'),
(33335, 16, 514, 'app', 'संबोधित अन्य वैकल्पिक'),
(33336, 16, 515, 'app', 'तारीख़ चुनें'),
(33337, 16, 516, 'app', 'तारीख'),
(33338, 16, 517, 'app', 'पहर'),
(33339, 16, 518, 'app', ' चुनिंदा शीर्षक'),
(33340, 16, 519, 'app', 'ऑनलाइन भुगतान'),
(33341, 16, 520, 'app', 'देने पर नकद'),
(33342, 16, 521, 'app', 'बढ़ना'),
(33343, 16, 522, 'app', ' सभी समय पसंदीदा'),
(33344, 16, 523, 'app', ' स्वागत हे'),
(33345, 16, 524, 'app', ' प्रस्तावों'),
(33346, 16, 525, 'app', 'आदेश इतिहास'),
(33347, 16, 526, 'app', ' दोस्तों को साझा'),
(33348, 16, 527, 'app', ' अमेरिका की दर प्ले स्टोर पर'),
(33349, 16, 528, 'app', 'साइन आउट'),
(33350, 16, 529, 'app', ' उपलब्ध प्रदान करता है'),
(33351, 16, 530, 'app', 'से मान्य'),
(33352, 16, 531, 'app', ' इस तक मान्य'),
(33353, 16, 532, 'app', ' व्यक्तियों का कोई'),
(33354, 16, 533, 'app', ' उत्पादों का कोई'),
(33355, 16, 534, 'app', 'छूट'),
(33356, 16, 535, 'app', ' आदेश आइटम'),
(33357, 16, 536, 'app', 'तुम्हारे ऑर्डर'),
(33358, 16, 537, 'app', 'वर्तमान पासवर्ड'),
(33359, 16, 538, 'app', 'आइटम्स की कोई'),
(33360, 16, 539, 'app', 'कोई आदेश मिले'),
(33361, 16, 540, 'app', ' भुगतान की स्थिति'),
(33362, 16, 541, 'app', 'अपने भुगतान की स्थिति है'),
(33363, 16, 542, 'app', 'सफल'),
(33364, 16, 543, 'app', 'राशि का भुगतान'),
(33365, 16, 544, 'app', 'सफलतापूर्वक संसाधित कर दिया गया है'),
(33366, 16, 545, 'app', 'शहर चुनें'),
(33367, 16, 546, 'app', 'खोज'),
(33368, 16, 547, 'app', 'स्थान चुनें'),
(33369, 16, 548, 'app', 'विवरण'),
(33370, 16, 549, 'app', 'गाडी देंखे'),
(33371, 16, 550, 'app', 'शर्तों'),
(33372, 16, 551, 'app', 'मेरा खाता'),
(33373, 16, 552, 'app', 'समय पर आउट त्रुटि'),
(33374, 16, 553, 'app', 'जाँच नेटवर्क कनेक्शन'),
(33375, 16, 554, 'app', 'मान्य उपयोगकर्ता'),
(33376, 16, 555, 'app', 'पासवर्ड मेल नहीं'),
(33377, 16, 556, 'app', 'सफलतापूर्वक प्रस्थान करें'),
(33378, 16, 557, 'app', 'तिथि का उल्लेख'),
(33379, 16, 558, 'app', 'समय निर्दिष्ट'),
(33380, 16, 559, 'app', 'गलत लॉगिन'),
(33381, 16, 560, 'app', 'नहीं'),
(33382, 16, 561, 'app', 'अब उपलब्ध है'),
(33383, 16, 562, 'app', 'पहले से ही गाड़ी में गया'),
(33384, 16, 563, 'app', ' ईमेल पहले से ही इस्तेमाल किया है या अमान्य खाता बनाने में असमर्थ'),
(33385, 16, 564, 'app', 'आपकी कार्ट में कोई सामान नहीं'),
(33386, 16, 565, 'app', 'अतिथि'),
(33387, 16, 566, 'app', 'उपयोगकर्ता'),
(33388, 16, 567, 'app', 'भुगतान'),
(33389, 16, 569, 'app', 'पीटर श्रीनिवास'),
(33390, 16, 570, 'app', 'नया पासवर्ड'),
(33391, 16, 576, 'app', ' पर आदेश दिया'),
(33392, 16, 580, 'app', 'प्रस्ताव के आइटम'),
(33393, 16, 581, 'app', 'कोई आइटम उपलब्ध'),
(33394, 16, 582, 'app', 'भुगतान करो'),
(33395, 16, 583, 'app', 'भुगतान का तरीका'),
(33396, 16, 594, 'app', 'फेसबुक एपीआई'),
(33397, 16, 595, 'app', 'गूगल एपीआई'),
(33398, 16, 596, 'app', 'भुगतान के प्रकार'),
(33399, 16, 597, 'app', 'पट्टी'),
(33400, 16, 598, 'app', 'कार्ड नंबर'),
(33401, 16, 599, 'app', 'समाप्ति तिथि'),
(33402, 16, 600, 'app', 'महीना'),
(33403, 16, 601, 'app', 'साल'),
(33404, 16, 602, 'app', 'सीवीसी'),
(33405, 16, 603, 'app', 'चुकाने के लिए कार्रवाई शुरू करो'),
(33406, 16, 604, 'app', 'सब'),
(33407, 16, 605, 'app', 'शाकाहारी'),
(33408, 16, 606, 'app', 'मासाहारी'),
(33409, 16, 607, 'app', 'अन्य'),
(33410, 16, 608, 'app', 'पासवर्ड सफलतापूर्वक बदल दिया है'),
(33411, 16, 609, 'app', 'पंजीकरण भेजा सफलतापूर्वक सक्रियण मेल पूरा'),
(33412, 16, 610, 'app', 'खाता निष्क्रिय है'),
(33413, 16, 611, 'app', 'आइटम गाड़ी में जोड़ा'),
(33414, 16, 612, 'app', 'मात्रा'),
(33415, 16, 632, 'app', ' पंजीकरण पूरा सफलतापूर्वक पासवर्ड ईमेल के लिए भेजा'),
(33416, 16, 642, 'app', ' बचाना'),
(33417, 16, 643, 'app', ' आइटम  ऐड ऑन'),
(33418, 16, 644, 'app', ' कोई ऐड ऑन उपलब्ध'),
(33419, 16, 645, 'app', ' आइटम आकार'),
(33420, 16, 646, 'app', 'अपने आइटम को अनुकूलित'),
(33421, 16, 647, 'app', ' कोई आइटम आकारों में उपलब्ध'),
(33422, 16, 648, 'app', 'संपर्क जानकारी'),
(33423, 16, 649, 'app', ' नया जोड़ें'),
(33424, 16, 650, 'app', ' बचाया संबोधित किया'),
(33425, 16, 651, 'app', ' खुलने का समय'),
(33426, 16, 652, 'app', ' समापन घंटे'),
(33427, 16, 653, 'app', 'आकार'),
(33428, 16, 654, 'app', 'लाभ विकल्प'),
(33429, 16, 655, 'app', ' नष्ट कर दिया'),
(33430, 16, 656, 'app', ' चयन न्यूनतम एक आइटम तो केवल लाभ विकल्प लागू होगी'),
(33431, 16, 657, 'app', 'आइटम'),
(33432, 16, 658, 'app', 'पता जोड़ें'),
(33433, 16, 659, 'app', 'पता संपादित करें'),
(33434, 16, 660, 'app', ' कुरकुरे रेस्तरां चयनित समय पर उपलब्ध नहीं'),
(33435, 16, 661, 'app', ' चुनिंदा पता'),
(33436, 16, 662, 'app', 'अमान्य कार्ड'),
(33437, 16, 663, 'app', ' रद्द करना'),
(33438, 16, 664, 'app', 'किया हुआ'),
(33439, 16, 665, 'app', 'कुरकुरे'),
(33440, 16, 666, 'app', ' कुरकुरे अनुप्रयोग के लिए रेस्तरां'),
(33441, 16, 667, 'app', ' रेस्तरां टाइमिंग्स'),
(33442, 16, 668, 'app', ' ठीक'),
(33443, 16, 669, 'app', ' कुरकुरे खाते के माध्यम से डेबिट'),
(33444, 16, 670, 'app', 'कुरकुरे खाते में'),
(33445, 16, 671, 'app', 'मेरी प्रोफाइल'),
(33446, 16, 672, 'app', 'नया पता जोड़ें'),
(33447, 16, 673, 'app', 'कुरकुरे रेस्तरां वर्तमान में बंद हो जाता है'),
(33448, 17, 463, 'app', ' Changer le mot de passe'),
(33449, 17, 464, 'app', 'Menu'),
(33450, 17, 465, 'app', 'S''identifier'),
(33451, 17, 468, 'app', 'Confirmer le nouveau mot de passe'),
(33452, 17, 469, 'app', ' Mot de passe oublié'),
(33453, 17, 470, 'app', 'Adresse e-mail'),
(33454, 17, 471, 'app', ' Envoyer'),
(33455, 17, 472, 'app', ' Ne vous inquiétez pas ! Il suffit de remplir dans votre e-mail et nous vous aiderons à réinitialiser votre mot de passe'),
(33456, 17, 473, 'app', 'Entrez Email'),
(33457, 17, 474, 'app', 'Mot de passe'),
(33458, 17, 475, 'app', 'Se connecter'),
(33459, 17, 476, 'app', 'ou'),
(33460, 17, 477, 'app', 'nouvel utilisateur'),
(33461, 17, 478, 'app', ' Inscrivez-vous ici'),
(33462, 17, 479, 'app', 's''inscrire'),
(33463, 17, 480, 'app', 'J''accepte'),
(33464, 17, 481, 'app', 'registre'),
(33465, 17, 482, 'app', 'Prénom'),
(33466, 17, 483, 'app', 'nom de famille'),
(33467, 17, 484, 'app', 'email'),
(33468, 17, 485, 'app', 'numéro de téléphone'),
(33469, 17, 486, 'app', ' termes et conditions'),
(33470, 17, 487, 'app', 'réinitialiser le mot de passe'),
(33471, 17, 488, 'app', ' Confirmez le mot de passe'),
(33472, 17, 489, 'app', 'soumettre'),
(33473, 17, 490, 'app', 'à propos de nous'),
(33474, 17, 491, 'app', 'version'),
(33475, 17, 492, 'app', 'adresse'),
(33476, 17, 493, 'app', 'cartList'),
(33477, 17, 494, 'app', 'Coût'),
(33478, 17, 495, 'app', 'addItems'),
(33479, 17, 496, 'app', 'coût total'),
(33480, 17, 497, 'app', 'commande'),
(33481, 17, 498, 'app', 'changer de langue'),
(33482, 17, 499, 'app', 'Choisir la langue'),
(33483, 17, 500, 'app', 'Anglais'),
(33484, 17, 501, 'app', 'chinois'),
(33485, 17, 502, 'app', ' par votre humeur ou de préférence'),
(33486, 17, 503, 'app', 'modifier le profil'),
(33487, 17, 504, 'app', 'ville'),
(33488, 17, 505, 'app', 'Etat'),
(33489, 17, 506, 'app', 'code PIN'),
(33490, 17, 507, 'app', ' point de repère'),
(33491, 17, 508, 'app', 'mettre à jour'),
(33492, 17, 509, 'app', 'Passer la commande'),
(33493, 17, 510, 'app', 'numéro de portable'),
(33494, 17, 511, 'app', 'emplacement'),
(33495, 17, 512, 'app', ' plat Non Maison Non'),
(33496, 17, 513, 'app', ' Appartement Nom Localité'),
(33497, 17, 514, 'app', 'adresse autre option'),
(33498, 17, 515, 'app', 'sélectionnez date'),
(33499, 17, 516, 'app', 'date'),
(33500, 17, 517, 'app', 'temps'),
(33501, 17, 518, 'app', 'sélectionnez le titre'),
(33502, 17, 519, 'app', ' paiement en ligne'),
(33503, 17, 520, 'app', 'trésorerie Sur Livrer'),
(33504, 17, 521, 'app', 'procéder'),
(33505, 17, 522, 'app', ' tous les temps favoris'),
(33506, 17, 523, 'app', 'Bienvenue'),
(33507, 17, 524, 'app', 'des offres'),
(33508, 17, 525, 'app', ' Historique des commandes'),
(33509, 17, 526, 'app', 'part aux amis'),
(33510, 17, 527, 'app', ' évaluer nous sur Le Playstore'),
(33511, 17, 528, 'app', 'se déconnecter'),
(33512, 17, 529, 'app', ' offres disponibles'),
(33513, 17, 530, 'app', 'Valide à partir de'),
(33514, 17, 531, 'app', 'valable pour'),
(33515, 17, 532, 'app', 'pas de personnes'),
(33516, 17, 533, 'app', 'pas de produits'),
(33517, 17, 534, 'app', 'remise'),
(33518, 17, 535, 'app', 'commande Articles'),
(33519, 17, 536, 'app', 'vos commandes'),
(33520, 17, 537, 'app', 'Mot de passe actuel'),
(33521, 17, 538, 'app', ' pas d''articles'),
(33522, 17, 539, 'app', ' pas Ordres trouvés'),
(33523, 17, 540, 'app', ' statut de paiement'),
(33524, 17, 541, 'app', ' votre statusIs de paiement'),
(33525, 17, 542, 'app', 'réussi'),
(33526, 17, 543, 'app', 'votre paiement de montant'),
(33527, 17, 544, 'app', 'a été traitée avec succès'),
(33528, 17, 545, 'app', 'select Ville'),
(33529, 17, 546, 'app', 'chercher'),
(33530, 17, 547, 'app', ' sélectionnez l''emplacement'),
(33531, 17, 548, 'app', 'la description'),
(33532, 17, 549, 'app', 'détails panier'),
(33533, 17, 550, 'app', 'termes'),
(33534, 17, 551, 'app', 'Mon compte'),
(33535, 17, 552, 'app', 'Timed Out Error'),
(33536, 17, 553, 'app', 'vérifier la connexion réseau'),
(33537, 17, 554, 'app', ' la validation de l''utilisateur'),
(33538, 17, 555, 'app', 'mot de passe correspond pas'),
(33539, 17, 556, 'app', ' signer avec succès'),
(33540, 17, 557, 'app', ' préciser date'),
(33541, 17, 558, 'app', 'spécifier Temps'),
(33542, 17, 559, 'app', 'Login incorrect'),
(33543, 17, 560, 'app', 'non'),
(33544, 17, 561, 'app', 'disponible dès maintenant'),
(33545, 17, 562, 'app', 'déjà ajouté au panier'),
(33546, 17, 563, 'app', 'email Déjà utilisé ou non valide Impossible de créer le compte'),
(33547, 17, 564, 'app', 'Aucun produit dans votre panier'),
(33548, 17, 565, 'app', 'client'),
(33549, 17, 566, 'app', 'utilisateur'),
(33550, 17, 567, 'app', 'Paiement'),
(33551, 17, 569, 'app', 'peter Srinivas'),
(33552, 17, 570, 'app', ' nouveau mot de passe'),
(33553, 17, 576, 'app', 'Sur ordre'),
(33554, 17, 580, 'app', 'offre Articles'),
(33555, 17, 581, 'app', 'Exemplaires disponibles'),
(33556, 17, 582, 'app', ' effectuer le paiement'),
(33557, 17, 583, 'app', ' mode de paiement'),
(33558, 17, 594, 'app', 'Facebook Api'),
(33559, 17, 595, 'app', 'Google Api'),
(33560, 17, 596, 'app', 'type de paiement'),
(33561, 17, 597, 'app', 'bande'),
(33562, 17, 598, 'app', 'numéro de carte'),
(33563, 17, 599, 'app', 'date d''expiration'),
(33564, 17, 600, 'app', 'mois'),
(33565, 17, 601, 'app', 'an'),
(33566, 17, 602, 'app', 'cvc'),
(33567, 17, 603, 'app', 'procéder au paiement'),
(33568, 17, 604, 'app', 'tout'),
(33569, 17, 605, 'app', 'veg'),
(33570, 17, 606, 'app', 'non -veg'),
(33571, 17, 607, 'app', 'autre'),
(33572, 17, 608, 'app', 'Mot de passe changé avec succès'),
(33573, 17, 609, 'app', 'l''enregistrement terminé avec succès courrier activation envoyé'),
(33574, 17, 610, 'app', 'compte est inactif'),
(33575, 17, 611, 'app', 'article ajouté au panier'),
(33576, 17, 612, 'app', 'Quantité'),
(33577, 17, 632, 'app', ' inscription terminée avec succès Mot de passe envoyé à EMAIL'),
(33578, 17, 642, 'app', ' enregistrer'),
(33579, 17, 643, 'app', ' article Addons'),
(33580, 17, 644, 'app', ' aucun Addons Disponible'),
(33581, 17, 645, 'app', 'item Tailles'),
(33582, 17, 646, 'app', ' personnaliser votre article'),
(33583, 17, 647, 'app', ' noItem Tailles disponibles'),
(33584, 17, 648, 'app', 'coordonnées'),
(33585, 17, 649, 'app', ' ajouter Nouveau'),
(33586, 17, 650, 'app', 'Adresses sauvegardées'),
(33587, 17, 651, 'app', ' heures d''ouverture'),
(33588, 17, 652, 'app', 'Heures de fermeture'),
(33589, 17, 653, 'app', 'tailles'),
(33590, 17, 654, 'app', ' addons'),
(33591, 17, 655, 'app', 'supprimé'),
(33592, 17, 656, 'app', ' sélectionnez Minimum One Point Ensuite seulement Addons appliquerons'),
(33593, 17, 657, 'app', 'articles'),
(33594, 17, 658, 'app', 'Ajoutez l''adresse'),
(33595, 17, 659, 'app', 'modifier Adresse'),
(33596, 17, 660, 'app', ' croquante restaurant Non disponible à temps sélectionné'),
(33597, 17, 661, 'app', 'sélectionnez Adresse'),
(33598, 17, 662, 'app', ' carte invalide'),
(33599, 17, 663, 'app', 'Annuler'),
(33600, 17, 664, 'app', ' terminé'),
(33601, 17, 665, 'app', 'croquant'),
(33602, 17, 666, 'app', ' app croquante pour le restaurant'),
(33603, 17, 667, 'app', ' timings Restaruant'),
(33604, 17, 668, 'app', 'D''accord'),
(33605, 17, 669, 'app', 'débitée Par compte Crunchy'),
(33606, 17, 670, 'app', 'compte croquante'),
(33607, 17, 671, 'app', 'mon profil'),
(33608, 17, 672, 'app', ' Ajouter une nouvelle adresse'),
(33609, 17, 673, 'app', 'Restaurant croquante est actuellement fermé'),
(33610, 18, 463, 'app', 'Passwort ändern'),
(33611, 18, 464, 'app', 'Menü'),
(33612, 18, 465, 'app', 'Anmeldung'),
(33613, 18, 468, 'app', 'bestätige neues Passwort'),
(33614, 18, 469, 'app', 'Passwort vergessen'),
(33615, 18, 470, 'app', 'E-Mail-Addresse'),
(33616, 18, 471, 'app', 'senden'),
(33617, 18, 472, 'app', 'Mach dir keine Sorgen Sie einfach Ihre E-Mail geben Sie bitte und wir helfen Sie Ihr Passwort Zurücksetzen'),
(33618, 18, 473, 'app', 'Email eingeben'),
(33619, 18, 474, 'app', 'Passwort'),
(33620, 18, 475, 'app', 'anmelden'),
(33621, 18, 476, 'app', 'oder'),
(33622, 18, 477, 'app', 'neuer Benutzer'),
(33623, 18, 478, 'app', 'Hier anmelden'),
(33624, 18, 479, 'app', 'Anmelden'),
(33625, 18, 480, 'app', 'Ich nehme an'),
(33626, 18, 481, 'app', 'Neu registrieren'),
(33627, 18, 482, 'app', 'Vorname'),
(33628, 18, 483, 'app', 'Familienname, Nachname'),
(33629, 18, 484, 'app', 'Email'),
(33630, 18, 485, 'app', 'Telefonnummer'),
(33631, 18, 486, 'app', 'Geschäftsbedingungen'),
(33632, 18, 487, 'app', 'Passwort zurücksetzen'),
(33633, 18, 488, 'app', 'Bestätige das Passwort'),
(33634, 18, 489, 'app', 'einreichen'),
(33635, 18, 490, 'app', 'Über uns'),
(33636, 18, 491, 'app', 'Version'),
(33637, 18, 492, 'app', 'Adresse'),
(33638, 18, 493, 'app', 'Wagen Liste'),
(33639, 18, 494, 'app', 'Kosten'),
(33640, 18, 495, 'app', 'Liste Artikel'),
(33641, 18, 496, 'app', 'Gesamtkosten'),
(33642, 18, 497, 'app', 'Auftrag'),
(33643, 18, 498, 'app', 'Sprache ändern'),
(33644, 18, 499, 'app', 'Sprache auswählen'),
(33645, 18, 500, 'app', 'Englisch'),
(33646, 18, 501, 'app', 'Chinesisch'),
(33647, 18, 502, 'app', 'durch Ihre Stimmung oder Bevorzugung'),
(33648, 18, 503, 'app', 'Profil bearbeiten'),
(33649, 18, 504, 'app', 'Stadt'),
(33650, 18, 505, 'app', 'Bundesland'),
(33651, 18, 506, 'app', 'PIN-Code'),
(33652, 18, 507, 'app', 'Wahrzeichen'),
(33653, 18, 508, 'app', 'aktualisieren'),
(33654, 18, 509, 'app', 'Bestellung aufgeben'),
(33655, 18, 510, 'app', 'Handynummer'),
(33656, 18, 511, 'app', 'Lage'),
(33657, 18, 512, 'app', 'Wohnung kein Haus kein'),
(33658, 18, 513, 'app', 'Wohnung Ortsname'),
(33659, 18, 514, 'app', 'Adresse Andere optionale'),
(33660, 18, 515, 'app', 'wählen Sie Datum'),
(33661, 18, 516, 'app', 'Datum'),
(33662, 18, 517, 'app', 'Zeit'),
(33663, 18, 518, 'app', 'Titel wählen'),
(33664, 18, 519, 'app', 'Onlinebezahlung'),
(33665, 18, 520, 'app', 'Cash On Deliver'),
(33666, 18, 521, 'app', 'Vorgehen'),
(33667, 18, 522, 'app', 'Alle Zeit Favoriten'),
(33668, 18, 523, 'app', 'herzlich willkommen'),
(33669, 18, 524, 'app', 'bietet an'),
(33670, 18, 525, 'app', 'Bestellverlauf'),
(33671, 18, 526, 'app', 'Anteil an Freunde'),
(33672, 18, 527, 'app', 'Bewerten Sie uns im Play Store'),
(33673, 18, 528, 'app', 'Ausloggen'),
(33674, 18, 529, 'app', 'Angebote verfügbar'),
(33675, 18, 530, 'app', 'gültig ab'),
(33676, 18, 531, 'app', 'gültig bis'),
(33677, 18, 532, 'app', 'Anzahl der Personen'),
(33678, 18, 533, 'app', 'keine der Produkte'),
(33679, 18, 534, 'app', 'Rabatt'),
(33680, 18, 535, 'app', 'bestellen Artikel'),
(33681, 18, 536, 'app', 'deine Bestellungen'),
(33682, 18, 537, 'app', 'Aktuelles Passwort'),
(33683, 18, 538, 'app', 'keine Versand'),
(33684, 18, 539, 'app', 'keine Aufträge gefunden'),
(33685, 18, 540, 'app', 'Zahlungsstatus'),
(33686, 18, 541, 'app', 'Ihre Zahlungsstatus Ist'),
(33687, 18, 542, 'app', 'erfolgreich'),
(33688, 18, 543, 'app', 'Ihre Zahlung des Betrags'),
(33689, 18, 544, 'app', 'Wurde, erfolgreich verarbeitet'),
(33690, 18, 545, 'app', 'wählen Sie eine Stadt'),
(33691, 18, 546, 'app', 'Suche'),
(33692, 18, 547, 'app', 'Ort auswählen'),
(33693, 18, 548, 'app', 'Beschreibung'),
(33694, 18, 549, 'app', 'anzeigen Warenkorb'),
(33695, 18, 550, 'app', 'Bedingungen'),
(33696, 18, 551, 'app', 'mein Konto'),
(33697, 18, 552, 'app', 'Zeitüberschreitung Fehler'),
(33698, 18, 553, 'app', 'Netzwerkanschluss   überprüfen'),
(33699, 18, 554, 'app', 'Validierung von Benutzer'),
(33700, 18, 555, 'app', 'Passwort nicht überein'),
(33701, 18, 556, 'app', 'abmelden Erfolgreich'),
(33702, 18, 557, 'app', 'Angabe eines Datums'),
(33703, 18, 558, 'app', 'Zeit angeben'),
(33704, 18, 559, 'app', 'falsche Anmeldedaten'),
(33705, 18, 560, 'app', 'Nein'),
(33706, 18, 561, 'app', 'Jetzt verfügbar'),
(33707, 18, 562, 'app', 'bereits in den Warenkorb gelegt'),
(33708, 18, 563, 'app', 'E-Mail bereits benutzt oder ungültig UnableTo Konto erstellen'),
(33709, 18, 564, 'app', 'keine Artikel im Warenkorb'),
(33710, 18, 565, 'app', 'Gast'),
(33711, 18, 566, 'app', 'Benutzer'),
(33712, 18, 567, 'app', 'Zahlung'),
(33713, 18, 569, 'app', 'Peter Srinivas'),
(33714, 18, 570, 'app', 'Neues Kennwort'),
(33715, 18, 576, 'app', 'bestellt On'),
(33716, 18, 580, 'app', 'Angebot Artikel'),
(33717, 18, 581, 'app', 'keine Artikel verfügbar'),
(33718, 18, 582, 'app', 'machen Zahlung'),
(33719, 18, 583, 'app', 'Bezahlverfahren'),
(33720, 18, 594, 'app', 'facebook Api'),
(33721, 18, 595, 'app', 'Google Api'),
(33722, 18, 596, 'app', 'Zahlungsart'),
(33723, 18, 597, 'app', 'Streifen'),
(33724, 18, 598, 'app', 'Kartennummer'),
(33725, 18, 599, 'app', 'Haltbarkeitsdatum'),
(33726, 18, 600, 'app', 'Monat'),
(33727, 18, 601, 'app', 'Jahr'),
(33728, 18, 602, 'app', 'cvc'),
(33729, 18, 603, 'app', 'gehen Sie zu zahlen'),
(33730, 18, 604, 'app', 'alle'),
(33731, 18, 605, 'app', 'veg'),
(33732, 18, 606, 'app', 'nicht vegetarisch'),
(33733, 18, 607, 'app', 'andere'),
(33734, 18, 608, 'app', 'Passwort erfolgreich geändert'),
(33735, 18, 609, 'app', 'Registrierung erfolgreich abgeschlossen Aktivierung Mail verschickt'),
(33736, 18, 610, 'app', 'Konto ist inaktiv'),
(33737, 18, 611, 'app', 'Artikel in den Warenkorb gelegt'),
(33738, 18, 612, 'app', 'Menge'),
(33739, 18, 632, 'app', ' Abgeschlossene Registrierung erfolgreich Passwort Gesendet an E-Mail'),
(33740, 18, 642, 'app', ' sparen'),
(33741, 18, 643, 'app', ' Artikel Addons'),
(33742, 18, 644, 'app', ' keine Addons verfügbar'),
(33743, 18, 645, 'app', ' Artikel Größen'),
(33744, 18, 646, 'app', ' Passen Sie Ihre Artikel'),
(33745, 18, 647, 'app', ' kein Artikel Größen vorhanden'),
(33746, 18, 648, 'app', ' Kontakt Informationen'),
(33747, 18, 649, 'app', 'neue hinzufügen'),
(33748, 18, 650, 'app', ' gespeicherte Adressen'),
(33749, 18, 651, 'app', 'Öffnungszeiten'),
(33750, 18, 652, 'app', 'Schließzeiten'),
(33751, 18, 653, 'app', 'Größen'),
(33752, 18, 654, 'app', 'Addons'),
(33753, 18, 655, 'app', 'gelöscht'),
(33754, 18, 656, 'app', ' Wählen Sie mindestens ein Artikel nur dann, Addons GILT'),
(33755, 18, 657, 'app', ' Artikel'),
(33756, 18, 658, 'app', ' Adresse hinzufügen'),
(33757, 18, 659, 'app', '  Adresse bearbeiten'),
(33758, 18, 660, 'app', ' knusprige Restaurant nicht verfügbar Ausgewählte Zeit'),
(33759, 18, 661, 'app', ' wählen Sie Adresse'),
(33760, 18, 662, 'app', 'ungültige Karte'),
(33761, 18, 663, 'app', 'stornieren'),
(33762, 18, 664, 'app', ' erledigt'),
(33763, 18, 665, 'app', 'knackig'),
(33764, 18, 666, 'app', ' knusprige App für Restaurant'),
(33765, 18, 667, 'app', ' restaruant Timings'),
(33766, 18, 668, 'app', 'OK'),
(33767, 18, 669, 'app', ' Durch Crunchy Konto abgebucht'),
(33768, 18, 670, 'app', 'knusprige Konto'),
(33769, 18, 671, 'app', 'mein Profil'),
(33770, 18, 672, 'app', 'Neue Adresse hinzufügen'),
(33771, 18, 673, 'app', 'Ist knackig Restaurant derzeit geschlossen');

-- --------------------------------------------------------

--
-- Table structure for table `dn_offers`
--

CREATE TABLE IF NOT EXISTS `dn_offers` (
`offer_id` int(11) NOT NULL,
  `offer_name` varchar(50) NOT NULL,
  `offer_cost` decimal(10,2) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_valid_date` date NOT NULL,
  `offer_conditions` varchar(100) NOT NULL,
  `serve_no_of_people` int(11) NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `offer_image_name` varchar(50) NOT NULL,
  `date_of_offer_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_offer_products`
--

CREATE TABLE IF NOT EXISTS `dn_offer_products` (
`offer_product_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=405 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_options`
--

CREATE TABLE IF NOT EXISTS `dn_options` (
`option_id` int(11) NOT NULL,
  `option_name` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_orders`
--

CREATE TABLE IF NOT EXISTS `dn_orders` (
`order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` varchar(20) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `house_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apartment_name` varchar(50) NOT NULL,
  `other` varchar(50) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('delivered','process','cancelled','new') NOT NULL DEFAULT 'new',
  `message` varchar(50) NOT NULL,
  `payment_type` enum('online','cash') NOT NULL DEFAULT 'cash',
  `no_of_items` int(11) NOT NULL,
  `paid_date` varchar(50) DEFAULT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `payer_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `payer_email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `payer_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_order_addons`
--

CREATE TABLE IF NOT EXISTS `dn_order_addons` (
`oa_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `addon_name` varchar(50) NOT NULL,
  `addon_image` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `final_cost` decimal(10,2) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_order_products`
--

CREATE TABLE IF NOT EXISTS `dn_order_products` (
`op_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_image_name` varchar(500) DEFAULT NULL,
  `size_id` varchar(20) NOT NULL,
  `size_name` varchar(20) NOT NULL,
  `item_size_id` varchar(20) NOT NULL,
  `size_price` decimal(10,2) NOT NULL,
  `final_cost` decimal(10,2) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=296 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_pages`
--

CREATE TABLE IF NOT EXISTS `dn_pages` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dn_pages`
--

INSERT INTO `dn_pages` (`id`, `name`, `description`, `status`) VALUES
(1, 'About Us', '<p>This is Sampe About Us Page</p>\n', 'Active'),
(2, 'How It Works', '<p dir="rtl">&nbsp;</p>\n\n<div class="container">\n<div class="col-lg-12 col-md-12 col-sm-12 padding-0">\n<div class="col-md-7 padding-l">\n<div class="jumbotron">\n<h1>&nbsp;</h1>\n</div>\n</div>\n</div>\n</div>\n\n<h3>Website Disclaimer</h3>\n\n<h3>&nbsp;</h3>\n\n<ol>\n <li>\n <h3>Acceptance of our Terms</h3>\n </li>\n</ol>\n\n<p>The information contained in this website is for general information purposes only. The information is provided by <a href="http://www.justserveme.com/">www.justserveme.com</a>, a property of Just Serve Me Services Ltd. While we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.</p>\n\n<p>In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</p>\n\n<p>Through this website you are able to link to other websites which are not under the control of Just Serve Me Services Ltd. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</p>\n\n<p>Every effort is made to keep the website up and running smoothly. However, Just Serve Me Services Ltd. takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</p>\n\n<ol start="2">\n <li>\n <p>Provision of Services</p>\n </li>\n</ol>\n\n<p>www.justserveme.com may modify, improve or discontinue any of its services at its sole discretion and without notice to you even if it may result in you being prevented from accessing any information contained in it. Furthermore, you agree and acknowledge that justserveme.com is entitled to use the data provided by you on its own discrition without liabilities or claim from your side of any nature.</p>\n\n<ol start="3">\n <li>\n <p>Data</p>\n </li>\n</ol>\n\n<p>When you submit content or any form of data to www.justserveme.com you confirm an irrevocable, worldwide, royalty free license to publish, display, modify, distribute and the content worldwide. You confirm and warrant that you have the required authority to grant the above license to <a href="http://www.justserveme.com/">www.justserveme.com</a></p>\n\n<p><br />\n&nbsp;</p>\n\n<ol start="4">\n <li>\n <p>Disclaimer of Warranties</p>\n </li>\n</ol>\n\n<p>You understand and agree that your use of <a href="http://www.justserveme.com/">www.justserveme.com</a> is entirely at your own risk and that our products and services are provided &quot;As Is&quot; and &quot;As Available&quot;. <a href="http://www.justserveme.com/">www.justserveme.com</a> does not express or implied warranties, endorsements or&nbsp;representations whatsoever as to the operation of the <a href="http://www.justserveme.com/">www.justserveme.com</a> website, information, content, materials, or products. This shall include, but not be limited to, implied warranties of merchantability and fitness for a particular purpose and non-infringement, and warranties that access to or use of the service will be uninterrupted or error-free or that defects in the service will be corrected.</p>\n\n<p>&nbsp;</p>\n\n<p>5. Termination of Services</p>\n\n<p>The Terms of this agreement will continue to apply in perpetuity until terminated by either party without notice at any time for any reason. Terms that are to continue in perpetuity shall be unaffected by the termination of this agreement</p>\n\n<p><br />\n&nbsp;</p>\n\n<ol>\n <li>\n <p>Trademarks, Copyrights</p>\n </li>\n</ol>\n\n<p>You acknowledge and agree that www.justserveme.com may contain proprietary and confidential information including trademarks, service marks and copyrights protected by intellectual property laws and international intellectual property treaties. www.justserveme.com authorizes you to view and make a single copy of portions of its content for offline, personal, non-commercial use. Our content may not be sold, reproduced, or distributed without our written permission. Any third-party trademarks, service marks and logos are the property of their respective owners. Any further rights not specifically granted herein are reserved.</p>\n\n<p>6. Disclaimer of Warranties</p>\n\n<p>You understand and agree that your use of products and services from www.justserveme.com is entirely at your own risk and that our services are provided &quot;As Is&quot; and &quot;As Available&quot;. www.justserveme.com does not make any express or implied warranties, endorsements or representations whatsoever as to the operation of the www.justserveme.com website, information, content, materials, or products. This shall include, but not be limited to, implied warranties of merchantability and fitness for a particular purpose and non-infringement, and warranties that access to or use of the service will be uninterrupted or error-free or that defects in the service will be corrected.</p>\n\n<p>7. Limitation of Liability</p>\n\n<p>You understand and agree that www.justserveme.com and any of its subsidiaries or affiliates shall in no event be liable for any direct, indirect, incidental, consequential, or exemplary damages. This shall include, but not be limited to damages for loss of profits, business interruption, business reputation or goodwill, loss of programs or information or other intangible loss arising out of the use of or the inability to use the service, or information, or any permanent or temporary cessation of such service or access to information, or the deletion or corruption of any content or information, or the failure to store any content or information. The above limitation shall apply whether or not www.justserveme.com has been advised of or should have been aware of the possibility of such damages.</p>\n\n<p>8. External Data</p>\n\n<p>www.justserveme.com may include hyperlinks to third-party content, advertising or websites. You acknowledge and agree that www.justserveme.com is not responsible for and does not endorse any advertising, products or resource available from such resources or websites.</p>\n\n<p>9. Jurisdiction</p>\n\n<p>You expressly understand and agree to submit to the personal and exclusive jurisdiction of the courts of the country, state, province or territory determined solely by www.justserveme.com to resolve any legal matter arising from this agreement or related to your use of www.justserveme.com. If the court of law having jurisdiction, rules that any provision of the agreement is invalid, then that provision will be removed from the Terms and the remaining Terms will continue to be valid.</p>\n\n<p>10. Entire Agreement</p>\n\n<p>You understand and agree that the above Terms constitute the entire general agreement between you and www.justserveme.com. You may be subject to additional Terms and conditions when you use, purchase or access other services, affiliate services or third-party content or material.</p>\n\n<p>11. Changes to the Terms</p>\n\n<p>www.justserveme.com reserves the right to modify these Terms from time to time at our sole discretion and without any notice. Changes to our Terms become effective on the date they are posted and your continued use of hometriangle.com after any changes to Terms will signify your agreement to be bound by them.</p>\n\n<p>&nbsp;</p>\n', 'Active'),
(3, 'Terms and Conditions', '<p><span ><strong>Terms and Conditions</strong></span></p>\n\n<p>Terms and conditions template for website usage <u><strong>Test Change</strong></u></p>\n\n<p>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern [business name]&#39;s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.</p>\n\n<p>The term &#39;[business name]&#39; or &#39;us&#39; or &#39;we&#39; refers to the owner of the website whose registered office is [address]. Our company registration number is [company registration number and place of registration]. The term &#39;you&#39; refers to the user or viewer of our website.</p>\n\n<p>The use of this website is subject to the following terms of use:</p>\n\n<ul>\n <li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.</li>\n <li>This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: [insert list of information].</li>\n <li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>\n <li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>\n <li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>\n <li>All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.</li>\n <li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</li>\n <li>From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</li>\n <li>Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.</li>\n</ul>\n', 'Active'),
(4, 'Privacy and Policys', '<p><span class="marker"><strong>Terms and conditions template for website usage</strong></span></p>\n <p><span style="color:red;"> Welcome to our website. If you continue to browse and use this website, you are agreeing to comply wi</span>th and be bound by the following terms and conditions of use, which together with our privacy policy govern [business name]&#39;s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.</p>\n\n<p>The term &#39;[business name]&#39; or &#39;us&#39; or &#39;we&#39; refers to the owner of the website whose registered office is [address]. Our company registration number is [company registration number and place of registration]. The term &#39;you&#39; refers to the user or viewer of our website.</p>\n\n<p>The use of this website is subject to the following terms of use:</p>\n\n<ul>\n <li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.</li>\n <li>This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: [insert list of information].</li>\n <li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>\n <li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>\n <li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>\n <li>All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.</li>\n <li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</li>\n <li>From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</li>\n <li>Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dn_paypal_settings`
--

CREATE TABLE IF NOT EXISTS `dn_paypal_settings` (
  `id` int(11) NOT NULL,
  `PayPalEnvironmentProduction` varchar(512) NOT NULL,
  `PayPalEnvironmentSandbox` varchar(512) NOT NULL,
  `merchantName` varchar(512) NOT NULL,
  `merchantPrivacyPolicyURL` varchar(512) NOT NULL,
  `merchantUserAgreementURL` varchar(512) NOT NULL,
  `currency` varchar(512) NOT NULL,
  `account_type` enum('sandbox','production') NOT NULL DEFAULT 'sandbox',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dn_paypal_settings`
--

INSERT INTO `dn_paypal_settings` (`id`, `PayPalEnvironmentProduction`, `PayPalEnvironmentSandbox`, `merchantName`, `merchantPrivacyPolicyURL`, `merchantUserAgreementURL`, `currency`, `account_type`, `status`) VALUES
(1, 'AWTel-Z6oQbqFJAfyM4rs0OZgC73TbiG9oVnrhSDOcbytcc0YP6EOrAL_NSP0H8os717iCCgXWJ1fHRK', 'Abv9MCw1PGwbmUqjItLAojI8zGc80lYzZEXGa26soQnt3-x3XYNZB2jfRhxNeMXpnjPsqRxhlvl76riT', 'DP Mobile', 'https://dpmobile.systems/pages/privacy', 'https://dpmobile.systems/pages/agreement', 'USD', 'sandbox', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dn_phrases`
--

CREATE TABLE IF NOT EXISTS `dn_phrases` (
`id` int(11) NOT NULL,
  `text` varchar(512) NOT NULL,
  `phrase_type` enum('web','app') NOT NULL DEFAULT 'web'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=674 ;

--
-- Dumping data for table `dn_phrases`
--

INSERT INTO `dn_phrases` (`id`, `text`, `phrase_type`) VALUES
(5, 'master settings', 'web'),
(6, 'dashboard', 'web'),
(12, 'home', 'web'),
(14, 'pages', 'web'),
(15, 'sample', 'web'),
(17, 'name', 'web'),
(18, 'description', 'web'),
(19, 'status', 'web'),
(20, 'action', 'web'),
(21, 'add', 'web'),
(23, 'update', 'web'),
(24, 'edit', 'web'),
(26, 'text', 'web'),
(27, 'select', 'web'),
(29, 'title', 'web'),
(30, 'start date', 'web'),
(31, 'expiry date', 'web'),
(32, 'date created', 'web'),
(33, 'photo', 'web'),
(35, 'language', 'web'),
(36, 'close', 'web'),
(37, 'delete', 'web'),
(38, 'are you sure to delete', 'web'),
(39, 'yes', 'web'),
(40, 'no', 'web'),
(41, 'phrase', 'web'),
(44, 'keywords', 'web'),
(45, 'dynamic pages', 'web'),
(46, 'is bottom', 'web'),
(47, 'sort order', 'web'),
(49, 'faqs', 'web'),
(52, 'settings', 'web'),
(53, 'site', 'web'),
(55, 'social network settings', 'web'),
(56, 'email settings', 'web'),
(58, 'host', 'web'),
(59, 'email', 'web'),
(60, 'password', 'web'),
(61, 'port', 'web'),
(63, 'address', 'web'),
(64, 'city', 'web'),
(65, 'state', 'web'),
(67, 'zip code', 'web'),
(68, 'phone', 'web'),
(69, 'land line', 'web'),
(70, 'fax', 'web'),
(71, 'contact email', 'web'),
(72, 'select language', 'web'),
(74, 'design by', 'web'),
(75, 'rights reserved', 'web'),
(76, ' site logo', 'web'),
(78, 'app settings', 'web'),
(80, 'contact us', 'web'),
(81, 'mobile', 'web'),
(82, 'message', 'web'),
(83, 'submit', 'web'),
(84, 'about us', 'web'),
(86, 'digi', 'web'),
(89, 'previous', 'web'),
(90, 'next', 'web'),
(93, 'language settings', 'web'),
(98, 'list languages', 'web'),
(99, 'add phrase', 'web'),
(100, 'add language', 'web'),
(101, 'how it works', 'web'),
(102, 'terms and conditions', 'web'),
(103, 'privacy and policy', 'web'),
(105, 'email settings', 'web'),
(109, 'powered by', 'web'),
(110, 'no data available', 'web'),
(112, 'active', 'web'),
(113, 'inactive', 'web'),
(123, 'phrase required', 'web'),
(124, 'languages', 'web'),
(125, 'phrases', 'web'),
(126, 'update phrases', 'web'),
(127, 'select validity for new', 'web'),
(140, 'app settings', 'web'),
(141, 'enable', 'web'),
(142, 'disable', 'web'),
(152, 'validate for new required', 'web'),
(177, 'bottom', 'web'),
(180, 'cancel', 'web'),
(182, 'change password', 'web'),
(183, 'logout', 'web'),
(184, 'old password', 'web'),
(185, 'new password', 'web'),
(186, 'confirm new password', 'web'),
(187, 'old', 'web'),
(191, 'profile', 'web'),
(192, 'password and confirm password does not match', 'web'),
(193, 'personal details', 'web'),
(194, 'first name', 'web'),
(195, 'last name', 'web'),
(196, 'please enter letters only', 'web'),
(197, 'please enter numbers only', 'web'),
(201, 'toggle navigation', 'web'),
(202, 'prev', 'web'),
(210, 'contact us', 'web'),
(212, 'all', 'web'),
(213, 'will be updated soon', 'web'),
(214, 'contact no', 'web'),
(215, 'new', 'web'),
(216, 'end date', 'web'),
(217, 'start date', 'web'),
(218, 'showing', 'web'),
(225, 'edit language', 'web'),
(226, 'language name', 'web'),
(227, 'edit phrase', 'web'),
(228, 'edit phrases', 'web'),
(231, 'how it works', 'web'),
(235, 'site title', 'web'),
(238, 'edit faq', 'web'),
(239, 'add faq', 'web'),
(241, 'showing 1 - 10 of', 'web'),
(242, 'remember me', 'web'),
(243, 'login', 'web'),
(244, 'email template settings', 'web'),
(245, 'edit email template', 'web'),
(246, 'email template', 'web'),
(247, 'subject', 'web'),
(251, 'site logo', 'web'),
(254, 'android url', 'web'),
(255, 'ios url', 'web'),
(256, 'invalid file format', 'web'),
(257, 'updated successfully', 'web'),
(258, 'posted on', 'web'),
(261, 'view more', 'web'),
(262, 'change language', 'web'),
(263, 'language changed successfully', 'web'),
(265, 'posted', 'web'),
(266, 'ago', 'web'),
(267, 'mandrill key', 'web'),
(268, 'api key', 'web'),
(269, 'web mail', 'web'),
(270, ' mandrill', 'web'),
(271, 'mandrill', 'web'),
(272, 'view all', 'web'),
(276, 'reset', 'web'),
(279, 'items', 'web'),
(280, 'add item', 'web'),
(281, 'edit item', 'web'),
(282, 'view items', 'web'),
(283, 'item name', 'web'),
(284, 'item cost', 'web'),
(285, 'item image', 'web'),
(286, 'change image', 'web'),
(287, 'offers', 'web'),
(288, 'create offer', 'web'),
(289, 'view offer', 'web'),
(290, 'view offers', 'web'),
(291, 'offer name', 'web'),
(292, 'offer cost', 'web'),
(293, 'offer start date', 'web'),
(294, 'offer end date', 'web'),
(295, 'edit offer', 'web'),
(296, 'offer valid date', 'web'),
(297, 'offer condition', 'web'),
(298, 'offer image', 'web'),
(299, 'offer conditions', 'web'),
(300, 'quantity', 'web'),
(301, 'add/remove', 'web'),
(302, 'add/ remove', 'web'),
(303, 'no of items', 'web'),
(304, 'latest offers', 'web'),
(305, 'serve no of people', 'web'),
(312, 'gallery', 'web'),
(313, 'alt text', 'web'),
(314, 'image', 'web'),
(315, 'add gallery', 'web'),
(316, 'alt text required', 'web'),
(318, 'paypal settings', 'web'),
(319, 'PayPalEnvironmentProduction', 'web'),
(320, 'PayPalEnvironmentSandbox', 'web'),
(321, 'merchantName', 'web'),
(322, 'merchantPrivacyPolicyURL', 'web'),
(323, 'merchantUserAgreementURL', 'web'),
(324, 'currency', 'web'),
(325, 'account_type', 'web'),
(326, 'logo_image', 'web'),
(327, 'paypal environment production', 'web'),
(328, 'paypal environment sandbox', 'web'),
(329, 'merchant name', 'web'),
(330, 'merchant privacy policy URL', 'web'),
(331, 'merchant user agreement URL', 'web'),
(332, 'currency symbol', 'web'),
(339, 'invalid file', 'web'),
(340, 'added sucessfully', 'web'),
(341, 'unable to add', 'web'),
(342, 'unable to update', 'web'),
(343, 'could not found the record', 'web'),
(344, 'deleted successfully', 'web'),
(345, 'unable to delete', 'web'),
(354, 'product count', 'web'),
(355, 'valid date must be greater than start date', 'web'),
(356, 'invalid operation', 'web'),
(365, 'select item', 'web'),
(366, 'no items available', 'web'),
(367, 'orders', 'web'),
(368, 'new orders', 'web'),
(369, 'under process orders', 'web'),
(370, 'delivered orders', 'web'),
(371, 'cancelled orders', 'web'),
(372, 'order no', 'web'),
(373, 'order date', 'web'),
(374, 'order time', 'web'),
(375, 'order cost', 'web'),
(376, 'customer name', 'web'),
(378, 'order details', 'web'),
(379, 'booked date', 'web'),
(380, 'land mark', 'web'),
(381, 'PINCode', 'web'),
(382, 'order update', 'web'),
(383, 'update order status', 'web'),
(384, 'details not found', 'web'),
(385, 'process', 'web'),
(386, 'delivered', 'web'),
(387, 'cancelled', 'web'),
(388, 'no products available', 'web'),
(389, 'item quantity', 'web'),
(391, 'added successfully', 'web'),
(392, 'invalid credentials', 'web'),
(393, 'site name', 'web'),
(394, 'users', 'web'),
(395, 'logout successfully', 'web'),
(396, 'latest orders', 'web'),
(397, 'user details', 'web'),
(398, 'add atleast one item', 'web'),
(400, 'party size', 'web'),
(401, 'session', 'web'),
(402, 'date of booking', 'web'),
(404, 'uploaded successfully', 'web'),
(405, 'upload app files', 'web'),
(408, 'select currency', 'web'),
(409, 'welcome', 'web'),
(410, 'admin', 'web'),
(411, 'menu', 'web'),
(412, 'add menu', 'web'),
(413, 'view menu', 'web'),
(414, 'menu name', 'web'),
(415, 'punch line', 'web'),
(416, 'required', 'web'),
(417, 'menu image', 'web'),
(418, 'edit menu', 'web'),
(419, 'item type', 'web'),
(420, 'location master', 'web'),
(422, 'states', 'web'),
(423, 'cities', 'web'),
(424, 'service delivery locations', 'web'),
(425, 'state name', 'web'),
(426, 'upload excel', 'web'),
(427, 'city name', 'web'),
(428, 'locality name', 'web'),
(429, 'click here to download sample file', 'web'),
(430, 'upload excel file', 'web'),
(431, 'file', 'web'),
(432, 'email templates', 'web'),
(433, 'registration', 'web'),
(434, 'registration completed successfully activation email sent', 'web'),
(435, 'login success', 'web'),
(436, 'country', 'web'),
(437, 'reset password', 'web'),
(438, 'longitude', 'web'),
(439, 'latitude', 'web'),
(440, 'please login', 'web'),
(441, 'unauthorised user', 'web'),
(442, 'already existed', 'web'),
(443, 'add service delivery location', 'web'),
(444, 'edit service delivery locations', 'web'),
(445, 'add state', 'web'),
(446, 'edit state', 'web'),
(447, 'upload states', 'web'),
(448, 'add city', 'web'),
(449, 'edit city', 'web'),
(450, 'upload cities', 'web'),
(453, 'language code', 'web'),
(454, 'phrase type', 'web'),
(458, 'change password', 'web'),
(459, 'list phrases', 'web'),
(461, 'update app phrases', 'web'),
(462, 'update web phrases', 'web'),
(463, 'changePassword', 'app'),
(464, 'menu', 'app'),
(465, 'login', 'app'),
(467, 'newPassword', 'web'),
(468, 'confirmNewPassword', 'app'),
(469, 'forgotPassword', 'app'),
(470, 'emailAddress', 'app'),
(471, 'send', 'app'),
(472, 'dontWorryJustFillInYourEmailAndWeWillHelpYouResetYourPassword', 'app'),
(473, 'enterEmail', 'app'),
(474, 'password', 'app'),
(475, 'signIn', 'app'),
(476, 'or', 'app'),
(477, 'newUser', 'app'),
(478, 'signUpHere', 'app'),
(479, 'signUp', 'app'),
(480, 'iAccept', 'app'),
(481, 'register', 'app'),
(482, 'firstName', 'app'),
(483, 'lastName', 'app'),
(484, 'email', 'app'),
(485, 'phoneNumber', 'app'),
(486, 'termsAndConditions', 'app'),
(487, 'resetPassword', 'app'),
(488, 'confirmPassword', 'app'),
(489, 'submit', 'app'),
(490, 'aboutUs', 'app'),
(491, 'version', 'app'),
(492, 'address', 'app'),
(493, 'cartList', 'app'),
(494, 'cost', 'app'),
(495, 'addItems', 'app'),
(496, 'totalCost', 'app'),
(497, 'order', 'app'),
(498, 'changeLanguage', 'app'),
(499, 'selectLanguage', 'app'),
(500, 'english', 'app'),
(501, 'chinese', 'app'),
(502, 'byYourMoodOrPreference', 'app'),
(503, 'editProfile', 'app'),
(504, 'city', 'app'),
(505, 'state', 'app'),
(506, 'pincode', 'app'),
(507, 'landmark', 'app'),
(508, 'update', 'app'),
(509, 'placeOrder', 'app'),
(510, 'mobileNumber', 'app'),
(511, 'location', 'app'),
(512, 'flatNoHouseNo', 'app'),
(513, 'apartmentLocalityName', 'app'),
(514, 'addressOtherOptional', 'app'),
(515, 'selectDate', 'app'),
(516, 'date', 'app'),
(517, 'time', 'app'),
(518, 'selectTitle', 'app'),
(519, 'onlinePayment', 'app'),
(520, 'cashOnDeliver', 'app'),
(521, 'proceed', 'app'),
(522, 'allTimeFavourites', 'app'),
(523, 'welcome', 'app'),
(524, 'offers', 'app'),
(525, 'orderHistory', 'app'),
(526, 'shareToFriends', 'app'),
(527, 'rateUsOnThePlaystore', 'app'),
(528, 'signOut', 'app'),
(529, 'offersAvailable', 'app'),
(530, 'validFrom', 'app'),
(531, 'validTo', 'app'),
(532, 'noOfPersons', 'app'),
(533, 'noOfProducts', 'app'),
(534, 'discount', 'app'),
(535, 'orderItems', 'app'),
(536, 'yourOrders', 'app'),
(537, 'currentPassword', 'app'),
(538, 'noOfItems', 'app'),
(539, 'noOrdersFound', 'app'),
(540, 'paymentStatus', 'app'),
(541, 'yourPaymentStatusIs', 'app'),
(542, 'successful', 'app'),
(543, 'yourPaymentOfAmount', 'app'),
(544, 'hasBeenSuccessfullyProcessed', 'app'),
(545, 'selectCity', 'app'),
(546, 'search', 'app'),
(547, 'selectLocation', 'app'),
(548, 'description', 'app'),
(549, 'viewCart', 'app'),
(550, 'terms', 'app'),
(551, 'myAccount', 'app'),
(552, 'timedOutError', 'app'),
(553, 'checkNetworkConnection', 'app'),
(554, 'validatingUser', 'app'),
(555, 'passwordNotMatch', 'app'),
(556, 'signoutSuccessfully', 'app'),
(557, 'specifyDate', 'app'),
(558, 'specifyTime', 'app'),
(559, 'incorrectLogin', 'app'),
(560, 'no', 'app'),
(561, 'availableNow', 'app'),
(562, 'alreadyAddedToCart', 'app'),
(563, 'emailAlreadyUsedOrInvalidUnableToCreateAccount', 'app'),
(564, 'noItemsInYourCart', 'app'),
(565, 'guest', 'app'),
(566, 'user', 'app'),
(567, 'payment', 'app'),
(568, 'please enter email and password', 'web'),
(569, 'peterSrinivas', 'app'),
(570, 'newPassword', 'app'),
(571, 'test Web Phrase', 'web'),
(572, 'edit web phrases', 'web'),
(573, 'edit app phrases', 'web'),
(574, 'state id', 'web'),
(575, 'please upload only jpg|jpeg|png', 'web'),
(576, 'orderedOn', 'app'),
(577, 'veg', 'web'),
(578, 'non veg', 'web'),
(579, 'other', 'web'),
(580, 'offerItems', 'app'),
(581, 'noItemsAvailable', 'app'),
(582, 'makePayment', 'app'),
(583, 'paymentMethod', 'app'),
(584, 'offer details', 'web'),
(585, 'you cannot delete this state cause cities exist under it', 'web'),
(586, 'you cannot delete cities cause delivered location exist under it', 'web'),
(587, 'edit gallery', 'web'),
(588, 'Test  Web Phrase', 'web'),
(589, 'transaction id', 'web'),
(590, 'payment type', 'web'),
(591, 'payment status', 'web'),
(592, 'facebook api', 'web'),
(593, 'google api', 'web'),
(594, 'facebookApi', 'app'),
(595, 'googleApi', 'app'),
(596, 'paymenttype', 'app'),
(597, 'stripe', 'app'),
(598, 'cardNumber', 'app'),
(599, 'expirationDate', 'app'),
(600, 'month', 'app'),
(601, 'year', 'app'),
(602, 'cvc', 'app'),
(603, 'proceedToPay', 'app'),
(604, 'all', 'app'),
(605, 'veg', 'app'),
(606, 'non-veg', 'app'),
(607, 'other', 'app'),
(608, 'passwordsuccessfullychanged', 'app'),
(609, 'registrationcompletedsuccessfullyactivationmailsent', 'app'),
(610, 'accountisinactive', 'app'),
(611, 'itemAddedToCart', 'app'),
(612, 'quantity', 'app'),
(613, 'paid amount', 'web'),
(614, 'is deleted', 'web'),
(615, 'reason', 'web'),
(616, 'deleted item from order', 'web'),
(617, 'addon', 'web'),
(618, 'addons', 'web'),
(619, 'view addons', 'web'),
(620, 'add addon', 'web'),
(621, 'edit addon', 'web'),
(622, 'options', 'web'),
(623, 'add option', 'web'),
(624, 'view options', 'web'),
(625, 'edit option', 'web'),
(626, 'price prefix', 'web'),
(627, 'price', 'web'),
(628, 'order items', 'web'),
(629, 'order addons', 'web'),
(630, 'total', 'web'),
(631, 'deleted addon from order', 'web'),
(632, 'registrationCompletedSuccessfullyPasswordSentToEmail', 'app'),
(633, 'restaurant timings', 'web'),
(634, 'from', 'web'),
(635, 'to', 'web'),
(636, 'from time', 'web'),
(637, 'to time', 'web'),
(638, 'normal', 'web'),
(639, 'user activated', 'web'),
(640, 'user deactivated', 'web'),
(641, 'wrong operation', 'web'),
(642, 'save', 'app'),
(643, 'itemAddons', 'app'),
(644, 'noAddonsAvailable', 'app'),
(645, 'itemSizes', 'app'),
(646, 'customizeYourItem', 'app'),
(647, 'noItemSizesAvailable', 'app'),
(648, 'contactInformation', 'app'),
(649, 'addNew', 'app'),
(650, 'savedAddresses', 'app'),
(651, 'openingHours', 'app'),
(652, 'closingHours', 'app'),
(653, 'sizes', 'app'),
(654, 'addons', 'app'),
(655, 'deleted', 'app'),
(656, 'selectMinimumOneItemThenOnlyAddonsWillApply', 'app'),
(657, 'items', 'app'),
(658, 'addAddress', 'app'),
(659, 'editAddress', 'app'),
(660, 'crunchyRestaurantNotAvailableOnSelectedTime', 'app'),
(661, 'selectAddress', 'app'),
(662, 'invalidCard', 'app'),
(663, 'cancel', 'app'),
(664, 'done', 'app'),
(665, 'crunchy', 'app'),
(666, 'crunchyAppForRestaurant', 'app'),
(667, 'restaruentTimings', 'app'),
(668, 'ok', 'app'),
(669, 'debitedThroughCrunchyAccount', 'app'),
(670, 'crunchyAccount', 'app'),
(671, 'myProfile', 'app'),
(672, 'addNewAddress', 'app'),
(673, 'crunchyRestaurantIsCurrentlyClosed', 'app');

-- --------------------------------------------------------

--
-- Table structure for table `dn_pl_cities`
--

CREATE TABLE IF NOT EXISTS `dn_pl_cities` (
`city_id` int(11) NOT NULL,
  `city_name` varchar(512) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=515 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_service_provide_locations`
--

CREATE TABLE IF NOT EXISTS `dn_service_provide_locations` (
`service_provide_location_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `locality` varchar(600) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `dn_sessions`
--

CREATE TABLE IF NOT EXISTS `dn_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dn_site_settings`
--

CREATE TABLE IF NOT EXISTS `dn_site_settings` (
`id` int(11) NOT NULL,
  `site_title` varchar(512) NOT NULL,
  `site_name` varchar(512) NOT NULL,
  `address` varchar(512) NOT NULL,
  `city` varchar(512) NOT NULL,
  `state` varchar(512) NOT NULL,
  `country` varchar(512) NOT NULL,
  `zip` varchar(512) NOT NULL,
  `phone` varchar(512) NOT NULL,
  `land_line` varchar(512) NOT NULL,
  `fax` varchar(512) NOT NULL,
  `portal_email` varchar(512) NOT NULL,
  `site_country` varchar(512) NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_time` varchar(50) NOT NULL,
  `language_id` int(11) NOT NULL,
  `design_by` varchar(512) NOT NULL,
  `rights_reserved_content` varchar(512) NOT NULL,
  `site_logo` varchar(512) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `currency_symbol` varchar(20) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `ios_url` varchar(50) NOT NULL,
  `android_url` varchar(50) NOT NULL,
  `facebook_api` varchar(200) NOT NULL,
  `google_api` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dn_site_settings`
--

INSERT INTO `dn_site_settings` (`id`, `site_title`, `site_name`, `address`, `city`, `state`, `country`, `zip`, `phone`, `land_line`, `fax`, `portal_email`, `site_country`, `from_time`, `to_time`, `language_id`, `design_by`, `rights_reserved_content`, `site_logo`, `currency`, `currency_symbol`, `latitude`, `longitude`, `ios_url`, `android_url`, `facebook_api`, `google_api`) VALUES
(1, 'Crunchy ', 'Crunchy App For Restaurent ', 'indira nagar', 'Bangalor', 'Karanataka', 'India', '508212', '1123456789', '123456789', '123456789', 'gollapallijohnpeter@gmail.com', 'in', '10:00', '22:00', 1, 'Digital Samaritan', '© Digi Restaurant 2016. All rights reserved.', 'site_logo.png', 'USD', '$', '17.4441', '78.3844', 'http://conquerorslabs.com/crunchy', 'http://conquerorslabs.com/crunchy', '172320483163959', '707332932771-9lkp1jtigdtedtek9i6cegv7p0cq13jr.apps.googleusercontent.com');

-- --------------------------------------------------------

--
-- Table structure for table `dn_users`
--

CREATE TABLE IF NOT EXISTS `dn_users` (
`id` int(11) unsigned NOT NULL,
  `updated_on` date NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(512) NOT NULL,
  `city` varchar(512) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `device_id` varchar(50) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `registered_by` enum('mobile','google','facebook') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `dn_users`
--

INSERT INTO `dn_users` (`id`, `updated_on`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `address`, `city`, `pincode`, `landmark`, `device_id`, `platform`, `registered_by`) VALUES
(1, '2016-06-07', '127.0.0.1', 'Admin strator', '$2y$08$.top5QcMtZiIxoO7xEhVh.Z2tmXAiT/w0leE.rWc8wFcce15azlzG', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1467197540, 1, 'Admin', 'strator', '123456789', '2009-12-24', '', '123456', '', '', '', 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `dn_users_groups`
--

CREATE TABLE IF NOT EXISTS `dn_users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `dn_users_groups`
--

INSERT INTO `dn_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dn_user_address`
--

CREATE TABLE IF NOT EXISTS `dn_user_address` (
`ua_id` int(11) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `house_no` varchar(50) DEFAULT NULL,
  `apartment_name` varchar(50) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `landmark` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `is_default` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dn_addons`
--
ALTER TABLE `dn_addons`
 ADD PRIMARY KEY (`addon_id`);

--
-- Indexes for table `dn_email_settings`
--
ALTER TABLE `dn_email_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_email_templates`
--
ALTER TABLE `dn_email_templates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_gallery`
--
ALTER TABLE `dn_gallery`
 ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `dn_groups`
--
ALTER TABLE `dn_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_items`
--
ALTER TABLE `dn_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `dn_item_addons`
--
ALTER TABLE `dn_item_addons`
 ADD PRIMARY KEY (`item_addon_id`), ADD KEY `fk_item_addon_id` (`addon_id`);

--
-- Indexes for table `dn_item_options`
--
ALTER TABLE `dn_item_options`
 ADD PRIMARY KEY (`item_option_id`), ADD KEY `fk_item_size_id` (`option_id`);

--
-- Indexes for table `dn_languages`
--
ALTER TABLE `dn_languages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_login_attempts`
--
ALTER TABLE `dn_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_menu`
--
ALTER TABLE `dn_menu`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `dn_multi_lang`
--
ALTER TABLE `dn_multi_lang`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_language_id` (`lang_id`), ADD KEY `fk_phrase_id` (`phrase_id`);

--
-- Indexes for table `dn_offers`
--
ALTER TABLE `dn_offers`
 ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `dn_offer_products`
--
ALTER TABLE `dn_offer_products`
 ADD PRIMARY KEY (`offer_product_id`);

--
-- Indexes for table `dn_options`
--
ALTER TABLE `dn_options`
 ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `dn_orders`
--
ALTER TABLE `dn_orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `dn_order_addons`
--
ALTER TABLE `dn_order_addons`
 ADD PRIMARY KEY (`oa_id`);

--
-- Indexes for table `dn_order_products`
--
ALTER TABLE `dn_order_products`
 ADD PRIMARY KEY (`op_id`), ADD KEY `fk_order_id` (`order_id`);

--
-- Indexes for table `dn_pages`
--
ALTER TABLE `dn_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_phrases`
--
ALTER TABLE `dn_phrases`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_pl_cities`
--
ALTER TABLE `dn_pl_cities`
 ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `dn_service_provide_locations`
--
ALTER TABLE `dn_service_provide_locations`
 ADD PRIMARY KEY (`service_provide_location_id`), ADD KEY `fk_city_id` (`city_id`);

--
-- Indexes for table `dn_sessions`
--
ALTER TABLE `dn_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `dn_site_settings`
--
ALTER TABLE `dn_site_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_users`
--
ALTER TABLE `dn_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dn_users_groups`
--
ALTER TABLE `dn_users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `dn_user_address`
--
ALTER TABLE `dn_user_address`
 ADD KEY `ua_id` (`ua_id`), ADD KEY `fk_ua_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dn_addons`
--
ALTER TABLE `dn_addons`
MODIFY `addon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dn_email_settings`
--
ALTER TABLE `dn_email_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dn_email_templates`
--
ALTER TABLE `dn_email_templates`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `dn_gallery`
--
ALTER TABLE `dn_gallery`
MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dn_groups`
--
ALTER TABLE `dn_groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dn_items`
--
ALTER TABLE `dn_items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `dn_item_addons`
--
ALTER TABLE `dn_item_addons`
MODIFY `item_addon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `dn_item_options`
--
ALTER TABLE `dn_item_options`
MODIFY `item_option_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `dn_languages`
--
ALTER TABLE `dn_languages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `dn_login_attempts`
--
ALTER TABLE `dn_login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dn_menu`
--
ALTER TABLE `dn_menu`
MODIFY `menu_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `dn_multi_lang`
--
ALTER TABLE `dn_multi_lang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33772;
--
-- AUTO_INCREMENT for table `dn_offers`
--
ALTER TABLE `dn_offers`
MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `dn_offer_products`
--
ALTER TABLE `dn_offer_products`
MODIFY `offer_product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=405;
--
-- AUTO_INCREMENT for table `dn_options`
--
ALTER TABLE `dn_options`
MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dn_orders`
--
ALTER TABLE `dn_orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `dn_order_addons`
--
ALTER TABLE `dn_order_addons`
MODIFY `oa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dn_order_products`
--
ALTER TABLE `dn_order_products`
MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT for table `dn_pages`
--
ALTER TABLE `dn_pages`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dn_phrases`
--
ALTER TABLE `dn_phrases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=674;
--
-- AUTO_INCREMENT for table `dn_pl_cities`
--
ALTER TABLE `dn_pl_cities`
MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=515;
--
-- AUTO_INCREMENT for table `dn_service_provide_locations`
--
ALTER TABLE `dn_service_provide_locations`
MODIFY `service_provide_location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dn_site_settings`
--
ALTER TABLE `dn_site_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dn_users`
--
ALTER TABLE `dn_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `dn_users_groups`
--
ALTER TABLE `dn_users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `dn_user_address`
--
ALTER TABLE `dn_user_address`
MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dn_item_addons`
--
ALTER TABLE `dn_item_addons`
ADD CONSTRAINT `fk_item_addon_id` FOREIGN KEY (`addon_id`) REFERENCES `dn_addons` (`addon_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dn_item_options`
--
ALTER TABLE `dn_item_options`
ADD CONSTRAINT `fk_item_size_id` FOREIGN KEY (`option_id`) REFERENCES `dn_options` (`option_id`) ON DELETE CASCADE;

--
-- Constraints for table `dn_multi_lang`
--
ALTER TABLE `dn_multi_lang`
ADD CONSTRAINT `fk_language_id` FOREIGN KEY (`lang_id`) REFERENCES `dn_languages` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_phrase_id` FOREIGN KEY (`phrase_id`) REFERENCES `dn_phrases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dn_order_products`
--
ALTER TABLE `dn_order_products`
ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `dn_orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `dn_service_provide_locations`
--
ALTER TABLE `dn_service_provide_locations`
ADD CONSTRAINT `fk_city_id` FOREIGN KEY (`city_id`) REFERENCES `dn_pl_cities` (`city_id`) ON DELETE CASCADE;

--
-- Constraints for table `dn_users_groups`
--
ALTER TABLE `dn_users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `dn_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `dn_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dn_user_address`
--
ALTER TABLE `dn_user_address`
ADD CONSTRAINT `fk_ua_id` FOREIGN KEY (`user_id`) REFERENCES `dn_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
