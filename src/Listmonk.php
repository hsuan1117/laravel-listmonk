<?php

namespace Hsuan\Listmonk;

use Hsuan\Listmonk\Http\Client;

class Listmonk
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // --- Lists API ---

    /**
     * Retrieve all lists.
     */
    public function getLists($filters = [])
    {
        return $this->client->request('GET', '/api/lists', $filters);
    }

    /**
     * Retrieve public lists.
     */
    public function getPublicLists()
    {
        return $this->client->request('GET', '/api/public/lists');
    }

    /**
     * Retrieve a specific list.
     */
    public function getList($listId)
    {
        return $this->client->request('GET', "/api/lists/{$listId}");
    }

    /**
     * Create a new list.
     * $data: ['name', 'type', 'optin', 'tags', ...]
     */
    public function createList(array $data)
    {
        return $this->client->request('POST', '/api/lists', $data);
    }

    /**
     * Update a list.
     */
    public function updateList($listId, array $data)
    {
        return $this->client->request('PUT', "/api/lists/{$listId}", $data);
    }

    /**
     * Delete a specific list.
     */
    public function deleteList($listId)
    {
        return $this->client->request('DELETE', "/api/lists/{$listId}");
    }

    /**
     * Delete multiple lists.
     * $listIds: [1, 2, 3]
     */
    public function deleteLists(array $listIds)
    {
        return $this->client->request('DELETE', '/api/lists', ['ids' => $listIds]);
    }

    // --- Subscribers API ---

    public function getSubscribers($filters = [])
    {
        return $this->client->request('GET', '/api/subscribers', $filters);
    }

    public function createSubscriber(array $data)
    {
        return $this->client->request('POST', '/api/subscribers', $data);
    }
}
