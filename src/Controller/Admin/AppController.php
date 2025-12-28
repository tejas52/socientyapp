namespace App\Controller\Admin;

use App\Controller\AppController;

class AppController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
    }
}
