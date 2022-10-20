<?php

namespace Tox\Controllers;

class AdminController extends Controller
{
    /**
     * Create a new Tox Tier Package.
     */
    public function createTiers()
    {
        return view('tox.admin.create-tiers')->withTitle('Create Tiers');
    }

    public function getPayments()
    {
        return view('tox.admin.payments')->withTitle('Payments');
    }
}