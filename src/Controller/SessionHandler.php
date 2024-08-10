<?php 
    namespace Eroto\HomeHandler\Controller;
    
    class SessionHandler
    {
    
        public function userSession(){

            try {

                $session = session_start();
                
                if ($session) {
                
                    if (isset($_SESSION['id'])) {
                        
                        echo 'current session id: ' . $_SESSION['id'];

                    }
                    else {

                        session_create_id();
                       
                        $_SESSION['id'] = session_id();

                        return null;
                    }
                }

                $_SESSION['logged_in'] = true;
            
            } 
            catch (\Throwable $th) {

                echo $th->getMessage();
                
                return null;
            
            }

        }
    }