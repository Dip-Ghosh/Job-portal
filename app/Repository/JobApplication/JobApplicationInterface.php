<?php

namespace App\Repository\JobApplication;

interface JobApplicationInterface
{
    public function applyJob($data);

    public function getAllApplicantList($id);

    public function getApplicantDetails($id);

}
