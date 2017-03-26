<?php

/*
 * -----------------------------------------------------------------------------
 * |                                                                           |
 * |                                MAIN ROUTES                                |
 * |                                                                           |
 * -----------------------------------------------------------------------------
 * | This group will handle all the routes for the main website. Initially,    |
 * | this will only lead to a landing page bundled with Insipinia but can be   |
 * | extended to become a full featured content management system later on.    |
 * -----------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Main'], function () {
    
    # Home Page
    Route::get('/', [
        'as' => 'home',
        'uses' => 'IndexController@home'
    ]);
    
});

Route::group(['namespace' => 'Panel', 'prefix' => 'panel', 'middleware' => 'auth'], function () {
    
    /*   
     * -------------------------------------------------------------------------
     * |                                                                       |
     * |                           USER PANEL ROUTES                           |
     * |                   "App\Http\Controllers\Panel\User"                   |
     * |                        website.com/panel/user                         |
     * |                                                                       |
     * -------------------------------------------------------------------------
    */
    
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        
        # Dashboard
        Route::get('/', [
            'as' => 'panel.user',
            'uses' => 'DashboardController@index'
        ]);
        
        # Profile
        Route::group(['prefix' => 'profile'], function() {
            
            # Settings
            Route::get('/', [
                'as' => 'profile',
                'uses' => 'Profile@index'
            ]);        
            
            # Settings-Update
            Route::put('details/update', [
                'as' => 'profile.update.details',
                'uses' => 'Profile@updateDetails'
            ]);   
            
            Route::put('login-details/update', [
                'as' => 'profile.update.login-details',
                'uses' => 'Profile@updateLoginDetails'
            ]);
            
            # Settings-Update-Avatar
            Route::post('avatar/update', [
                'as' => 'profile.update.avatar',
                'uses' => 'Profile@updateAvatar'
            ]);        
            
            # Settings-Update-Avatar-External
            Route::post('avatar/update/external', [
                'as' => 'profile.update.avatar-external',
                'uses' => 'Profile@updateAvatarExternal'
            ]);        
            
            # Settings-Update-Social
            Route::put('social-networks/update', [
                'as' => 'profile.update.social-networks',
                'uses' => 'Profile@updateSocialNetworks'
            ]);             
            
            Route::post('two-factor/enable', [
                'as' => 'profile.two-factor.enable',
                'uses' => 'Profile@enableTwoFactorAuth'
            ]);
            
            Route::post('two-factor/disable', [
                'as' => 'profile.two-factor.disable',
                'uses' => 'Profile@disableTwoFactorAuth'
            ]);            
            
        });
        
        # Sessions
        Route::group(['prefix' => 'sessions'], function() {
            
            # Sessions
            Route::get('profile/sessions', [
                'as' => 'profile.sessions',
                'uses' => 'Profile@sessions'
            ]);
            
            Route::match(['post', 'get', 'delete'],'profile/sessions/{session}/invalidate', [
                'as' => 'profile.sessions.invalidate',
                'uses' => 'Profile@invalidateSession'
            ]);         
            
        });
        
    });
    
    /*   
     * -------------------------------------------------------------------------
     * |                                                                       |
     * |                          ADMIN PANEL ROUTES                           |
     * |                  "App\Http\Controllers\Panel\Admin"                   |
     * |                        website.com/panel/admin                        |
     * |                                                                       |
     * -------------------------------------------------------------------------
    */
    
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        
        # Dashboard
        Route::get('/', [
            'as' => 'panel.admin',
            'uses' => 'DashboardController@index'
        ]);
        
        # Estates
        Route::group(['prefix' => 'estates'], function() {
        
            # Manage
            Route::get('/', [
                'as' => 'estates.manage',
                'uses' => 'EstatesController@manage'
            ]);
            
            # Add
            Route::post('add', [
                'as' => 'estates.add',
                'uses' => 'EstatesController@add'
            ]);
            
            # Edit
            Route::get('edit', [
                'as' => 'estates.edit',
                'uses' => 'EstatesController@edit'
            ]);
            
            # Update
            Route::post('update', [
                'as' => 'estates.update',
                'uses' => 'EstatesController@update'
            ]);
            
            # Delete
            Route::post('delete', [
                'as' => 'estates.delete',
                'uses' => 'EstatesController@delete'
            ]);
            
        });
        
        # Properties
        Route::group(['prefix' => 'properties'], function() {
            
            # Manage
            Route::get('/', [
                'as' => 'properties.manage',
                'uses' => 'PropertiesController@manage'
            ]);
            
            # Manage
            Route::get('create', [
                'as' => 'properties.create',
                'uses' => 'PropertiesController@create'
            ]);
            
            # Add
            Route::post('add', [
                'as' => 'properties.add',
                'uses' => 'PropertiesController@add'
            ]);
            
            # Edit
            Route::get('edit', [
                'as' => 'properties.edit',
                'uses' => 'PropertiesController@edit'
            ]);
            
            # Update
            Route::post('update', [
                'as' => 'properties.update',
                'uses' => 'PropertiesController@update'
            ]);
            
            # Delete
            Route::post('delete', [
                'as' => 'properties.delete',
                'uses' => 'PropertiesController@delete'
            ]);
            
        });
        
        # News
        Route::group(['prefix' => 'news'], function() {
            
            # Manage
            Route::get('/', [
                'as' => 'news.manage',
                'uses' => 'NewsController@manage'
            ]);
            
            # Add
            Route::post('add', [
                'as' => 'news.add',
                'uses' => 'NewsController@add'
            ]);
            
            # Edit
            Route::get('edit', [
                'as' => 'news.edit',
                'uses' => 'NewsController@edit'
            ]);
            
            # Update
            Route::post('update', [
                'as' => 'news.update',
                'uses' => 'NewsController@update'
            ]);
            
            # Delete
            Route::post('delete', [
                'as' => 'news.delete',
                'uses' => 'NewsController@delete'
            ]);
            
            # Categories
            Route::group(['prefix' => 'categories'], function() {
                
                # Manage
                Route::get('/', [
                    'as' => 'news.categories.manage',
                    'uses' => 'NewsCategoriesController@manage'
                ]);
                
                # Add
                Route::post('add', [
                    'as' => 'news.categories.add',
                    'uses' => 'NewsCategoriesController@add'
                ]);
                
                # Edit
                Route::get('edit', [
                    'as' => 'news.categories.edit',
                    'uses' => 'NewsCategoriesController@edit'
                ]);
                
                # Update
                Route::post('update', [
                    'as' => 'news.categories.update',
                    'uses' => 'NewsCategoriesController@update'
                ]);
                
                # Delete
                Route::post('delete', [
                    'as' => 'news.categories.delete',
                    'uses' => 'NewsCategoriesController@delete'
                ]);                
                
            });
            
        });
        
        # Downloads
        Route::group(['prefix' => 'downloads'], function() {
            
            # Manage
            Route::get('/', [
                'as' => 'downloads.manage',
                'uses' => 'DownloadsController@manage'
            ]);
            
            # Add
            Route::post('add', [
                'as' => 'downloads.add',
                'uses' => 'DownloadsController@add'
            ]);
            
            # Edit
            Route::get('edit', [
                'as' => 'downloads.edit',
                'uses' => 'DownloadsController@edit'
            ]);
            
            # Update
            Route::post('update', [
                'as' => 'downloads.update',
                'uses' => 'DownloadsController@update'
            ]);
            
            # Delete
            Route::post('delete', [
                'as' => 'downloads.delete',
                'uses' => 'DownloadsController@delete'
            ]);
        
            # Download Types
            Route::group(['prefix' => 'types'], function() {
                
                # Manage
                Route::get('/', [
                    'as' => 'downloads.types.manage',
                    'uses' => 'DownloadTypesController@manage'
                ]);
                
                # Add
                Route::post('add', [
                    'as' => 'downloads.types.add',
                    'uses' => 'DownloadTypesController@add'
                ]);
                
                # Edit
                Route::get('edit', [
                    'as' => 'downloads.types.edit',
                    'uses' => 'DownloadTypesController@edit'
                ]);
                
                # Update
                Route::post('update', [
                    'as' => 'downloads.types.update',
                    'uses' => 'DownloadTypesController@update'
                ]);
                
                # Delete
                Route::post('delete', [
                    'as' => 'downloads.types.delete',
                    'uses' => 'DownloadTypesController@delete'
                ]);
                
            });
            
        });
        
        # Designs
        Route::group(['prefix' => 'designs'], function() {
            
            # Manage
            Route::get('/', [
                'as' => 'designs.manage',
                'uses' => 'DesignsController@manage'
            ]);
            
            # Add
            Route::post('add', [
                'as' => 'designs.add',
                'uses' => 'DesignsController@add'
            ]);
            
            # Edit
            Route::get('edit', [
                'as' => 'designs.edit',
                'uses' => 'DesignsController@edit'
            ]);
            
            # Update
            Route::post('update', [
                'as' => 'designs.update',
                'uses' => 'DesignsController@update'
            ]);
            
            # Delete
            Route::post('delete', [
                'as' => 'designs.delete',
                'uses' => 'DesignsController@delete'
            ]);
            
        });
        
        # User Management
        Route::group(['prefix' => 'users'], function() {    
            
            # Manage Users
            Route::get('/', [
                'as' => 'user.list',
                'uses' => 'Users@index'
            ]);
            
            Route::get('create', [
                'as' => 'user.create',
                'uses' => 'Users@create'
            ]);
            
            Route::post('create', [
                'as' => 'user.store',
                'uses' => 'Users@store'
            ]);
            
            Route::get('{user}/show', [
                'as' => 'user.show',
                'uses' => 'Users@view'
            ]);
            
            Route::get('{user}/edit', [
                'as' => 'user.edit',
                'uses' => 'Users@edit'
            ]);
            
            Route::post('{user}/updatecontact', [
                'as' => 'user.updatecontact',
                'uses' => 'Users@updatecontact'
                ]);
                
            Route::post('{user}/removecontact',[
                'as' => 'user.removecontact',
                'uses' => 'Users@removecontact'
            ]);
            
            Route::post('{user}/setprimarycontact',[
                'as' => 'user.setprimarycontact',
                'uses' => 'Users@setprimarycontact'
            ]);
            
            Route::post('{user}/updatebilling', [
                'as' => 'user.updatebilling',
                'uses' => 'Users@updatebilling'
                ]);
                
            Route::post('{user}/removebilling',[
                'as' => 'user.removebilling',
                'uses' => 'Users@removebilling'
            ]);
            
            Route::post('{user}/setprimarybilling',[
                'as' => 'user.setprimarybilling',
                'uses' => 'Users@setprimarybilling'
            ]);
            
            Route::post('{user}/sethiddenuser',[
                'as' => 'user.sethiddenuser',
                'uses' => 'Users@sethiddenuser'
            ]);
            
            Route::post('{user}/removehiddenuser',[
                'as' => 'user.removehiddenuser',
                'uses' => 'Users@removehiddenuser'
            ]);
            
            Route::post('{user}/setcanseehiddenuser',[
                'as' => 'user.setcanseehiddenuser',
                'uses' => 'Users@setcanseehiddenuser'
            ]);
            
            Route::post('{user}/removecanseehiddenuser',[
                'as' => 'user.removecanseehiddenuser',
                'uses' => 'Users@removecanseehiddenuser'
            ]);
            
            Route::put('{user}/update/details', [
                'as' => 'user.update.details',
                'uses' => 'Users@updateDetails'
            ]);
            
            Route::put('{user}/update/login-details', [
                'as' => 'user.update.login-details',
                'uses' => 'Users@updateLoginDetails'
            ]);
            
            Route::delete('{user}/delete', [
                'as' => 'user.delete',
                'uses' => 'Users@delete'
            ]);
            
            Route::post('{user}/update/avatar', [
                'as' => 'user.update.avatar',
                'uses' => 'Users@updateAvatar'
            ]);
            
            Route::post('{user}/update/avatar/external', [
                'as' => 'user.update.avatar.external',
                'uses' => 'Users@updateAvatarExternal'
            ]);
            
            Route::post('{user}/update/social-networks', [
                'as' => 'user.update.socials',
                'uses' => 'Users@updateSocialNetworks'
            ]);
            
            Route::get('{user}/sessions', [
                'as' => 'user.sessions',
                'uses' => 'Users@sessions'
            ]);
            
            Route::delete('{user}/sessions/{session}/invalidate', [
                'as' => 'user.sessions.invalidate',
                'uses' => 'Users@invalidateSession'
            ]);
            
            Route::post('{user}/two-factor/enable', [
                'as' => 'user.two-factor.enable',
                'uses' => 'Users@enableTwoFactorAuth'
            ]);
            
            Route::post('{user}/two-factor/disable', [
                'as' => 'user.two-factor.disable',
                'uses' => 'Users@disableTwoFactorAuth'
            ]);
            
        });           
        
        # Roles
        Route::group(['prefix' => 'role'], function () {
            
            Route::get('/', [
                'as' => 'role.index',
                'uses' => 'Roles@index'
            ]);
            
            Route::get('create', [
                'as' => 'role.create',
                'uses' => 'Roles@create'
            ]);
            
            Route::post('store', [
                'as' => 'role.store',
                'uses' => 'Roles@store'
            ]);
            
            Route::get('{role}/edit', [
                'as' => 'role.edit',
                'uses' => 'Roles@edit'
            ]);
            
            Route::put('{role}/update', [
                'as' => 'role.update',
                'uses' => 'Roles@update'
            ]);
            
            Route::get('{role}/delete', [
                'as' => 'role.delete',
                'uses' => 'Roles@delete'
            ]);            
            
        });
        
        # Permissions
        Route::post('permission/save', [
            'as' => 'permission.save',
            'uses' => 'Permissions@saveRolePermissions'
        ]);
        
        Route::resource('permission', 'Permissions');
        
        # Activity
        Route::get('activity', [
            'as' => 'activity.index',
            'uses' => 'Activity@index'
        ]);
        
        Route::get('activity/user/{user}/log', [
            'as' => 'activity.user',
            'uses' => 'Activity@userActivity'
        ]);          
        
        # Website Settings
        Route::group(['prefix' => 'settings'], function() {
            
            # General Settings
            Route::get('general', [
                'as' => 'settings.general',
                'uses' => 'Configuration@general',
                'middleware' => 'permission:settings.general'
            ]);
            
            Route::post('general/update', [
                'as' => 'settings.general.update',
                'uses' => 'Configuration@update',
                'middleware' => 'permission:settings.general'
            ]);            
            
            # Authentication and Registration
            Route::get('auth', [
                'as' => 'settings.auth',
                'uses' => 'Configuration@auth',
                'middleware' => 'permission:settings.auth'
            ]);
            
            Route::post('auth/update', [
                'as' => 'settings.auth.update',
                'uses' => 'Configuration@update',
                'middleware' => 'permission:settings.auth'
            ]);
            
            // Only allow managing 2FA if AUTHY_KEY is defined inside .env file
            if (env('AUTHY_KEY')) {
                Route::post('auth/2fa/enable', [
                    'as' => 'settings.auth.2fa.enable',
                    'uses' => 'Configuration@enableTwoFactor',
                    'middleware' => 'permission:settings.auth'
                ]);
            
                Route::post('auth/2fa/disable', [
                    'as' => 'settings.auth.2fa.disable',
                    'uses' => 'Configuration@disableTwoFactor',
                    'middleware' => 'permission:settings.auth'
                ]);
            }
            
            Route::post('auth/registration/captcha/enable', [
                'as' => 'settings.registration.captcha.enable',
                'uses' => 'Configuration@enableCaptcha',
                'middleware' => 'permission:settings.auth'
            ]);
            
            Route::post('auth/registration/captcha/disable', [
                'as' => 'settings.registration.captcha.disable',
                'uses' => 'Configuration@disableCaptcha',
                'middleware' => 'permission:settings.auth'
            ]);            
                        
            # Notifications
            Route::get('notifications', [
                'as' => 'settings.notifications',
                'uses' => 'Configuration@notifications',
                'middleware' => 'permission:settings.notifications'
            ]);
            
            Route::post('notifications/update', [
                'as' => 'settings.notifications.update',
                'uses' => 'Configuration@update',
                'middleware' => 'permission:settings.notifications'
            ]);                  
            
        });        
        
    });    
    
});    

