<?php

namespace Controllers\Projects {

    use Hyper\Annotations\{action, authorize};
    use Hyper\Controllers\CRUDController;
    use Hyper\Http\Request;
    use Models\Project;

    /**
     * Class ProjectsController
     * @authorize architect|admin
     * @package Controllers
     */
    class ImageController extends CRUDController
    {
        public function __construct()
        {
            parent::__construct();
            $this->model = Project::class;
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function index(Request $request)
        {
            return $this->view(
                'projects.index',
                $this->db->search(@$request->query->search ?? '')->toList()
            );
        }

        public function create(Request $request, $model = null, $message = null)
        {
            return $this->view('projects.write', $model, $message);
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function add(Request $request)
        {
            return $this->create($request);
        }

        private function write(Request $request){
            return $this->view('projects.write');
        }
    }
}