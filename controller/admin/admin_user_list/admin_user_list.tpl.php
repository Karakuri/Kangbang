<? Parts::display('admin/header'); ?>
<h2><?= $this->_('page.admin_user') ?></h2>
<? Parts::display('common/table/db',AdminUserDao::get(),10,admin_user_id,admin_user_name,insert_date,update_date) ?>
<? Parts::display('admin/footer'); ?>