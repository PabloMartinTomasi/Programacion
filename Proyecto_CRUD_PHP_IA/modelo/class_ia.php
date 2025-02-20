<?php
class IA{
    private $url;
    private $puerto;

    public function __construct($puerto = 1234){
        $this->puerto = $puerto;
        $this->url = "http://localhost:$puerto/v1/chat/completions";
    }

    public function RespuestaIA($pregunta)
    {
        if (empty($pregunta)) {
            return '<p style="color: red;">La pregunta no puede estar vacía.</p>';
        }

        $datos = [
            "model" => "llama-3.2-1b-instruct",
            "messages" => [
                ["role" => "system", "content" => "Responde siempre en español, siempre menciona cuántas personas puede servir la receta al final de la respuesta."],
                ["role" => "user", "content" => $pregunta]
            ],
            "temperature" => 0.7,
            "max_tokens" => -1,
            "stream" => false
        ];

        $jsonDatos = json_encode($datos);

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonDatos)
        ]);

        $respuesta = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = '<p style="color: red;">Error en cURL: ' . curl_error($ch) . '</p>';
            curl_close($ch);
            return $error;
        }

        curl_close($ch);

        $datos_respuesta = json_decode($respuesta, true);
        return $datos_respuesta['choices'][0]['message']['content'] ?? '<p style="color: red;">No se recibió una respuesta válida.</p>';
    }
}