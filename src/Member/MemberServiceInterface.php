<?php

namespace WeTyper\Member;

interface MemberServiceInterface
{
    public function createMember(string $username);

    public function blockMember(string $memberId);
}
