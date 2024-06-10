<?php 

$can_view_admin = \App\models\UserAccessControl::where('module','admin')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_admin = \App\models\UserAccessControl::where('module','admin')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_admin = \App\models\UserAccessControl::where('module','admin')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_admin = \App\models\UserAccessControl::where('module','admin')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_programs = \App\models\UserAccessControl::where('module','programs')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_programs = \App\models\UserAccessControl::where('module','programs')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_programs = \App\models\UserAccessControl::where('module','programs')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_programs = \App\models\UserAccessControl::where('module','programs')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_news = \App\models\UserAccessControl::where('module','news')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_news = \App\models\UserAccessControl::where('module','news')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_news = \App\models\UserAccessControl::where('module','news')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_news = \App\models\UserAccessControl::where('module','news')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_schools = \App\models\UserAccessControl::where('module','schools')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_schools = \App\models\UserAccessControl::where('module','schools')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_schools = \App\models\UserAccessControl::where('module','schools')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_schools = \App\models\UserAccessControl::where('module','schools')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_applicants = \App\models\UserAccessControl::where('module','applicants')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_manage_pending_applicants = \App\models\UserAccessControl::where('module','applicants')->where('access','pending')->where('user_id',auth()->id())
->get()->first();
$can_admit_applicant = \App\models\UserAccessControl::where('module','applicants')->where('access','admit')->where('user_id',auth()->id())
->get()->first();
?>