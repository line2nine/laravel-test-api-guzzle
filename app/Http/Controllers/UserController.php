<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class UserController extends Controller
{
    public function index()
    {
        $users = \GuzzleHttp\json_decode(file_get_contents('items', $this->userList()));
        return view('user.list', compact('users'));
    }

    public function userList()
    {
        $client = new Client();
        $url = 'http://localhost:8000/api/list';
        $request = $client->get($url);
        $response = $request->getBody();
        file_put_contents('items', $response);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user_name = $request->get('name');
        $user_email = $request->get('email');
        $user_password = Hash::make($request->get('password'));
        $client = new Client();
        $url = 'http://localhost:8000/api/create';
        $request = $client->post($url, [
            'form_params' => [
                'name' => $user_name,
                'email' => $user_email,
                'password' => $user_password
            ]
        ]);
        $response = $request->getBody()->getContents();
        return redirect()->route('user.list');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $client = new Client();
        $url = 'http://localhost:8000/api/delete/' . $user->id;
        $request = $client->delete($url, [
            'form_params' => [
                '_method' => 'DELETE'
            ]
        ]);
        return redirect()->route('user.list');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user_name = $request->get('name');
        $client = new Client();
        $url = 'http://localhost:8000/api/update/' . $user->id;
        $request = $client->post($url, [
            'form_params' => [
                'name' => $user_name
            ]
        ]);
        return redirect()->route('user.list');
    }
}
