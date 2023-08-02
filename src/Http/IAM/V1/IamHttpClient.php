<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\HttpClient;
use Twin\Sdk\Http\IAM\V1\Request\UserListRequest;
use Twin\Sdk\Http\IAM\V1\Response\User\UserDataResponse;
use Twin\Sdk\Http\IAM\V1\Response\User\UserListResponse;
use Twin\Sdk\Http\IAM\V1\Response\User\UserSettingDefinitionsResponse;
use Twin\Sdk\Http\IAM\V1\Response\User\UserSettingsResponse;
use Twin\Sdk\Http\Request\UploadFilesRequest;
use Twin\Sdk\Http\Response\DownloadFileResponse;
use Twin\Sdk\Http\Response\UploadFilesResponse;

class IamHttpClient extends HttpClient
{
    final public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        parent::__construct(
            'https://iam.twin24.ai/api/v1',
            'https://iam.dev.twin24.ai/api/v1',
            $authenticator,
            $client,
        );
    }

    public function getUserSettingDefinitions(): UserSettingDefinitionsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'users/settings',
            UserSettingDefinitionsResponse::class,
            true
        );
    }

    public function getAuthenticatedUserData(): UserDataResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'users/me',
            UserDataResponse::class,
            true
        );
    }

    public function getAuthenticatedUserSettings(string $keys = null): UserSettingsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "users/me/settings",
            UserSettingsResponse::class,
            true,
            [
                'keys' => $keys
            ]
        );
    }

    public function getUserData(int $userId): UserDataResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "users/$userId",
            UserDataResponse::class,
            true
        );
    }

    public function getUserSettings(int $userId, string $keys = null): UserSettingsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "users/$userId/settings",
            UserSettingsResponse::class,
            true,
            [
                'keys' => $keys
            ]
        );
    }

    public function getUserList(UserListRequest $request): UserListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'users',
            UserListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function uploadFiles(UploadFilesRequest $request): UploadFilesResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'files',
            UploadFilesResponse::class,
            true,
            $request->toArray(true),
            $request->getHeaders()
        );
    }

    public function downloadFile(string $fileId): DownloadFileResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "files/$fileId",
            DownloadFileResponse::class,
            true
        );
    }
}