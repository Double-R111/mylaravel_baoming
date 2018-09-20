<?php
/**
 * Created by PhpStorm.
 * User: elati
 * Date: 2018/9/20
 * Time: 16:51
 */

namespace App\Service;

use App\Newacmer;

class BaomingService
{
    /**
     * @var Newacmer
     */
    private $newacmer;

    public function __construct()
    {
        $this->newacmer = new Newacmer();
    }

    public function baoming(array $recv)
    {
        $recv['college|major'] = $recv['college|major'][0] . ' | ' . $recv['college|major'][1];
        $row = $this->newacmer->where('phoneNumber', $recv['phoneNumber']);
        if(empty($row->first())) {
            $this->newacmer->insert($recv);
        } else {
            $row->update($recv);
        }
    }

}