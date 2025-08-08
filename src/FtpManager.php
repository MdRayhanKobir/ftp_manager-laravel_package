<?php
namespace FtpManager;
class FtpManager{
    protected $connection;

    public function connect($config){
        $this->connection = ftp_connect($config['host'],$config['port']?? 21);
        if (!$this->connection) {
            throw new \Exception("FTP connection failed.");
        }

        $login = ftp_login($this->connection,$config['username'],$config['password']);
        if(!$login){
            throw new \Exception('FTP connection failed');
        }
        ftp_pasv($this->connection,true);
        return true;
    }

    public function list($directory='.'){
        return ftp_nlist($this->connection,$directory);
    }

    public function upload($localFile, $remotFile){
        return ftp_put($this->connection,$remotFile,$localFile,FTP_BINARY);
    }

    public function download($remotFile,$localFile){
        return ftp_get($this->connection,$localFile,$remotFile,FTP_BINARY);
    }

    public function delete($remotFile){
        return ftp_delete( $this->connection,$remotFile);
    }

    public function rename($oldName,$newName){
        return ftp_rename($this->connection,$oldName,$newName);
    }

    public function makeDir($directory){
        return ftp_mkdir($this->connection,$directory);
    }

    public function deleteDir($directory){
        return ftp_rmdir($this->connection,$directory);
    }

    public function fileSize($remotFile){
        return ftp_size($this->connection,$remotFile);
    }

    public function fileModifiedTime($remotFile){
        return ftp_mdtm($this->connection,$remotFile);
    }

    public function __destruct(){
        if($this->connection){
            ftp_close($this->connection);
        }
    }

    


}