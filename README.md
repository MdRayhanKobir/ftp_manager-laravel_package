# Laravel FTP Manager

A simple Laravel package to manage FTP operations like upload, download, list files, rename, delete, and more.

---

## 📦 Installation
```bash
composer require ftpmanager/laravel-ftp
```

## 🧪 Example Controller Usage (All Methods)

You can use the FTP Manager in a controller using either the **Facade** or the **FtpManager class** directly.

---

### 🧱 How to user

```php
use Ftp;

class FtpController extends Controller
{
    public function connectManual()
    {
        Ftp::connect([
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port' => env('FTP_PORT', 21),
        ]);

        return 'Connected manually';
    }

    public function listFiles()
    {
        return response()->json(Ftp::list('/'));
    }

    public function uploadFile()
    {
        return Ftp::upload(storage_path('app/test.txt'), '/remote-test.txt')
            ? 'Upload successful'
            : 'Upload failed';
    }

    public function downloadFile()
    {
        return Ftp::download('/remote-test.txt', storage_path('app/test_downloaded.txt'))
            ? 'Download successful'
            : 'Download failed';
    }

    public function deleteFile()
    {
        return Ftp::delete('/remote-test.txt')
            ? 'File deleted'
            : 'Delete failed';
    }

    public function renameFile()
    {
        return Ftp::rename('/old.txt', '/new.txt')
            ? 'File renamed'
            : 'Rename failed';
    }

    public function createDirectory()
    {
        return Ftp::makeDir('/new-folder')
            ? 'Directory created'
            : 'Failed to create directory';
    }

    public function deleteDirectory()
    {
        return Ftp::deleteDir('/new-folder')
            ? 'Directory deleted'
            : 'Failed to delete directory';
    }

    public function getFileSize()
    {
        return 'Size: ' . Ftp::fileSize('/file.txt') . ' bytes';
    }

    public function getModifiedTime()
    {
        return 'Modified: ' . date('Y-m-d H:i:s', Ftp::fileModifiedTime('/file.txt'));
    }
}




