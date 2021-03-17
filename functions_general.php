/* If you want to use decentralized blockchain file storage like filebase.com you must make a little change in 
/* assets/includes/functions_general.php

else if ($wo['config']['amazone_s3'] == 1){
        if (empty($wo['config']['amazone_s3_key']) || empty($wo['config']['amazone_s3_s_key']) || empty($wo['config']['region']) || empty($wo['config']['bucket_name'])) {
            return false;
        }
        include_once('assets/libraries/s3/aws-autoloader.php');
        $s3 = new S3Client([
				'version' 			=> 'latest',
                'region'            => 'us-east-1',
				'signature_version' => 'v4',
				'endpoint' => 'https://s3.filebase.com',
            'credentials' => [
                'key'    => $wo['config']['amazone_s3_key'],
                'secret' => $wo['config']['amazone_s3_s_key'],
            ]
        ]);
        $s3->putObject([
            'Bucket' => $wo['config']['bucket_name'],
            'Key'    => $filename,
            'Body'   => fopen($filename, 'r+'),
            'ACL'    => 'public-read',
            'CacheControl' => 'max-age=3153600',
        ]);
        if (empty($config['delete'])) {
            if ($s3->doesObjectExist($wo['config']['bucket_name'], $filename)) {
                if (empty($config['amazon'])) {
                    @unlink($filename);
                }
                return true;
            }
        } else {
            return true;
        }
    } 
