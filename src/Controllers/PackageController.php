<?php

namespace Tox\Controllers;

class PackageController
{
    public function getPackages()
    {
        return view('tox.packages.list');
    }
}