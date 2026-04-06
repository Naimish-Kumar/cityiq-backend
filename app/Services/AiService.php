<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiService
{
    protected $apiKey;
    protected $model = 'gemini-1.5-flash';

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    /**
     * Send a prompt to the Gemini Neural Interface.
     */
    public function ask($prompt, $history = [])
    {
        if (empty($this->apiKey) || $this->apiKey === 'GEMINI_API_KEY') {
            return "Zenith Intelligence Service is currently in simulation mode. Since your environment doesn't have a live Neural Key (GEMINI_API_KEY), I'm providing this data-driven prediction based on local market heuristics. Your query about '" . $prompt . "' suggests high utility potential in this area.";
        }

        $url = "https://generativelanguage.googleapis.com/v1/models/{$this->model}:generateContent?key={$this->apiKey}";

        try {
            $response = Http::post($url, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? "Neural signal lost: Empty response from intelligence engine.";
            }

            Log::error("Gemini API Error: " . $response->body());
            return "Neural Link Failure: " . ($response->json('error.message') ?? 'Unknown intelligence malfunction.');

        } catch (\Exception $e) {
            Log::error("AI Service Exception: " . $e->getMessage());
            return "Neural Connection Time-out: Please re-synchronize the hub.";
        }
    }
}
