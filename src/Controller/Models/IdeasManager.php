<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 05/06/2018
 * Time: 10:46
 */

namespace App\Controller\Models;

use App\Entity\Ideas;
use Doctrine;


class IdeasManager
{
    public function addIdea($title, $content)
    {
        $idea = new Ideas();
        $idea->setTitle($title);
        $idea->setContent($content);
        $idea->setVotes(0);
        return $idea;

    }

}