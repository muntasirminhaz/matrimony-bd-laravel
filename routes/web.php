<?php
# USERS AUTHENTICATION : START #
Auth::routes();
Route::get('/', 'HomeController@index')->middleware('IsCompleted')->name('home');
Route::get('/verify/{verificationCode}/{userid}', 'EmailVerification@index')->name('verifyEmail');
Route::get('/resend-email/{email}/{userid}', 'EmailVerification@resendCode')->name('resendCode');
Route::get('/check-user-and-logout', 'LogUserOutAfterRegistration@index')->name('logoutAfterRegirster')->middleware('auth');
# USERS AUTHENTICATION : END #

# EMAIL VERIFICATION #
Route::get('verify-your-email', 'EmailVerification@index')->middleware('auth')->name('emailNotVerified');
Route::get('resend-my-email', 'EmailVerification@sendMailAgain')->middleware('auth')->name('sendMailAgain');
Route::get('verify-user-email/{verificationCode}/{userid}/{email}', 'EmailVerification@check')->name('checkEmailVerification');

# USERS : START #

# PROFILE SIGNUP COMPLETING PROCESS #
Route::prefix('signup/')->name('signup.')->middleware('auth')->group(function () {

    Route::get('2/contact', 'Signup\ContactPersonController@index')->name('contact');
    Route::post('2/contact-save', 'Signup\ContactPersonController@store')->name('contactStore');

    Route::get('3/location', 'Signup\LocationController@index')->name('location');
    Route::post('3/location-district', 'Ajax\AjaxUpzilaController@index')->name('locationAjax.upzila');
    Route::post('3/location-save', 'Signup\LocationController@store')->name('locationStore');

    Route::get('4/basic', 'Signup\BasicLifeStyleController@index')->name('basic');
    Route::post('4/basic-save', 'Signup\BasicLifeStyleController@store')->name('basicStore');

    Route::get('5/education', 'Signup\EducationController@index')->name('education');
    Route::get('5/education-skip', 'Signup\EducationController@skip')->name('educationSkip');
    Route::post('5/education-store', 'Signup\EducationController@store')->name('educationStore');

    Route::get('6/prefession', 'Signup\ProfessionController@index')->name('profession');
    Route::post('6/prefession-save', 'Signup\ProfessionController@store')->name('prefessionStore');

    Route::get('7/parents', 'Signup\ParentsController@index')->name('parents');
    Route::post('7/parents-store', 'Signup\ParentsController@store')->name('parentsStore');

    Route::get('8/siblings', 'Signup\SiblingsController@index')->name('siblings');
    Route::get('8/siblings-skip', 'Signup\SiblingsController@skip')->name('siblingsSkip');
    Route::post('8/numbers-of-siblings', 'Signup\SiblingsController@storeNumber')->name('storeSiblingNumber');
    Route::post('8/save-siblings', 'Signup\SiblingsController@storeSibling')->name('storeSiblingInfo');

    Route::get('9/relatives', 'Signup\RelativesController@index')->name('relatives');
    Route::get('9/relatives-skip', 'Signup\RelativesController@skip')->name('relativeSkip');
    Route::post('9/numbers-of-relatives', 'Signup\RelativesController@storeNumber')->name('storeRelativeNumber');
    Route::post('9/save-relatives', 'Signup\RelativesController@storeRelative')->name('storeRelativeInfo');

    Route::get('10/preferences', 'Signup\PreferenceController@index')->name('preference');
    Route::post('10/preferences-save', 'Signup\PreferenceController@store')->name('storePreference');

    Route::get('11/package', 'Signup\PackageController@index')->name('package');

    Route::get('complete/signup-complete-100', 'Signup\SignupCompleteController@index')->name('profileComplete');

});

