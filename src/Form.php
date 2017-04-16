<?php

namespace Webby\Extensions\CookieConsent;


use Nette\Http\Session;
use Webby\Presenter\DefaultPresenter;

class Form
{

    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @return Session
     */
    public function getSection()
    {
        return $this->session->getSection("cookie-consent");
    }

    public function create(DefaultPresenter $presenter, $link, $particle)
    {
        $form = new \Nette\Forms\Form();

        $form->addSubmit("send");

        if ($form->isSuccess()) {

            $section = $this->getSection();
            $section->value = true;

            if ($presenter->isAjax()) {
                $presenter->getParticles()->invalidate([$particle]);
            } else {
                $presenter->redirect($link);
            }
        }

        return $form;
    }

}