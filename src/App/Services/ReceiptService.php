<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class ReceiptService 
{
    public function __construct(private Database $db)
    {
        
    }

    public function validateFile(?array $file)
    {
        if(!$file || $file['error'] !== UPLOAD_ERR_OK)
        {
            throw new ValidationException([
                'receipt' => ['Failed to upload the file']
            ]);
        }
        
        $maxFileSizeMB = 3 * 1024 * 1204;

        if($file['size'] > $maxFileSizeMB){
            throw new ValidationException([
                'receipt' => ['File size is too large']
            ]);
        }

        dd($file);
    }
}