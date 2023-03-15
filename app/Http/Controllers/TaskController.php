<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $body = $request->all();

        $response = [
            "success" => false,
            "data" => [
                "tasks" => [],
                "totalPages" => 0
            ],
            "message" => ''
        ];

        $completed = @$body['completed'];
        $search = @$body['search'];
        $page = isset($body['page'])?$body['page']:1;

        $limit = 10;

        $skip = ($page-1)*$limit;

        try {

            if (isset($completed) && $completed != null && $completed !== 1 && $completed !== 0) {
                $response["message"] = 'Parameter only_completed must be 1 or 0 or null';
                return $response;
            }

            $tasks = Task::orderBy('created_at', 'desc')->where('deleted_at', null);

            if (isset($completed) && $completed !== null) {
                $tasks = $tasks->where('completed', $completed);
            }

            if (isset($search) && $search !== null && $search !== '') {
                $search = strtolower($search);
                $tasks = $tasks->whereRaw('LOWER(name) like ?', '%' . $search . '%');
            }

            $totalTasks=  $tasks->get();


            $tasks = $tasks->skip($skip)->take($limit)->get();
            $total = count($totalTasks);
            $response["data"]["totalPages"] = ceil($total /$limit);
            $response["data"]["tasks"] = $tasks;
            $response["success"] = true;
            $response["message"] = 'Success';

        } catch (\Exception $e) {
            $response["message"] = "Error: " . $e->getMessage();
        }

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $body = $request->all();

        $response = [
            "success" => false,
            "message" => ''
        ];

        $name = @$body['name'];
        $description = @$body['description'];
        $limit_date = @$body['limit_date'];
        $completed = @$body['completed'];

        try {
            $error = $this->validateParams($name, $description, $limit_date, $completed);
            if ($error["error"]) {
                $response["message"] = $error["message"];
                return $response;
            }

            $task = new Task([
                "name" => $name,
                "description" => $description,
                "limit_date" => $limit_date,
                "completed" => $completed,
            ]);
            $task->save();

            $response["success"] = true;
            $response["message"] = "Task saved!";
        } catch (\Exception $e) {
            $response["message"] = "Error : " . $e->getMessage();
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $body = $request->all();

        $response = [
            "success" => false,
            "data" => null,
            "message" => ''
        ];

        $idTask = @$body['id'];
        if ($idTask == null) {
            $response["message"] = "Parameter id is required";
            return $response;
        }

        try {
            $task = Task::where('id',$idTask)
            ->where('deleted_at', null)->first();

            if ($task !== null) {
                $response["data"] = $task;
                $response["success"] = true;
                $response["message"] = "Task found";
            } else {
                $response["message"] = "No task found";
            }
        } catch (\Exception $e) {
            $response["message"] = "Error : " . $e->getMessage();
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $body = $request->all();

        $response = [
            "success" => false,
            "message" => ''
        ];

        $idTask = @$body['id'];
        $name = @$body['name'];
        $description = @$body['description'];
        $limit_date = @$body['limit_date'];
        $completed = @$body['completed'];

        try {
            if ($idTask == null) {
                $response["message"] = "Parameter 'id' is required";
                return $response;
            }

            $error = $this->validateParams($name, $description, $limit_date, $completed);
            if ($error["error"]) {
                $response["message"] = $error["message"];
                return $response;
            }

            $task = Task::where('id',$idTask)
            ->where('deleted_at', null)->first();

            if ($task !== null) {
                $task->name = $name;
                $task->description = $description;
                $task->limit_date = $limit_date;
                $task->completed = $completed;
                $task->save();
                $response["success"] = true;
                $response["message"] = "Task updated!";
            } else {
                $response["message"] = "No task found";
            }
        } catch (\Exception $e) {
            $response["message"] = "Error : " . $e->getMessage();
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $body = $request->all();

        $response = [
            "success" => false,
            "message" => ''
        ];

        $idTask = @$body['id'];
        if ($idTask == null) {
            $response["message"] = "Parameter id is required";
            return $response;
        }

        $task = Task::where('id',$idTask)
            ->where('deleted_at', null)->first();

        if ($task !== null) {
            $task->deleted_at = date('Y-m-d');
            $task->save();
            $response["success"] = true;
            $response["message"] = "Task deleted!";
        } else {
            $response["message"] = "No task found";
        }

        return $response;
    }

    private function validateParams($name, $description, $limit_date, $completed)
    {

        if ($name == null || $name == '') {
            return ["message" => "Parameter 'name' is required", "error" => true];
        }
        if ($description == null || $description == '') {
            return ["message" => "Parameter 'description' is required", "error" => true];
        }
        if ($limit_date == null || $limit_date == '') {
            return ["message" => "Parameter 'limit_date' is required", "error" => true];
        } else if (date('Y-m-d', strtotime($limit_date)) != $limit_date) {
            return [
                "message" => "Parameter 'limit_date'  must be a valid date with format YYYY-MM-DD",
                "error" => true
            ];
        }

        if ($completed !== 1 && $completed !== 0) {
            return ["message" => "Parameter 'completed' must be 1 or 0", "error" => true];
        }


        return ["error" => false];
    }
}
