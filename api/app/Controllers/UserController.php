<?php 
    namespace app\Controllers;

    class UserController extends Controllers{

        function helloUser($request, $response) {
            return json_encode(array('greetings' => 'Hello from the other side!!'));
        }

        function user($request, $response) {
            $name = $request->getAttribute('user');

            $message['name'] = $name;

            $message['encodedName'] = $this->jwt->encode($name, $this->settings['jwt']['key']);

            $message['decodedName'] = $this->jwt->decode($message['encodedName'], $this->settings['jwt']['key'], $this->settings['jwt']['algorithms']);

            return json_encode(array('result' => $message));
        }

        function auth($request, $response) {
            $auth = $request->getParsedBody();

            $message = $this->UserModel->auth($auth);

            return json_encode($message);
        }
        
    }
?>