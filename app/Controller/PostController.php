<?php

    class PostController
    {
        public function index($params)
        {
            try{
                $postagem =Postagem::selecionaporid($params);
                
                
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('single.html');
                
               

                $parametros = array();
                $parametros['id'] = $postagem->id;
                $parametros['titulo'] = $postagem->titulo;
                $parametros['conteudo'] = $postagem->conteudo;
                $parametros['comentarios'] = $postagem->comentarios;
                
                
                $conteudo = $template->render($parametros);
                echo $conteudo;

                

                
            }catch(Exception $erro){    
                echo $erro->getMessage();
            }
           
        }

        public function addComent()
        {
            try{
            Comentario::inserir($_POST);
            header('location:http://localhost/dev/CRUD/?pagina=post&id='.$_POST['id']);
            }catch(Exception $er){
                echo'<script>alert("'.$er->getMessage().'")</script>';
                echo'<script>location.href="http://localhost/dev/CRUD/?pagina=post&id='.$_POST['id'].'"</script>';
            }
        }
    } 