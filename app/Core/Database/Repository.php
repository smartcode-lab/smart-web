<?php


namespace App\Core\Database;


use Carbon\Carbon;

use Hamcrest\Thingy;

use Illuminate\Container\Container as App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\RelationNotFoundException;

use Illuminate\Support\Facades\Auth;

abstract class Repository
{
    /**
     * @var
     */
    protected $app;

    /**
     * @var
     */
    protected $model;

    /**
     * Repository constructor.
     * @param App $app
     * @throws \Exception
     */
    public function __construct(App $app)
    {
        $this->model = app($this->model());
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    public function startCounditions()
    {
        return  $this->model;
    }

    /**
     * @param array $with
     * @return mixed
     */
    public function all(array $with = [])
    {
        return $this->model->with($with)->get();
    }

    public function orderBy(string $column, string $ordering = 'DESC')
    {
        return $this->model->orderBy($column, $ordering);
    }

    public function rawOrder($raw)
    {
        return $this->model->orderBy($raw);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @param bool $order
     * @param string $desc
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'), $order = false, $desc = 'DESC')
    {
        if (!$order)
            return $this->model->paginate($perPage, $columns);
        return $this->model->orderBy($order, $desc)->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $attributes
     * @param array $object
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $object)
    {
        return $this->model->updateOrCreate($attributes, $object);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function has($relationName)
    {
        return $this->model->has($relationName);
    }

    public function doesntHave(string $relationName)
    {
        return $this->model->doesntHave($relationName);
    }

    public function where($key, $condition, $value)
    {
        return $this->model->where($key, $condition, $value);
    }

    public function whereHas($name, $function)
    {
        return $this->model->whereHas($name, $function);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $with = [], $columns = array('*'))
    {
        try {
            return $this->model->with($with)->find($id, $columns);
        } catch (RelationNotFoundException $e) {
        }
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function get($fields = [])
    {
        return $this->model->get($fields);
    }

    public function select(...$select)
    {
        return $this->model->select($select);
    }

    public function makeRecord(array $requestData ,bool $self = false, string $message = "Your Record Updated")
    {

//        if (isset($requestData['is_active'] ) && $requestData['is_active'] == "on"){
//            $requestData['is_active'] = 1;
//        }else{
//            $requestData['is_active'] = 0;
//        }

        if (isset($requestData['created_at'])){
            $requestData['created_at'] = Carbon::parse($requestData['created_at'])->toDateString();
        }else{
            $requestData['created_at']  = Carbon::today()->toDateString();
        }

        if (!empty($requestData['uuid'])) {
            $record = $this->updateOrCreate(array_key_exists('uuid', $requestData) ? ['uuid' => $requestData['uuid']] : ['uuid' => null], $requestData);
        }
        if ($self)
            return $record;
        session()->flash("successMessage",$message);
        return back();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model)
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        return $this->model = $model;
    }
}