# USERS LOGGED IN #
Route::prefix('users')->name('users.')->middleware('auth', 'IsCompleted')->group(function () {

    # ADVANCE SEARCH #
    Route::get('start-advance-search', 'AdvanceSearchController@showForm')->name('advanceSearch.showForm');
    Route::get('advance-search-result', 'AdvanceSearchController@showResults')->name('advanceSearch.showResults');

    # USER PRIVACY #
    Route::get('edit-privacy-settings', 'Users\PrivacyController@index')->name('privacy.index');
    Route::post('update-privacy-settings', 'Users\PrivacyController@store')->name('privacy.store');

    # USER MESSAGES #

    Route::get('/my-messages/inbox', 'Users\UserMessageController@index')->name('myMessagesInbox');
    Route::get('/my-messages/outbox', 'Users\UserMessageController@index')->name('myMessagesOutbox');
    Route::post('send-message/{id}', 'Users\UserMessageController@store')->name('sendMessage');
    Route::post('delete-message/{id}', 'Users\UserMessageController@destroy')->name('deleteMessage');
    Route::get('/set-messsage-read', 'Users\UserMessageController@setRead')->name('messsage.setread');

    # USER INTEREST #
    Route::get('/my-interests', 'Users\UserInterestController@index')->name('myInterests');
    Route::post('express-interest/{id}', 'Users\UserInterestController@store')->name('sendInterest');
    Route::get('interest-accepted/{id}', 'Users\UserInterestController@accepted')->name('interest.accept');
    Route::get('interest-rejected/{id}', 'Users\UserInterestController@rejected')->name('interest.delete');

    # USER FAVORITES #
    Route::get('/my-favorites', 'Users\UserFavoriteController@index')->name('myFavorites');
    Route::post('add-favorite/{id}', 'Users\UserFavoriteController@store')->name('sendFavorite');

    # USER MOST FAVORITES #
    Route::get('/my-most-favorites', 'Users\UserMostFavoriteController@index')->name('myMostFavorites');
    Route::post('add-most-favorite/{id}', 'Users\UserMostFavoriteController@store')->name('sendMostFavorite');
    
    # USER MOST FAVORITES #
    Route::get('/profile-viewed-by', 'Users\UserProfileViewedController@index')->name('profiledViewedBy');

    # USER MOST FAVORITES #
    Route::get('/my-contacts', 'Users\UserDirectContactController@index')->name('myContacts');
    Route::get('/view-contact/{id}', 'Users\UserDirectContactController@show')->name('viewContact');
    Route::post('/add-contact/{id}', 'Users\UserDirectContactController@store')->name('sendContact');

    # USER PHOTO #
    Route::prefix('photos/')->name('photos.')->group(function () {
        Route::get('/', 'Users\PhotosController@index')->name('index');

        Route::post('/upload-photos', 'Users\PhotosController@uploadPhoto')->name('upload');
        Route::post('/set-profile-picture/{pictureId}', 'Users\PhotosController@setProfilePicture')->name('setprofilepicture');
        Route::post('/set-photo-public/{pictureId}', 'Users\PhotosController@changeToPublic')->name('setPublic');
        Route::post('/set-photo-private/{pictureId}', 'Users\PhotosController@changeToPrivate')->name('setPrivate');
        Route::post('/delete-photo/{pictureId}', 'Users\PhotosController@deletePhoto')->name('delete');
    });

    # UPGRADE USER PACKAGE #
    Route::post('upgrade-user-package', 'Users\UpgradeUserPackageController@upgradeMembership')->name('upgradePackage');

    # USER PROFILE & EDIT #
    Route::get('myprofileold', 'Users\ProfileControllerOld@index')->name('myprofileold');
    Route::get('myprofile', 'Users\ProfileController@index')->name('myprofile');
    Route::prefix('myprofile')->name('profile.')->group(function () {
        # Basic #
        Route::get('edit-basic-info', 'UserEditProfile\EditBasicController@edit')->name('basic.edit');
        Route::post('update-basic-info', 'UserEditProfile\EditBasicController@update')->name('basic.update');

        # Contact #
        Route::get('edit-contact-info', 'UserEditProfile\EditContactController@edit')->name('contact.edit');
        Route::post('update-contact-info', 'UserEditProfile\EditContactController@update')->name('contact.update');

        # Profession #
        Route::get('edit-profession-info', 'UserEditProfile\EditProfessionController@edit')->name('profession.edit');
        Route::post('update-profession-info', 'UserEditProfile\EditProfessionController@update')->name('profession.update');

        # Location #
        Route::get('edit-location-info', 'UserEditProfile\EditLocationController@edit')->name('location.edit');
        Route::post('update-location-info', 'UserEditProfile\EditLocationController@update')->name('location.update');

        # Parent #
        Route::get('edit-parent-info', 'UserEditProfile\EditParentController@edit')->name('parent.edit');
        Route::post('update-parent-info', 'UserEditProfile\EditParentController@update')->name('parent.update');

        # Preference #
        Route::get('edit-preference-info', 'UserEditProfile\EditPreferenceController@edit')->name('preference.edit');
        Route::post('update-preference-info', 'UserEditProfile\EditPreferenceController@update')->name('preference.update');

        # Education #
        Route::get('edit-education/{id}', 'UserEditProfile\EditEducationController@edit')->name('education.edit');
        Route::get('insert-education', 'UserEditProfile\EditEducationController@create')->name('education.create');
        Route::post('store-education', 'UserEditProfile\EditEducationController@store')->name('education.store');
        Route::post('update-education/{id}', 'UserEditProfile\EditEducationController@update')->name('education.update');
        Route::post('delete-education/{id}', 'UserEditProfile\EditEducationController@destroy')->name('education.delete');

        # Siblings #
        Route::get('edit-siblings-number', 'UserEditProfile\EditSiblingsController@edit')->name('siblings.edit');
        Route::post('update-siblings-number', 'UserEditProfile\EditSiblingsController@update')->name('siblings.update');

        Route::get('insert-siblings', 'UserEditProfile\EditSiblingsController@create')->name('siblings.create');
        Route::post('store-siblings', 'UserEditProfile\EditSiblingsController@store')->name('siblings.store');

        Route::get('edit-siblings/{id}', 'UserEditProfile\EditSiblingsController@editSibling')->name('siblings.editSibling');
        Route::post('update-siblings/{id}', 'UserEditProfile\EditSiblingsController@updateSibling')->name('siblings.updateSibling');
        Route::post('delete-siblings/{id}', 'UserEditProfile\EditSiblingsController@deleteSibling')->name('siblings.deleteSibling');

        # Relatives #
        Route::get('edit-relatives-number', 'UserEditProfile\EditRelativesController@edit')->name('relatives.edit');
        Route::post('update-relatives-number', 'UserEditProfile\EditRelativesController@update')->name('relatives.update');

        Route::get('insert-relatives', 'UserEditProfile\EditRelativesController@create')->name('relatives.create');
        Route::post('store-relatives', 'UserEditProfile\EditRelativesController@store')->name('relatives.store');

        Route::get('edit-relatives/{id}', 'UserEditProfile\EditRelativesController@editRelative')->name('relatives.editRelatives');
        Route::post('update-relatives/{id}', 'UserEditProfile\EditRelativesController@updateRelative')->name('relatives.updateRelatives');
        Route::post('delete-relatives/{id}', 'UserEditProfile\EditRelativesController@deleteRelative')->name('relatives.deleteRelatives');

    });
    # PASSWORD CHANGE #
    Route::get('change-password', 'Users\UserChangePassword@index')->name('password.edit');
    Route::post('update-password', 'Users\UserChangePassword@update')->name('password.update');

    # CURRENT PACKAGE #
    Route::get('my-current-package', 'Users\UserCurrentPackage@index')->name('currentPackage');

    # REPORT USER #
    Route::post('update-password/{reportedUser}', 'Users\ReportUserController@report')->name('reportUser');

});

