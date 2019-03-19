<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'فرم ارسالی مورد تایید نبود';

// Login
$lang['login_heading']         = 'ورود';
$lang['login_subheading']      = 'لطفا با ایمیل و کلمه عبور خود وارد شوید';
$lang['login_identity_label']  = 'ایمیل';
$lang['login_password_label']  = 'کلمه عبور';
$lang['login_remember_label']  = 'مرا به خاطر بسپار';
$lang['login_submit_btn']      = 'ورود';
$lang['login_forgot_password'] = 'کلمه عبور خود را فراموش کرده اید؟';

// Index
$lang['index_heading']           = 'کاربران';
$lang['index_subheading']        = 'لیست کاربران';
$lang['index_fname_th']          = 'نام';
$lang['index_lname_th']          = 'نام خانوادگی';
$lang['index_email_th']          = 'ایمیل';
$lang['index_groups_th']         = 'گروه';
$lang['index_status_th']         = 'اجازه ورود';
$lang['index_verifies_th']       = 'وضعیت وریفای';
$lang['index_allow_exchange_th'] = 'اجازه انجام اکسچنج';
$lang['index_action_th']         = 'مدیریت';
$lang['index_active_link']       = 'دارد';
$lang['index_inactive_link']     = 'ندارد';
$lang['index_create_user_link']  = 'ساخت کاربر جدید';
$lang['index_create_group_link'] = 'ساخت گروه جدید';

// Deactivate User
$lang['deactivate_heading']                  = 'غیر فعال کردن کاربر';
$lang['deactivate_subheading']               = 'آیا مطمین هستید میخواید این کاربر را غیر فعال کنید \'%s\'';
$lang['deactivate_confirm_y_label']          = 'بله:';
$lang['deactivate_confirm_n_label']          = 'خیر:';
$lang['deactivate_submit_btn']               = 'ارسال';
$lang['deactivate_validation_confirm_label'] = 'تایید';
$lang['deactivate_validation_user_id_label'] = 'آی دی کاربر';

// Create User
$lang['create_user_heading']                           = 'کاربر جدید';
$lang['create_user_subheading']                        = 'لطفا اطلاعات کاربر را در زیر وارد کنید';
$lang['create_user_fname_label']                       = 'نام:';
$lang['create_user_lname_label']                       = 'نام خانوادگی:';
$lang['create_user_melli_label']                       = 'کد ملی:';
$lang['create_user_identity_label']                    = 'شناسه:';
$lang['create_user_mobile_label']                      = 'شماره موبایل:';
$lang['create_user_email_label']                       = 'ایمیل:';
$lang['create_user_phone_label']                       = 'تلفن ثابت:';
$lang['create_user_address_label']                     = 'آدرس کامل:';
$lang['create_user_password_label']                    = 'کلمه عبور:';
$lang['create_user_password_confirm_label']            = 'تکرار کلمه عبور:';
$lang['create_user_submit_btn']                        = 'ساخت کاربر';
$lang['create_user_validation_fname_label']            = 'نام';
$lang['create_user_validation_lname_label']            = 'نام خانوادگی';
$lang['create_user_validation_melli_label']            = 'کد ملی';
$lang['create_user_validation_address_label']          = 'آدرس کامل';
$lang['create_user_validation_identity_label']         = 'شناسه';
$lang['create_user_validation_email_label']            = 'آدرس ایمیل';
$lang['create_user_validation_phone_label']            = 'تلفن ثابت';
$lang['create_user_validation_mobile_label']           = 'شماره موبایل';
$lang['create_user_validation_password_label']         = 'کلمه عبور';
$lang['create_user_validation_password_confirm_label'] = 'تکرار کلمه عبور';

// Edit User
$lang['edit_user_heading']                           = 'ویرایش کاربر';
$lang['edit_user_subheading']                        = 'لطفا اطلاعات کاربر را در زیر وارد کنید';
$lang['edit_user_fname_label']                       = 'نام:';
$lang['edit_user_lname_label']                       = 'نام خانوادگی:';
$lang['edit_user_mobile_label']                      = 'شماره موبایل:';
$lang['edit_user_address_label']                     = 'آدرس کامل:';
$lang['edit_user_melli_label']                       = 'کد ملی:';
$lang['edit_user_email_label']                       = 'ایمیل:';
$lang['edit_user_phone_label']                       = 'تلفن ثابت:';
$lang['edit_user_password_label']                    = 'کلمه عبور (اگر قصد تغییر آنرا دارید)';
$lang['edit_user_password_confirm_label']            = 'تکرار کلمه عبور جدید';
$lang['edit_user_groups_heading']                    = 'عضویت در گروه';
$lang['edit_user_verify_name_label']                 = 'وریفای نام:';
$lang['edit_user_verify_address_label']              = 'وریفای آدرس:';
$lang['edit_user_verify_melli_label']                = 'وریفای کد ملی:';
$lang['edit_user_verify_mobile_label']               = 'وریفای شماره موبایل:';
$lang['edit_user_verify_phone_label']                = 'وریفای تلفن ثابت:';
$lang['edit_user_allow_exchange_label']              = 'اجازه اکسچنج:';
$lang['edit_user_verifies_heading']                  = 'وضعیت وریفای ها';
$lang['edit_user_allow_exchange_heading']            = 'آیا کاربر مجاز به اکسچنج است';
$lang['edit_user_submit_btn']                        = 'ذخیره کاربر';
$lang['edit_user_validation_fname_label']            = 'نام';
$lang['edit_user_validation_lname_label']            = 'نام خانوادگی';
$lang['edit_user_validation_email_label']            = 'آدرس ایمیل';
$lang['edit_user_validation_phone_label']            = 'تلفن ثابت';
$lang['edit_user_validation_melli_label']            = 'کد ملی';
$lang['edit_user_validation_address_label']          = 'آدرس';
$lang['edit_user_validation_mobile_label']           = 'شماره موبایل';
$lang['edit_user_validation_groups_label']           = 'گروه ها';
$lang['edit_user_validation_verify_name_label']      = 'وریفای نام';
$lang['edit_user_validation_verify_address_label']   = 'وریفای آدرس';
$lang['edit_user_validation_verify_melli_label']     = 'وریفای کد ملی';
$lang['edit_user_validation_verify_mobile_label']    = 'وریفای شماره موبایل';
$lang['edit_user_validation_verify_phone_label']     = 'وریفای تلفن ثابت';
$lang['edit_user_validation_allow_exchange_label']   = 'اجازه اکسچنج';
$lang['edit_user_validation_password_label']         = 'کلمه عبور';
$lang['edit_user_validation_password_confirm_label'] = 'تکرار کلمه عبور';

