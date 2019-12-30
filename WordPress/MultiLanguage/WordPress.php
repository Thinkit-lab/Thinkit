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

class WordPress implements MultiLantuageInterface
{
    public static function enabled()
    {
        return true;
    }

    public function getCurrentLanguage()
    {
        return get_locale();
    }

    public function getLanguageOptions()
    {
        require_once( ABSPATH . 'wp-admin/includes/translation-install.php' );
        $translations = wp_get_available_translations();
        $languages = get_available_languages();

        $items = [['name' => 'en_US', 'label' => 'English (United States)']];

        foreach($languages as $locale) {
            if(isset($translations[$locale])) {
                $translation = $translations[$locale];
                $items[] = [
                    'name'  => $locale,
                    'label' => $translation['native_name'],
                ];
            }
        }

        return $items;
    }
}
