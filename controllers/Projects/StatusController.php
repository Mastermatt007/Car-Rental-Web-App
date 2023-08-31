<?php

namespace Controllers\Projects {

    use Hyper\Annotations\{action, authorize};
    use Hyper\Controllers\CRUDController;
    use Hyper\Database\DatabaseContext;
    use Hyper\Http\Request;
    use Models\Project;
    use Models\ProjectStatus;

    /**
     * Class StatusController
     * @authorize admin
     * @package Controllers
     */
    class StatusController extends CRUDController
    {
        public $redirects = [
            'create' => '/projects/status'
        ];

        /**
         * StatusController constructor.
         */
        public function __construct()
        {
            parent::__construct();
            $this->model = ProjectStatus::class;
            $this->db = new DatabaseContext(ProjectStatus::class);
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function index(Request $request)
        {
            return $this->view(
                'projects.status.index',
                $this->db->search(@$request->query->search ?? '')->toList()
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
                'projects.status.write',
                $model,
                $message,
                [
                    'statuses' => $this->db->all()->toList()
                ]
            );
        }

        /**
         * @action
         * @param Request $request
         * @param null $model
         * @param null $message
         * @return string
         */
        public function edit(Request $request, $model = null, $message = null)
        {
            return $this->view('projects.status.write', $model, $message);
        }
    }
}