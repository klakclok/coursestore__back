<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $admin = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        //Проверить почту
        $user = User::where('email', $admin['email'])->first();

        //Проверить пароль
        if (!$user || !Hash::check($admin['password'], $user->password))
        {
            return response (['message'=> 'не правильный логин или пароль'],401);
        }

        //Создаем токен = пользователь токен создания (воспринимается как ключ) -> получаем токен с открытым текстом
        $token = $user->createToken('myapptoken')->plainTextToken;

        //Ответ. Ионформация о пользователе которая будет из базы данных
        $response = [
            'user' => $user,
            'token' => $token
        ];

        //Мы возвращаем ответ и передаем переменную ответа
        return response($response,201);

    }
}
