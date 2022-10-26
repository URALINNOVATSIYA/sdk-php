<?php

declare(strict_types=1);

namespace Twin\Http\IAM;

use GuzzleHttp\Promise\PromiseInterface;
use Twin\Http\Authenticator;
use Twin\Http\HttpClient;
use Twin\Http\IAM\Request\UserListRequest;
use Twin\Http\IAM\Response\UserDataResponse;
use Twin\Http\IAM\Response\UserListResponse;
use Twin\Http\IAM\Response\UserSettingDefinitionsResponse;
use Twin\Http\IAM\Response\UserSettingsResponse;
use Twin\Http\Request\UploadFilesRequest;
use Twin\Http\Response\DownloadFileResponse;
use Twin\Http\Response\UploadFilesResponse;

class IamHttpClient extends HttpClient
{
    public function __construct(Authenticator $authenticator)
    {
        parent::__construct('https://iam.twin24.ai/api/v1', $authenticator);
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