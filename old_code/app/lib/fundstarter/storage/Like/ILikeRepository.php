<?php

namespace fundstarter\storage\Like;

interface ILikeRepository {

    public function create($userid, $projectid);
}
