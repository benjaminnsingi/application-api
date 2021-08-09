<?php

declare(strict_types=1);

namespace App\Services;

use App\Authorizations\AuthenticationCheckerInterface;
use App\Authorizations\ResourceAccessCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class ResourceUpdator implements ResourceUpdatorInterface
{
    protected array $methodAllowed = [
        Request::METHOD_PUT,
        Request::METHOD_PATCH,
        Request::METHOD_DELETE,
    ];

    private  ResourceAccessCheckerInterface $resourceAccessChecker;
    private  AuthenticationCheckerInterface $authenticationChecker;

    public function __construct(
        ResourceAccessCheckerInterface $resourceAccessChecker,
        AuthenticationCheckerInterface $authenticationChecker
    )
    {
        $this->resourceAccessChecker = $resourceAccessChecker;
        $this->authenticationChecker = $authenticationChecker;
    }

    public function process(string $method, UserInterface $user): bool
    {
       if (in_array($method, $this->methodAllowed, true)) {
           $this->authenticationChecker->isAuthenticated();
           $this->resourceAccessChecker->canAccess($user->getId());

           return true;
       }

       return false;
    }
}