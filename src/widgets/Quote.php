<?php
/**
 * @copyright Copyright (c) nfourtythree.
 */

namespace nfourtythree\motivationalkanye\widgets;

use Craft;
use craft\base\Widget;
use craft\helpers\Json;
use nfourtythree\motivationalkanye\MotivationalKanye;

/**
 * Kanye Quote Dashboard Widget
 *
 * @author Nathaniel Hammond (nfourtythree)
 * @since 1.0.0
 */
class Quote extends Widget
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('motivational-kanye', 'Motivational Kanye');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@nfourtythree/motivationalkanye/ye.svg");
    }

    // Properties
    // =========================================================================

    /**
     * @var string|null The feed URL
     */
    public $url;

    /**
     * @var string|null The feed title
     */
    public $title;

    /**
     * @var int The maximum number of feed items to display
     */
    public $limit;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        $quote = MotivationalKanye::$plugin->service->getQuote();

        return Craft::$app->getView()->renderTemplate('motivational-kanye/quote', [
            'quote' => $quote
        ]);
    }
}
