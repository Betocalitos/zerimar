<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Intervention\Image\Exception\NotSupportedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Handle Intervention Image errors (GD missing/incomplete) with a user-friendly Spanish message
        if ($exception instanceof NotSupportedException
            || ($exception->getPrevious() instanceof NotSupportedException)
            || (strpos($exception->getMessage(), 'Imagecreatefromjpeg') !== false
                || strpos($exception->getMessage(), 'Imagecreatefrompng') !== false
                || strpos($exception->getMessage(), 'Imagecreatefromwebp') !== false
                || strpos($exception->getMessage(), 'imagecreatetruecolor') !== false)
        ) {
            logger()->error('Intervention Image error: ' . $exception->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'No se pudieron procesar las imágenes. Contacte al administrador del sitio.',
                ], 500);
            }

            abort(500, 'No se pudieron procesar las imágenes. Contacte al administrador del sitio.');
        }

        // Handle RuntimeException from ImageService (e.g., GD processing failure)
        if ($exception instanceof \RuntimeException && strpos($exception->getMessage(), 'procesar las imágenes') !== false) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $exception->getMessage(),
                ], 500);
            }

            abort(500, $exception->getMessage());
        }

        return parent::render($request, $exception);
    }
}
