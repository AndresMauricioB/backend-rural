<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseAuth
{
    protected $auth;

    public function __construct()
    {
        // Configura Firebase usando el archivo de credenciales JSON
        $firebase = (new Factory)->withServiceAccount(config('config/firebase/authrural-firebase-adminsdk-stc5l-c3dca9f317.json'));
        $this->auth = $firebase->createAuth();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $idToken = $request->bearerToken();
        if (!$idToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);

            // Extraer el UID
            //$uid = $verifiedIdToken->claims()->get('sub');
            //$request->attributes->set('uid', $uid);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
    
}
