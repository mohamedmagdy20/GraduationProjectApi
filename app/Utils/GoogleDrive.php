<?php

namespace App\Utils;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GoogleDrive {

    public $gClient;

    public function __construct()
    {
        $this->gClient = new \Google_Client();
        
        $this->gClient->setApplicationName('Webclient2'); // ADD YOUR AUTH2 APPLICATION NAME (WHEN YOUR GENERATE SECRATE KEY)
        $this->gClient->setClientId('157468763799-euk2inkicv4n0ch540ti3b41f448dk57.apps.googleusercontent.com');
        $this->gClient->setClientSecret('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');
        
        $this->gClient->setRedirectUri(route('google.login'));
        $this->gClient->setDeveloperKey('AIzaSyCBHhSWiaHn-wuAA15CpCjS1ZqjVfaLPps');
        $this->gClient->setScopes(array(               
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));
        
        $this->gClient->setAccessType("offline");
        
        $this->gClient->setApprovalPrompt("force");

    }


    public function googleLogin(Request $request)
    {
        $google_oauthV2 = new \Google_Service_Oauth2($this->gClient);
        $user = Patient::first();

        if (! $request->get('code')){

            $authUrl = $this->gClient->createAuthUrl();
            return response()->json(['url'=>$authUrl]);
        }else{

            $this->gClient->authenticate($request->get('code'));
            $request->session()->put('token', $this->gClient->getAccessToken());
        }

        if ($request->session()->get('token')){

            $this->gClient->setAccessToken($request->session()->get('token'));
        }


        if ($this->gClient->getAccessToken()){

       
            $user->access_token = json_encode($request->session()->get('token'));

            $user->save();       
            return 'Success';
      
        }

        // $google_oauthV2 = new \Google_Service_Oauth2($this->gClient);
        // $user = Patient::first();
        // if ($request->get('code')){
        //     $this->gClient->authenticate($request->get('code'));
        //     $accessToken = $this->gClient->getAccessToken();
        //     // Store the access token in your database or cache
        //     $user->access_token = json_encode($accessToken);
        //     $user->save();
        //     return response()->json(['message' => 'Success']);
        // }
    
        // If there's no access token in the request, return the Google login URL
        // $authUrl = $this->gClient->createAuthUrl();
        // return response()->json(['url' => $authUrl]);

    }

    public function googleDriveFilePpload($id,$filePath)
    {
        $service = new \Google_Service_Drive($this->gClient);

        $user= Patient::find($id);

        $this->gClient->setAccessToken(json_decode($user->access_token,true));

        if ($this->gClient->isAccessTokenExpired()) {
            
            // SAVE REFRESH TOKEN TO SOME VARIABLE
            $refreshTokenSaved = $this->gClient->getRefreshToken();

            // UPDATE ACCESS TOKEN
            $this->gClient->fetchAccessTokenWithRefreshToken($refreshTokenSaved);               
            
            // PASS ACCESS TOKEN TO SOME VARIABLE
            $updatedAccessToken = $this->gClient->getAccessToken();
            
            // APPEND REFRESH TOKEN
            $updatedAccessToken['refresh_token'] = $refreshTokenSaved;
            
            // SET THE NEW ACCES TOKEN
            $this->gClient->setAccessToken($updatedAccessToken);
            
            $user->access_token=$updatedAccessToken;
            
            $user->save();                
        }
        
        $fileMetadata = new \Google_Service_Drive_DriveFile(array(
            'name' => Carbon::now(),  
            'parents'=>array('18xbE1HV2_CG8G--x4kRxbe77sTB33jvS'),           // ADD YOUR GOOGLE DRIVE FOLDER NAME
            'mimeType' => 'application/vnd.google-apps.folder'));

        $folder = $service->files->create($fileMetadata,
         array('fields' => 'id'));

        // printf("Folder ID: %s\n", $folder->id);

        foreach($filePath as $index => $filep)
        {
            $file = new \Google_Service_Drive_DriveFile(array('name' => time().basename($filep[$index]) ,'parents' => array($folder->id)));

            $result = $service->files->create($file, array(

                'data' => file_get_contents($filep), // ADD YOUR FILE PATH WHICH YOU WANT TO UPLOAD ON GOOGLE DRIVE
                'mimeType' => 'application/octet-stream',
                'uploadType' => 'media'
            ));

        }
        
        // GET URL OF UPLOADED FILE

        $url='https://drive.google.com/open?id='.$folder->id;
        return $url;
        // dd($result);

    }


    // public function grantFolderAccess($folderId, $email)
    // {
    //     $permission = new \Google_Service_Drive_Permission([
    //         'type' => 'user',
    //         'role' => 'writer',
    //         'emailAddress' => $email,
    //     ]);

    //     $this->driveService->permissions->create($folderId, $permission);
    // }

}