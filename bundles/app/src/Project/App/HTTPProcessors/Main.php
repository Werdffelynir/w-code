<?php

namespace Project\App\HTTPProcessors;

use PHPixie\HTTP\Request;
use PHPixie\Template;
use Project\App\Models\Records;

class Main extends \PHPixie\DefaultBundle\Processor\HTTP\Actions
{
    /**
     * @var Template Template component
     */
    protected $template;
    /**
     * @var \PHPixie\BundleFramework\Components
     */
    protected $components;

    /**
     * Constructor
     * @param $components
     * @param Template $template
     */
    public function __construct($components, $template)
    {
        $this->components = $components;
        $this->template = $template;
    }

    /**
     * Default action
     * @param Request $request HTTP request
     * @return Template\Container
     */
    public function defaultAction($request)
    {
        $query = $request->query();
        /*
        $users = $query->slice('users');
        $users->get('current.id');
        */
        //$database = new \PHPixie\Database('default');
        $database =  $this->components->database();
        $records =  new Records($database);

        $cats = $records->getSnippets('/python');
//        $pathData1 = $records->getPathData('/python');
//        $pathData2 = $records->getPathData('/python/function');
//        var_dump($pathData1);
//        var_dump($pathData2);
        var_dump($cats);
        var_dump($records->isSubCategory('/python'));
        var_dump($records->isSubCategory('/python/function'));
        var_dump($records->isSubCategory('/python/other'));


        return '';

        //var_dump($records);
        /**
         * @type $connection \PHPixie\Database\Driver\PDO\Connection
         * @type $stdResult \PHPixie\Database\Driver\PDO\Result
         */
        /*
        function getCategory(){};
        function getSubCategory(){};
        function getSnippet(){};
        function getSnippetsByCategory(){};
        function getSnippetsBySubCategory(){};

        return $paths;*/

        //var_dump($database->get());
        //$orm =  $this->components->orm();
        //$result = $orm->query('SELECT path FROM path WHERE active is not 0;');
        //$result = $orm->query('path');
        //var_dump($result->findOne());

        //

        //$connection->

        //$this->
        //

        //$container = $this->template->get('app:greet');
        //$container->message = "Main process";
        //return $container;
    }


}