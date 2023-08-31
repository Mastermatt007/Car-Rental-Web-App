<?php


namespace Controllers\Projects;


use Exception;
use Hyper\Annotations\action;
use Hyper\Controllers\Controller;
use Hyper\Exception\HyperHttpException;
use Hyper\Http\Request;

/**
 * Class ProjectController
 * @package Controllers\Projects
 */
class ProjectController extends Controller
{
    /**
     * @action
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function details(Request $request)
    {
        $model = $this->db->first('id', $request->params->param1);

        if (!isset($model)) throw HyperHttpException::notFound();

        return $this->view('projects.read', $model);
    }
}