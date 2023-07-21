<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Events\TaskAssigned;

class TaskController extends Controller
{
    public function create(TaskStoreRequest $request) {
        $validatedData = $request->validated();
        $data = $validatedData;
        $data['created_by'] = Auth::id();
        $user = (new User())->findUserById($data['assigned_to']);
        try {
            (new Task())->createTask($data);
             event(new TaskAssigned($user->email));
            return redirect()->back()->with('success','Task created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }
}
