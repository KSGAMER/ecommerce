<?php
    namespace app\Services;

    class Encrypt extends Services{
        function encryption($data) {
            return $this->jwt->encode($data, $this->settings['jwt']['key']);
        }
    }
?>