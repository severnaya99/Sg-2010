# This SQL script adds performance optimization via indexes on key tables
# These keys in addition to the keys present in the standard v1.2.4 schema
# have been generated based on a detailed evaluation of all standard SQL
# queries executed by going to the majority of pages in a standard freshly-
# installed site using demo products.
#
# THESE ARE ALREADY INCLUDED IN v1.2.5+ INSTALLATIONS
#
# Simply running this script against a fresh v1.2.4 install, or a site already
# upgraded to v1.2.4 should bring noted performance improvements in both the 
# catalog area and admin.
#
# Admin improvements will be largely related to order and customer handling.
#
# Catalog area improvements are a result of improving index hits on specials,
# featured-items, sales, as well as some category lookups, and product pages
# displaying attributes.
#
## NOTE: This script is ALMOST suitable for versions 1.2.0 and newer of Zen Cart
##       However, an error may occur when attempting to index the "paypal" table if
##       using a Zen Cart database older than v1.2.3
#
#
# $Id: new_indexes.sql 1374 2005-05-14 18:17:19Z drbyte $
#


ALTER TABLE banners_history ADD INDEX idx_banners_id_zen ( banners_id ) ;
ALTER TABLE banners ADD INDEX idx_status_group_zen ( status, banners_group ) ;

ALTER TABLE specials ADD INDEX idx_status_zen ( status ) ;
ALTER TABLE specials ADD INDEX idx_products_id_zen ( products_id ) ;
ALTER TABLE specials ADD INDEX idx_date_avail_zen ( specials_date_available ) ;

ALTER TABLE featured ADD INDEX idx_status_zen ( status ) ;
ALTER TABLE featured ADD INDEX idx_products_id_zen ( products_id ) ;
ALTER TABLE featured ADD INDEX idx_date_avail_zen ( featured_date_available ) ;

ALTER TABLE salemaker_sales ADD INDEX idx_sale_status_zen ( sale_status ) ;

ALTER TABLE categories ADD INDEX idx_categories_parent_id_TEST ( parent_id ) ;
ALTER TABLE categories ADD INDEX idx_parent_id_cat_id_zen ( parent_id, categories_id ) ;
ALTER TABLE categories ADD INDEX idx_status_zen ( categories_status );

ALTER TABLE product_types_to_category ADD INDEX idx_category_id_zen ( category_id ) ;
ALTER TABLE product_types_to_category ADD INDEX idx_product_type_id_zen ( product_type_id ) ;
ALTER TABLE product_types ADD INDEX idx_type_master_type_zen ( type_master_type ) ;

ALTER TABLE products ADD INDEX idx_products_status_zen ( products_status ) ;
#ALTER TABLE products ADD INDEX idx_prod_type_zen ( products_type );
ALTER TABLE products_to_categories ADD INDEX idx_cat_prod_id_zen (categories_id, products_id) ;
ALTER TABLE products_attributes ADD INDEX idx_id_options_id_values_zen ( products_id, options_id, options_values_id ) ;
#ALTER TABLE products_attributes ADD INDEX idx_attrib_display_only_zen ( attributes_display_only ) ;
#ALTER TABLE products_attributes ADD INDEX idx_price_base_incl_zen ( attributes_price_base_included ) ;
ALTER TABLE products_discount_quantity ADD INDEX idx_id_qty_zen ( products_id, discount_qty ) ;
ALTER TABLE products_options_values_to_products_options ADD INDEX idx_prod_opt_val_id_zen ( products_options_values_id ) ;
ALTER TABLE products_options ADD INDEX idx_lang_id_zen ( language_id ) ;

ALTER TABLE tax_rates ADD INDEX idx_tax_zone_id_zen ( tax_zone_id ) ;
ALTER TABLE tax_rates ADD INDEX idx_tax_class_id_zen ( tax_class_id ) ;

ALTER TABLE configuration ADD INDEX idx_key_value_zen ( configuration_key, configuration_value(10) ) ;
ALTER TABLE configuration_group ADD INDEX idx_visible_zen ( visible ) ;
ALTER TABLE configuration ADD INDEX idx_cfg_grp_id_zen ( configuration_group_id ) ;
ALTER TABLE product_type_layout ADD INDEX idx_key_value_zen ( configuration_key, configuration_value(10) ) ;

ALTER TABLE customers ADD INDEX idx_email_address_zen ( customers_email_address ) ;
ALTER TABLE customers ADD INDEX idx_referral_zen ( customers_referral(10) ) ;
ALTER TABLE customers ADD INDEX idx_grp_pricing_zen ( customers_group_pricing ) ;
ALTER TABLE customers ADD INDEX idx_nick_zen ( customers_nick ) ;
ALTER TABLE customers ADD INDEX idx_newsletter_zen ( customers_newsletter ) ;
ALTER TABLE customers_basket ADD INDEX idx_customers_id_zen ( customers_id ) ;
ALTER TABLE customers_basket_attributes ADD INDEX idx_cust_id_prod_id_zen ( customers_id, products_id(36) );