// Create Group
$lang['create_group_title']                  = 'ایجاد گروه جدید';
$lang['create_group_heading']                = 'ساخت گروه';
$lang['create_group_subheading']             = 'لطفا اطلاعات گروه را در زیر وارد کنید';
$lang['create_group_name_label']             = 'نام گروه (انگلیسی):';
$lang['create_group_desc_label']             = 'توضیحات:';
$lang['create_group_submit_btn']             = 'ایجاد گروه';
$lang['create_group_validation_name_label']  = 'نام گروه (انگلیسی)';
$lang['create_group_validation_desc_label']  = 'مشخصات';

// Edit Group
$lang['edit_group_title']                  = 'ویرایش گروه';
$lang['edit_group_saved']                  = 'گروه ذخیره شد';
$lang['edit_group_heading']                = 'ویرایش گروه';
$lang['edit_group_subheading']             = 'لطفا مشخصات گروه را در زیر وارد کنید';
$lang['edit_group_name_label']             = 'نام گروه:';
$lang['edit_group_desc_label']             = 'توضیحات:';
$lang['edit_group_submit_btn']             = 'ذخیره گروه';
$lang['edit_group_validation_name_label']  = 'نام گروه';
$lang['edit_group_validation_desc_label']  = 'توضیحات';

// Change Password
$lang['change_password_heading']                               = 'تغییر کلمه عبور';
$lang['change_password_old_password_label']                    = 'کلمه عبور قبلی:';
$lang['change_password_new_password_label']                    = 'کلمه عبور جدید (حداقل %s حرف)';
$lang['change_password_new_password_confirm_label']            = 'تکرار کلمه عبور جدید';
$lang['change_password_submit_btn']                            = 'تغییر';
$lang['change_password_validation_old_password_label']         = 'کلمه عبور قبلی';
$lang['change_password_validation_new_password_label']         = 'کلمه عبور جدید';
$lang['change_password_validation_new_password_confirm_label'] = 'تکرار کلمه عبور جدید';

// Forgot Password
$lang['forgot_password_heading']                 = 'بازیابی کلمه عبور';
$lang['forgot_password_subheading']              = 'لطفا %s خود را وارد کنید تا ایمیل تایید برای شما ارسال شود';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'ارسال';
$lang['forgot_password_validation_email_label']  = 'آدرس ایمیل';
$lang['forgot_password_username_identity_label'] = 'نام کاربری';
$lang['forgot_password_email_identity_label']    = 'ایمیل';
$lang['forgot_password_email_not_found']         = 'آدرس ایمیل یافت نشد';

// Reset Password
$lang['reset_password_heading']                               = 'تغییر کلمه عبور';
$lang['reset_password_new_password_label']                    = 'کلمه عبور جدید (حداقل %s حرف)';
$lang['reset_password_new_password_confirm_label']            = 'تکرار کلمه عبور جدید:';
$lang['reset_password_submit_btn']                            = 'تغییر';
$lang['reset_password_validation_new_password_label']         = 'کلمه عبور جدید';
$lang['reset_password_validation_new_password_confirm_label'] = 'تاییدک لمه عبور جدید';

// Activation Email
$lang['email_activate_heading']    = 'فعال کردن اکانت %s';
$lang['email_activate_subheading'] = 'لطفا روی لینک کایک کنید تا %s';
$lang['email_activate_link']       = 'اکانت خود را فعال کنید';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'تغییر کلمه عبور برای %s';
$lang['email_forgot_password_subheading'] = 'لطفا روی این لینک کلیک کنید تا %s';
$lang['email_forgot_password_link']       = 'کلمه عبور خود را ریست کنید';

// New Password Email
$lang['email_new_password_heading']    = 'کلمه عبور جدید برای %s';
$lang['email_new_password_subheading'] = 'کلمه عبور شما تغییر کرد به: %s';

