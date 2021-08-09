<?php

declare(strict_types=1);

namespace App\Authorizations;

interface AuthenticationCheckerInterface
{
    const ERROR_MESSAGE = "You are not authenticated";
    public function isAuthenticated(): void;
}