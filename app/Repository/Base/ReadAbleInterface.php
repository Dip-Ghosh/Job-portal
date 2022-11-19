<?php

namespace App\Repository\Base;

interface ReadAbleInterface
{
    public function getOne($id);

    public function getAll();
}