# PROFILE SEARCH #
Route::get('search', 'SearchController@index')->middleware('IsCompleted')->name('search');

# PACKAGE SEARCH #
Route::get('our-packages', 'PackageController@index')->name('packages');
Route::get('package-details/{id}', 'PackageController@showPackage')->name('getPackagesDetails');

# SINGLE PROFILE #
Route::get('profile/{name}/{id}', 'Users\SingleProfilePageController@index')->middleware('IsCompleted')->name('profile.index');

# CONTACT US #
Route::get('contact-us', 'Users\ContactUsController@index')->name('contactus');
Route::post('send-message', 'Users\ContactUsController@store')->name('sendContactMessage');

# USERS : END #

# ADMIN : START #

Route::prefix('admin')->name('admin.')->group(function () {

    # ADMIN AUTHENTICATION : START #
    Route::get('/login', 'AuthAdmin\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login-now', 'AuthAdmin\AdminLoginController@authenticated')->name('login.submit');

    # ADMIN LOGGED IN : START #
    Route::group(['middleware' => ['isAdmin']], function () {

        # Admin Dashboard #
        Route::get('/dashboard', 'Admin\AdminDashboard@index')->name('dashboard');

        # Admin CRUD #

        # users #
        Route::prefix('users')->name('users.')->group(function () {

            Route::get('/pending-profiles', 'Admin\AdminUsersController@indexPendingApproval')->name('pendingApproval');
            Route::get('/profile-pdf/{id}', 'Admin\AdminUsersController@userPdf')->name('userPdf');
            Route::get('/approve-profile/{id}', 'Admin\AdminUsersController@approveUserProfile')->name('approveUserProfile');
            Route::get('/disapprove-profile/{id}', 'Admin\AdminUsersController@disapproveUserProfile')->name('disapproveUserProfile');
            Route::get('/block-profile/{id}', 'Admin\AdminUsersController@unblockUserProfile')->name('unblockUserProfile');
            Route::get('/unblock-profile/{id}', 'Admin\AdminUsersController@blockUserProfile')->name('blockUserProfile');
            Route::post('/make-featured/{id}', 'Admin\AdminUsersController@makeFeatured')->name('makeFeatured');
            Route::post('/remove-featured/{id}', 'Admin\AdminUsersController@removeFeatured')->name('removeFeatured');

            #user message #
            Route::get('/user-messages/{userid}/inbox', 'Admin\AdminUsersMessageController@index')->name('messageInbox');
            Route::get('/user-messages/{userid}/outbox', 'Admin\AdminUsersMessageController@index')->name('messageOutbox');

            #user interest #
            Route::get('/user-interests/{userid}', 'Admin\AdminUsersinterestController@index')->name('interest');

            # PDF #

        });

        # purchaseMgt #
        Route::name('purchaseMgt.')->group(function () {
            Route::get('/purchase-canceled', 'Admin\PurchaseMgtController@indexCanceled')->name('canceled');
            Route::get('/purchase-approved', 'Admin\PurchaseMgtController@indexApproved')->name('approved');
        });
        
        # userAgent #
        Route::name('userAgent.')->group(function () {
            Route::get('/set-user-agent', 'Admin\UserAgentContrller@setUserAgent')->name('addUserAgent');
            Route::get('/set-user-agent/{userid}', 'Admin\UserAgentContrller@setUserAgent')->name('setUserAgent');
            Route::post('/save-user-agent', 'Admin\UserAgentContrller@setUserAgentSubmit')->name('setUserAgentSubmit');            
        });

       
        # adminAccount #
        Route::name('adminAccount.')->group(function () {
            Route::get('/my-admin-profile', 'Admin\AdminAccountController@index')->name('index');
            Route::get('/edit-my-profile', 'Admin\AdminAccountController@edit')->name('edit');
            Route::post('/update-my-profile', 'Admin\AdminAccountController@update')->name('update');
        });

        # USER REPORTS #
        Route::name('userReports.')->group(function () {
            Route::get('/user-reports', 'Admin\UserReportsController@index')->name('index');
            Route::get('/user-reports-checked/{id}', 'Admin\UserReportsController@checked')->name('checked');
        });

        # CONTACT MESSAGES #
        Route::name('contactus.')->group(function () {
            Route::get('/contact-messages', 'Admin\AdminContactUsController@index')->name('index');

        });

         # requestUserAgent #
         Route::get('/become-user-agent/{userid}', 'Admin\RequestUserAgentContrller@requestUserAgent')->name('requestUserAgent');
         Route::get('/approve/{id}', 'Admin\RequestUserAgentContrller@approve')->name('requestUserAgent.approve');
         Route::get('/disapprove/{id}', 'Admin\RequestUserAgentContrller@disapprove')->name('requestUserAgent.disapprove');



        # Resources Defined #
        Route::resources([
            'packages' => 'Admin\AdminPackages',
            'users' => 'Admin\AdminUsersController',
            'purchaseMgt' => 'Admin\PurchaseMgtController',
            'adminMgt' => 'Admin\AdminMgtController',
            'diary' => 'Admin\AdminDiaryController',
            'userAgent' => 'Admin\UserAgentContrller',
            'userAgentRequest' => 'Admin\RequestUserAgentContrller',
        ]);

    });
    # ADMIN LOGGED IN : END #

});

Route::any('admin/password/reset', function () {
    return view('authadmin.passwords.reset');
});
Route::any('admin/password/email', function () {
    return view('authadmin.passwords.email');
});

# ADMIN AUTHENTICATION : END #
# ADMIN : END #
