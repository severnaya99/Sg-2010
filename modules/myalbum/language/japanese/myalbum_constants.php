<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_CNST_LOADED' ) ) {

define( 'MYALBUM_CNST_LOADED' , 1 ) ;

// System Constants (Don't Edit)
define( "GPERM_INSERTABLE" , 1 ) ;
define( "GPERM_SUPERINSERT" , 2 ) ;
define( "GPERM_EDITABLE" , 4 ) ;
define( "GPERM_SUPEREDIT" , 8 ) ;
define( "GPERM_DELETABLE" , 16 ) ;
define( "GPERM_SUPERDELETE" , 32 ) ;
define( "GPERM_TOUCHOTHERS" , 64 ) ;
define( "GPERM_SUPERTOUCHOTHERS" , 128 ) ;
define( "GPERM_RATEVIEW" , 256 ) ;
define( "GPERM_RATEVOTE" , 512 ) ;
define( "GPERM_TELLAFRIEND" , 1024 ) ;

// Global Group Permission
define( "_ALBM_GPERM_G_INSERTABLE" , "��Ʋġ��׾�ǧ��" ) ;
define( "_ALBM_GPERM_G_SUPERINSERT" , "��Ʋġʾ�ǧ���ס�" ) ;
define( "_ALBM_GPERM_G_EDITABLE" , "�Խ��ġ��׾�ǧ��" ) ;
define( "_ALBM_GPERM_G_SUPEREDIT" , "�Խ��ġʾ�ǧ���ס�" ) ;
define( "_ALBM_GPERM_G_DELETABLE" , "����ġ��׾�ǧ��" ) ;
define( "_ALBM_GPERM_G_SUPERDELETE" , "����ġʾ�ǧ���ס�" ) ;
define( "_ALBM_GPERM_G_TOUCHOTHERS" , "¾�桼���Υ��᡼�����Խ�������ġ��׾�ǧ��" ) ;
define( "_ALBM_GPERM_G_SUPERTOUCHOTHERS" , "¾�桼���Υ��᡼�����Խ�������ġʾ�ǧ���ס�" ) ;
define( "_ALBM_GPERM_G_RATEVIEW" , "��ɼ������" ) ;
define( "_ALBM_GPERM_G_RATEVOTE" , "��ɼ��" ) ;
define( "_ALBM_GPERM_G_TELLAFRIEND" , "ͧ�ͤ��Τ餻��" ) ;

// Caption
define( "_ALBM_CAPTION_TOTAL" , "Total:" ) ;
define( "_ALBM_CAPTION_GUESTNAME" , "������" ) ;
define( "_ALBM_CAPTION_REFRESH" , "����" ) ;
define( "_ALBM_CAPTION_IMAGEXYT" , "������" ) ;
define( "_ALBM_CAPTION_CATEGORY" , "���ƥ��꡼" ) ;

	// encoding conversion if possible and needed
	function myalbum_callback_after_stripslashes_local( $text )
	{
		if( function_exists( 'mb_convert_encoding' ) && mb_internal_encoding() !=  mb_http_output() ) {
			return mb_convert_encoding( $text , mb_internal_encoding() , mb_detect_order() ) ;
		} else {
			return $text ;
		}
	}

}

?>
