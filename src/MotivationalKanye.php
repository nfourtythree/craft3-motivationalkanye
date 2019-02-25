<?php
/**
 * Motivational Kanye plugin for Craft CMS 3.x
 *
 * Quotes to brighten your day from one of the greatest minds of our time
 *
 * @link      https://n43.me
 * @copyright Copyright (c) 2019 Nathaniel Hammond (nfourtythree)
 */

namespace nfourtythree\motivationalkanye;

use Craft;
use craft\base\Plugin;

use craft\events\RegisterComponentTypesEvent;
use craft\services\Dashboard;
use nfourtythree\motivationalkanye\services\MotivationalKanyeService;
use nfourtythree\motivationalkanye\widgets\Quote;
use yii\base\Event;

/**
 * Class MotivationalKanye
 *
 * @author    Nathaniel Hammond (nfourtythree)
 * @package   MotivationalKanye
 * @since     1.0.0
 *
 * @property  MotivationalKanyeService $motivationalKanyeService
 */
class MotivationalKanye extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var MotivationalKanye
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setComponents([
            'service' => MotivationalKanyeService::class,
        ]);

        self::$plugin = $this;

        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = Quote::class;
            }
        );

        Craft::info(
            Craft::t(
                'motivational-kanye',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
