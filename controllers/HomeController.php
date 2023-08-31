<?php
namespace Controllers {

    use Hyper\Annotations\action;
    use Hyper\Application\HyperApp;
    use Hyper\Controllers\Controller;
    use Hyper\Functions\Debug;
    use Hyper\Functions\Logger;
    use Hyper\Http\Request;
    use Hyper\Models\User;

    /**
     * Class HomeController
     * @package Controllers
     */
    class HomeController extends Controller
    {
        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function index(Request $request): string
        {
            return $this->view('home.index');
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function about(Request $request): string
        {
            return $this->view('home.about');
        }

        /**
         * @action
         * @param Request $request
         * @return string
         */
        public function contact(Request $request)
        {
            return $this->view('home.contact');
        }

    }
}
