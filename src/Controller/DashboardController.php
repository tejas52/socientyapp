<?php
namespace App\Controller;

use App\Controller\AppController;

class DashboardController extends AppController
{
    public function index()
    {
        // Load tables using TableLocator (CakePHP 5)
        $societiesTable = $this->getTableLocator()->get('Societies');
        $wingsTable = $this->getTableLocator()->get('Wings');
        $flatsTable = $this->getTableLocator()->get('Flats');
        $membersTable = $this->getTableLocator()->get('Members');
        $maintenanceTable = $this->getTableLocator()->get('MaintenanceCharges');
        $paymentsTable = $this->getTableLocator()->get('MaintenancePayments');

        // Fetch counts for dashboard
        $societiesCount = $societiesTable->find()->count();
        $wingsCount = $wingsTable->find()->count();
        $flatsCount = $flatsTable->find()->count();
        $membersCount = $membersTable->find()->count();
        $maintenanceCount = $maintenanceTable->find()->count();
        $paymentsCount = $paymentsTable->find()->count();

        $this->set(compact(
            'societiesCount', 
            'wingsCount', 
            'flatsCount', 
            'membersCount', 
            'maintenanceCount', 
            'paymentsCount'
        ));
    }
}
