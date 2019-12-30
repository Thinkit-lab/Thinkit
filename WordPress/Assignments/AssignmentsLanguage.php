<?php
/**
 * @package   Gantry5
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   MIT
 *
 * http://opensource.org/licenses/MIT
 */

namespace Gantry\WordPress\Assignments;

use Gantry\Component\Assignments\AssignmentsInterface;
use Gantry\WordPress\MultiLanguage\PolyLang;
use Gantry\WordPress\MultiLanguage\WordPress;
use Gantry\WordPress\MultiLanguage\Wpml;

class AssignmentsLanguage implements AssignmentsInterface
{
    public $type = 'language';
    public $priority = 1;

    protected $adapter;


    /**
     * Returns list of rules which apply to the current page.
     *
     * @return array
     */
    public function getRules()
    {
        $code = $this->getAdapter()->getCurrentLanguage();
        $rules[$code] = $this->priority;

        return [$rules];
    }

    /**
     * List all the rules available.
     *
     * @param string $configuration
     * @return array
     */
    public function listRules($configuration)
    {
        $items = $this->getAdapter()->getLanguageOptions();

        // Get label and items for each menu
        $list = [
                'label' => 'Languages',
                'items' => $items
        ];

        return [$list];
    }

    protected function getAdapter()
    {
        if (!$this->adapter) {
            if (Wpml::enabled()) {
                $this->adapter = new Wpml;
            } elseif (PolyLang::enabled()) {
                $this->adapter = new PolyLang;
            } else {
                $this->adapter = new WordPress;
            }
        }

        return $this->adapter;
    }
}
