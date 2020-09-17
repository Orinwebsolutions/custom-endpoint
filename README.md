# Custom Endpoint #

A simple plugin for setup a virtual endpoint, which is connect to [jsonplaceholder api](https://jsonplaceholder.typicode.com) and fetch api results.

## Description ##

Activating plugin will be setup a virtual page, example "https://sampledomain.com/my-api". So accessing the virtual page, user will be connect to https://jsonplaceholder.typicode.com api in the backend and fetch user details and display on the virtual page. Once api call fetch the results data and it will be store in database for 5 minutes expiration. This is decrease page loading time. Following features are integrated with in the plugin currently.

* Template override from current theme.
* Possibility to change virtual page name
* Caching data included
* Compatible with WordPress Multisite

## Installation ##
Dashboard Method:

1. Login to your WordPress admin and go to Plugins -> Add New
2. Click Upload Plugin button on top. And upload the "custom-endpoint.zip" file
3. Click "Install now",
4. When installation is complete, you’ll see “Plugin installed successfully.” Click the Activate Plugin button at the bottom of the page.

Here is [wordpress guide](https://wordpress.org/support/article/managing-plugins/#manual-upload-via-wordpress-admin) for more reference.

Upload Method:

1. Unzip "custom-endpoint.zip" file
2. Upload 'custom-endpoint' files to the '/wp-content/plugins/' directory using [FTP/SFTP](https://help.one.com/hc/en-us/articles/115005585709-How-do-I-connect-to-an-SFTP-server-with-FileZilla-)
3. Login to wordpress admin
4. Activate the plugin through the 'Plugins' menu in WordPress


## Features ##

1. Customize page template.
    1. Locate the template file inside plugin folder (\wp-content\plugins\custom-endpoint\public\partials), Copy the file "custom-endpoint-public-display.php" to you theme folder(\wp-content\plugins\your-theme)
    2. Add following code to you function.php file in your theme
        ```
        add_filter( 'template_filter', 'override_template' );
        
        function override_template(){
            return get_template_directory() . '/custom-endpoint-public-display.php';
        }
        ```

2. End user have possibility change virtual page name. 
    1. Login to the wordpress backend.  
    2. Access "End point settings" plugin setting page on located on left hand wordpress menu.
    3. So user able add their preferable name for virtual page. **Note** If the new page getting 404 follow below note instruction


### Note ###
If user experience 404 error message when you access the virtual page(https://sampledomain.com/my-api). Access the wordpress backend. From left hand menu access Settings -> Permalinks. Scroll down and click save button. Now you page should be ready for view.

### Todo Future releases ###
1. Improvement look and feel.
2. Data organizing
3. Ability adds API endpoint, user name, password data to be store in backend. Using these detail setup api connection.
4. language translation
5. Plugin autoupdates


**Contributor:** Amila Priyankara

**Contributor Email:** amilapriyankara16@gmail.com

**Tags:** api

**Tested up to:**  5.5.1

**License:** GPLv3 or later

**License URI:** http://www.gnu.org/licenses/gpl-3.0.html

## Changelog ##

### 1.0.0 - september 16, 2018 ###
* Initial release
