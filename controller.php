<?php


namespace App\Controllers\Examplo;

use CodeIgniter\Controller;


class Newsletter extends Controller
{
    public function index()
    {
    
    }
    
     public function show()
    {
       try{
      
          $data = $this->request->getJSON(TRUE);
          $model = $this->NewsletterModel = new NewsletterModel(); 
          
          //Verifica na model se já tras linhas com esses e-mail - para verificar se já existe 
          $emailExisting = $model->getEmails($data['email']);

          if($emailExisting){

            return $this->response->setStatusCode(200)->setJSON(array('message' => "E-mail já cadastrado!", 'success'=> true , 'status' => 1)) ;
          }

          $object = new StdClass(); 

          $object->email = $data['email'];
          $object->campanha = 'verao';
        
           $insert = $model->save($object);

           return $this->response->setStatusCode(200)->setJSON(array('message' => "E-mail cadastrado com sucesso!", 'success'=> true , 'status'=> 2)) ;


         }catch (\Exception $exception) {

            return $this->response->setStatusCode(400)->setJSON(array('mensage'=> 'Erro ao cadastrar o e-mail', 'success' => false)) ;
         }
      
    }
    
    public function store()
    {
    }

    public function update()
    {
    }
    
     public function delete()
    {
    }
 }
