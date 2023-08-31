<?php

namespace Controllers\Projects {

    use Hyper\Annotations\{action, authorize};
    use Hyper\Controllers\CRUDController;
    use Hyper\Database\DatabaseContext;
    use Hyper\Http\Request;
    use Models\{Project, ProjectStatus, User};
    use function Hyper\Database\db;

    /**
     * Class ProjectsController
     * @authorize architect|admin
     * @package Controllers
     */
    class HomeController extends CRUDController
    {
        public $redirects = [
            'create' => '/projects',
            'edit' => '/projects'
        ];

        public function __construct()
        {
            parent::__construct();
            $this->db = new DatabaseContext($this->model = Project::class);
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function all(Request $request)
        {
            return $this->view(
                'projects.index',
                $this->db
                    ->search(@$request->query->search ?? '')
                    ->parents([
                        'architectId' => User::class,
                        'customerId' => User::class
                    ])
                    ->toList()
            );
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function index(Request $request)
        {
            $databaseContext = $this->db->search(@$request->query->search ?? '');

            if (User::isAuthenticated())
                $databaseContext->where('architectId', User::getId());

            return $this->view(
                'projects.index',
                $databaseContext->toList()
            );
        }

        /**
         * @action
         * @param Request $request
         * @param null $model
         * @param null $message
         * @return string
         */
        public function create(Request $request, $model = null, $message = null)
        {
            return $this->view(
                'projects.write',
                $model,
                $message,
                [
                    'statuses' => db(ProjectStatus::class)->all()->toList(),
                    'architects' => db(User::class)->where('role', '%architect%', 'like')->toList(),
                    'customers' => db(User::class)->where('role', '%customer%', 'like')->toList()
                ]
            );
        }
    }
}