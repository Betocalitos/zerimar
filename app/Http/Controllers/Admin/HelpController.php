<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class HelpController
{
    /**
     * Show the admin help/guide page.
     */
    public function __invoke(): View
    {
        return view('admin.help');
    }
}