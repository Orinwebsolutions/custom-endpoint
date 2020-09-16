# Custom Endpoint #

A simple plugin for setup a virtual endpoint, which is connect to [jsonplaceholder api](https://jsonplaceholder.typicode.com) and display details result.

## Description ##

Activating plugin will be setup initial virtual page as following exmaple "https://sampledomain.com/my-api". So accessing the virtual page, you will be connect to https://jsonplaceholder.typicode.com api and fetching user details in-order display on the page. Once fetch the result data will store in database in time manner. Which is provide caching mechanism and it will also increase page loading. Following features are integrated with in the plugin.

* Template override
* Changing virtual page name
* Page setup as a virtual page, so this virtual page won’t be indexing under SEO.
* Caching data included
* Compatible with WordPress Multisite

## Installation ##
Dashboard Method:

1. Login to your WordPress admin and go to Plugins -> Add New
2. Click Upload Plugin button on top. And upload the "custom-endpoint.zip" file
3. Click "Install now",
4. When installation is complete, you’ll see “Plugin installed successfully.” Click the Activate Plugin button at the bottom of the page.
You can access [wordpress guide](https://wordpress.org/support/article/managing-plugins/#manual-upload-via-wordpress-admin) for more refernce.

Upload Method:

1. Upload 'custom-endpoint' to the '/wp-content/plugins/' directory using FTP
2. Activate the plugin through the 'Plugins' menu in WordPress

## Features ##

1. Customize page template.
    1. Locate the template file inside plugin folder (\wp-content\plugins\custom-endpoint\public\partials), Copy the file "custom-endpoint-public-display.php" to you theme folder(\wp-content\plugins\your-theme)
    2. Add following code to you function.php file in your theme
        
        add_filter( 'template_filter', 'override_temeplate' );
        function override_temeplate(){
            return get_template_directory() . '/custom-endpoint-public-display.php';
        }
2. End user have posibility change virtual page name. Login to the backend. On the left hand menu access "End point settings" to direct to settings page.

### Note ###
If experience seen 404 error message when you access the virtual page(https://sampledomain.com/my-api). Login to the backend. From left hand menu access Settings -> Permerlinks. Click save button on below.

### Todo Future releases ###
1. Improvement look and feel.
2. Data organizing
3. Api endpoint, user name, password data to be store in backend. Using these detail setup api connection.
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
