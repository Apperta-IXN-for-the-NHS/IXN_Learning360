# Exploring Situated Cognition in Education using Virtual Reality with Microsoft Azure & Unity
This project represents a proof of concept on how Gamification of Learning can be used to improve teaching and pedagogy, created by Team 9 of UCL's Industry Exchange Programme in collaboration with Avanade.
It consists of two main parts, a Unity package which contains a 360° video-player with custom functionalities like the ability to add clickable zones inside the video that display information when clicked, and a simple web page that allows uploading of videos to Azure Blob Storage, allowing the videos to then be played by the 360° video-player.

Link to demo video: https://youtu.be/e6Ks14o6EZ0

## Key functionalities of the project
- 360° video-player that allows users to:
  - Play/Pause/Stop/Loop video
  - Change volume and modify playback speed
  - Look around using mouse (or using a virtual headset)
  - Add custom zones inside the video with certain timestamps that when clicked display a pop-up with information
- Simple HTML upload page that allows users to: 
  - Create/Delete a new container inside an Azure Storage Account
  - Upload/Delete files to Azure Blob Storage and get the download links
  - Update a MySQL Database currently hosted on Azure with the download links 
  - Calling PHP Azure App Services
- Easy to integrate in other Unity projects, just by easiliy going to Assets -> Import Package -> Custom Package...

## How project works
- Users access the upload HTML page, use the create container and upload files buttons and upload the videos that they would like to be played by the video-player package.
- The videos are being uploaded to Azure Blob Storage, then a PHP App Service is called to update the MySQL Database that holds the record of all the videos and their blob storage links.
- When the video-player starts, it calls another PHP App Service to get the data stored in the database, retrieves the links for all the videos and can then play them by streaming from the blob storage.
- The functionalities of the video-player can be split into two main categories 
  - Custom highlight and click functionality, controlled by the AddZoneController, HighlightManager and by a custom shader built upon Unity's Panoramic Skybox Shader
  - UI Components that follow Unity's built in functionalities and are controlled by the following scripts: SoundSliderBehaviour, SettingsPopUpMgr, VideoProgressBar, ZonePopUpController and DragEventHandler

## Using and deploying the project
Prerequisites: - Unity Version 2019.2.17fi or higher
               - A text editor, preferable a modern one
               - Access to the internet
### The video-player package
1. Create new Unity project (Use Unity Version 2019.2.17f1 or higher)
2. Import package (`Assets -> Import Package -> Custom Package...`)
3. Hit `Play` button in Unity to run the demonstrator *

Note: Hitting the play button will lead to a sample video hosted by us on Azure to be played, if you want to play a custom video without deploying the upload file page, add your video to the StreamingAssets folder (under /Assets/StreamingAssets) and modify the VideoController script in the following way:
In the start method, comment the call to StartCoroutine(GetText()), and replace it by the following lines:
	videoPaths.Add(Path.Combine(Application.streamingAssetsPath, "<Replace this with the name of your video.mp4"));
	LoadVideo(videoPaths[0]);

### The upload files page
1. Create a storage account in the Azure Portal, more information can be found here: https://docs.microsoft.com/en-us/azure/storage/common/storage-account-create?tabs=azure-portal
2. Open the index.html found at /Upload_Website/index.html in a text editor and edit the accountName, sasString (can be easily found in the azure portal under the storage account/ encription keys) and containerName variables with your custom details
3. Create a MySQL Database. Note that at this point you can create your custom database or use Azure's Database for MySQL Server. This guide will only cover the second option. Follow the documentation to create an Azure Database for MySQL Server(https://docs.microsoft.com/en-us/azure/mysql/quickstart-create-mysql-server-database-using-azure-portal)\
4. Disable the SSL connection of your MySQL Database from the Azure Portal (found by clicking on the Database for MySQL Server that you created, going to Connection Security by using the left panel, and under the Enforce SSL Connection)
5. Modify the $host, $username, $password, $db_name variables in the two php files found at /PHP_GET_Script/index.php and PHP_Update_Script/index.php
6. Host the two php files on a web server of your choice. Continuing with the Azure Services, this link summarizes the process, and it requires only changind the index.php file with the ones provided by our project(https://docs.microsoft.com/en-us/azure/app-service/app-service-web-get-started-php)
 Use the provided buttons to create or delete a container, upload and delete files and list all the files in the current container
7. Open the index.html found at /Upload_Website/index.html in a text editor and edit the two POST request to be in the format: xhttp.open("POST","Add the link to the PHP Update script")
8. Open the VideoController class and update the https link with the link of the PHP file that performs the GET request: 
	using (UnityWebRequest www = UnityWebRequest.Get("Link to your PHP GET file"))
9. Open the index.html at /Upload_Website/index.html and use the provided buttons to update, upload, delete or list files
10. Open the Unity package and the videos you uploaded should now be played by the video-player