/**
 * Authentication
 */

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

// Allow registration routes only if registration is enabled.
if (settings('reg_enabled')) {
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
    Route::get('register/confirmation/{token}', [
        'as' => 'register.confirm-email',
        'uses' => 'Auth\AuthController@confirmEmail'
    ]);
}

// Register password reset routes only if it is enabled inside website settings.
if (settings('forgot_password')) {
    Route::get('password/remind', 'Auth\PasswordController@forgotPassword');
    Route::post('password/remind', 'Auth\PasswordController@sendPasswordReminder');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
}

/**
 * Two-Factor Authentication
 */
if (settings('2fa.enabled')) {
    Route::get('auth/two-factor-authentication', [
        'as' => 'auth.token',
        'uses' => 'Auth\AuthController@getToken'
    ]);

    Route::post('auth/two-factor-authentication', [
        'as' => 'auth.token.validate',
        'uses' => 'Auth\AuthController@postToken'
    ]);
}

/**
 * Social Login
 */
Route::get('auth/{provider}/login', [
    'as' => 'social.login',
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'middleware' => 'social.login'
]);

Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('auth/twitter/email', 'Auth\SocialAuthController@getTwitterEmail');
Route::post('auth/twitter/email', 'Auth\SocialAuthController@postTwitterEmail');

