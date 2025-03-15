<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about(){

        $data = [
            'name' => 'Riki Setiyo Pambudi',
            'job' => 'Customer Service',
            'detail' => 'I`m a passionate developer who loves building web applications and exploring new technologies.',
            'database_skill' => 'Mysql | MongoDB | sqlite',
            'programming_skill' => 'PHP | JavaScript | Python | Java',
        ];
        return view('about', $data);
    }

    public function contact(){
        echo "This is contact page";
    }

    public function faqs(){
        echo "This is faqs page";
    }
}
