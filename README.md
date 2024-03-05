# Delivery
This module adds a custom form to integrate a digitization/delivery-on-demand service.
The form can be configured via configuration files and can also be restricted to certain user groups.

## Usage
Integrate the module in the `modules` directory of VuFind and activate it by adding `Delivery` to `VUFIND_LOCAL_MODULES`.  
When adding the module manually make sure to copy and adapt the config files and copy/symlink the theme.  
Make sure to set up your database correctly by applying `sql/mysql.sql` to your VuFind database.

Add the following lines to your templates to enable the functionality of this module:
```php
<?=$this->render('myresearch/delivery-menu.phtml', ['active' => $this->active, 'profile' => $this->profile]); ?>
```
Add this line to the myresearch menu.

```php
?=$this->render('RecordDriver/DefaultRecord/delivery-toolbar.phtml'); ?>
```
Add this line to the detail view.

```php
<?=$this->render('RecordDriver/DefaultRecord/delivery-result-list.phtml'); ?>
```
Add this line to the body of the result list entry.
