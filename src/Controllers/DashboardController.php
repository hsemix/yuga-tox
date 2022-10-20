<?php

namespace Tox\Controllers;

class DashboardController extends Controller
{
    /**
     * Get Tox Payments Summary.
     */
    public function getSummary()
    {
        return view('tox.dashboard.index')->withTitle('Dashboard');
    }

    public function getTransactions()
    {
        return view('tox.dashboard.transactions')->withTitle('Transactions');
    }
}
