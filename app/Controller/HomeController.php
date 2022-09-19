<?php

    class HomeController
    {
        public function index()
        {
            try{
                $colecPostagens =Postagem::selecionaTodos();

                var_dump($colecPostagens);

            }catch(Exception $erro){    
                echo $erro->getMessage();
            }
           
        }
    } 