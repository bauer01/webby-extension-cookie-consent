<?php

namespace Webby\Extensions\CookieConsent;

use Nette\DI\CompilerExtension;

class Extension extends CompilerExtension
{

    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('form'))
            ->setClass(Form::class);
    }

}