<?php
/**
 * @package   Gantry5
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   MIT
 *
 * http://opensource.org/licenses/MIT
 */

namespace Gantry\WordPress\MultiLanguage;

interface MultiLantuageInterface
{
    /**
     * @return bool
     */
    public static function enabled();

    /**
     * @return string
     */
    public function getCurrentLanguage();

    /**
     * @return array
     */
    public function getLanguageOptions();
}
