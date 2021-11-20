<?php

namespace App\Repository\Job;

interface JobInterface
{
    public function getAllActiveJobs();

    public function checkThumbnail($id);

    public function deactive($id);

    public function showJobById($id);

}
