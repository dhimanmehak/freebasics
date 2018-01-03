<?php

namespace fundstarter\storage\Followproject;

interface IFollowprojectRepository {

    public function create($project, $follower);
}
