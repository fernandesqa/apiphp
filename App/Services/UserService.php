<?php

    namespace APP\Services;

    use  App\Models\User;

    class UserService{

        public function get($id = null)
        {
            if ($id) {
                return User::select($id);
            }else {
                return User::selectAll();
            }
        }

        public function post()
        {

            $data = (array) json_decode(file_get_contents('php://input'), TRUE);

            return User::insert($data);
            
        }

        public function put()
        {
            $data = (array) json_decode(file_get_contents('php://input'), TRUE);

            return User::update($data);
            
        }

        public function delete($id)
        {  
            return User::delete($id);
        }

    }

?>