ALTER TABLE orders ADD INDEX idx_status_orders_cust_zen ( orders_status, orders_id, customers_id );
#ALTER TABLE orders ADD INDEX idx_customers_id_zen ( customers_id ) ;
ALTER TABLE orders_status_history ADD INDEX idx_orders_id_status_id_zen ( orders_id, orders_status_id ) ;
ALTER TABLE orders_products ADD INDEX idx_orders_id_zen ( orders_id ) ;
ALTER TABLE orders_products ADD INDEX orders_id_prod_id_zen ( orders_id , products_id ) ;
ALTER TABLE orders_products_attributes ADD INDEX idx_orders_id_prod_id_zen ( orders_id , orders_products_id ) ;
ALTER TABLE orders_products_download ADD INDEX idx_orders_id_zen ( orders_id );
ALTER TABLE orders_products_download ADD INDEX idx_orders_products_id_zen ( orders_products_id );

ALTER TABLE layout_boxes ADD INDEX idx_name_template_zen ( layout_template, layout_box_name ) ;

ALTER TABLE coupon_gv_queue ADD INDEX idx_release_flag_zen ( release_flag ) ;
ALTER TABLE coupons ADD INDEX idx_active_type_zen ( coupon_active, coupon_type ) ;
ALTER TABLE coupons_description DROP INDEX coupon_id;
ALTER TABLE coupons_description ADD PRIMARY KEY (coupon_id, language_id);
ALTER TABLE coupon_restrict ADD INDEX idx_coup_id_prod_id_zen (coupon_id, product_id);
ALTER TABLE coupon_redeem_track ADD INDEX idx_coupon_id_zen ( coupon_id ) ;
ALTER TABLE coupon_gv_queue DROP INDEX uid;
ALTER TABLE coupon_gv_queue ADD INDEX idx_cust_id_order_id_zen ( customer_id , order_id ) ;
ALTER TABLE coupon_email_track ADD INDEX idx_coupon_id_zen ( coupon_id ) ;

ALTER TABLE reviews ADD INDEX idx_products_id_zen ( products_id ) ;
ALTER TABLE reviews ADD INDEX idx_customers_id_zen ( customers_id ) ;

ALTER TABLE admin ADD INDEX idx_admin_name_zen ( admin_name ) ;

ALTER TABLE files_uploaded ADD INDEX idx_customers_id_zen ( customers_id ) ;

ALTER TABLE email_archive DROP INDEX email_to;
ALTER TABLE email_archive ADD INDEX idx_email_to_address_zen ( email_to_address ) ;
ALTER TABLE email_archive DROP INDEX module ;
ALTER TABLE email_archive ADD INDEX idx_module_zen ( module ) ;

ALTER TABLE media_to_products ADD INDEX idx_media_product_zen ( media_id, product_id ) ;
ALTER TABLE media_clips ADD INDEX idx_media_id_zen ( media_id ) ;
ALTER TABLE product_music_extra ADD INDEX idx_music_genre_id_zen ( music_genre_id ) ;

ALTER TABLE paypal ADD INDEX idx_zen_order_id_zen ( zen_order_id ) ;
ALTER TABLE paypal_payment_status_history ADD INDEX idx_paypal_ipn_id_zen ( paypal_ipn_id ) ;
ALTER TABLE paypal_session ADD INDEX idx_session_id_zen ( session_id(36) ) ;

############## OTHERS WHICH MAY HAVE LITTLE BENEFIT #######################
# While these appear to be logical, in practical testing, they appear to be 
# bypassed in favor of other indices already in-place.
# Thus, in the interest of conserving database resources (and disk space),
# these have been excluded from the core. However, should you wish to add them,
# feel free.

#ALTER TABLE categories ADD INDEX tmp_sort_order ( sort_order );
#ALTER TABLE products ADD INDEX tmp_sort_order ( products_sort_order );
#ALTER TABLE products_attributes ADD INDEX tmp_sort_order ( products_options_sort_order );
#ALTER TABLE products_options ADD INDEX tmp_sort_order ( products_options_sort_order );
#ALTER TABLE products_options_values ADD INDEX tmp_sort_order ( products_options_values_sort_order );

#ALTER TABLE salemaker_sales ADD INDEX idx_date_start ( sale_date_start );
#ALTER TABLE salemaker_sales ADD INDEX idx_date_end ( sale_date_end );
#ALTER TABLE specials ADD INDEX idx_expires_date ( expires_date );
#ALTER TABLE featured ADD INDEX idx_expires_date ( expires_date );

