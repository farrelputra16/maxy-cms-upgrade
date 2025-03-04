<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LucianoTonet\GroqPHP\Groq;
use LucianoTonet\GroqPHP\GroqException;

class ChatbotController extends Controller
{
    protected $groq;

    public function __construct()
    {
        \Log::info('Initializing Groq client');
        $apiKey = env('GROK_API_KEY');
        if (!$apiKey) {
            \Log::error('GROK_API_KEY not found in environment');
            throw new \Exception('GROK_API_KEY not set in .env');
        }
        $this->groq = new Groq($apiKey);
        \Log::info('Groq client initialized successfully');
    }

    public function chat(Request $request)
    {
        \Log::info('Starting chat method');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            \Log::warning('Validation failed: ' . $validator->errors()->first());
            return response()->json([
                'error' => $validator->errors()->first()
            ], 422);
        }

        $userMessage = $request->input('message');
        \Log::info('User message received: ' . $userMessage);

        $botResponse = $this->generateResponse($userMessage);
        \Log::info('Bot response generated: ' . $botResponse);

        return response()->json([
            'reply' => $botResponse
        ]);
    }

    private function generateResponse($message)
    {
        try {
            // Request sederhana seperti curl manual
            $data = [
                'model' => 'deepseek-r1-distill-qwen-32b',
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ];
            \Log::info('Request data to Groq: ' . json_encode($data));

            $response = $this->groq->chat()->completions()->create($data);
            \Log::info('Grok API raw response: ' . json_encode($response));

            $content = $response['choices'][0]['message']['content'] ?? 'Maaf, saya tidak bisa merespons saat ini.';
            \Log::info('Final content to return: ' . $content);

            return $content;
        } catch (GroqException $e) {
            \Log::error('Grok API error: ' . $e->getMessage());
            \Log::error('Exception details: ' . json_encode([
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]));
            return 'Terjadi kesalahan saat menghubungi Groq: ' . $e->getMessage();
        } catch (\Exception $e) {
            \Log::error('Unexpected error: ' . $e->getMessage());
            return 'Terjadi kesalahan saat menghubungi Groq. Coba lagi nanti.';
        }
    }
}