<?php

namespace App\Services;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class DefaultCSPPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this->addDirective(Directive::STYLE, 'fontlibrary.org')
             ->addDirective(Directive::FONT, 'fonts.gstatic.com')
             ->addDirective(Directive::FONT, 'fontlibrary.org');
    }
}
