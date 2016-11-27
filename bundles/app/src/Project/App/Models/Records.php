<?php


namespace Project\App\Models;

use PHPixie\HTTP\Request;
use PHPixie\Template;

class Records
{
    /**
     * @var \PHPixie\Database
     */
    protected $database;

    /**
     * @var \PHPixie\Database\Driver\PDO\Connection
     */
    protected $connection;

    /**
     * Records constructor.
     * @param $database \PHPixie\Database
     */
    public function __construct(\PHPixie\Database $database)
    {
        $this->database = $database;
        $this->connection = $this->database->get('default');
    }

    /**
     * @param $sql
     * @param array $params
     * @return \PHPixie\Database\Driver\PDO\Result
     */
    public function execute($sql, $params = [])
    {
        /**
         * @var $result \PHPixie\Database\Driver\PDO\Result
         */
        $result = $this->connection->execute($sql, $params);
        if ($result)
            $result = $result->asArray();
        return $result;
    }
    /**
     *
     * @param bool $refresh
     * @return array [['id'=>0, 'name'=>0, 'path'=>0],..]
     */
    public function getCategories($refresh = false)
    {
        static $data = null;
        if ($data === null || $refresh) {
            $resultSort = false;
            $result = $this->execute('SELECT * FROM path p WHERE p.active = 1');
            if ($result) {
                for ($i = 0; $i < count($result); $i ++) {
                    $resultSort[] = [
                        'id' => $result[$i]->id,
                        'name' => $result[$i]->name,
                        'path' => $result[$i]->path
                    ];
                }
            }
            $data = $resultSort;
        }

        return $data;
    }

    /**
     * @param $path String  example '/python/function'
     * @return bool|mixed   ['id'=>0, 'name'=>0, 'path'=>0]
     */
    public function getPathData($path)
    {
        $result = $this->getCategories();
        foreach ($result as $item) {
            if ($item['path'] === $path) {
                $arr = explode('/', $item['path']);
                $arr = array_values(array_diff($arr, ['', null]));
                if (count($arr) == 2) {
                    $item['parent'] = $this->getPathData('/' . $arr[0]);
                }
                return $item;
            }
        }
        return false;
    }

    /**
     * @param $path
     * @return bool
     */
    public function isCategory($path)
    {
        $path = $this->getPathData($path);
        return $path && !isset($path['parent']);
    }

    /**
     * @param $path
     * @return bool
     */
    public function isSubCategory($path)
    {
        $path = $this->getPathData($path);
        return isset($path['parent']);
    }
    /**
     * @return array ['cat' => ['id'=>0, 'name'=>0, 'path'=>0, 'children'=>[['id'=>0, 'name'=>0, 'path'=>0], ...], ...]
     */
    public function getSubCategories()
    {
        $result = $this->getCategories();
        $res = [];
        foreach ($result as $item) {
            $arr = explode('/', $item['path']);
            $arr = array_values(array_diff($arr, ['', null]));
            if (!isset($res[$arr[0]]))
                $res[$arr[0]] = ['id' => $item['id'], 'name' => $item['name'], 'path' => $item['path'], 'children' => []];
            else
                $res[$arr[0]]['children'][] = ['id' => $item['id'], 'name' => $item['name'], 'path' => $item['path']];
        }

        return $res;
    }


    public function getSnippet($linkId)
    {
        $where = 'i.id = 0';

        if (is_numeric($linkId))
            $where = 'i.id = :where';
        else if (is_string($linkId))
            $where = 'i.link = :where';

        $sql = "SELECT i.*, 
                p.id as path_id,
                p.name as path_name,
                p.path as path_path,
                p.active as path_active
                FROM item i 
                LEFT JOIN relation r ON (r.item = i.id)
                LEFT JOIN path p ON (p.id = r.path)
                WHERE $where";

        return $this->execute($sql, [':where' => $linkId]);
    }

    public function getSnippets($path)
    {
        $res = [];
        $where = "p.path = $path";
        $isCategory = $this->isCategory($path);

        if($isCategory)
            $where = "p.path LIKE '$path/%';";

        $sql = "SELECT i.*, 
            p.id as path_id,
            p.name as path_name,
            p.path as path_path,
            p.active as path_active,
            r.id as relation_id
            FROM item i 
            LEFT JOIN relation r ON (r.item = i.id)
            LEFT JOIN path p ON (p.id = r.path)
            WHERE $where";

        $result = $this->execute($sql);

        if (is_array($result)) {
            foreach ($result as $item) {
                $arr = (array) $item;
                $arr['parent'] = $this->getPathData($arr['path_path']);
                $res[] = $arr;
            }
        }

        return $res;
    }
    public function deleteSnippet($id, $relation_id)
    {
        $sql = "DELETE FROM item WHERE id = $id;";
        $sql = "DELETE FROM relation WHERE item = $id AND id = $relation_id;";
    }

}