<?php
namespace frontend\components\cards;


use yii\base\Widget;

class Cards extends Widget
{
    public $header;

    public $body;

    public $footer;

    public $theme;

    const CARD_SUCCESS = "success";

    const CARD_DANGER = "danger";

    const CARD_WARING = "waring";

    const CARD_INFO = "info";

    const CARD_SECONDARY = "secondary";

    const CARD_PRIMARY = "primary";

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('_cards', [
            'header' => $this->header ?? "",
            'body' => $this->body ?? "",
            'footer' => $this->footer ?? null,
            'theme' => $this->theme != null ? "card-" . $this->theme : ''
        ]);
    }

    public function getViewPath()
    {
        return '@app/components/cards/views';
    }
}