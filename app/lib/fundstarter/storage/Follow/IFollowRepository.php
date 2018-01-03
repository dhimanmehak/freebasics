<?php

namespace fundstarter\storage\Follow;

interface IFollowRepository {

    public function create($follower, $following);
}
