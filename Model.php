<?php


namespace App\Models\NewsletterModel;

use \CodeIgniter\Model;

class NewsletterModel extends Model
{
    protected $table = 'tb_newsletter';
    protected $primaryKey = 'id_newsletter';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $allowedFields = ['email', 'campanha'];

    public function getEmails($data){
       
        $this->select('email'); 
        $this->where('email = ', $data);

        $result = $this->get()->getResultObject();
        return $result[0] ?? [];

    }

}