Route::group(['middleware' => 'auth'], function () {

    /**
     * Dashboard
     */

    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    /**
     * User Profile
     */

    Route::get('profile', [
        'as' => 'profile',
        'uses' => 'ProfileController@index'
    ]);

    Route::get('profile/activity', [
        'as' => 'profile.activity',
        'uses' => 'ProfileController@activity'
    ]);

    Route::put('profile/details/update', [
        'as' => 'profile.update.details',
        'uses' => 'ProfileController@updateDetails'
    ]);

    Route::post('profile/avatar/update', [
        'as' => 'profile.update.avatar',
        'uses' => 'ProfileController@updateAvatar'
    ]);

    Route::post('profile/avatar/update/external', [
        'as' => 'profile.update.avatar-external',
        'uses' => 'ProfileController@updateAvatarExternal'
    ]);

    Route::put('profile/login-details/update', [
        'as' => 'profile.update.login-details',
        'uses' => 'ProfileController@updateLoginDetails'
    ]);

    Route::put('profile/social-networks/update', [
        'as' => 'profile.update.social-networks',
        'uses' => 'ProfileController@updateSocialNetworks'
    ]);

    Route::post('profile/two-factor/enable', [
        'as' => 'profile.two-factor.enable',
        'uses' => 'ProfileController@enableTwoFactorAuth'
    ]);

    Route::post('profile/two-factor/disable', [
        'as' => 'profile.two-factor.disable',
        'uses' => 'ProfileController@disableTwoFactorAuth'
    ]);

    Route::get('profile/sessions', [
        'as' => 'profile.sessions',
        'uses' => 'ProfileController@sessions'
    ]);

    Route::delete('profile/sessions/{session}/invalidate', [
        'as' => 'profile.sessions.invalidate',
        'uses' => 'ProfileController@invalidateSession'
    ]);

    /**
     * User Management
     */
    Route::get('user', [
        'as' => 'user.list',
        'uses' => 'UsersController@index'
    ]);

    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UsersController@create'
    ]);

    Route::post('user/create', [
        'as' => 'user.store',
        'uses' => 'UsersController@store'
    ]);

    Route::get('user/{user}/show', [
        'as' => 'user.show',
        'uses' => 'UsersController@view'
    ]);

    Route::get('user/{user}/edit', [
        'as' => 'user.edit',
        'uses' => 'UsersController@edit'
    ]);

    Route::put('user/{user}/update/details', [
        'as' => 'user.update.details',
        'uses' => 'UsersController@updateDetails'
    ]);

    Route::put('user/{user}/update/login-details', [
        'as' => 'user.update.login-details',
        'uses' => 'UsersController@updateLoginDetails'
    ]);

    Route::delete('user/{user}/delete', [
        'as' => 'user.delete',
        'uses' => 'UsersController@delete'
    ]);

    Route::post('user/{user}/update/avatar', [
        'as' => 'user.update.avatar',
        'uses' => 'UsersController@updateAvatar'
    ]);

    Route::post('user/{user}/update/avatar/external', [
        'as' => 'user.update.avatar.external',
        'uses' => 'UsersController@updateAvatarExternal'
    ]);

    Route::post('user/{user}/update/social-networks', [
        'as' => 'user.update.socials',
        'uses' => 'UsersController@updateSocialNetworks'
    ]);

    Route::get('user/{user}/sessions', [
        'as' => 'user.sessions',
        'uses' => 'UsersController@sessions'
    ]);

    Route::delete('user/{user}/sessions/{session}/invalidate', [
        'as' => 'user.sessions.invalidate',
        'uses' => 'UsersController@invalidateSession'
    ]);

    Route::post('user/{user}/two-factor/enable', [
        'as' => 'user.two-factor.enable',
        'uses' => 'UsersController@enableTwoFactorAuth'
    ]);

    Route::post('user/{user}/two-factor/disable', [
        'as' => 'user.two-factor.disable',
        'uses' => 'UsersController@disableTwoFactorAuth'
    ]);

    /**
     * Roles & Permissions
     */

    Route::get('role', [
        'as' => 'role.index',
        'uses' => 'RolesController@index'
    ]);

    Route::get('role/create', [
        'as' => 'role.create',
        'uses' => 'RolesController@create'
    ]);

    Route::post('role/store', [
        'as' => 'role.store',
        'uses' => 'RolesController@store'
    ]);

    Route::get('role/{role}/edit', [
        'as' => 'role.edit',
        'uses' => 'RolesController@edit'
    ]);

    Route::put('role/{role}/update', [
        'as' => 'role.update',
        'uses' => 'RolesController@update'
    ]);

    Route::delete('role/{role}/delete', [
        'as' => 'role.delete',
        'uses' => 'RolesController@delete'
    ]);


    Route::post('permission/save', [
        'as' => 'permission.save',
        'uses' => 'PermissionsController@saveRolePermissions'
    ]);

    Route::resource('permission', 'PermissionsController');

    /**
     * Settings
     */

    Route::get('settings', [
        'as' => 'settings.general',
        'uses' => 'SettingsController@general',
        'middleware' => 'permission:settings.general'
    ]);

    Route::post('settings/general', [
        'as' => 'settings.general.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.general'
    ]);

    Route::get('settings/auth', [
        'as' => 'settings.auth',
        'uses' => 'SettingsController@auth',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('settings/auth', [
        'as' => 'settings.auth.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.auth'
    ]);

// Only allow managing 2FA if AUTHY_KEY is defined inside .env file
    if (env('AUTHY_KEY')) {
        Route::post('settings/auth/2fa/enable', [
            'as' => 'settings.auth.2fa.enable',
            'uses' => 'SettingsController@enableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);

        Route::post('settings/auth/2fa/disable', [
            'as' => 'settings.auth.2fa.disable',
            'uses' => 'SettingsController@disableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);
    }

    Route::post('settings/auth/registration/captcha/enable', [
        'as' => 'settings.registration.captcha.enable',
        'uses' => 'SettingsController@enableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('settings/auth/registration/captcha/disable', [
        'as' => 'settings.registration.captcha.disable',
        'uses' => 'SettingsController@disableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::get('settings/notifications', [
        'as' => 'settings.notifications',
        'uses' => 'SettingsController@notifications',
        'middleware' => 'permission:settings.notifications'
    ]);

    Route::post('settings/notifications', [
        'as' => 'settings.notifications.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.notifications'
    ]);

    /**
     * Activity Log
     */

    Route::get('activity', [
        'as' => 'activity.index',
        'uses' => 'ActivityController@index'
    ]);

    Route::get('activity/user/{user}/log', [
        'as' => 'activity.user',
        'uses' => 'ActivityController@userActivity'
    ]);

});


/**
 * Installation
 */

$router->get('install', [
    'as' => 'install.start',
    'uses' => 'InstallController@index'
]);

$router->get('install/requirements', [
    'as' => 'install.requirements',
    'uses' => 'InstallController@requirements'
]);

$router->get('install/permissions', [
    'as' => 'install.permissions',
    'uses' => 'InstallController@permissions'
]);

$router->get('install/database', [
    'as' => 'install.database',
    'uses' => 'InstallController@databaseInfo'
]);

$router->get('install/start-installation', [
    'as' => 'install.installation',
    'uses' => 'InstallController@installation'
]);

$router->post('install/start-installation', [
    'as' => 'install.installation',
    'uses' => 'InstallController@installation'
]);

$router->post('install/install-app', [
    'as' => 'install.install',
    'uses' => 'InstallController@install'
]);

$router->get('install/complete', [
    'as' => 'install.complete',
    'uses' => 'InstallController@complete'
]);

$router->get('install/error', [
    'as' => 'install.error',
    'uses' => 'InstallController@error'
]);