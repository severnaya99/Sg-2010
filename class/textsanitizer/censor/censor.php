<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * TextSanitizer extension
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         class
 * @subpackage      textsanitizer
 * @since           2.3.0
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: censor.php 3575 2009-09-05 19:35:11Z trabis $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * Replaces banned words in a string with their replacements or terminate current request
 *
 * @param   string $text
 * @return  string
 *
 */
class MytsCensor extends MyTextSanitizerExtension
{
    //static $censorConf;
    function load(&$ts, $text, $force = false)
    {
        global $xoopsUser, $xoopsConfig, $xoopsUserIsAdmin;
        static $censorConf;
        if (empty($force) && $xoopsUserIsAdmin) {
            return $text;
        }
        if (!isset($censorConf)) {
            $config_handler = & xoops_gethandler('config');
            $censorConf = $config_handler->getConfigsByCat(XOOPS_CONF_CENSOR);
            if (empty($censorConf['censor_enable']) || empty($censorConf['censor_words'])) {
                $censorConf['censor_string'] = "";
            } else {
                $config = parent::loadConfig(dirname(__FILE__));
                $censorConf = array_merge($config, $censorConf);
            }
        }
        if (empty($censorConf['censor_words'])) {
            return $text;
        }

        $replacement = $censorConf['censor_replace'];
        foreach ($censorConf['censor_words'] as $bad) {
            $bad = trim($bad);
            if (!empty($bad)) {
                if (false === strpos($text, $bad)) {
                    continue;
                }
                if (!empty($censorConf['censor_terminate'])) {
                    trigger_error("Censor words found", E_USER_ERROR);
                    $text = '';
                    return $text;
                }
                $patterns[] = "/(^|[^0-9a-z_]){$bad}([^0-9a-z_]|$)/siU";
                $replacements[] = "\\1{$replacement}\\2";
                $text = preg_replace($patterns, $replacements, $text);
            }
        }
        return $text;
    }
}

?>