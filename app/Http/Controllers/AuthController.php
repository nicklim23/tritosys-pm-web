<?php

namespace App\Http\Controllers;

use App\Models\AuthClient;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use League\OAuth2\Server\Exception\OAuthServerException;

class AuthController extends AccessTokenController
{
    public function login(ServerRequestInterface $request)
    {
        try {
          
            $data = json_decode(parent::issueToken($request)->content(), true);
            $user = User::where('email', '=', $request->getParsedBody()['username'])->first();

            if ($user) {
                return response()->json(array_merge(["user" => $user], $data));
            }
            return response()->json(array(
                'error' => array(
                    'message' => 'Unauthorized',
                    'code' => 401,
                ),
            ), 401);
        } catch (ModelNotFoundException $e) {
            return response()->json(array(
                'error' => array(
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ),
            ), 401);
        } catch (OAuthServerException $e) {
            return response()->json(array(
                'error' => array(
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ),
            ), 401);
        } catch (Exception $e) {
            return response()->json(array(
                'error' => array(
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ),
            ), 500);
        }
    }
    //
}
