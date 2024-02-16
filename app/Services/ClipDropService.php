<?php

namespace App\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\StreamFactoryInterface;
class ClipDropService
{
    private $apiKey;
    private $client;
    private $streamFactory;

    public function __construct($apiKey,StreamFactoryInterface $streamFactory)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client();
        $this->streamFactory = $streamFactory;
    }

    public function removeBackground($form)
    {
        $form['image_file'] = $this->streamFactory->createStreamFromFile($form['image_file']);
 
        $response = $this->client->request('POST', 'https://clipdrop-api.co/remove-background/v1', [
            'headers' => [
                'x-api-key' => $this->apiKey,
            ],
            'multipart' => [
                [
                    'name' => 'image_file',
                    'contents' => $form['image_file'],
                ]
            ],
        ]);

        // Example handling of the response
        $result = $response->getBody()->getContents();

        return $result;
    }

    public function cleanup($form)
    {
        $form['image_file'] = $this->streamFactory->createStreamFromFile($form['image_file']);
        $form['mask_file'] = $this->streamFactory->createStreamFromFile($form['mask_file']);
 
        $response = $this->client->request('POST', 'https://clipdrop-api.co/cleanup/v1', [
            'headers' => [
                'x-api-key' => $this->apiKey,
            ],
            'multipart' => [
                [
                    'name' => 'image_file',
                    'contents' => $form['image_file'],
                ],
                [
                    'name' => 'mask_file',
                    'contents' => $form['mask_file'],
                ],
            ],
        ]);

        // Example handling of the response
        $result = $response->getBody()->getContents();

        return $result;
    }
 
}
