<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * Upload dan konversi gambar ke WebP.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string $filename
     * @param int $quality
     * @return string|null  // nama file hasil upload
     */
    public function uploadToWebP(array $options)
    {
        $imageDisk = $options['imageDisk'] ?? 'public';
        $file      = $options['file'] ?? null;
        $directory = $options['directory'] ?? '';
        $filename  = $options['filename'] ?? time();
        $quality   = $options['quality'] ?? 90;
        $maxWidth  = $options['maxWidth'] ?? 800;
        $oldFile   = $options['oldFile'] ?? null;
        // Ambil extension asli
        $ext = strtolower($file->getClientOriginalExtension());
        // Buka image sesuai mime type
        $mime = $file->getMimeType();
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $img = @imagecreatefromjpeg($file->getRealPath());
                break;
            case 'image/png':
                $img = @imagecreatefrompng($file->getRealPath());
                break;
            case 'image/webp':
                $img = @imagecreatefromwebp($file->getRealPath());
                break;
            default:
                return null; // format tidak valid
        }

        // Cek apakah gambar berhasil dibuka
        if (! $img) {
            return null;
        }

        // Hapus file lama kalau ada
        if ($oldFile && Storage::disk($imageDisk)->exists($directory . '/' . $oldFile)) {
            Storage::disk($imageDisk)->delete($directory . '/' . $oldFile);
        }

        $originalWidth  = imagesx($img);
        $originalHeight = imagesy($img);
        if ($originalWidth <= 0 || $originalHeight <= 0) {
            imagedestroy($img);
            return null; // file corrupt atau tidak valid
        }

        if ($originalWidth > $maxWidth) {
            $newWidth  = $maxWidth;
            $newHeight = intval(($originalHeight / $originalWidth) * $newWidth);

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
            imagedestroy($img);
            $img = $resizedImg;
        }

        // Nama file final
        $filename .= '.webp';

        $tempDir  = Storage::disk($imageDisk)->path('images/temp');

        // Buat file sementara
        $tempPath = $tempDir . '/' . uniqid() . '.webp';
        imagewebp($img, $tempPath, $quality);
        imagedestroy($img);

        // Upload ke Storage dari file sementara
        Storage::disk($imageDisk)->putFileAs($directory, new \Illuminate\Http\File($tempPath), $filename);

        // Hapus file sementara
        @unlink($tempPath);

        return $filename;
    }
}
