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
             ->addDirective(Directive::STYLE, 'sha256-biLFinpqYMtWHmXfkA1BPeCY0/fNt46SAZ+BBk5YUog=')
             ->addDirective(Directive::FONT, 'fonts.gstatic.com')
             ->addDirective(Directive::FONT, 'fontlibrary.org');
    }
}
